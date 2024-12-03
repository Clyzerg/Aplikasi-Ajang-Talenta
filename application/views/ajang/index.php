<style>
        /* Tabel Scrollable */
        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }
        th, td {
            text-align: center;
        }
        table thead th {
            background-color: #007bff;
            color: white;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }
        .btn-export {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
        }
    </style>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Data Pendaftaran Ajang Talenta</h3>
            </div>
            <div class="card-body">
                <!-- Jika ada pesan sukses -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 1): ?>`
                <a href="<?php echo site_url('ajang_talenta/print'); ?>" target="_blank" class="btn btn-info">
    Print
</a>
<br>
<br>
<?php endif; ?>
                <div class="table-container">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>NIPD</th>
                                <th>Jenis Kelamin</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Jenis Ajang</th>
                                <th>Kategori</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pendaftaran as $data): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->nama_siswa; ?></td>
                                    <td><?php echo $data->nipd; ?></td>
                                    <td><?php echo $data->jenis_kelamin; ?></td>
                                    <td><?php echo $data->nisn; ?></td>
                                    <td><?php echo $data->asal_sekolah; ?></td>
                                    <td><?php echo $data->tempat_lahir; ?></td>
                                    <td><?php echo $data->tanggal_lahir; ?></td>
                                    <td><?php echo $data->nik; ?></td>
                                    <td><?php echo $data->agama; ?></td>
                                    <td><?php echo $data->alamat; ?></td>
                                    <td><?php echo strtoupper($data->ajang); ?></td>
                                    <td><?php echo $data->kategori; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div></div></div></div>