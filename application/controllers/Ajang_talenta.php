<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajang_talenta extends CI_Controller {

    // Konstruktor untuk memuat model dan library yang diperlukan
    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Pendaftaran_talenta_model');
        $this->load->library('session');
    }

    // Menampilkan halaman daftar ajang talenta
    public function index() {
        $data['judul'] = 'Pendaftaran Ajang Talenta';
        $data['pendaftaran'] = $this->Pendaftaran_model->get_pendaftaran();

        $this->load->view('template/header', $data);
        $this->load->view('ajang/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function index1() {
       
        $user_id = $this->session->userdata('id');
    
      
        if (!$user_id) {
            redirect('auth/login'); 
        }
    
        $data['judul'] = 'Pendaftaran Ajang Talenta';
        $data['pendaftaran'] = $this->Pendaftaran_model->get_pendaftaran_by_user($user_id);
    
        $this->load->view('template/header', $data);
        $this->load->view('ajang/index1', $data);
        $this->load->view('template/footer', $data);
    }
    

    public function daftar_ajang($ajang) {
        $data['ajang'] = $ajang;
        $data['judul'] = 'Form Pendaftaran ' . strtoupper($ajang);

        if ($ajang == 'fls2n') {
            $data['kategori'] = ['Nyanyi Solo', 'Seni Tari', 'Gambar Bercerita', 'Pantomim', 'Kriya'];
        } elseif ($ajang == '02sn') {
            $data['kategori'] = ['Atletik', 'Renang', 'Bola Voli', 'Bulu Tangkis', 'Karate', 'Pencak Silat', 'Catur', 'Tenis Meja'];
        } elseif ($ajang == 'gsi') {
            $data['kategori'] = ['Sepak Bola'];
        }

        $this->load->view('template/header', $data);
        $this->load->view('ajang/pendaftaran', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_daftar() {
        $ajang = $this->input->post('ajang');
        $kategori = $this->input->post('kategori');
        $user_id = $this->session->userdata('id');
    
        // Konfigurasi untuk upload foto
        $config['upload_path'] = './uploads/foto_siswa/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);
    
        // Inisialisasi array data
        $data = array(
            'ajang' => $ajang,
            'kategori' => $kategori,
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nipd' => $this->input->post('nipd'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nisn' => $this->input->post('nisn'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nik' => $this->input->post('nik'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'user_id' => $user_id
        );
    
        // Proses upload foto jika ada
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $data['foto'] = $uploadData['file_name']; // Tambahkan nama file ke data
            } else {
                // Jika gagal upload, kembalikan error ke user
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('ajang_talenta/form_daftar');
                return;
            }
        }
    
        // Simpan data ke database
        $this->Siswa_model->daftar_ajang_talenta($data);
    
        // Set flashdata sukses dan redirect
        $this->session->set_flashdata('success', 'Register is Success.');
        redirect('ajang_talenta/index1');
    }
    
    public function rekap() {
        // Ambil data tanpa filter (semua data)
        $data['pendaftaran_talenta'] = $this->Pendaftaran_talenta_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('rekap/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function filter() {
        // Ambil parameter start_date dan end_date dari URL query string
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Pastikan tanggal mulai dan akhir tidak kosong
        if ($start_date && $end_date) {
            // Ambil data berdasarkan rentang tanggal
            $data['pendaftaran_talenta'] = $this->Pendaftaran_talenta_model->get_by_date_range($start_date, $end_date);
        } else {
            // Jika tidak ada filter, ambil semua data
            $data['pendaftaran_talenta'] = $this->Pendaftaran_talenta_model->get_all();
        }
        $this->load->view('template/header', $data);
        $this->load->view('rekap/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function print()
{
    $data['judul'] = 'Daftar Siswa Pendaftaran Ajang Talenta';

    // Load model jika menggunakan model untuk fetch data
    $data['pendaftaran'] = $this->Pendaftaran_talenta_model->get_all();

    // Load view untuk mencetak
    $this->load->view('ajang/print', $data);
}

}
