<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Auth',
        );

        $data['contents'] = $this->load->view('auth/login', $data, TRUE);
        $this->load->view('auth/login', $data);
    }
}
