<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
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
            'title' => 'beranda',
            'username' => $username
        );

        $data['contents'] = $this->load->view('admin/beranda', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
}
