<div class="main-panel">
    <div class="content-wrapper">
        <h2 class="text-center my-4 text-uppercase font-weight-bold">Form Pendaftaran <?php echo strtoupper($ajang); ?></h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success text-center mb-4"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <div class="container">
            <form action="<?php echo site_url('ajang_talenta/proses_daftar'); ?>" method="POST" id="daftarForm" enctype="multipart/form-data">
                <input type="hidden" name="ajang" value="<?php echo $ajang; ?>">

                <!-- Data Siswa -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nipd" class="form-label">NIPD</label>
                        <input type="text" class="form-control" id="nipd" name="nipd" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                    </div>
                </div>

                <!-- Data Sekolah dan Lainnya -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                </div>

                <!-- Upload Foto -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Unggah Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                    <small class="text-muted">Format yang diperbolehkan: JPG, JPEG, PNG. Maksimal 2MB.</small>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Pilih Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg" id="previewBtn">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Siswa:</strong> <span id="confirmNama"></span></p>
                <p><strong>Asal Sekolah:</strong> <span id="confirmAsalSekolah"></span></p>
                <p><strong>Alamat:</strong> <span id="confirmAlamat"></span></p>
                <p><strong>Tanggal Lahir:</strong> <span id="confirmTanggalLahir"></span></p>
                <p><strong>Jenis Kelamin:</strong> <span id="confirmJenisKelamin"></span></p>
                <p><strong>Kategori:</strong> <span id="confirmKategori"></span></p>
                <p><strong>Foto:</strong> <span id="confirmFoto">Foto akan diunggah</span></p>
                <p>Apakah data yang Anda masukkan sudah benar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="submitForm">Ya, Simpan Data</button>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Ketika tombol preview diklik
    document.getElementById('previewBtn').addEventListener('click', function() {
        // Cek apakah semua input di form telah diisi
        var form = document.getElementById('daftarForm');
        var valid = true;
        
        // Periksa setiap input dan pastikan tidak ada yang kosong
        var inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        inputs.forEach(function(input) {
            if (!input.value.trim()) {
                valid = false;
                input.classList.add('is-invalid'); // Tambahkan kelas invalid jika kosong
            } else {
                input.classList.remove('is-invalid');
            }
        });

        // Jika semua data valid, lanjutkan ke modal
        if (valid) {
            // Ambil data dari form
            var nama_siswa = document.getElementById('nama_siswa').value;
            var asal_sekolah = document.getElementById('asal_sekolah').value;
            var alamat = document.getElementById('alamat').value;
            var tanggal_lahir = document.getElementById('tanggal_lahir').value;
            var jenis_kelamin = document.getElementById('jenis_kelamin').value;
            var kategori = document.getElementById('kategori').value;
            
            // Masukkan data ke dalam modal
            document.getElementById('confirmNama').textContent = nama_siswa;
            document.getElementById('confirmAsalSekolah').textContent = asal_sekolah;
            document.getElementById('confirmAlamat').textContent = alamat;
            document.getElementById('confirmTanggalLahir').textContent = tanggal_lahir;
            document.getElementById('confirmJenisKelamin').textContent = jenis_kelamin;
            document.getElementById('confirmKategori').textContent = kategori;
            
            // Tampilkan modal konfirmasi
            $('#confirmationModal').modal('show');
        } else {
            alert('Tolong isi semua data yang wajib!');
        }
    });

    // Ketika tombol "Ya, Simpan Data" diklik
    document.getElementById('submitForm').addEventListener('click', function() {
        // Submit form
        document.getElementById('daftarForm').submit();
    });
</script>
</body>
</html>
