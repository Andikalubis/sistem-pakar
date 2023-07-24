<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_username($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function get_user_id($nomor_id)
    {
        $this->db->select('nomor_id, nama_pengguna, username, lokasi');
        return $this->db->get_where('users', ['nomor_id' => $nomor_id])->row_array();
    }

    public function add_user($data)
    {
        $this->db->insert('users', $data);
    }
}
