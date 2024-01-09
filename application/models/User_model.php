<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function createUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function updateUser($id_user, $data)
    {
        // Mengupdate data gejala berdasarkan ID di tabel "gejala"
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    public function deleteUser($id_user)
    {
        // Menghapus data kriteria berdasarkan ID dari tabel "kriteria"
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function get_user_by_id($id_user)
    {
        return $this->db->get_where(
            'user',
            array('id_user' => $id_user)
        )->row();
    }

    public function get_user_all()
    {
        return $this->db->get_where('user')->row_array();
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function updatePassword($username, $hashed_password)
    {
        $this->db->where('username', $username);
        $this->db->update('user', array('password' => $hashed_password));
    }

    public function searchByUsername($username)
    {
        // Query untuk mencari data user berdasarkan username
        $this->db->like('username', $username);
        $query = $this->db->get('user');

        return $query->result();
    }

    public function getRiwayat($username)
    {
        // Ambil data riwayat dari tabel 'hasil'
        $columns = array(
            'hasil.*',
            'user.username AS username',
            'hasil_cf.kode_kriteria AS cf_kode_kriteria',
            'hasil_cf.kriteria AS cf_kriteria',
            'hasil_cf.bobot AS cf_bobot',
            'hasil_nb.kode_kriteria AS nb_kode_kriteria',
            'hasil_nb.kriteria AS nb_kriteria',
            'hasil_nb.bobot AS nb_bobot'
        );

        $this->db->select($columns)
            ->from('hasil')
            ->join('user', 'user.id_user = hasil.id_user', 'left')
            ->join('hasil_cf', 'hasil.id_hasil = hasil_cf.id_hasil', 'left')
            ->join('hasil_nb', 'hasil.id_hasil = hasil_nb.id_hasil', 'left')
            ->where('user.username', $username) // Tambahkan klausa WHERE
            ->group_by('hasil.id_hasil')
            ->order_by('hasil.tanggal', 'asc'); // Ubah 'asc' menjadi 'desc' jika ingin urutan menurun

        $query = $this->db->get();
        return $query->result_array();


        // $query = $this->db->get('hasil');
        // return $query->result_array();
    }
}
