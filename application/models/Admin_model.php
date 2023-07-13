<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_admin_users() {
        $this->db->where('level', 'admin');
        return $this->db->get('user')->result();
    }

}
