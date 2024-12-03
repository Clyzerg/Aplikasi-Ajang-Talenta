<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?></title>
    <style>
        /* Gaya Umum */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            color: #333;
            line-height: 1.6;
            background-color: #f9f9f9;
        }

        /* Judul Halaman */
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #0056b3;
            font-size: 1.5em;
        }

        /* Gaya Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #e9f5ff;
            cursor: default;
        }
    </style>
</head>
<body>
    <h3>Daftar Siswa Pendaftaran Ajang Talenta</h3>
    <table>
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

    <script>
        // Otomatis cetak halaman saat view di-load
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
