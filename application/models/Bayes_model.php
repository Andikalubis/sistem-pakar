<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayes_model extends CI_Model
{
    public function nilai_gejala($cfPakar, $cfUser)
    {
        $result = $this->get_cf_pakar($cfPakar);

        $sum = 0;
        for ($i = 0; $i < count($result); $i++) {
            $sum += $result[$i]->cf_pakar * $cfUser[$i];
        }

        $val = [];
        for ($i = 0; $i < count($result); $i++) {
            array_push($val, number_format($result[$i]->cf_pakar * $cfUser[$i] / $sum, 3));
        }

        $totalSum = array_sum($val);
        return $totalSum;
    }


    public function get_cf_pakar($kode_kriteria)
    {
        $table = 'variabel';
        $query = $this->db->get_where($table, array('kode_kriteria' => $kode_kriteria));
        $result = $query->result();

        return $result;
    }
}
