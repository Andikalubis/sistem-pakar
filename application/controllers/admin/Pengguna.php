<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'pengguna',
        );

        $tmp['contents'] = $this->load->view('admin/pages/pengguna', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
