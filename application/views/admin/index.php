<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Header Section -->
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h3 class="font-weight-bold">Welcome Admin</h3>
            <h6 class="font-weight-normal mb-0">
              All systems are running smoothly! Check the statistics below.
            </h6>
          </div>
          <img src="<?= base_url('assets/images/dinas1.png'); ?>" alt="Logo" class="img-fluid" style="width: 100px;">
        </div>
      </div>
    </div>

    <!-- Statistic Cards -->
    <div class="row">
      <!-- Card: Total Pendaftar -->
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h4 class="card-title">Total Pendaftar</h4>
            <h2>
              <?= $total_pendaftar; ?>
            </h2>
            <p>Jumlah total siswa yang telah mendaftar ke ajang talenta.</p>
          </div>
        </div>
      </div>

      <!-- Card: Total User -->
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h4 class="card-title">Total User</h4>
            <h2>
              <?= $total_user; ?>
            </h2>
            <p>Jumlah total pengguna dalam sistem.</p>
          </div>
        </div>
      </div>

      <!-- Card: Ajang Tersedia -->
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h4 class="card-title">Ajang Tersedia</h4>
            <h2>3</h2>
            <p>Jumlah ajang talenta yang tersedia (FLS2N, O2SN, GSI).</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Additional Section -->
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pendaftar Terbaru</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Ajang</th>
                    <th>Tanggal Daftar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pendaftar_terbaru as $pendaftar): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pendaftar->nama_siswa; ?></td>
                    <td><?= $pendaftar->kategori; ?></td>
                    <td><?= strtoupper($pendaftar->ajang); ?></td>
                    <td><?= $pendaftar->created_at; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
</div>
</div>