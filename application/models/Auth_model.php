<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login($username, $password)
    {
        // Mengambil data pengguna berdasarkan username
        $query = $this->db->get_where('user', array('username' => $username));
        $user = $query->row();

        var_dump($username);
        var_dump($password);

        // Memeriksa apakah pengguna ditemukan dan passwordnya cocok
        // if ($user && password_verify($password, $user->password)) {
        //     return $user; // Mengembalikan data pengguna jika login berhasil
        // }

        return false; // Mengembalikan false jika login gagal
    }
}
