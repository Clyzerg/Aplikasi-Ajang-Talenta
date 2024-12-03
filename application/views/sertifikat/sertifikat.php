<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .certificate {
            width: 800px;
            height: 600px;
            border: 5px solid #ccc;
            margin: 0 auto;
            text-align: center;
            padding: 40px;
            background-color: #fff;
            font-family: 'Arial', sans-serif;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .certificate h1 {
            font-size: 36px;
            margin-top: 30px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .certificate p {
            font-size: 18px;
            margin: 10px 0;
            color: #555;
        }

        .certificate .name {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            margin: 20px 0;
        }

        .certificate .details {
            font-size: 20px;
            margin: 20px 0;
            color: #444;
        }

        .certificate-footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }

        .signature {
            margin-top: 30px;
            border-top: 1px solid #333;
            width: 200px;
            margin: 0 auto;
            padding-top: 10px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body onload="window.print();">

<div class="container mt-5">
    <div class="certificate">
        <h1>Sertifikat Penghargaan</h1>
        <p>Dengan ini menyatakan bahwa</p>
        <p class="name"><?php echo $nama_siswa; ?></p>
        <p>Telah mengikuti kegiatan yang diselenggarakan pada:</p>
        <div class="details">
            <p><strong>Ajang: <?php echo $ajang; ?></strong></p>
            <p><strong>Kategori: <?php echo $kategori; ?></strong></p>
        </div>
        
        <div class="certificate-footer">
            <p>Issued on: <?php echo date('d-m-Y'); ?></p>
            <div class="signature">Authorized Signature</div>
        </div>
    </div>
</div>

</body>
</html>