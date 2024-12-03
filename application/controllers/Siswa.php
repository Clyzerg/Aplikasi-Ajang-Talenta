<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Siswa_model');
        
      
    }
    public function profile() {
        $user_id = $this->session->userdata('id'); // Ambil user_id dari session

        // Ambil data siswa berdasarkan user_id
        $data['profil'] = $this->Siswa_model->get_profil_siswa($user_id);

        // Pastikan data profil ada sebelum ditampilkan
        if ($data['profil']) {
            $data['judul'] = 'Profil Siswa';
            $this->load->view('template/header', $data);
            $this->load->view('siswa/profile', $data); // View untuk menampilkan profil
            $this->load->view('template/footer');
        } else {
            // Jika profil belum ada, arahkan ke halaman melengkapi profil
            redirect('siswa/melengkapi_profile');
        }
    }
    public function index() {
        $data['judul'] = 'Halaman Siswa';
        $this->load->view('template/header',$data);
        $this->load->view('siswa/index',$data);
        $this->load->view('template/footer');
    }
    public function melengkapi_profile() {
        // Pastikan user yang login adalah siswa
        if ($this->session->userdata('level') != 2) {
            redirect('auth/login');
        }

        $data['judul'] = 'Lengkapi Profil Siswa';
        $data['user_id'] = $this->session->userdata('id');
        
        // Cek apakah data profil sudah ada
        $data['siswa'] = $this->Siswa_model->get_siswa_by_user_id($data['user_id']);
        
        // Tampilkan halaman melengkapi profil
        $this->load->view('template/header', $data);
        $this->load->view('siswa/melengkapi_profile', $data);
        $this->load->view('template/footer', $data);
    }

    // Menyimpan data profil yang telah dilengkapi
    public function simpan_profile() {
        $user_id = $this->session->userdata('id');
        $nama_siswa = $this->input->post('nama_siswa');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $alamat = $this->input->post('alamat');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        
        // Upload foto profil
        $config['upload_path'] = './uploads/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB max size
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];
        } else {
            $foto = NULL;
        }

        // Data yang akan disimpan
        $data = [
            'user_id' => $user_id,
            'nama_siswa' => $nama_siswa,
            'asal_sekolah' => $asal_sekolah,
            'alamat' => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'foto' => $foto
        ];

        // Simpan data ke tabel siswa
        $this->Siswa_model->simpan_profile($data);

        // Update status profil lengkap di tabel user
        $this->Siswa_model->update_is_profile_complete($user_id);

        // Redirect ke halaman siswa setelah profil lengkap
        redirect('siswa/index');
    }
    
}
