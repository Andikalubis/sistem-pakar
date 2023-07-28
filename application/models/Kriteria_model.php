<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function nilai_gejala($cfPakar, $cfUser)
    {
        $result = $this->get_cf_pakar($cfPakar);
        $cfHE = [];
        foreach ($result as $key => $value) {
            $nilaiGejala = ($value->cf_pakar * $cfUser[$key]);
            array_push($cfHE, $nilaiGejala);
        }

        $cfCombine = 0;
        for ($i = 0; $i < count($cfHE); $i++) {
            $cfCombine = $cfCombine + $cfHE[$i] * (1 - $cfCombine);
        }

        return $cfCombine * 100;
    }


    public function get_cf_pakar($kode_kriteria)
    {
        $table = 'variabel';
        $query = $this->db->get_where($table, array('kode_kriteria' => $kode_kriteria));
        $result = $query->result();

        return $result;
    }
}
