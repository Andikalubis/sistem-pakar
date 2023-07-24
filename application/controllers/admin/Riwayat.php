<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
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
        $data = array(
            'title' => 'riwayat',
        );

        // Load model 
        $this->load->model('Admin_model');
        $this->load->model('User_model');

        // Ambil data riwayat dari model
        $data['hasil'] = $this->Admin_model->getRiwayat();

        foreach ($data['hasil'] as $row) {
            $row->nama = $this->User_model->get_user_by_id($row->id_user);
        }

        $data['contents'] = $this->load->view('admin/pages/riwayat-deteksi', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    // public function index()
    // {
    //     $tmp = array(
    //         'title' => 'riwayat',
    //     );

    //     // Load model 'riwayat_model'
    //     $this->load->model('Riwayat_model');

    //     // Ambil data riwayat dari model
    //     $data['riwayat'] = $this->Riwayat_model->getRiwayat();

    //     // Get the user name for each row from the 'user' table using the 'id_user' field
    //     foreach ($data['riwayat'] as $row) {
    //         $row->nama = $this->Riwayat_model->getUserNamaById($row->id_user);
    //     }

    //     $tmp['contents'] = $this->load->view('admin/pages/riwayat-deteksi', $data, TRUE);
    //     $this->load->view('admin/layout/template', $tmp);
    // }

}
