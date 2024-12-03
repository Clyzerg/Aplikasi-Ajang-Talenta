<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    // Method untuk menyimpan data registrasi pengguna ke database
    public function register_user($data)
    {
        return $this->db->insert('user', $data); // Menyimpan data ke tabel 'user'
    }
    public function get_all_users()
    {
        $this->db->select('username, password, level');
        $query = $this->db->get('user'); // Ambil data dari tabel user
        return $query->result_array();
    }
}
