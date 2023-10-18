<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

        $data = array(
            'title' => 'profil',
            'user' =>  $this->User_model->get_user_by_username($username),
            'username' => $username
        );

        $data['contents'] = $this->load->view('user/pages/pengguna', $data, TRUE);
        $this->load->view('user/layout/template', $data);
    }

    public function editPengguna($id_user)
    {

        $data['title'] = 'update data profil';
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

                // Redirect ke halaman ciri ketika halaman sukses update data
                redirect('user/pengguna');
            }
        }
    }

    public function updatePassword()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('new_password', 'Password baru', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi password baru', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('user/pages/pengguna');
        } else {
            $new_password = $this->input->post('new_password');
            $hashed_password = md5($new_password);

            $username = $this->session->userdata('username');
            $this->User_model->updatePassword($username, $hashed_password);

            $this->session->set_flashdata('success_msg', 'Password updated successfully.');

            redirect('user/pengguna'); //
        }
    }
}
