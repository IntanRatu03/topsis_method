<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alternatif</title>
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
      justify-content: center;
      gap: 10px;
    }
    .nav-tabs li {
      list-style: none;
    }
    .nav-tabs li a {
      font-size: 18px;
      color: #fff; /* Teks putih untuk tab */
      background: #8b5a2b; /* Latar belakang coklat */
      padding: 10px 20px; /* Padding lebih untuk tab yang lebih nyaman */
      border-radius: 5px;
      font-family: "Courier New", monospace;
      transition: all 0.3s ease;
      border: 1px solid #8b5a2b; /* Border yang sesuai dengan warna latar belakang */
      text-transform: capitalize;
    }
    .nav-tabs .active a,
    .nav-tabs li a:hover {
      background-color: #5d4037; /* Coklat tua untuk hover dan aktif */
      border-color: #5d4037;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Bayangan yang lebih mencolok saat hover */
    }
    .tab-content {
      margin-top: 20px;
      padding: 20px;
      text-align: center;
      background-color: #f5f5f5; /* Latar belakang abu-abu muda untuk konten */
      border-radius: 8px;
      border: 1px solid #a67b5b; /* Border coklat yang lebih tegas */
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Alternatif</h1>
  <ul class="nav nav-tabs">
    <?php
      if($_GET['k']=='alternatif'){
        $act1='class="active"';
        $act2='';
      } else if($_GET['k']=='tambah'){
        $act1='';
        $act2='class="active"';
      } else {
        $act1='';
        $act2='';
      }
    ?>
    <li <?php echo $act1; ?>><a href="index.php?a=alternatif&k=alternatif">Data Alternatif</a></li>
    <li <?php echo $act2; ?>><a href="index.php?a=alternatif&k=tambah">Tambah Alternatif</a></li>
  </ul>

  <div class="tab-content">
    <?php
      if(@$_GET['a']=='alternatif' and @$_GET['k']=='alternatif'){
        include("datakalternatif.php");
      } else if(@$_GET['k']=='tambah'){
        include("tambahalternatif.php");
      } else if(@$_GET['k']=='ubaha'){
        include("ubahalternatif.php");
      }
    ?>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
