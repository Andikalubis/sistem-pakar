<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $tmp = array(
            'title' => 'Dashboard',
        );

        $tmp['contents'] = $this->load->view('admin/index', $tmp, TRUE);

        $this->load->view('admin/layout/template', $tmp);
    }
}
