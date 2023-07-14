<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'riwayat',
        );

        $tmp['contents'] = $this->load->view('admin/pages/riwayat-deteksi', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
