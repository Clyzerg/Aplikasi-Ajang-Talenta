<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function user_validation($username, $password) {
        // Lakukan hashing password jika diperlukan, misalnya dengan MD5 atau metode hashing lainnya
        $password = md5($password); // ganti ini jika tidak menggunakan md5

        // Query untuk memverifikasi username dan password
        return $this->db->get_where('user', [
            'username' => $username,
            'password' => $password
        ]);
    }
}
?>
