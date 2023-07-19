<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_admin_users() {
        $this->db->where('level', 'admin');
        return $this->db->get('user')->result();
    }

    public function getRiwayat()
    {
        // Ambil data riwayat dari tabel 'hasil'
        $query = $this->db->get('hasil');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
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
        return $this->db->get_where('gejala', 
            array('id_gejala' => $id_gejala))->row();
    }
}
