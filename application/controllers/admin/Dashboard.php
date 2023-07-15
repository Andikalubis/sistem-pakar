<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper'); // Memuat helper auth_helper
    }

    public function index()
    {
        // Memeriksa apakah pengguna memiliki level admin
        if (!is_admin()) {
            // Jika bukan admin, alihkan ke halaman login
            redirect('auth');
        }

        // Tampilkan halaman dashboard admin
        $data = array(
            'title' => 'Admin Dashboard',
        );

        $data['contents'] = $this->load->view('admin/layout/template', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
