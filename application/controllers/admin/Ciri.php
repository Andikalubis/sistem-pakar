<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ciri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Certainty_model');
        $this->load->model('Bayes_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "admin") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        $data['title'] = 'ciri';
        $data['username'] = $username;
        $data['kriteria'] = $this->Admin_model->getKriteria();
        $data['gejala'] = $this->Admin_model->getGejala();

        $data['contents'] = $this->load->view('admin/pages/ciri', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    ///data untuk kriteria
    public function tambahKriteria()
    {
        $data['title'] = 'tambah data kriteria';

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
            $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses tambah data ke model
                $data = array(
                    'kode_kriteria' => $this->input->post('kode_kriteria'),
                    'nama_kriteria' => $this->input->post('nama_kriteria'),
                    'deskripsi'     => $this->input->post('deskripsi')
                );

                $this->Admin_model->insertKriteria($data);

                // Redirect ke halaman index atau halaman sukses tambah data
                redirect('admin/ciri');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/kriteria-tambah', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function editKriteria($id_kriteria)
    {
        $data['title'] = 'update data kriteria';
        $data['kriteria'] = $this->Admin_model->get_kriteria_by_id($id_kriteria);

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
            $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $id_kriteria = $this->input->post('id_kriteria');
                $data = array(
                    'kode_kriteria' => $this->input->post('kode_kriteria'),
                    'nama_kriteria' => $this->input->post('nama_kriteria'),
                    'deskripsi'     => $this->input->post('deskripsi')
                );

                $this->Admin_model->updateKriteria($id_kriteria, $data);

                // Redirect ke halaman ciri ketika halaman sukses update data
                redirect('admin/ciri');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/kriteria-update', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hapusKriteria($id_kriteria)
    {
        // Proses hapus data kriteria dari database
        $this->Admin_model->deleteKriteria($id_kriteria); // Panggil fungsi delete pada model

        // Redirect ke halaman daftar kriteria setelah penghapusan berhasil
        redirect('admin/ciri');
    }


    ///data untuk gejala
    public function tambahGejala()
    {
        $data['title'] = 'tambah data Gejala';

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required');
            $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses tambah data ke model
                $data = array(
                    'kode_gejala' => $this->input->post('kode_gejala'),
                    'nama_gejala' => $this->input->post('nama_gejala'),
                );

                $this->Admin_model->insertGejala($data);

                // Redirect ke halaman index atau halaman sukses tambah data
                redirect('admin/ciri');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/gejala-tambah', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function editGejala($id_gejala)
    {
        $data['title'] = 'update data Gejala';
        $data['gejala'] = $this->Admin_model->get_gejala_by_id($id_gejala);

        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required');
            $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $id_gejala = $this->input->post('id_gejala');
                $data = array(
                    'kode_gejala' => $this->input->post('kode_gejala'),
                    'nama_gejala' => $this->input->post('nama_gejala'),
                );

                $this->Admin_model->updateGejala($id_gejala, $data);

                // Redirect ke halaman ciri ketika halaman sukses update data
                redirect('admin/ciri');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/gejala-update', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hapusGejala($id_gejala)
    {
        // Proses hapus data gejala dari database
        $this->Admin_model->deleteGejala($id_gejala); // Panggil fungsi delete pada model
        // Redirect ke halaman daftar gejala setelah penghapusan berhasil
        redirect('admin/ciri');
    }
}
