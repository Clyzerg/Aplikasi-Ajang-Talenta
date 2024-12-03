<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
    <h2>Masukkan Nama Lengkap untuk Sertifikat</h2>
    <!-- Form Input Nama Lengkap -->
    <form id="formSertifikat" method="POST" action="<?php echo site_url('sertifikat/generate'); ?>">
        <div class="form-group">
            <label for="nama_siswa">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate Sertifikat</button>
    </form>
</div>
    </div></div></div>
