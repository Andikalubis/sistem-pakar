<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in() {
    $CI = get_instance();
    return $CI->session->userdata('user_id') ? true : false;
}

function is_admin() {
    $CI = get_instance();
    return $CI->session->userdata('level') == 'admin' ? true : false;
}

function is_user() {
    $CI = get_instance();
    return $CI->session->userdata('level') == 'user' ? true : false;
}
