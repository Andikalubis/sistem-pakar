<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deteksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');

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
            'title' => 'deteksi',
            'pertanyaan' =>  $this->Pertanyaan_model->getPertanyaan(),
            'username' => $username
        );

        $data['contents'] = $this->load->view('user/pages/deteksi', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function hasil()
    {
        $username = $this->session->userdata('username');

        $data = array(
            'title' => 'hasil',
            'usernmae' => $username
        );

        $data['contents'] = $this->load->view('user/pages/deteksi-hasil', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }
}
