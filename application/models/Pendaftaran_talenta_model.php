<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_talenta_model extends CI_Model {

public function get_all() {
    // Ambil semua data dari tabel
    $query = $this->db->get('pendaftaran_talenta');
    return $query->result();
}

public function get_by_date_range($start_date, $end_date) {
    // Mengambil data dengan filter tanggal
    $this->db->where('created_at >=', $start_date);
    $this->db->where('created_at <=', $end_date);
    $query = $this->db->get('pendaftaran_talenta');
    return $query->result();
}
}
