<div class="main-panel">
    <div class="content-wrapper">
        <!-- Judul Halaman -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-center">Profil Siswa</h2>
            </div>
        </div>

        <?php if ($profil): ?>
            <!-- Card Profil Siswa -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <!-- Foto Profil -->
                        <div class="col-md-3 text-center">
                            <?php if ($profil->foto): ?>
                                <img src="<?php echo base_url('uploads/foto/'.$profil->foto); ?>" alt="Foto Profil" class="img-fluid rounded-circle" style="max-width: 200px;">
                            <?php else: ?>
                                <img src="<?php echo base_url('uploads/foto/default.jpg'); ?>" alt="Foto Profil" class="img-fluid rounded-circle" style="max-width: 200px;">
                            <?php endif; ?>
                        </div>

                        <!-- Info Profil -->
                        <div class="col-md-9">
                            <h4><?php echo $profil->nama_siswa; ?></h4>
                            <p class="text-muted"><?php echo $profil->asal_sekolah; ?></p>

                            <table class="table table-borderless">
                                <tr>
                                    <th class="w-25">Nama Siswa</th>
                                    <td><?php echo $profil->nama_siswa; ?></td>
                                </tr>
                                <tr>
                                    <th>Asal Sekolah</th>
                                    <td><?php echo $profil->asal_sekolah; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?php echo $profil->alamat; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?php echo date('d-m-Y', strtotime($profil->tanggal_lahir)); ?></td>
                                </tr>
                            </table>

                            <!-- Button Edit Profile -->
                            <div class="d-flex justify-content-end mt-3">
                                <a href="<?= base_url('siswa/edit_profile') ?>" class="btn btn-warning btn-sm">
                                    <i class="ti-pencil-alt"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Jika Profil Tidak Ditemukan -->
            <div class="alert alert-warning" role="alert">
                Profil siswa tidak ditemukan.
            </div>
        <?php endif; ?>
    </div>
</div>
</div>
