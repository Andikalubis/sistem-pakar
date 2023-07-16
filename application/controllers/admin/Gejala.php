<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'Gejala',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function tambah()
    {
        $tmp = array(
            'title' => 'tambah data gejala',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri-tambah', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function edit()
    {
        $tmp = array(
            'title' => 'update data gejala',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri-update', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function hapus()
    {
        $tmp = array(
            'title' => 'hapus data gejala',
        );

        $tmp['contents'] = $this->load->view('admin/pages/ciri-update', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
