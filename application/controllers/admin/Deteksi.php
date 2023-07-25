<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deteksi extends CI_Controller
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

        $data = array(
            'title' => 'deteksi',
            'username' => $username
        );

        $data['contents'] = $this->load->view('admin/pages/deteksi', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hasil()
    {
        $data = array(
            'title' => 'hasil',
        );

        $data['contents'] = $this->load->view('admin/pages/deteksi-hasil', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
