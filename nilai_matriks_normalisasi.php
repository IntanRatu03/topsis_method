<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Matriks Ternormalisasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* Mengatur font untuk seluruh halaman */
        body {
            font-family: "Georgia", serif; /* Mengubah font menjadi Georgia */
            font-size: 18px; /* Ukuran teks lebih besar untuk keseluruhan halaman */
            background-color: #f0f4f7; /* Latar belakang yang lebih cerah */
            color: #333; /* Teks berwarna gelap untuk kontras yang baik */
        }
        
        .box-header h3 {
            color: #8b5a2b; /* Coklat untuk kesan vintage */
            font-weight: bold;
            font-size: 25px; /* Ukuran teks yang lebih besar */
            border-bottom: 2px solid #a67b5b; /* Garis bawah untuk pemisah */
            display: inline-block;
            padding-bottom: 10px;
        }

        .table {
            margin-top: 10px;
            background-color: #ffffff; /* Latar belakang putih untuk tabel */
            border: 1px solid #a67b5b; /* Border yang sesuai dengan tema */
            font-size: 20px; /* Ukuran font tabel lebih besar */
        }

        th {
            background-color: #8b5a2b; /* Latar belakang coklat untuk header tabel */
            color: #fff; /* Teks putih untuk kontras */
            font-weight: bold;
            font-size: 22px; /* Ukuran font header tabel lebih besar */
        }

        td {
            color: #333; /* Teks gelap untuk kontras yang baik */
            text-align: center; /* Menyelaraskan teks ke tengah */
            font-size: 18px; /* Ukuran font untuk sel tabel */
        }

        .btn-custom, .btn-custom-danger {
            font-size: 18px; /* Ukuran font tombol lebih besar */
            padding: 12px 24px; /* Padding tambahan untuk tombol */
        }

        .btn-custom:hover {
            background-color: #e6c143; /* Warna lebih gelap untuk hover tombol Ubah */
            color: #4a3b1b; /* Warna teks lebih gelap */
        }

        .btn-custom-danger:hover {
            background-color: #e68a8a; /* Warna lebih gelap untuk hover tombol Hapus */
            color: #4a3b1b; /* Warna teks lebih gelap */
        }
    </style>
</head>
<body>
    <?php include("konfig/koneksi.php");
    $s = mysqli_query($k21, "SELECT * FROM kriteria");
    $h = mysqli_num_rows($s);
    ?>
    <div class="box-header">
        <h3 class="box-title">Nilai Matriks Ternormalisasi</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Nama</th>
                    <th colspan="<?php echo $h; ?>" class="text-center">Kriteria</th>
                </tr>
                <tr>
                    <?php for ($n = 1; $n <= $h; $n++) { echo "<th class='text-center'>C{$n}</th>"; } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $a = mysqli_query($k21, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");
                while ($da = mysqli_fetch_assoc($a)) {
                    echo "<tr>
                        <td class='text-center'>" . (++$i) . "</td>
                        <td class='text-center'>$da[nm_alternatif]</td>";
                    $idalt = $da['id_alternatif'];
                    //ambil nilai
                    $n = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_alternatif='$idalt' ORDER BY id_matrik ASC");
                    while ($dn = mysqli_fetch_assoc($n)) {
                        $idk = $dn['id_kriteria'];
                        //nilai kuadrat
                        $nilai_kuadrat = 0;
                        $k = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk'");
                        while ($dkuadrat = mysqli_fetch_assoc($k)) {
                            $nilai_kuadrat += $dkuadrat['nilai'] * $dkuadrat['nilai'];
                        }
                        echo "<td class='text-center'>" . round(($dn['nilai'] / sqrt($nilai_kuadrat)), 3) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
