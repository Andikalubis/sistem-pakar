<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
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

        $tmp = array(
            'title' => 'beranda',
            'username' => $username
        );


        $tmp['contents'] = $this->load->view('user/beranda', $tmp, TRUE);
        $this->load->view('user/layout/template', $tmp);
    }
}
