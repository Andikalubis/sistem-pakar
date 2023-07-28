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

    public function register() {
        // Validasi input menggunakan CodeIgniter Form Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

<<<<<<< Updated upstream
        $data['contents'] = $this->load->view('auth/login', $data, TRUE);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->_register();
=======
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman registrasi dengan pesan error
            $this->load->view('auth/register');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => md5($this->input->post('password')),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'tlp' => $this->input->post('tlp'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'level' => 'user' // Set level ke user
            );

            $this->User_model->register($data); // Panggil fungsi register di model
            redirect('auth'); // Alihkan pengguna ke halaman login setelah registrasi sukses
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

    private function _register()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirmPassword');
        $hashPassword = md5($password);
        $email = $this->input->post('email');
        $jk = $this->input->post('jk');

        if ($this->form_validation->run()) {
            if ($password == $confirmPassword) {
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

=======
>>>>>>> Stashed changes
}
