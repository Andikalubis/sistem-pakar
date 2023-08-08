<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends CI_Model
{
    public function get_hasil_by_id($id)
    {
        $this->db->select('kode_kriteria');
        $this->db->where('kode_kriteria');
        $query = $this->db->get('kriteria');

        $kode_kriteria = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $kode_kriteria[] = $row->kode_kriteria;
            }
        }

        return $kode_kriteria;
    }
}
