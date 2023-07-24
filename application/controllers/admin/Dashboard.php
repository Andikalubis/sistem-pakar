<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper'); // Memuat helper auth_helper

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        // Tampilkan halaman dashboard admin
        $data = array(
            'title' => 'Admin Dashboard',
        );

        $data['contents'] = $this->load->view('admin/layout/template', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
