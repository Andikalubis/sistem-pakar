<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ciri extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'ciri',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function tambah()
    {
        $tmp = array(
            'title' => 'tambah data ciri dan kriteria',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri-tambah', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function edit()
    {
        $tmp = array(
            'title' => 'update data ciri dan kriteria',
            'userID' => $this->input->get('id')
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri-update', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
