<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    // Fungsi untuk menyimpan data pendaftaran ajang talenta
    public function daftar_ajang_talenta($data) {
        // Menyimpan data siswa yang mendaftar ajang talenta
        $this->db->insert('pendaftaran_talenta', $data);
    }
    public function get_siswa_by_user_id($user_id) {
        $this->db->from('siswa');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan data siswa jika ada
    }

    // Menyimpan data profil siswa
    public function simpan_profile($data) {
        $this->db->insert('siswa', $data);
    }

    // Update status profil lengkap di tabel user
    public function update_is_profile_complete($user_id) {
        $data = ['is_profile_complete' => 1];
        $this->db->where('id', $user_id);
        $this->db->update('user', $data);
    }
    public function get_profil_siswa($user_id) {
        // Query untuk mengambil data profil siswa berdasarkan user_id
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('siswa'); // Ambil data dari tabel 'siswa'
        
        // Jika data ditemukan, kembalikan sebagai objek
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data siswa dalam bentuk objek
        } else {
            return null;
        }
    }
}
