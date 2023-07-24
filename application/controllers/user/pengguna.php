<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index($id_user)
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->User_model->get_User_by_id($id_user);

        $data['contents'] = $this->load->view('user/pages/pengguna', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function editPengguna($id_user)
    {
        $data['title'] = 'update data kriteria';
        $data['user'] = $this->User_model->get_User_by_id($id_user);

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
            $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $id_user = $this->input->post('id_kriteria');
                $data = array(
                    'kode_kriteria' => $this->input->post('kode_kriteria'),
                    'nama_kriteria' => $this->input->post('nama_kriteria'),
                    'deskripsi'     => $this->input->post('deskripsi')
                );

                $this->User_model->updateUser($id_user, $data);

                // Redirect ke halaman ciri ketika halaman sukses update data
                redirect('user/pengguna');
            }
        }
        $data['contents'] = $this->load->view('user/pages/pengguna', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }
}
