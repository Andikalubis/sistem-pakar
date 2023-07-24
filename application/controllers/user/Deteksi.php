<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deteksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in && $level === 'user') {
            redirect('auth');
        }
    }

    public function index()
    {
        $tmp = array(
            'title' => 'deteksi',
        );

        $tmp['contents'] = $this->load->view('user/pages/deteksi', $tmp, TRUE);
        $this->load->view('user/layout/template', $tmp);
    }

    public function hasil()
    {
        $tmp = array(
            'title' => 'hasil',
        );

        $tmp['contents'] = $this->load->view('user/pages/deteksi-hasil', $tmp, TRUE);
        $this->load->view('user/layout/template', $tmp);
    }
}
