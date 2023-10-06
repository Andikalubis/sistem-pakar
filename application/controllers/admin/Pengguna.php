<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
            'title' => 'pengguna',
            'user' => $this->Admin_model->getUser('user'), // Mengambil data user dengan level "user"
            'username' => $username
        );

        $data['contents'] = $this->load->view('admin/pages/pengguna', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function editPengguna($id_user)
    {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['title'] = 'update data Profil';
        $data['user'] = $this->User_model->get_user_by_id($id_user);
        // Jika ada data yang dikirimkan melalui form
        if ($this->input->post()) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('tlp', 'Telphone', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Jika validasi sukses, lakukan proses update data ke model
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jk'),
                    'email' => $this->input->post('email'),
                    'tlp' => $this->input->post('tlp'),
                );

                $this->User_model->updateUser($id_user, $data);

                // Redirect ke halaman pengguna ketika halaman sukses update data
                redirect('admin/pengguna');
            }
        }
        $data['contents'] = $this->load->view('admin/pages/editPengguna', $data, TRUE);
        $this->load->view('admin/layout/template', $data);
    }

    public function hapusPengguna($id_user)
    {
        // Proses hapus data pengguna dari database
        $this->Admin_model->deletePengguna($id_user); // Panggil fungsi delete pada model
        // Redirect ke halaman daftar pengguna setelah penghapusan berhasil
        redirect('admin/pengguna');
    }
}
