<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->model('Admin_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        $data['title'] = 'pertanyaan';
        $data['pertanyaan'] = $this->Pertanyaan_model->getPertanyaan();
        $data['username'] = $username;

        $data['contents'] = $this->load->view('admin/pages/pertanyaan', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }
    ///data untuk Pertanyaan
    public function tambahPertanyaan()
    {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['title'] = 'tambah data Pertanyaan';
        $data['gejala'] = $this->Admin_model->getGejala();
        $data['kriteria'] = $this->Admin_model->getKriteria();

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
            $this->form_validation->set_rules('id_gejala', 'Gejala', 'required');
            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

            $kode_pertanyaan = 'KP-' . sprintf('%03d', $this->db->count_all('pertanyaan') + 1);

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses tambah data ke model
                $data = array(
                    'id_kriteria'       => $this->input->post('id_kriteria'),
                    'id_gejala'         => $this->input->post('id_gejala'),
                    'kode_pertanyaan'   => $kode_pertanyaan,
                    'pertanyaan'        => $this->input->post('pertanyaan')
                );

                $this->Pertanyaan_model->insertPertanyaan($data);

                // Redirect ke halaman index atau halaman sukses tambah data
                $this->session->set_flashdata('success_message', 'Tambah data berhasil.');
                redirect('admin/pertanyaan');
            }
        }

        $data['contents'] = $this->load->view('admin/pages/pertanyaan-tambah', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function editPertanyaan($id_pertanyaan)
    {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['title'] = 'update data Pertanyaan';
        $data['pertanyaan'] = $this->Pertanyaan_model->get_Pertanyaan_by_id($id_pertanyaan);
        $data['gejala'] = $this->Admin_model->getGejala();
        $data['kriteria'] = $this->Admin_model->getKriteria();

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
            $this->form_validation->set_rules('id_gejala', 'Gejala', 'required');
            $this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required');
            $this->form_validation->set_rules('kode_pertanyaan', 'Kode Pertanyaan', 'required');
            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $id_pertanyaan = $this->input->post('id_pertanyaan');

                $data = array(
                    'id_kriteria'       => $this->input->post('id_kriteria'),
                    'id_gejala'         => $this->input->post('id_gejala'),
                    'kode_gejala'       => $this->input->post('kode_gejala'),
                    'kode_pertanyaan'   => $this->input->post('kode_pertanyaan'),
                    'pertanyaan'        => $this->input->post('pertanyaan')
                );

                $this->Pertanyaan_model->updatePertanyaan($id_pertanyaan, $data);

                // Redirect ke halaman ciri ketika halaman sukses update data
                $this->session->set_flashdata('success_message', 'Edit data berhasil.');

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
        $this->session->set_flashdata('success_message', 'Berhasil menghapus data.');
        redirect('admin/pertanyaan');
    }
}
