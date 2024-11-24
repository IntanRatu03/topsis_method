<?php
@session_start();
include ("konfig/koneksi.php");

if(!isset($_SESSION['ymax'])){
  include ('jarak_solusi.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Preferensi</title>
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
    <h3 class="box-title">Nilai Preferensi</h3>
    <p>
        <a href="cetak.php" target="_blank" class="btn btn-default pull-right" style="margin-bottom: 10px;">
            <span class="glyphicon glyphicon-print"></span> Cetak Laporan
        </a>
    </p>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><center>Nomor</center></th>
                <th><center>Nama</center></th>
                <th><center>V<sub>i</sub></center></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $alternatif_query = mysqli_query($k21, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");
        
        while ($alt = mysqli_fetch_assoc($alternatif_query)) {
            $idalt = $alt['id_alternatif'];
            $ymax = array();
            $c = 0;

            // Fetch values for calculation
            $nilai_query = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_alternatif='$idalt' ORDER BY id_matrik ASC");
            while ($nilai = mysqli_fetch_assoc($nilai_query)) {
                $idk = $nilai['id_kriteria'];
                $nilai_kuadrat = 0;

                // Calculate squared values
                $kuadrat_query = mysqli_query($k21, "SELECT * FROM nilai_matrik WHERE id_kriteria='$idk'");
                while ($dkuadrat = mysqli_fetch_assoc($kuadrat_query)) {
                    $nilai_kuadrat += $dkuadrat['nilai'] * $dkuadrat['nilai'];
                }

                $bobot_query = mysqli_query($k21, "SELECT * FROM kriteria WHERE id_kriteria='$idk'");
                $bobot = mysqli_fetch_assoc($bobot_query)['bobot'];
                $ymax[$c] = round(($nilai['nilai'] / sqrt($nilai_kuadrat)) * $bobot);
                $c++;
            }
            $i++;
        }

        // Calculate preference scores
        foreach ($_SESSION['dplus'] as $key => $dxmin) {
            $nilaid = $nilaiPre = 0;
            $jarakm = $_SESSION['dmin'][$key];
            $id_alt = $_SESSION['id_alt'][$key];

            $nama_query = mysqli_query($k21, "SELECT * FROM alternatif WHERE id_alternatif='$id_alt'");
            $nm = mysqli_fetch_assoc($nama_query)['nm_alternatif'];

            $nilaiPre = $dxmin + $jarakm;
            $nilaid = $jarakm / $nilaiPre;
            $nilai = round($nilaid, 4);

            mysqli_query($k21, "INSERT INTO nilai_preferensi (nm_alternatif, nilai) VALUES ('$nm', '$nilai')");
        }

        // Display sorted results
        $i = 1;
        $preferensi_query = mysqli_query($k21, "SELECT * FROM nilai_preferensi ORDER BY nilai DESC");
        while ($data = mysqli_fetch_assoc($preferensi_query)) {
            echo "<tr>
                    <td class='text-center'>" . $i . "</td>
                    <td class='text-center'>$data[nm_alternatif]</td>
                    <td class='text-center'>$data[nilai]</td>
                  </tr>";
            $i++;
        }

        // Clear nilai_preferensi table
        mysqli_query($k21, "DELETE FROM nilai_preferensi");
        ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
