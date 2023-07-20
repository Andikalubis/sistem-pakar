<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user_by_id($id_user) 
    {
        // Mengambil data Pertanyaan berdasarkan ID dari tabel "Pertanyaan"
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama;
        } else {
            return '';
        }
    }
}