<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
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
            'title' => 'register',
        );
        $data['contents'] = $this->load->view('auth/login', $data, TRUE);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasi', 'Confirm Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->_register();
        }
    }

    private function _register()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $konfirmasi = $this->input->post('konfirmasi');
        $hashPassword = md5($password);
        $email = $this->input->post('email');
        $jk = $this->input->post('jk');

        if ($this->form_validation->run()) {
            if ($password == $konfirmasi) {
                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $hashPassword,
                    'email' => $email,
                    'jenis_kelamin' => $jk,
                );

                $this->User_model->createUser($data);

                redirect('auth');
            } else {
                $this->session->set_flashdata('alert', 'alert-danger');
                $this->session->set_flashdata('message', 'Password dan Confrim Password tidak sama!');

                redirect('auth/register');
            }
        }
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
}

