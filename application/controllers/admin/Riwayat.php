<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');

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
            'title' => 'riwayat',
            'username' => $username
        );

        // Ambil data riwayat dari model
        $data['hasil'] = $this->Admin_model->getRiwayat();

        foreach ($data['hasil'] as $row) {
            $row['nama'] = $this->User_model->get_user_all();
        }

        $data['contents'] = $this->load->view('admin/pages/riwayat-deteksi', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hapusRiwayat($id_hasil)
    {
        // Proses hapus data hasil dari database
        $this->Admin_model->deleteRiwayat($id_hasil); // Panggil fungsi delete pada model

        // Redirect ke halaman daftar hasil setelah penghapusan berhasil
        redirect('admin/riwayat/');
    }

}
