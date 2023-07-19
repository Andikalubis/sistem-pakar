<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model {

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
}