<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'dashboard',
        );

        $tmp['contents'] = $this->load->view('admin/layout/template', $tmp, TRUE);
        $this->load->view('admin/layout/template', $tmp);
    }
}
