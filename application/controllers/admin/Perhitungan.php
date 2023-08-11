<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Certainty_model');
        $this->load->model('Bayes_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        // Memanggil fungsi pengurutan (misalnya QuickSort)
        $sortedDataFromCF = $this->quickSort($this->certainty_factor(3, 1));
        $sortedDataFromBayes = $this->quickSort($this->bayes(3, 1));

        // var_dump($sortedDataFromBayes);
        var_dump($sortedDataFromCF);
    }

    public function certainty_factor($user_id, $user_sesi)
    {
        // Array yang berisi nilai-nilai kriteria
        $kriteriaNilai = array(
            // [0, 0, 1, 0.5, 0],
            // [0, 0.5, 0, 0, 1],
            // [0.5, 0, 1, 0.5],
            // [0.5, 1, 1, 0],
            // [0.5, 1, 0, 0],
            // [0, 0, 1, 0.5, 0.5],
            // [1, 0, 0.5, 0, 1, 0.5],
            // [0, 1, 0, 0.5]
        );

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

        // var_dump($maxCfCombine[7]);

        return $maxCfCombine;

        // Mendapatkan semua indeks yang memiliki nilai maksimum
        // $maxValueIndices = array_keys($maxCfCombine, max($maxCfCombine));

        // var_dump($maxCfCombine);
        // Mengambil indeks pertama dari array $maxValueIndices
        // $firstIndex = reset($maxValueIndices);


        // var_dump(array(max($maxCfCombine), $kriteria[$firstIndex]));

        // echo "Nilai maksimum: " . max($maxCfCombine) . "%\n <br/>";
        // echo "Indeks pertama dari nilai maksimum: " . $kriteria[$firstIndex] . "\n";
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
        $cf_pakar = $this->Kriteria_model->get_cf_pakar($ciri, $user_id, $user_sesi);

        $cf_pakar_arr = array(); // Inisialisasi array kosong
        for ($i = 0; $i < count($cf_pakar); $i++) {
            $cf_pakar_arr[] = $cf_pakar[$i]->cf_pakar;
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

    public function cf()
    {
        // mencari nilai CF[HE]
        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        $cf_pakar_k1 = $this->Kriteria_model->get_cf_pakar('K1');
        // $cf_user_k1 = $this->Kriteria_model->get_cf_user('K1', 3, 1);
        $cf_user = array(
            [0, 0, 1, 0.5, 0],
            [0, 0.5, 0, 0, 1],
            [0.5, 0, 1, 0.5],
            [0.5, 1, 1, 0],
            [0.5, 1, 0, 0, 0],
            [0, 0, 1, 0.5, 0.5],
            [1, 0, 0.5, 0, 1, 0.5],
            [0, 1, 0, 0.5]
        );

        var_dump($this->Kriteria_model->nilai_gejala('K1', $cf_user[0]));
        var_dump($this->Kriteria_model->nilai_gejala('K2', $cf_user[1]));
        var_dump($this->Kriteria_model->nilai_gejala('K3', $cf_user[2]));
        var_dump($this->Kriteria_model->nilai_gejala('K4', $cf_user[3]));
        var_dump($this->Kriteria_model->nilai_gejala('K5', $cf_user[4]));
        var_dump($this->Kriteria_model->nilai_gejala('K6', $cf_user[5]));
        var_dump($this->Kriteria_model->nilai_gejala('K7', $cf_user[6]));
        var_dump($this->Kriteria_model->nilai_gejala('K8', $cf_user[7]));
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
