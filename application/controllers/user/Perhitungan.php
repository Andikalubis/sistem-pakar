<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
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

            $result = $this->Kriteria_model->nilai_gejala($kriteria_nama, $nilai_gejala);
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
}
