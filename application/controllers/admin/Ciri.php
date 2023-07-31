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

    public function certainty_factor()
    {
        // Array yang berisi nilai-nilai kriteria
        $kriteriaNilai = array(
            // nilai data latih
            // [0, 0, 1, 0.5, 0],
            // [0, 0.5, 0, 0, 1],
            // [0.5, 0, 1, 0.5],
            // [0.5, 1, 1, 0],
            // [0.5, 1, 0, 0],
            // [0, 0, 1, 0.5, 0.5],
            // [1, 0, 0.5, 0, 1, 0.5],
            // [0, 1, 0, 0.5]
        );

        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        for ($i = 0; $i < count($kriteria); $i++) {
            array_push($kriteriaNilai, $this->Kriteria_model->get_cf_user($kriteria[$i], 3, 1));
        }

        // Array yang berisi nama-nama kriteria
        $maxCfCombine = array();

        // Menggunakan perulangan untuk mendapatkan nilai maksimum untuk setiap kriteria
        foreach ($kriteria as $index => $kriteriaNama) {
            $nilaiGejala = $kriteriaNilai[$index];
            $maxCfCombine[$index] = $this->Kriteria_model->nilai_gejala($kriteriaNama, $nilaiGejala);
        }

        // Mendapatkan semua indeks yang memiliki nilai maksimum
        $maxValueIndices = array_keys($maxCfCombine, max($maxCfCombine));

        // Mengambil indeks pertama dari array $maxValueIndices
        $firstIndex = reset($maxValueIndices);

        echo "Nilai maksimum: " . max($maxCfCombine) . "%\n <br/>";
        echo "Indeks pertama dari nilai maksimum: " . $kriteria[$firstIndex] . "\n";
    }

    public function bayes()
    {
        $kriteriaNilai = array(
            // [0, 0, 1, 0.5, 0],
            // [0, 0.5, 0, 0, 1],
            // [0.5, 0, 1, 0.5],
            // [0.5, 1, 1, 0],
            // [0.5, 1, 0, 0],
            // [0, 0, 1, 0.5, 0.5],
            // [1, 0, 0.5, 0, 1, 0.5],
            // [0, 1, 0, 0.5]
        );

        $kriteria = array('K1', 'K2', 'K3', 'K4', 'K5', 'K6', 'K7', 'K8');

        for ($i = 0; $i < count($kriteria); $i++) {
            array_push($kriteriaNilai, $this->Kriteria_model->get_cf_user($kriteria[$i], 3, 1));
        }

        for ($i = 0; $i < count($kriteria); $i++) {
            echo $this->Bayes_model->nilai_gejala($kriteria[$i], $kriteriaNilai[$i]) . " ";
        }
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
