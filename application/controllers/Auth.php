<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
       
        
        $this->load->library('session');
    }

    public function login_admin()
    {
        $data['judul'] = 'Halaman Login Admin';
        $this->load->view('auth/admin_login', $data); // Tampilkan halaman login khusus admin
    }

    public function auth_process()
    {
        // Ambil data dari input POST
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Verifikasi akun berdasarkan username dan password
        $user_validation = $this->Auth_model->user_validation($username, $password)->num_rows();

        if ($user_validation > 0) { // Jika user ditemukan
            $data = $this->Auth_model->user_validation($username, $password)->row(); // Ambil data pengguna

            // Cek apakah level pengguna adalah admin
            if ($data->level === '1') {
                // Siapkan data session untuk disimpan
                $sesi = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'level' => $data->level,
                    'logged_in' => TRUE,
                ];

                // Set session
                $this->session->set_userdata($sesi);

                // Arahkan ke halaman admin
                redirect('admin');
            } else {
                // Jika bukan admin, beri pesan error
                $this->session->set_flashdata('error', 'Anda bukan admin');
                redirect('auth/login_admin'); // Kembali ke halaman login admin
            }
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('auth/login_admin'); // Kembali ke halaman login admin
        }
    }
    
    public function login()
    {
        $data['judul'] = 'Halaman Login Siswa';
        $this->load->view('auth/siswa_login', $data); // Tampilkan halaman login khusus siswa
    }

    public function auth_process_siswa()
    {
        // Ambil data dari input POST
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Verifikasi akun berdasarkan username dan password
        $user_validation = $this->Auth_model->user_validation($username, $password)->num_rows();

        if ($user_validation > 0) { // Jika user ditemukan
            $data = $this->Auth_model->user_validation($username, $password)->row(); // Ambil data pengguna

            // Cek apakah level pengguna adalah siswa
            if ($data->level === '2') {
                // Siapkan data session untuk disimpan
                $sesi = [
                    'id' => $data->id,
                    'username' => $data->username,
                    'level' => $data->level,
                    'logged_in' => TRUE,
                ];

                // Set session
                $this->session->set_userdata($sesi);

                // Cek apakah profil siswa sudah lengkap
                if ($data->is_profile_complete == 0) {
                    // Jika profil belum lengkap, arahkan ke halaman melengkapi profil
                    redirect('siswa/melengkapi_profile');
                } else {
                    // Jika profil sudah lengkap, arahkan ke halaman siswa
                    redirect('siswa');
                }
            } else {
                // Jika bukan siswa, beri pesan error
                $this->session->set_flashdata('error', 'Anda bukan siswa');
                redirect('auth/login'); // Kembali ke halaman login siswa
            }
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('auth/login'); // Kembali ke halaman login siswa
        }
    }
    

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
