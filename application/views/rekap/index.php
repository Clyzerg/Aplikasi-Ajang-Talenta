<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Rekap Data Ajang Talenta</h3>
        </div>
        <div class="card-body">
            <!-- Form Pilihan Filter -->
           <!-- Form Filter -->
<form method="GET" action="<?php echo site_url('ajang_talenta/filter'); ?>" class="form-inline mb-4">
    <label for="start_date" class="mr-2">Dari Tanggal:</label>
    <input type="date" id="start_date" name="start_date" class="form-control mr-2">
    
    <label for="end_date" class="mr-2">Sampai Tanggal:</label>
    <input type="date" id="end_date" name="end_date" class="form-control mr-2">
    
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<!-- Tabel Data -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ajang</th>
            <th>Kategori</th>
            <th>Nama Siswa</th>
            <th>NIPD</th>
            <th>NISN</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pendaftaran_talenta as $pendaftaran): ?>
            <tr>
                <td><?php echo strtoupper($pendaftaran->ajang); ?></td>
                <td><?php echo $pendaftaran->kategori; ?></td>
                <td><?php echo $pendaftaran->nama_siswa; ?></td>
                <td><?php echo $pendaftaran->nipd; ?></td>
                <td><?php echo $pendaftaran->nisn; ?></td>
                <td><?php echo $pendaftaran->tempat_lahir; ?></td>
                <td><?php echo $pendaftaran->tanggal_lahir; ?></td>
                <td><?php echo $pendaftaran->agama; ?></td>
                <td><?php echo $pendaftaran->alamat; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($pendaftaran->created_at)); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        </div></div></div>
        </div>
