<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <img src="<?= base_url('assets/images/dinas1.png'); ?>" alt="Logo" style="width: 80px; height: auto; margin-bottom: 10px;">
                <h3 class="font-weight-bold">Selamat Datang di Portal Siswa</h3>
                <p class="text-muted">Pilih kategori ajang talenta yang ingin Anda daftarkan.</p>
            </div>
        </div>

        <!-- Section for Ajang Talenta -->
        <div class="row">
            <!-- FLS2N Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <img src="<?= base_url('assets/images/fls2n.png'); ?>" alt="FLS2N" style="width: 60px; height: auto; margin-bottom: 15px;">
                        <h5 class="card-title">FLS2N</h5>
                        <p class="card-text text-muted">Lomba seni seperti Nyanyi Solo, Seni Tari, dan lainnya.</p>
                        <a href="<?php echo site_url('ajang_talenta/daftar/fls2n'); ?>" class="btn btn-primary btn-sm">Daftar FLS2N</a>
                    </div>
                </div>
            </div>

            <!-- O2SN Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <img src="<?= base_url('assets/images/o2sn.png'); ?>" alt="O2SN" style="width: 60px; height: auto; margin-bottom: 15px;">
                        <h5 class="card-title">O2SN</h5>
                        <p class="card-text text-muted">Lomba olahraga seperti Atletik, Renang, dan lainnya.</p>
                        <a href="<?php echo site_url('ajang_talenta/daftar/02sn'); ?>" class="btn btn-primary btn-sm">Daftar O2SN</a>
                    </div>
                </div>
            </div>

            <!-- GSI Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <img src="<?= base_url('assets/images/gsi.png'); ?>" alt="GSI" style="width: 60px; height: auto; margin-bottom: 15px;">
                        <h5 class="card-title">GSI</h5>
                        <p class="card-text text-muted">Lomba sepak bola (GSI).</p>
                        <a href="<?php echo site_url('ajang_talenta/daftar/gsi'); ?>" class="btn btn-primary btn-sm">Daftar GSI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>