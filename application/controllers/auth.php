<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); // Memuat model Auth_model
    }

    public function index()
    {
        $data = array(
            'title' => 'Auth',
        );

        $data['contents'] = $this->load->view('auth/login', $data, TRUE);
        $this->load->view('auth/login', $data);
    }

    public function login_pengguna()
    {
        // Mendapatkan input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Memanggil fungsi login pada model Auth_model
        $user = $this->Auth_model->login($username, $password);

        if ($user) {
            // Login berhasil, simpan informasi pengguna ke dalam sesi
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('level', $user->level);

            // Alihkan ke dashboard sesuai level
            if ($user->level === 'admin') {
                redirect('admin/dashboard');
            } elseif ($user->level === 'user') {
                redirect('user/dashboard');
            }
        } else {
            // Login gagal, tampilkan pesan error
            $data['error'] = 'Username atau password salah';
            $this->load->view('auth/login', $data);
        }
    }
}
