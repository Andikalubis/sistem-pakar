<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function get_kode_kriteria()
    {
        $this->db->select('kode_kriteria');
        $query = $this->db->get('kriteria');

        $kode_kriteria = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $kode_kriteria[] = $row->kode_kriteria;
            }
        }

        return $kode_kriteria;
    }

    public function nilai_gejala($cfPakar, $cfUser)
    {
        $result = $this->get_cf_pakar($cfPakar);
        $cfHE = [];
        $cfCombine = 0;

        foreach ($result as $key => $value) {
            $nilaiGejala = ((float)$value->cf_pakar * $cfUser[$key]);

            // echo $value->cf_pakar . "*" . $cfUser[$key] . "<br/>";
            array_push($cfHE, $nilaiGejala);
        }

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

    public function get_cf_user($kode_kriteria, $id_user, $sesi)
    {
        $table = 'variabel';
        $query = $this->db->get_where($table, array('kode_kriteria' => $kode_kriteria));
        $result = $query->result();

        $kode_gejala = [];
        foreach ($result as $key => $value) {
            array_push($kode_gejala, $value->kode_gejala);
        }

        $this->db->select('kode_gejala, cf_user');
        $this->db->where_in('kode_gejala', $kode_gejala);
        $this->db->where('id_user', $id_user);
        $this->db->where('sesi', $sesi);
        $results = $this->db->get('jawaban')->result();

        $cf_user_by_kriteria = [];
        foreach ($results as $result) {
            $kode_gejala = $result->kode_gejala;
            $cf_user = (float) $result->cf_user;

            array_push($cf_user_by_kriteria, $cf_user);
        }

        return $cf_user_by_kriteria;
    }

    public function get_kriteria($kode_kriteria)
    {
        $table = 'kriteria';
        $this->db->select('nama_kriteria, deskripsi');
        $query = $this->db->get_where($table, array('kode_kriteria' => $kode_kriteria));
        $result = $query->row();

        return $result;
    }
}
