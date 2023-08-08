<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayes_model extends CI_Model
{
    public function nilai_gejala($cfPakar, $cfUser)
    {
        $result = $this->get_cf_pakar($cfPakar);

        $pembilang = [];
        for ($i = 0; $i < count($result); $i++) {
            // array_push($pembilang, floor(($result[$i]->cf_pakar * $cfUser[$i]) * 100) / 1000);
            array_push($pembilang, ($result[$i]->cf_pakar * $cfUser[$i]));
        }

        $penyebut = array_sum($pembilang);
        $nilaiNB = [];
        for ($i = 0; $i < count($result); $i++) {
            $sumNB = ($pembilang[$i] / $penyebut);

            if ($sumNB >= 0.5) {
                array_push($nilaiNB, floatval(round($sumNB - 0.01, 2)));
            } else if ($sumNB > 0) {
                array_push($nilaiNB, floatval(round($sumNB  - 0.001, 3)));
            } else {
                array_push($nilaiNB, floatval(round($sumNB, 3)));
            }
        }

        return array_sum($nilaiNB) * 100;
    }


    public function get_cf_pakar($kode_kriteria)
    {
        $table = 'variabel';
        $query = $this->db->get_where($table, array('kode_kriteria' => $kode_kriteria));
        $result = $query->result();

        return $result;
    }
}
