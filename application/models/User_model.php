<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function createUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function updateUser($id_user, $data)
    {
        // Mengupdate data gejala berdasarkan ID di tabel "gejala"
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    public function deleteUser($id_user)
    {
        // Menghapus data kriteria berdasarkan ID dari tabel "kriteria"
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function get_user_by_id($id_user)
    {
        return $this->db->get_where('user', 
            array('id_user' => $id_user))->row();
    }

    public function get_user_all()
    {
        return $this->db->get_where('user')->row_array();
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}
