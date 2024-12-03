<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); 
        $this->load->library('form_validation');
    }

    
    public function register()
    {
        
        $data['users'] = $this->UserModel->get_all_users();
        $data['judul'] = 'Manage User';

        $this->load->view('template/header', $data);
        $this->load->view('user/register', $data);
        $this->load->view('template/footer');
    }

    // Method untuk memproses data registrasiasdasdsad
    public function process_register()
    {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman registrasi dengan pesan error
            $this->load->view('template/header');
            $this->load->view('user/register');
            $this->load->view('template/footer');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            // Data yang akan disimpan ke tabel user
            $data = [
                'username' => $username,
                'password' => $password,
                'level' => 2 // Level default
            ];

            // Simpan data ke database
            if ($this->UserModel->register_user($data)) {
                // Jika berhasil, redirect ke halaman login atau tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login.');
                redirect('usercontroller/register');
            } else {
                // Jika gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Registrasi gagal, coba lagi.');
                $this->load->view('template/header');
                $this->load->view('user/register');
                $this->load->view('template/footer');
            }
        }
    }
}
