<?php

class Sertifikat extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Siswa_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Pendaftaran_talenta_model');
}

// Menampilkan form input nama
public function index() {
    $data['judul'] = 'Halaman Cetak Sertifikat';

    $this->load->view('template/header',$data);
    $this->load->view('sertifikat/index',$data);
    $this->load->view('template/footer',$data);
}

// Menampilkan sertifikat setelah form di-submit
public function generate() {
    // Mendapatkan nama siswa dari POST
    $nama_siswa = $this->input->post('nama_siswa');

    // Mengambil user_id dari sesi pengguna yang sedang login
    $user_id = $this->session->userdata('id');

    // Mengambil data ajang dan kategori berdasarkan user_id
    $siswa_data = $this->Pendaftaran_model->get_siswa_by_user_id($user_id);

    // Jika data ditemukan, tampilkan sertifikat
    if ($siswa_data) {
        $data = [
            'nama_siswa' => $nama_siswa, // Nama siswa dari input form
            'ajang' => $siswa_data->ajang,
            'kategori' => $siswa_data->kategori,
        ];
    $this->load->view('sertifikat/sertifikat', $data);
}
}
}
