<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');
        if (!$logged_in) {
            redirect('auth');
        }
    }

    public function index()
    {
        $tmp = array(
            'title' => 'beranda',
        );

        $tmp['contents'] = $this->load->view('admin/beranda', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
