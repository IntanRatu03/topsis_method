<?php
include("konfig/koneksi.php");
$s = mysqli_query($k21, "select * from kriteria");
$h = mysqli_num_rows($s);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Matriks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* Mengatur font untuk seluruh halaman */
        body {
            font-family: "Georgia", serif; /* Mengubah font menjadi Georgia */
            background-color: #f0f4f7; /* Latar belakang yang lebih cerah */
            color: #333; /* Teks berwarna gelap untuk kontras yang baik */
            font-size: 18px; /* Membuat font lebih besar */
        }

        .box-header {
            text-align: left;
            margin: 0px 0;
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
            font-size: 18px; /* Membuat font dalam tabel lebih besar */
        }

        th {
            background-color: #8b5a2b; /* Latar belakang coklat untuk header tabel */
            color: #fff; /* Teks putih untuk kontras */
            font-weight: bold;
            text-align: center; /* Menyelaraskan teks ke tengah */
            font-size: 20px; /* Membuat font header tabel lebih besar */
        }

        td {
            color: #333; /* Teks gelap untuk kontras yang baik */
            text-align: center; /* Menyelaraskan teks ke tengah */
        }

        .text-center {
            text-align: center; /* Menyelaraskan teks ke tengah */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box-header">
            <h3 class="box-title">Nilai Matriks</h3>
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
                        <?php
                        for ($n = 1; $n <= $h; $n++) {
                            echo "<th class='text-center'>C{$n}</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $a = mysqli_query($k21, "select * from alternatif order by id_alternatif asc;");

                    while ($da = mysqli_fetch_assoc($a)) {
                        echo "<tr>
                            <td class='text-center'>" . (++$i) . "</td>
                            <td class='text-center'>" . $da['nm_alternatif'] . "</td>";
                        $idalt = $da['id_alternatif'];

                        //ambil nilai
                        $n = mysqli_query($k21, "select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");

                        while ($dn = mysqli_fetch_assoc($n)) {
                            echo "<td align='center'>$dn[nilai]</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
