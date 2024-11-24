<?php
include("konfig/koneksi.php");
$s = mysqli_query($k21, "SELECT * FROM kriteria");
$h = mysqli_num_rows($s);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriks Ideal Positif dan Negatif</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Georgia", serif;
            font-size: 18px;
            background-color: #f0f4f7;
            color: #333;
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
            font-size: 20px;
        }

        th {
            background-color: #8b5a2b;
            color: #fff;
            font-weight: bold;
            font-size: 22px;
        }

        td {
            color: #333;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="box-header">
    <h3 class="box-title">Matriks Ideal Positif (A<sup>+</sup>)</h3>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $hk = mysqli_query($k21, "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC");
                while ($dhk = mysqli_fetch_assoc($hk)) {
                    echo "<th>$dhk[nama_kriteria]</th>";
                }
                ?>
            </tr>
            <tr>
                <?php for ($n = 1; $n <= $h; $n++) { echo "<th>y<sub>$n</sub><sup>+</sup></th>"; } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<tr>";
            $a = mysqli_query($k21, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
            while ($da = mysqli_fetch_assoc($a)) {
                $idalt = $da['id_kriteria'];
                $n = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idalt' ORDER BY id_matrik ASC");
                $c = 0;
                $ymax = array();
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];
                    $nilai_kuadrat = 0;
                    $k = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                    while ($dkuadrat = mysqli_fetch_assoc($k)) {
                        $nilai_kuadrat += $dkuadrat['nilai'] * $dkuadrat['nilai'];
                    }
                    $jml_alternatif = mysqli_num_rows(mysqli_query($k21, "SELECT * FROM alternatif"));
                    $bobot = 0;
                    $tnilai = 0;
                    $k2 = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                    while ($dbobot = mysqli_fetch_assoc($k2)) {
                        $tnilai += $dbobot['nilai'];
                    }
                    $bobot = $tnilai / $jml_alternatif;
                    $bot = mysqli_fetch_assoc(mysqli_query($k21, "SELECT * FROM kriteria WHERE id_kriteria='$idk'"))['bobot'];
                    $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                    $ymax[$c] = $v;
                    $c++;
                }
                echo "<td>" . ($da['sifat'] == 'benefit' ? max($ymax) : min($ymax)) . "</td>";
            }
            echo "</tr>";
            ?>
        </tbody>
    </table>
</div>

<div class="box-header">
    <h3 class="box-title">Matriks Ideal Negatif (A<sup>-</sup>)</h3>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $hk = mysqli_query($k21, "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria ASC");
                while ($dhk = mysqli_fetch_assoc($hk)) {
                    echo "<th>$dhk[nama_kriteria]</th>";
                }
                ?>
            </tr>
            <tr>
                <?php for ($n = 1; $n <= $h; $n++) { echo "<th>y<sub>$n</sub><sup>-</sup></th>"; } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<tr>";
            $a = mysqli_query($k21, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
            while ($da = mysqli_fetch_assoc($a)) {
                $idalt = $da['id_kriteria'];
                $n = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idalt' ORDER BY id_matrik ASC");
                $c = 0;
                $ymax = array();
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];
                    $nilai_kuadrat = 0;
                    $k = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                    while ($dkuadrat = mysqli_fetch_assoc($k)) {
                        $nilai_kuadrat += $dkuadrat['nilai'] * $dkuadrat['nilai'];
                    }
                    $jml_alternatif = mysqli_num_rows(mysqli_query($k21, "SELECT * FROM alternatif"));
                    $bobot = 0;
                    $tnilai = 0;
                    $k2 = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk' ORDER BY id_matrik ASC");
                    while ($dbobot = mysqli_fetch_assoc($k2)) {
                        $tnilai += $dbobot['nilai'];
                    }
                    $bobot = $tnilai / $jml_alternatif;
                    $bot = mysqli_fetch_assoc(mysqli_query($k21, "SELECT * FROM kriteria WHERE id_kriteria='$idk'"))['bobot'];
                    $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                    $ymax[$c] = $v;
                    $c++;
                }
                echo "<td>" . ($da['sifat'] == 'cost' ? max($ymax) : min($ymax)) . "</td>";
            }
            echo "</tr>";
            ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
