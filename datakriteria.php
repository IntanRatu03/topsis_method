<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kriteria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Georgia', serif; /* Menggunakan font klasik untuk kesan vintage */
            background: #f0f4f7; /* Warna latar belakang yang lebih cerah */
            color: #333; /* Teks berwarna gelap untuk kontras yang baik */
        }
        .container {
            margin-top: 0px; /* Margin atas untuk jarak */
            background: #ffffff; /* Latar belakang putih untuk konten */
            padding: 20px; /* Padding yang lebih besar untuk ruang */
            border-radius: 8px; /* Sudut yang lebih membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan halus */
        }
        .header-title {
            font-weight: bold;
            font-size: 28px; /* Ukuran font lebih besar */
            color: #8b5a2b; /* Coklat vintage untuk judul */
            margin-bottom: 20px; /* Jarak bawah */
            text-align: left; /* Pusatkan teks */
            border-bottom: 2px solid #a67b5b; /* Garis bawah untuk menonjolkan judul */
            padding-bottom: 10px; /* Ruang bawah pada judul */
        }
        .table {
            margin-top: 10px; /* Margin atas untuk tabel */
            background-color: #ffffff; /* Latar belakang putih untuk tabel */
            border: 1px solid #a67b5b; /* Border yang sesuai dengan tema */
            font-size: 14px; /* Ukuran font tabel lebih kecil */
        }
        .table th {
            background-color: #8b5a2b; /* Latar belakang coklat untuk header tabel */
            color: #fff; /* Teks putih untuk kontras */
            font-weight: bold;
            text-align: center; /* Menyelaraskan teks header ke tengah */
        }
        .table tbody tr:hover {
            background-color: #f0d9c1; /* Efek hover yang lembut dan hangat */
        }
        .text-center {
            text-align: center; /* Menyelaraskan teks ke tengah */
        }
        .btn-custom {
            background-color: #f0d45e; /* Warna kuning cerah untuk tombol Ubah */
            color: #4a4a2d; /* Teks coklat tua */
            border: 1px solid #e6c143; /* Border yang lebih gelap */
            border-radius: 5px; /* Sedikit membulatkan sudut */
            padding: 5px 10px; /* Padding untuk tombol lebih kecil */
            transition: background-color 0.3s, color 0.3s; /* Efek transisi */
            font-size: 12px; /* Ukuran font tombol lebih kecil */
        }
        .btn-custom-danger {
            background-color: #f9b2b2; /* Warna merah muda cerah untuk tombol Hapus */
            color: #4a4a2d; /* Teks coklat tua */
            border: 1px solid #e68a8a; /* Border yang lebih gelap */
            border-radius: 5px; /* Sedikit membulatkan sudut */
            padding: 5px 10px; /* Padding untuk tombol lebih kecil */
            transition: background-color 0.3s, color 0.3s; /* Efek transisi */
            font-size: 12px; /* Ukuran font tombol lebih kecil */
        }
        .btn-custom:hover {
            background-color: #e6c143; /* Warna lebih gelap untuk hover tombol Ubah */
            color: #4a3b1b; /* Warna teks lebih gelap */
        }
        .btn-custom-danger:hover {
            background-color: #e68a8a; /* Warna lebih gelap untuk hover tombol Hapus */
            color: #4a3b1b; /* Warna teks lebih gelap */
        }
        @media (max-width: 576px) {
            .header-title {
                font-size: 22px; /* Ukuran font lebih kecil untuk layar kecil */
            }
            .table {
                font-size: 12px; /* Ukuran font tabel lebih kecil pada perangkat kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="header-title">Data Kriteria</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Id Kriteria</th>
                        <th class="text-center">Nama Kriteria</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Poin 1</th>
                        <th class="text-center">Poin 2</th>
                        <th class="text-center">Poin 3</th>
                        <th class="text-center">Poin 4</th>
                        <th class="text-center">Poin 5</th>
                        <th class="text-center">Sifat Kriteria</th>
                        <th class="text-center">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include("konfig/koneksi.php"); 
                    $s = mysqli_query($k21, "SELECT * FROM kriteria ORDER BY id_kriteria ASC"); 
                    while ($d = mysqli_fetch_assoc($s)) { 
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $d['id_kriteria']; ?></td>
                        <td class="text-center"><?php echo $d['nama_kriteria']; ?></td>
                        <td class="text-center"><?php echo $d['bobot']; ?></td>
                        <td class="text-center"><?php echo $d['poin1']; ?></td>
                        <td class="text-center"><?php echo $d['poin2']; ?></td>
                        <td class="text-center"><?php echo $d['poin3']; ?></td>
                        <td class="text-center"><?php echo $d['poin4']; ?></td>
                        <td class="text-center"><?php echo $d['poin5']; ?></td>
                        <td class="text-center"><?php echo $d['sifat']; ?></td>
                        <td class="text-center">
                            <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-custom">Ubah</a>
                            <a href="hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-custom-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
