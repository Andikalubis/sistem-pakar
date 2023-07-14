<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'beranda',
        );

        $tmp['contents'] = $this->load->view('admin/beranda', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
