<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $this->load->model('Admin_model'); // Memuat model Admin_model

        $data = array(
            'title' => 'pengguna',
            'user' => $this->Admin_model->getUser('user'), // Mengambil data user dengan level "user"
            'username' => $username
        );

        $data['contents'] = $this->load->view('admin/pages/pengguna', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
