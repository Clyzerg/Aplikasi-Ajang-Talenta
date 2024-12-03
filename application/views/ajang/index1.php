<style>
    /* Styling untuk card profile */
    .profile-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 25px;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s forwards; /* Animasi masuk dari bawah */
    }

    /* Animasi card muncul */
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Efek hover pada card */
    .profile-card:hover {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    /* Styling header card (foto dan detail) */
    .profile-card .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 15px;
    }

    /* Styling untuk foto profil siswa */
    .profile-card img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #007bff;
        transition: transform 0.3s ease;
    }

    /* Efek hover pada foto */
    .profile-card img:hover {
        transform: scale(1.1);
    }

    /* Detail profil siswa */
    .profile-card .profile-details {
        flex-grow: 1;
    }

    /* Nama siswa dengan warna biru */
    .profile-card h4 {
        margin-bottom: 5px;
        font-weight: bold;
        color: #007bff;
        font-size: 1.3rem;
        transition: color 0.3s ease;
    }

    /* Efek hover pada nama */
    .profile-card h4:hover {
        color: #0056b3;
    }

    /* Info tambahan siswa dengan font yang lebih halus */
    .profile-card .text-muted {
        font-size: 0.95rem;
        color: #6c757d;
    }

    /* Styling untuk badge kategori */
    .profile-card .badge {
        font-size: 0.9rem;
        margin-top: 10px;
        padding: 6px 12px;
        border-radius: 25px;
    }

    /* Styling section info tambahan */
    .profile-card .additional-info {
        margin-top: 15px;
        font-size: 1rem;
        color: #495057;
        line-height: 1.6;
    }

    /* Menambahkan padding dan margin pada label info */
    .profile-card .additional-info p {
        margin-bottom: 10px;
    }

    .profile-card .additional-info strong {
        color: #007bff;
    }

    /* Gaya untuk badge warna kategori */
    .badge-primary {
        background-color: #007bff;
    }

    /* Gaya untuk badge ketika tidak ada foto */
    .badge-no-photo {
        background-color: #6c757d;
    }
</style>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h3 class="text-uppercase">Data Pendaftaran Ajang Talenta</h3>
    </div>
    <!-- Jika ada pesan sukses -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <!-- Loop untuk setiap pendaftaran -->
    <?php foreach ($pendaftaran as $data): ?>
        <div class="profile-card">
            <div class="profile-header">
                <!-- Foto siswa -->
                <?php if (!empty($data->foto)): ?>
                    <img src="<?php echo base_url('uploads/foto_siswa/' . $data->foto); ?>" alt="Foto Siswa">
                <?php else: ?>
                    <img src="<?php echo base_url('assets/default-profile.png'); ?>" alt="Default Foto">
                <?php endif; ?>

                <!-- Detail siswa -->
                <div class="profile-details">
                    <h4><?php echo $data->nama_siswa; ?></h4>
                    <p class="text-muted">NIPD: <?php echo $data->nipd; ?></p>
                    <p class="text-muted">Jenis Kelamin: <?php echo $data->jenis_kelamin; ?></p>
                    <p class="text-muted">Kategori: <span class="badge badge-primary"><?php echo $data->kategori; ?></span></p>
                </div>
            </div>

            <!-- Informasi tambahan -->
            <div class="additional-info">
                <p><strong>Asal Sekolah:</strong> <?php echo $data->asal_sekolah; ?></p>
                <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo $data->tempat_lahir . ', ' . $data->tanggal_lahir; ?></p>
                <p><strong>NISN:</strong> <?php echo $data->nisn; ?></p>
                <p><strong>NIK:</strong> <?php echo $data->nik; ?></p>
                <p><strong>Agama:</strong> <?php echo $data->agama; ?></p>
                <p><strong>Alamat:</strong> <?php echo $data->alamat; ?></p>
                <p><strong>Jenis Ajang:</strong> <?php echo strtoupper($data->ajang); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>