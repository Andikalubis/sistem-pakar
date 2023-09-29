<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_model extends CI_Model
{
    public function getHasilData($id_hasil, $sesi)
    {
        // Implement logic to fetch data from the hasil table based on $id_hasil and $sesi
        $this->db->where('id_hasil', $id_hasil);
        $this->db->where('sesi', $sesi);
        return $this->db->get('hasil')->row();
    }

    public function getHasilCfData($id_hasil)
    {
        // Implement logic to fetch data from the hasil_cf table based on $id_hasil
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->get('hasil_cf')->result();
    }

    public function getHasilNbData($id_hasil)
    {
        // Implement logic to fetch data from the hasil_nb table based on $id_hasil
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->get('hasil_nb')->result();
    }

    public function getKriteriaData($kode_kriteria)
    {
        // Implement logic to fetch data from the kriteria table based on $kode_kriteria
        $this->db->where('kode_kriteria', $kode_kriteria);
        return $this->db->get('kriteria')->row();
    }
}
