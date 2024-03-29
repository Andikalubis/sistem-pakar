<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function get_admin_users()
    {
        $this->db->where('level', 'admin');
        return $this->db->get('user')->result();
    }

    public function deletePengguna($id_user)
    {
        // Menghapus data user berdasarkan ID dari tabel "user"
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    public function getRiwayat()
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
            ->join('user', 'hasil.id_user = user.id_user', 'left')
            ->join('hasil_cf', 'hasil.id_hasil = hasil_cf.id_hasil', 'left')
            ->join('hasil_nb', 'hasil.id_hasil = hasil_nb.id_hasil', 'left')
            ->group_by('hasil.id_hasil')
            ->order_by('hasil.tanggal', 'asc'); // Ubah 'asc' menjadi 'desc' jika ingin urutan menurun

        $query = $this->db->get();
        return $query->result_array();


        // $query = $this->db->get('hasil');
        // return $query->result_array();
    }

    public function getUser($level)
    {
        $this->db->where('level', $level);
        $query = $this->db->get('user');
        return $query->result();
    }

    ///Pengambilan data untuk Kriteria
    public function getKriteria()
    {
        return $this->db->get('kriteria')->result();
    }

    public function insertKriteria($data)
    {
        // Menyimpan data kriteria ke dalam tabel "kriteria"
        $this->db->insert('kriteria', $data);
    }

    public function updateKriteria($id_kriteria, $data)
    {
        // Mengupdate data gejala berdasarkan ID di tabel "gejala"
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function deleteKriteria($id_kriteria)
    {
        // Menghapus data kriteria berdasarkan ID dari tabel "kriteria"
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }

    public function get_kriteria_by_id($id_kriteria)
    {
        // Mengambil data kriteria berdasarkan ID dari tabel "kriteria"
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('kriteria')->row();
    }

    ///pengambilan data untuk Gejala
    public function getGejala()
    {
        return $this->db->get('gejala')->result();
    }

    public function insertGejala($data)
    {
        // Menyimpan data gejala ke dalam tabel "gejala"
        $this->db->insert('gejala', $data);
    }

    public function updateGejala($id_gejala, $data)
    {
        // Mengupdate data gejala berdasarkan ID di tabel "gejala"
        $this->db->where('id_gejala', $id_gejala);
        $this->db->update('gejala', $data);
    }

    public function deleteGejala($id_gejala)
    {
        // Menghapus data gejala berdasarkan ID dari tabel "gejala"
        $this->db->where('id_gejala', $id_gejala);
        $this->db->delete('gejala');
    }

    public function get_gejala_by_id($id_gejala)
    {
        return $this->db->get_where(
            'gejala',
            array('id_gejala' => $id_gejala)
        )->row();
    }

    //Riwayat
    public function deleteRiwayat($id_hasil)
    {
        // Menghapus data gejala berdasarkan ID dari tabel "gejala"
        $this->db->where('id_hasil', $id_hasil);
        $this->db->delete('hasil');
    }
}
