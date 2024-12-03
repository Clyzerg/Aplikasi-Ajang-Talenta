<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

     // Fungsi untuk mendapatkan data berdasarkan ajang
     public function get_rekap_by_ajang($ajang) {
        $this->db->where('ajang', $ajang);
        $query = $this->db->get('pendaftaran_talenta');
        return $query->result(); // Mengembalikan hasil data
    }

    // Fungsi untuk mendapatkan data berdasarkan rentang tanggal
    public function get_rekap_by_date($tanggal_awal, $tanggal_akhir) {
        $this->db->where('DATE(created_at) >=', $tanggal_awal);
        $this->db->where('DATE(created_at) <=', $tanggal_akhir);
        $query = $this->db->get('pendaftaran_talenta');
        return $query->result(); // Mengembalikan hasil data
    }

    public function get_pendaftaran() {
    
        $query = $this->db->get('pendaftaran_talenta'); 
        return $query->result();
    }
    public function get_pendaftaran_by_user($user_id) {
        $this->db->where('user_id', $user_id); 
        $query = $this->db->get('pendaftaran_talenta'); 
        return $query->result();
    }
    public function get_all_pendaftaran()
    {
    $query = $this->db->get('pendaftaran_talenta');
    return $query->result();
    }
    public function get_siswa_by_user_id($user_id) {
        // Mengambil data ajang dan kategori berdasarkan user_id
        $this->db->select('ajang, kategori');
        $this->db->from('pendaftaran_talenta');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();

        // Jika ada data, kembalikan hasilnya
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data pertama
        } else {
            return null; // Tidak ditemukan
        }
    }
}
?>
