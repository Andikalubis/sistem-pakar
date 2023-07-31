<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deteksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pertanyaan_model');
        $this->load->model('User_model');

        $logged_in = $this->session->userdata('logged_in');
        $level = $this->session->userdata('level');

        if (!$logged_in || $level != "user") {
            redirect('auth');
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id_user');

        $data = array(
            'title' => 'deteksi',
            'pertanyaan' =>  $this->Pertanyaan_model->getPertanyaan(),
            'username' => $username
        );

        $data['contents'] = $this->load->view('user/pages/deteksi', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function hasil($id)
    {
        $username = $this->session->userdata('username');

        $data = array(
            'title' => 'hasil',
            'usernmae' => $username
        );

        var_dump($id);

        $data['contents'] = $this->load->view('user/pages/deteksi-hasil', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function submit_jawaban()
    {
        $nama = $this->input->post('nama');
        $usia = $this->input->post('usia');
        $username = $this->session->userdata('username');

        // Get the user ID based on the username (assuming 'users' table has 'id_user' and 'username' columns).
        $this->db->where('username', $username);
        $user = $this->db->get('user')->row();

        // check apakah user sudah pernah tes?
        $this->db->where('id_user', $user->id_user);
        $isSesion = $this->db->get('jawaban')->row();


        if ($isSesion !== null) {
            // Jika user sudah pernah tes, ambil nilai sesi dari $isSesion dan tambahkan 1
            $sesi = $isSesion->sesi + 1;
        } else {
            // Jika user belum pernah tes, set nilai sesi menjadi 1
            $sesi = 1;
        }

        // Save each answer to the 'jawaban' table.
        foreach ($_POST['jawaban'] as $id_pertanyaan => $jawaban) {
            $kriteria = $this->Pertanyaan_model->get_kriteria_id($id_pertanyaan);
            $gejala = $this->Pertanyaan_model->get_gejala_id($id_pertanyaan);

            $data = array(
                'id_user' => $user->id_user,
                'nama' => $nama,
                'usia' => $usia,
                'id_pertanyaan' => $id_pertanyaan,
                'id_kriteria' => $kriteria->id_kriteria,
                'id_gejala' => $gejala->id_gejala,
                'kode_gejala' => $gejala->kode_gejala,
                'cf_user' => $jawaban,
                'sesi' => $sesi,
                'tanggal' => date('Y-m-d'),
            );

            $this->Pertanyaan_model->save_jawaban($data);
        }

        redirect(base_url("user/deteksi/hasil/$user->id_user"));
    }
}
