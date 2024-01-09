<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
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
        $this->load->model('Pdf_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        $data = array(
            'title' => 'riwayat',
            'username' => $username
        );

        // Ambil data riwayat dari model
        $data['hasil'] = $this->Admin_model->getRiwayat();


        foreach ($data['hasil'] as $row) {
            $row['nama']     = $this->User_model->get_user_all();
        }

        $data['contents'] = $this->load->view('admin/pages/riwayat-deteksi', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function generate_pdf($id_hasil, $sesi)
    {
        // Load the necessary models
        $this->load->model('Pdf_model');

        // Get data from the database
        $data['hasil'] = $this->Pdf_model->getHasilData($id_hasil, $sesi);
        $data['hasil_cf'] = $this->Pdf_model->getHasilCfData($id_hasil);
        $data['hasil_nb'] = $this->Pdf_model->getHasilNbData($id_hasil);

        // Iterate through hasil_cf and hasil_nb to get kriteria data
        foreach ($data['hasil_cf'] as &$cf) {
            $cf->kriteria_data = $this->Pdf_model->getKriteriaData($cf->kode_kriteria);
        }
        foreach ($data['hasil_nb'] as &$nb) {
            $nb->kriteria_data = $this->Pdf_model->getKriteriaData($nb->kode_kriteria);
        }

        // Load Dompdf library
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "laporan.pdf";

        $html = $this->load->view('admin/pages/laporan', $data, TRUE);

        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $this->pdf->stream('Laporan-Riwayat-Deteksi.pdf');
    }

    // public function hasil()
    // {
    //     $id = isset($_GET['id']) ? $_GET['id'] : null;
    //     $sesi = isset($_GET['sesi']) ? $_GET['sesi'] : 1;

    //     if ($id) {
    //         $username = $this->session->userdata('username');
    //         $id_user = $this->User_model->get_user_by_username($username)['id_user'];

    //         $data = $this->Hasil_model->get_nama_umur_user_by_sesi($sesi);
    //         $sortedDataFromCF = $this->_quickSort($this->cf($id_user, $sesi));
    //         $sortedDataFromBayes = $this->_quickSort($this->bayes($id_user, $sesi));

    //         // mengambil hasil dari tabel hasil_cf
    //         $hasil_cf = array();
    //         for ($i = 0; $i < 3; $i++) {
    //             $kriteria = $this->Kriteria_model->get_kriteria($sortedDataFromCF[$i]['kode_ciri']);
    //             $nama = $kriteria->nama_kriteria;
    //             $deskripsi = $kriteria->deskripsi;
    //             $kode = $sortedDataFromCF[$i]['kode_ciri'];
    //             $bobot = $sortedDataFromCF[$i]['nilai'];
    //             $stimulasi = $kriteria->stimulasi;

    //             $hasil_cf[] = (object) array(
    //                 'kode' => $kode,
    //                 'nama' => $nama,
    //                 'deskripsi' => $deskripsi,
    //                 'bobot' => $bobot,
    //                 'stimulasi' => $stimulasi,
    //             );
    //         }

    //         // mengambil hasil dari tabel hasil_nb
    //         $hasil_nb = array();
    //         for ($i = 0; $i < 3; $i++) {
    //             $kriteria = $this->Kriteria_model->get_kriteria($sortedDataFromBayes[$i]['kode_ciri']);
    //             $nama = $kriteria->nama_kriteria;
    //             $deskripsi = $kriteria->deskripsi;
    //             $kode = $sortedDataFromBayes[$i]['kode_ciri'];
    //             $bobot = $sortedDataFromBayes[$i]['nilai'];

    //             $hasil_nb[] = (object) array(
    //                 'kode' => $kode,
    //                 'nama' => $nama,
    //                 'deskripsi' => $deskripsi,
    //                 'bobot' => $bobot,
    //                 'stimulasi' => $stimulasi,
    //             );
    //         }

    //         $data = array(
    //             'title' => 'hasil',
    //             'username' => $username,
    //             'nama' => $data['nama'],
    //             'usia' => $data['usia'],
    //             'hasil_cf' => $hasil_cf,
    //             'hasil_nb' => $hasil_nb,
    //             'id' => $id,
    //             'sesi' => $sesi,
    //         );

    //         $data['contents'] = $this->load->view('admin/pages/deteksiHasil', $data, TRUE);
    //         $this->load->view('admin/layout/template', $data);
    //     } else {
    //         redirect(base_url("admin/riwayat"));
    //     }
    // }

    public function hasil()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $sesi = isset($_GET['sesi']) ? $_GET['sesi'] : 1;
        $username = isset($_GET['username']) ? $_GET['username'] : 'admin';

        if ($id) {
            $id_user = $this->User_model->get_user_by_username($username)['id_user'];

            $data = $this->Hasil_model->get_nama_umur_user_by_sesi($sesi);
            $sortedDataFromCF = $this->_quickSort($this->cf($id_user, $sesi));
            $sortedDataFromBayes = $this->_quickSort($this->bayes($id_user, $sesi));

            // mengambil hasil dari tabel hasil_cf
            $hasil_cf = array();
            for ($i = 0; $i < 3; $i++) {
                $kriteria = $this->Kriteria_model->get_kriteria($sortedDataFromCF[$i]['kode_ciri']);
                $nama = $kriteria->nama_kriteria;
                $deskripsi = $kriteria->deskripsi;
                $kode = $sortedDataFromCF[$i]['kode_ciri'];
                $bobot = $sortedDataFromCF[$i]['nilai'];
                $stimulasi = $kriteria->stimulasi;

                $hasil_cf[] = (object) array(
                    'kode' => $kode,
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'bobot' => $bobot,
                    'stimulasi' => $stimulasi,
                );
            }

            // mengambil hasil dari tabel hasil_nb
            $hasil_nb = array();
            for ($i = 0; $i < 3; $i++) {
                $kriteria = $this->Kriteria_model->get_kriteria($sortedDataFromBayes[$i]['kode_ciri']);
                $nama = $kriteria->nama_kriteria;
                $deskripsi = $kriteria->deskripsi;
                $kode = $sortedDataFromBayes[$i]['kode_ciri'];
                $bobot = $sortedDataFromBayes[$i]['nilai'];

                $hasil_nb[] = (object) array(
                    'kode' => $kode,
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'bobot' => $bobot,
                    'stimulasi' => $stimulasi,
                );
            }

            $data = array(
                'title' => 'hasil',
                'username' => $username,
                'nama' => $data['nama'],
                'usia' => $data['usia'],
                'hasil_cf' => $hasil_cf,
                'hasil_nb' => $hasil_nb,
                'id' => $id,
                'sesi' => $sesi,
            );

            $combinedArray = array_merge($data['hasil_cf'], $data['hasil_nb']);
            $uniqueCombinedArray = $this->removeDuplicateByCode($combinedArray);

            $data['stimulus'] = $uniqueCombinedArray;

            $data['contents'] = $this->load->view('user/pages/deteksi-hasil', $data, TRUE);
            $this->load->view('user/layout/template', $data);
        }
    }


    public function hapusRiwayat($id_hasil)
    {
        // Proses hapus data hasil dari database
        $this->Admin_model->deleteRiwayat($id_hasil); // Panggil fungsi delete pada model

        $this->session->set_flashdata('success_message', 'Berhasil menghapus data.');

        // Redirect ke halaman daftar hasil setelah penghapusan berhasil
        redirect('admin/riwayat/');
    }

    public function bayes($user_id, $user_sesi)
    {
        $result = array();
        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        for ($index = 0; $index < count($kriteria); $index++) {
            $result[$index] = array(
                "kode_ciri" => $kriteria[$index],
                "nilai" => $this->_nb($kriteria[$index], $user_id, $user_sesi),
            );
        }

        return $result;
    }

    public function cf($user_id, $user_sesi)
    {
        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');
        $cf_user = array();
        for ($i = 0; $i < count($kriteria); $i++) {
            array_push($cf_user, $this->Kriteria_model->get_cf_user($kriteria[$i], $user_id, $user_sesi));
        }

        $maxCfCombine = array();
        // Menggunakan perulangan untuk mendapatkan nilai maksimum untuk setiap kriteria
        foreach ($kriteria as $index => $kriteria_nama) {
            $nilai_gejala = $cf_user[$index];

            // ($this->Kriteria_model->nilai_gejala($kriteria_nama, $nilai_gejala));

            $result             = $this->Kriteria_model->nilai_gejala($kriteria_nama, $nilai_gejala);
            $formatted_result   = number_format($result, 15, '.', ''); // Format angka
            $decimal_position   = strpos($formatted_result, '.') + 3;
            $trimmed_result     = substr($formatted_result, 0, $decimal_position);

            $maxCfCombine[$index] = array(
                "kode_ciri" => $kriteria[$index],
                "nilai" => (float) $trimmed_result // Ubah menjadi float
            );
        }

        return $maxCfCombine;
    }

    public function _nb($ciri, $user_id, $user_sesi)
    {
        $cf_user = $this->Kriteria_model->get_cf_user($ciri, $user_id, $user_sesi);
        $cf_pakar = $this->Kriteria_model->get_cf_pakar($ciri, $user_id, $user_sesi);

        $sum_of_H = 0;
        for ($i = 0; $i < count($cf_pakar); $i++) {
            $sum_of_H += ((float) $cf_pakar[$i]->cf_pakar);
        }

        $sumPHGi = 0;
        foreach ($cf_pakar as $i => $pakar) {
            $nilai_pakar = (float) $pakar->cf_pakar;
            $sumPHGi += ((isset($cf_user[$i]) ? $cf_user[$i] : 0) * ($nilai_pakar / $sum_of_H));
        }

        $PHgi = 0;
        $result = [];
        foreach ($cf_pakar as $i => $pakar) {
            $nilai_pakar = (float) $pakar->cf_pakar;
            $PHgi = $nilai_pakar / $sum_of_H;
            $PEHgi = (isset($cf_user[$i]) ? $cf_user[$i] : 0) * $PHgi;

            if ($PEHgi != 0) {
                $PHE = $PEHgi / $sumPHGi;
                $P = $PHE * $nilai_pakar;

                $result[$i] = $P;
            }
        }

        return round(array_sum($result) * 100, 2);
    }

    public function _quickSort($arr)
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

        return array_merge($this->_quickSort($left), array(array("kode_ciri" => $arr[0]['kode_ciri'], "nilai" => $pivot)), $this->_quickSort($right));
    }

    function removeDuplicateByCode($array)
    {
        $uniqueArray = [];
        $uniqueCodes = [];

        foreach ($array as $item) {
            if (!in_array($item->kode, $uniqueCodes)) {
                $uniqueCodes[] = $item->kode;
                $uniqueArray[] = $item;
            }
        }

        return $uniqueArray;
    }
}
