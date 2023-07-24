<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
    }

    public function index()
    {
        $data['title'] = 'pertanyaan';
        $data['pertanyaan'] = $this->Pertanyaan_model->getPertanyaan();

        $data['contents'] = $this->load->view('admin/pages/pertanyaan', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    ///data untuk Pertanyaan
    public function tambahPertanyaan()
    {
        $data['title'] = 'tambah data Pertanyaan';

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_gejala', 'Kode gejala', 'required');
            $this->form_validation->set_rules('kode_pertanyaan', 'Kode Pertanyaan', 'required');
            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses tambah data ke model
                $data = array(
                    'kode_gejala'     => $this->input->post('kode_gejala'),
                    'kode_pertanyaan' => $this->input->post('kode_pertanyaan'),
                    'pertanyaan' => $this->input->post('pertanyaan')
                );

                $this->Pertanyaan_model->insertPertanyaan($data);

                // Redirect ke halaman index atau halaman sukses tambah data
                redirect('admin/pertanyaan');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/pertanyaan-tambah', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function editPertanyaan($id_pertanyaan)
    {
        $data['title'] = 'update data Pertanyaan';
        $data['pertanyaan'] = $this->Pertanyaan_model->get_Pertanyaan_by_id($id_pertanyaan);

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_gejala', 'Kode gejala', 'required');
            $this->form_validation->set_rules('kode_pertanyaan', 'Kode Pertanyaan', 'required');
            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $id_pertanyaan = $this->input->post('id_pertanyaan');
                $data = array(
                    'kode_gejala'     => $this->input->post('kode_gejala'),
                    'kode_pertanyaan' => $this->input->post('kode_pertanyaan'),
                    'pertanyaan' => $this->input->post('pertanyaan')
                );

                $this->Pertanyaan_model->updatePertanyaan($id_pertanyaan, $data);

                // Redirect ke halaman ciri ketika halaman sukses update data
                redirect('admin/pertanyaan');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/pertanyaan-update', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hapusPertanyaan($id_pertanyaan)
    {
        // Proses hapus data Pertanyaan dari database
        $this->Pertanyaan_model->deletePertanyaan($id_pertanyaan); // Panggil fungsi delete pada model
        // Redirect ke halaman daftar Pertanyaan setelah penghapusan berhasil
        redirect('admin/pertanyaan');
    }
}
