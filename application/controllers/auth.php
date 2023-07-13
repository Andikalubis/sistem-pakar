<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Auth extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            $this->load->model('Auth_model');
            $this->load->library('session');
        }

    public function index() {
        // Tampilkan halaman login
        $this->load->view('auth/login');
    }
    
    public function login() {
        // Proses login
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->Auth_model->get_user($username, $password);
        
        if ($user) {
            // Set session
            $user_data = array(
                'user_id' => $user->id_user,
                'username' => $user->username,
                'level' => $user->level
            );
            $this->session->set_userdata($user_data);

            // Redirect ke halaman sesuai level
            if ($user->level == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
        } else {
            // Jika login gagal, kembalikan ke halaman login
            redirect('auth/login');
        }
    }

    public function register() {
        // Proses registrasi
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'tlp' => $this->input->post('tlp'),
            'level' => 'user'
        );

        $this->Auth_model->register_user($data);
        
        // Set session
        $user_data = array(
            'user_id' => $this->db->insert_id(),
            'username' => $data['username'],
            'level' => $data['level']
        );
        $this->session->set_userdata($user_data);

        // Redirect ke halaman dashboard pengguna
        redirect('user/dashboard');
    }

    public function logout() {
        // Hapus session dan redirect ke halaman login
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        redirect('auth/login');
    }

}   
    