<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "user") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        $data = array(
            'title' => 'riwayat',
            'username' => $username
        );

        // Load model 
        $this->load->model('Admin_model');
        $this->load->model('User_model');

        // Ambil data riwayat dari model
        $data['hasil'] = $this->Admin_model->getRiwayat();

        foreach ($data['hasil'] as $row) {
            $row->nama = $this->User_model->get_user_by_id($row->id_user);
        }

        $data['contents'] = $this->load->view('user/pages/riwayat', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }
}
