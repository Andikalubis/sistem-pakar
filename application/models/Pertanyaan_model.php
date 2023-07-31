<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{

    public function getPertanyaan()
    {
        return $this->db->get('pertanyaan')->result();
    }

    public function insertPertanyaan($data)
    {
        // Menyimpan data Pertanyaan ke dalam tabel "Pertanyaan"
        $this->db->insert('pertanyaan', $data);
    }

    public function updatePertanyaan($id_pertanyaan, $data)
    {
        // Mengupdate data gejala berdasarkan ID di tabel "gejala"
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        $this->db->update('pertanyaan', $data);
    }

    public function deletePertanyaan($id_pertanyaan)
    {
        // Menghapus data Pertanyaan berdasarkan ID dari tabel "Pertanyaan"
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        $this->db->delete('pertanyaan');
    }

    public function get_Pertanyaan_by_id($id_pertanyaan)
    {
        // Mengambil data Pertanyaan berdasarkan ID dari tabel "Pertanyaan"
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        return $this->db->get('pertanyaan')->row();
    }

    public function get_kriteria_id($id_pertanyaan)
    {
        $this->db->select('id_kriteria');
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        return $this->db->get('pertanyaan')->row();
    }

    public function get_gejala_id($id_pertanyaan)
    {
        $this->db->select('id_gejala', 'kode_gejala');
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        return $this->db->get('pertanyaan')->row();
    }

    public function save_jawaban($data)
    {
        $this->db->insert('jawaban', $data);
        return $this->db->insert_id();
    }
}
