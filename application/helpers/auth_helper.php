<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('is_admin')) {
    function is_admin()
    {
        $CI = &get_instance();

        // Memeriksa apakah pengguna telah login dan memiliki level admin
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('level') === 'admin') {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_user')) {
    function is_user()
    {
        $CI = &get_instance();

        // Memeriksa apakah pengguna telah login dan memiliki level user
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('level') === 'user') {
            return true;
        }

        return false;
    }
}
