<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deteksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->model('User_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Hasil_model');
        $this->load->model('Admin_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Certainty_model');
        $this->load->model('Bayes_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "user") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id_user');

        $data = array(
            'title' => 'deteksi',
            'pertanyaan' =>  $this->Pertanyaan_model->getPertanyaan(),
            'username' => $username
        );

        $data['contents'] = $this->load->view('user/pages/deteksi', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function hasil($id)
    {
        $username = $this->session->userdata('username');
        $sortedDataFromCF = $this->quickSort($this->certainty_factor($id, 1));
        $sortedDataFromBayes = $this->quickSort($this->bayes($id, 1));

        // var_dump($this->certainty_factor($id, 1));
        // var_dump($sortedDataFromBayes)

        $hasil_deskripsi = array();

        for ($i = 0; $i < 3; $i++) {
            $kriteria = $this->Kriteria_model->get_kriteria($sortedDataFromCF[$i]['kode_ciri']);
            $nama = $kriteria->nama_kriteria; // Ambil deskripsi dari objek $kriteria
            $deskripsi = $kriteria->deskripsi; // Ambil deskripsi dari objek $kriteria
            $kode = $sortedDataFromCF[$i]['kode_ciri'];
            $bobot = $sortedDataFromCF[$i]['nilai'];

            $hasil_deskripsi[] = (object) array(
                'kode' => $kode,
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'bobot' => $bobot
            );
        }

        $data = array(
            'title' => 'hasil',
            'usernmae' => $username,
            'hasil_bayes' => $this->bayes($id, 1),
            'hasil_cf' => $this->certainty_factor($id, 1),
            'hasil' => $hasil_deskripsi,
        );

        $data['contents'] = $this->load->view('user/pages/deteksi-hasil', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function submit_jawaban()
    {
        $nama = $this->input->post('nama');
        $usia = $this->input->post('usia');
        $username = $this->session->userdata('username');

        // Get the user ID based on the username (assuming 'users' table has 'id_user' and 'username' columns).
        $this->db->where('username', $username);
        $user = $this->db->get('user')->row();

        // check apakah user sudah pernah tes?
        $this->db->where('id_user', $user->id_user);
        $isSesion = $this->db->get('jawaban')->row();


        if ($isSesion !== null) {
            // Jika user sudah pernah tes, ambil nilai sesi dari $isSesion dan tambahkan 1
            $sesi = $isSesion->sesi + 1;
        } else {
            // Jika user belum pernah tes, set nilai sesi menjadi 1
            $sesi = 1;
        }

        // Save each answer to the 'jawaban' table.
        foreach ($_POST['jawaban'] as $id_pertanyaan => $jawaban) {
            $kriteria = $this->Pertanyaan_model->get_kriteria_id($id_pertanyaan);
            $gejala = $this->Pertanyaan_model->get_gejala_id($id_pertanyaan);

            $data = array(
                'id_user' => $user->id_user,
                'nama' => $nama,
                'usia' => $usia,
                'id_pertanyaan' => $id_pertanyaan,
                'id_kriteria' => $kriteria->id_kriteria,
                'id_gejala' => $gejala->id_gejala,
                'kode_gejala' => $gejala->kode_gejala,
                'cf_user' => $jawaban,
                'sesi' => $sesi,
                'tanggal' => date('Y-m-d'),
            );

            $this->Pertanyaan_model->save_jawaban($data);
        }

        $result = $this->certainty_factor($user->id_user, $sesi);

        $this->Pertanyaan_model->save_hasil(array(
            'id_user' => $user->id_user,
            'nama' => $nama,
            'bobot' => $result['bobot'],
            'tanggal' => date('Y-m-d'),
            'usia' => $usia,
            'hasil_kriteria' => $result['kode_kriteria'],
        ));

        redirect(base_url("user/deteksi/hasil/$user->id_user"));
    }

    public function certainty_factor($user_id, $user_sesi)
    {
        // Array yang berisi nilai-nilai kriteria
        $kriteriaNilai = array();

        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        for ($i = 0; $i < count($kriteria); $i++) {
            array_push($kriteriaNilai, $this->Kriteria_model->get_cf_user($kriteria[$i], $user_id, $user_sesi));
        }

        // Array yang berisi nama-nama kriteria
        $maxCfCombine = array();
        // Menggunakan perulangan untuk mendapatkan nilai maksimum untuk setiap kriteria
        foreach ($kriteria as $index => $kriteriaNama) {
            $nilaiGejala = $kriteriaNilai[$index];

            $result = $this->Kriteria_model->nilai_gejala($kriteriaNama, $nilaiGejala);
            $formatted_result = number_format($result, 15, '.', ''); // Format angka

            $decimal_position = strpos($formatted_result, '.') + 3;
            $trimmed_result = substr($formatted_result, 0, $decimal_position);

            $maxCfCombine[$index] = array(
                "kode_ciri" => $kriteria[$index],
                "nilai" => (float) $trimmed_result // Ubah menjadi float
            );
        }

        return $maxCfCombine;
    }

    public function bayes($user_id, $user_sesi)
    {
        $result = array();
        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        // $this->_bayes('K1', 3, 1);
        for ($index = 0; $index < count($kriteria); $index++) {
            $result[$index] = array(
                "kode_ciri" => $kriteria[$index],
                "nilai" => $this->_bayes($kriteria[$index], $user_id, $user_sesi),
            );
        }

        return $result;
    }

    public function _bayes($ciri, $user_id, $user_sesi)
    {
        // $cf_pakar = $this->Kriteria_model->get_cf_pakar($ciri, $user_id, $user_sesi);
        $cf_pakar = $this->Kriteria_model->get_cf_user($ciri, $user_id, $user_sesi);

        // var_dump($this->Kriteria_model->get_cf_pakar('K1', 3, 1));
        // var_dump($this->Kriteria_model->get_cf_user('K1', 3, 1));

        $cf_pakar_arr = array(); // Inisialisasi array kosong
        for ($i = 0; $i < count($cf_pakar); $i++) {
            $cf_pakar_arr[] = $cf_pakar[$i];
        }

        // mencari nilai semesta
        $sum_of_gejala = array_sum($cf_pakar_arr);

        $result_of_division = array(); // Inisialisasi array kosong
        for ($i = 0; $i < count($cf_pakar_arr); $i++) {
            $result = $cf_pakar_arr[$i] / $sum_of_gejala;
            $formatted_result = number_format($result, 15, '.', ''); // Mengambil cukup banyak angka di belakang koma
            $decimal_position = strpos($formatted_result, '.') + 3; // Menentukan posisi dua digit di belakang koma
            $trimmed_result = substr($formatted_result, 0, $decimal_position); // Memotong angka

            $result_of_division[] = (float) $trimmed_result;
        }

        $sum_of_product_arr = [];
        for ($i = 0; $i < count($cf_pakar_arr); $i++) {
            $product = $result_of_division[$i] * $cf_pakar_arr[$i];
            $formatted_product = number_format($product, 15, '.', ''); // Mengambil cukup banyak angka di belakang koma
            $decimal_position = strpos($formatted_product, '.') + 3; // Menentukan posisi dua digit di belakang koma
            $trimmed_product = substr($formatted_product, 0, $decimal_position); // Memotong angka

            $sum_of_product_arr[] = (float) $trimmed_product;
        }


        // var_dump($sum_of_product_arr);

        $result_probabilitas = array();
        $sum_of_product_total = array_sum($sum_of_product_arr);

        for ($i = 0; $i < count($cf_pakar_arr); $i++) {
            $probability = $sum_of_product_arr[$i] / $sum_of_product_total;
            $formatted_probability = number_format($probability, 15, '.', ''); // Mengambil cukup banyak angka di belakang koma
            $decimal_position = strpos($formatted_probability, '.') + 4; // Menentukan posisi dua digit di belakang koma
            $trimmed_probability = substr($formatted_probability, 0, $decimal_position); // Memotong angka

            $result_probabilitas[] = (float) $trimmed_probability;
        }


        return array_sum($result_probabilitas) * 100;
    }

    public function quickSort($arr)
    {
        $length = count($arr);

        if ($length <= 1) {
            return $arr;
        }

        $pivot = $arr[0]['nilai'];
        $left = $right = array();

        for ($i = 1; $i < $length; $i++) {
            if ($arr[$i]['nilai'] > $pivot) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }

        return array_merge($this->quickSort($left), array(array("kode_ciri" => $arr[0]['kode_ciri'], "nilai" => $pivot)), $this->quickSort($right));
    }
}
