<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>TOPSIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

  <!-- Custom Vintage Style -->
  <style>
    
    body {
      background-color: #f4e1d2;
      color: #4a2c2a;
      font-family: 'Georgia', serif;
    }
    .navbar-inverse {
      background-color: #8c5a42;
      border-color: #8c5a42;
    }
    .navbar-inverse .navbar-brand {
      color: #f4e1d2;
    }
    .navbar-inverse .navbar-brand:hover,
    .navbar-inverse .navbar-brand:focus {
      color: #e2c3b3;
    }
    .navbar-inverse .navbar-nav > li > a {
      color: #f4e1d2;
    }
    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li > a:focus {
      color: #e2c3b3;
      background-color: transparent;
    }
    .nav-pills > li > a {
      background-color: #c49e8a;
      color: #4a2c2a;
    }
    .nav-pills > li.active > a,
    .nav-pills > li.active > a:focus,
    .nav-pills > li.active > a:hover {
      background-color: #8c5a42;
      color: #f4e1d2;
    }
    .col-sm-2,
    .col-sm-10 {
      padding: 20px;
      border: 1px solid #8c5a42;
      border-radius: 5px;
      margin-top: 10px;
      background-color: #f4e1d2;
    }
    a {
      color: #4a2c2a;
      text-decoration: none;
    }
    a:hover {
      color: #8c5a42;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">SISTEM PENDUKUNG KEPUTUSAN MEMILIH LAPTOP LENOVO DI TOKOPEDIA</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>

  <?php
// Inisialisasi variabel aktif dengan nilai kosong
$active1 = '';
$active2 = '';
$active3 = '';
$active4 = '';

// Tentukan halaman aktif berdasarkan parameter `a` dari URL
if (isset($_GET['a'])) {
    switch ($_GET['a']) {
        case 'kriteria':
            $active1 = 'class="active"';
            break;
        case 'alternatif':
            $active2 = 'class="active"';
            break;
        case 'nilaimatrik':
            $active3 = 'class="active"';
            break;
        case 'hasiltopsis':
            $active4 = 'class="active"';
            break;
    }
}
?>

<div class="col-sm-2"> 
    <ul class="nav nav-pills nav-stacked">
        <li <?php echo $active1; ?>><a href="?a=kriteria&k=kriteria">Kriteria</a></li>
        <li <?php echo $active2; ?>><a href="?a=alternatif&k=alternatif">Alternatif</a></li>
        <li <?php echo $active3; ?>><a href="?a=nilaimatrik">Nilai Matriks</a></li>
        <li <?php echo $active4; ?>><a href="?a=hasiltopsis&k=nilai_matriks">Hasil Topsis</a></li>
    </ul>
</div>


  <div class="col-sm-10">
    <?php
    if (@$_GET['a'] == 'kriteria') {
      include("kriteria.php");
    } else if (@$_GET['a'] == 'alternatif') {
      include("alternatif.php");
    } else if (@$_GET['a'] == 'nilaimatrik') {
      include("nilaimatrik.php");
    } else if (@$_GET['a'] == 'hasiltopsis') {
      include("hasiltopsis.php");
    }
    ?>
  </div>

</body>

</html>
