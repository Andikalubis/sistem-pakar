<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('auth_helper');
        if (!is_logged_in() || !is_admin()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        // Ambil data pengguna dengan level admin dari database
        $data['user'] = $this->Admin_model->get_admin_users();
        $tmp = array(
            'title' => 'dashboard',
        );

        // Tampilkan data di view dashboard_admin
        $tmp['contents'] = $this->load->view('admin/index', $tmp, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
