<div class="main-panel">
    <div class="content-wrapper">
        <h2><?= $judul; ?></h2>
        
        <!-- Form untuk melengkapi profil -->
        <form action="<?= base_url('siswa/simpan_profile'); ?>" method="post" enctype="multipart/form-data" id="profileForm">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa:</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" 
                       value="<?= isset($siswa->nama_siswa) ? $siswa->nama_siswa : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" 
                       value="<?= isset($siswa->asal_sekolah) ? $siswa->asal_sekolah : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?= isset($siswa->alamat) ? $siswa->alamat : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" 
                       value="<?= isset($siswa->tanggal_lahir) ? $siswa->tanggal_lahir : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto Profil:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>

            <!-- Konfirmasi sebelum submit -->
            <div class="form-group text-center">
                <button type="button" class="btn btn-primary" id="previewBtn">Simpan Profil</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Siswa:</strong> <span id="confirmNama"></span></p>
                <p><strong>Asal Sekolah:</strong> <span id="confirmAsalSekolah"></span></p>
                <p><strong>Alamat:</strong> <span id="confirmAlamat"></span></p>
                <p><strong>Tanggal Lahir:</strong> <span id="confirmTanggalLahir"></span></p>
                <p><strong>Foto Profil:</strong> <span id="confirmFoto"></span></p>
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
<script>
    // Ketika tombol preview diklik
    document.getElementById('previewBtn').addEventListener('click', function() {
        // Ambil data dari form
        var nama_siswa = document.getElementById('nama_siswa').value;
        var asal_sekolah = document.getElementById('asal_sekolah').value;
        var alamat = document.getElementById('alamat').value;
        var tanggal_lahir = document.getElementById('tanggal_lahir').value;
        var foto = document.getElementById('foto').files.length > 0 ? 'Ada Foto' : 'Tidak Ada Foto';
        
        // Masukkan data ke dalam modal
        document.getElementById('confirmNama').textContent = nama_siswa;
        document.getElementById('confirmAsalSekolah').textContent = asal_sekolah;
        document.getElementById('confirmAlamat').textContent = alamat;
        document.getElementById('confirmTanggalLahir').textContent = tanggal_lahir;
        document.getElementById('confirmFoto').textContent = foto;
        
        // Tampilkan modal konfirmasi
        $('#confirmationModal').modal('show');
    });

    // Ketika tombol "Ya, Simpan Data" diklik
    document.getElementById('submitForm').addEventListener('click', function() {
        // Submit form
        document.getElementById('profileForm').submit();
    });
</script>
