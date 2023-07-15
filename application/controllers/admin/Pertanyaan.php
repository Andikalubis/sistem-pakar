<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'pertanyaan',
        );

        $tmp['contents'] = $this->load->view('admin/pages/pertanyaan', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function tambah()
    {
        $tmp = array(
            'title' => 'tambah data pertanyaan',
        );

        $tmp['contents'] = $this->load->view('admin/pages/pertanyaan-tambah', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }

    public function edit()
    {
        $tmp = array(
            'title' => 'update data pertanyaan',
        );

        $tmp['contents'] = $this->load->view('admin/pages/pertanyaan-update', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
