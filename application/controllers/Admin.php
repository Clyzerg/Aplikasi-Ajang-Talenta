<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        // Pastikan hanya admin yang dapat mengakses
        if ($this->session->userdata('level') != '1') {
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = 'Dashboard Admin';
    
        // Hitung jumlah total pendaftar
        $data['total_pendaftar'] = $this->db->count_all('pendaftaran_talenta');
    
        // Hitung jumlah total pengguna
        $data['total_user'] = $this->db->count_all('user');
    
        // Ambil pendaftar terbaru
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5); // Ambil 5 pendaftar terakhir
        $data['pendaftar_terbaru'] = $this->db->get('pendaftaran_talenta')->result();
    
        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    
}
