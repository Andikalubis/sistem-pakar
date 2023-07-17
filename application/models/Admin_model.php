<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_admin_users() {
        $this->db->where('level', 'admin');
        return $this->db->get('user')->result();
    }

    public function getRiwayat()
    {
        // Ambil data riwayat dari tabel 'hasil'
        $query = $this->db->get('hasil');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getUser($level)
    {
        $this->db->where('level', $level);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function getKriteria()
    {
        return $this->db->get('kriteria')->result();
    }

    public function getGejala()
    {
        return $this->db->get('gejala')->result();
    }
}
