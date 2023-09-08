<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getHasilData($id_hasil, $sesi)
    {
        $this->db->select('*');
        $this->db->from('hasil');
        $this->db->where('id_hasil', $id_hasil);
        $this->db->where('sesi', $sesi);
        return $this->db->get()->row();
    }

    public function getKriteriaData($kode_kriteria)
    {
        $this->db->select('deskripsi, stimulasi');
        $this->db->from('kriteria');
        $this->db->where('kode_kriteria', $kode_kriteria);
        return $this->db->get()->row();
    }

    public function getHasilCfData($id_hasil)
    {
        $this->db->select('*');
        $this->db->from('hasil_cf');
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->get()->result();
    }

    public function getHasilNbData($id_hasil)
    {
        $this->db->select('*');
        $this->db->from('hasil_nb');
        $this->db->where('id_hasil', $id_hasil);
        return $this->db->get()->result();
    }
}