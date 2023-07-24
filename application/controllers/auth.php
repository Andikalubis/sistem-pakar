<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Auth',
        );

        $data['contents'] = $this->load->view('auth/login', $data, TRUE);
        // $this->load->view('auth/login');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        // var_dump($this->form_validation->run());

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );

        $data['contents'] = $this->load->view('auth/login', $data, TRUE);
        $this->load->view('auth/register');
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_username($username);

        var_dump(password_verify($password, $user['password']));

        if ($user) {
            // if (password_verify($password, $user['password'])) {
            // }
            // var_dump(password_verify(password_hash($password, 'md5'), $user['password']));
        }

        // if ($user) {
        //     if (password_verify($password, $user['password'])) {
        //         $data = [
        //             'username' => $user['username']
        //         ];
        //         $this->session->set_userdata($data);
        //         redirect('admin/beranda');
        //     } else {
        //         $this->session->set_flashdata('alert', 'alert-danger');
        //         $this->session->set_flashdata('message', 'Maaf! password yang anda masukan salah...');
        //     }
        //     redirect('auth');
        // } else {
        //     $this->session->set_flashdata('alert', 'alert-danger');
        //     $this->session->set_flashdata('message', 'Maaf! username yang anda masukan belum terdaftar pada sistem kami...');
        //     redirect('auth');
        // }
    }

    // public function login_pengguna()
    // {
    //     // Mendapatkan input dari form
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     // Memanggil fungsi login pada model Auth_model
    //     $user = $this->Auth_model->login($username, $password);

    //     if ($user) {
    //         // Login berhasil, simpan informasi pengguna ke dalam sesi
    //         $this->session->set_userdata('logged_in', true);
    //         $this->session->set_userdata('level', $user->level);

    //         // Alihkan ke dashboard sesuai level
    //         if ($user->level === 'admin') {
    //             redirect('admin/dashboard');
    //         } elseif ($user->level === 'user') {
    //             redirect('user/dashboard');
    //         }
    //     } else {
    //         // Login gagal, tampilkan pesan error
    //         $data['error'] = 'Username atau password salah';
    //         $this->load->view('auth/login', $data);
    //     }
    // }

}
