<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
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
            'title' => 'Register',
        );

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register', $data);
        } else {
            $data['validation_errors'] = validation_errors();

            $this->_register();
        }
    }

    private function _register()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $tlp = $this->input->post('tlp');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $level = 'user';

        $hashPassword = md5($password);

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $hashPassword,
            'alamat' => $alamat,
            'email' => $email,
            'tlp' => $tlp,
            'jenis_kelamin' => $jenis_kelamin,
            'level' => $level,
        );

        $this->User_model->createUser($data);

        $this->session->set_flashdata('success_message', 'Registrasi berhasil. Silakan login.');

        redirect('auth');
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
