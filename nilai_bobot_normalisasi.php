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
    <title>Nilai Bobot Ternormalisasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* General styling */
        body {
            font-family: "Georgia", serif;
            background-color: #f0f4f7;
            color: #333;
            font-size: 18px;
        }

        .box-header {
            text-align: left;
            margin-bottom: 20px;
        }

        .box-header h3 {
            color: #8b5a2b;
            font-weight: bold;
            font-size: 25px;
            border-bottom: 2px solid #a67b5b;
            display: inline-block;
            padding-bottom: 10px;
        }

        .table {
            margin-top: 10px;
            background-color: #ffffff;
            border: 1px solid #a67b5b;
            font-size: 18px;
        }

        th {
            background-color: #8b5a2b;
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
        }

        td {
            color: #333;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box-header">
            <h3 class="box-title">Nilai Bobot Ternormalisasi</h3>
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
                    $a = mysqli_query($k21, "select * from alternatif order by id_alternatif asc");
                    while ($da = mysqli_fetch_assoc($a)) {
                        echo "<tr>
                                <td class='text-center'>" . (++$i) . "</td>
                                <td class='text-center'>{$da['nm_alternatif']}</td>";
                        $idalt = $da['id_alternatif'];
                        $n = mysqli_query($k21, "select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik asc");
                        while ($dn = mysqli_fetch_assoc($n)) {
                            $idk = $dn['id_kriteria'];
                            $nilai_kuadrat = 0;
                            $k = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk'");
                            while ($dkuadrat = mysqli_fetch_assoc($k)) {
                                $nilai_kuadrat += $dkuadrat['nilai'] * $dkuadrat['nilai'];
                            }

                            // Calculate and display normalized value
                            $bobot = 0;
                            $tnilai = 0;
                            $k2 = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk'");
                            while ($dbobot = mysqli_fetch_assoc($k2)) {
                                $tnilai += $dbobot['nilai'];
                            }
                            $bobot = $tnilai / mysqli_num_rows($a);

                            // Fetch input weight for criteria
                            $b2 = mysqli_query($k21, "select * from kriteria where id_kriteria='$idk'");
                            $nbot = mysqli_fetch_assoc($b2);
                            $bot = $nbot['bobot'];

                            // Calculate and display normalized weight
                            echo "<td align='center'>" . round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 3) . "</td>";
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
