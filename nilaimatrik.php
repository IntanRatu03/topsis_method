<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Matriks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Georgia", serif;
            background-color: #f0f4f7; /* Latar belakang yang lebih cerah */
            color: #333; /* Teks berwarna gelap untuk kontras yang baik */
        }
        h1 {
            text-align: center;
            font-size: 36px;
            color: #8b5a2b; /* Warna coklat yang lebih kuat */
            margin-top: 0px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .container {
            margin-top: 20px;
            padding: 30px;
            background: #ffffff; /* Latar belakang putih untuk kontainer */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam */
            border: 2px solid #a67b5b; /* Border coklat yang lebih tegas */
        }
        .nav-tabs {
            margin-top: 20px;
            border-bottom: none;
            display: flex;
            justify-content: left;
            gap: 10px;
        }
        .nav-tabs li {
            list-style: none;
        }
        .nav-tabs li a {
            font-size: 20px;
            color: #fff; /* Teks putih untuk tab */
            background: #8b5a2b; /* Latar belakang coklat */
            padding: 10px 20px; /* Padding lebih untuk tab yang lebih nyaman */
            border-radius: 5px;
            transition: all 0.3s ease;
            text-transform: capitalize;
        }
        .nav-tabs .active a,
        .nav-tabs li a:hover {
            background-color: #5d4037; /* Coklat tua untuk hover dan aktif */
        }
        .table-radio td {
            padding: 10px;
        }
        .btn-primary {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nilai Matriks</h1>
        <ul class="nav nav-tabs">
            <li class="active"><a href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>
        </ul>
        <br>

        <form method="POST" action="" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-lg-2">Id Alternatif</label>
                <div class="col-lg-4">
                    <select name="id_alt" class="form-control">
                        <?php
                        include ("konfig/koneksi.php");
                        $s=mysqli_query($k21,"select * from alternatif");
                        while($d=mysqli_fetch_assoc($s)){
                        ?>
                            <option value="<?php echo $d['id_alternatif'] ?>">
                                <?php echo $d['id_alternatif']." | ".$d['nm_alternatif'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr />

            <div class="form-group">
                <table class="table table-radio">
                    <?php
                    $i = 1;
                    $alt = mysqli_query($k21, "SELECT * FROM kriteria");
                    $jml_krit = mysqli_num_rows($alt);

                    while ($dalt = mysqli_fetch_assoc($alt)) {
                    ?>
                    <tr>
                        <td width="200">
                            <label><?php echo $dalt['nama_kriteria']; ?></label>
                            <input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
                        </td>
                        <td>
                            <input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin1']; ?>" /> <?php echo $dalt['poin1']; ?>
                        </td>
                        <td>
                            <input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin2']; ?>" /> <?php echo $dalt['poin2']; ?>
                        </td>
                        <td>
                            <input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin3']; ?>" /> <?php echo $dalt['poin3']; ?>
                        </td>
                        <td>
                            <input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin4']; ?>" /> <?php echo $dalt['poin4']; ?>
                        </td>
                        <td>
                            <input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin5']; ?>" /> <?php echo $dalt['poin5']; ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </div>
        </form>

        <?php
        if(isset($_POST['simpan'])){
            $o=1;
            $id_alt=$_POST['id_alt'];
            $cek=mysqli_query($k21,"select * from alternatif where id_alternatif='$id_alt'");
            $cek_l=mysqli_num_rows($cek);
            if($cek_l>0){
                $del=mysqli_query($k21,"delete from nilai_matrik where id_alternatif='$id_alt'");
            }

            for($n=1;$n<=$jml_krit;$n++){
                $id_k=$_POST['id_krite'.$o];
                $nilai_k=$_POST['nilai'.$o];

                $m=mysqli_query($k21,"insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");

                $o++;
            }
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
