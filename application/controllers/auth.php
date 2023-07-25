<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = array(
            'title' => 'Auth',
        );

        $data['contents'] = $this->load->view('auth/login', $data, TRUE);

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {

            $logged_in = $this->session->userdata('logged_in');
            $level = $this->session->userdata('level');

            if ($logged_in === true) {
                if ($level === "admin") {
                    redirect('admin/beranda');
                } else {
                    redirect('user/beranda');
                }
            }

            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hashPassword = md5($password);

        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_username($username);

        if ($user) {
            if ($hashPassword === $user['password']) {

                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('level', $user['level']);

                if ($user['level'] === 'admin') {
                    redirect('admin/beranda');
                } else {
                    redirect('user/beranda');
                }
            } else {
                $this->session->set_flashdata('alert', 'alert-danger');
                $this->session->set_flashdata('message', 'Maaf! usernmae atau password yang anda masukan salah...');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('alert', 'alert-danger');
            $this->session->set_flashdata('message', 'Maaf! username yang anda masukan belum terdaftar pada sistem kami...');
            redirect('auth');
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

    public function logout()
    {
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('alert', 'alert-success');
        $this->session->set_flashdata('message', 'Anda berhasil logout!');

        if (!$this->session->userdata('level') && !$this->session->userdata('logged_in')) {
            // Lakukan redirect ke halaman tertentu setelah semua data sesi berhasil dihapus
            redirect('auth');
        }
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
