<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kriteria</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    body {
      font-family: "Georgia", serif; /* Menggunakan font yang lebih klasik */
      background-color: #f0f4f7; /* Latar belakang yang lebih cerah */
      color: #333; /* Teks berwarna gelap untuk kontras yang baik */
    }
    h1 {
      text-align: center;
      font-size: 36px; /* Ukuran font untuk judul */
      color: #8b5a2b; /* Warna coklat yang lebih kuat */
      margin-top: 0px;
      font-weight: bold;
      letter-spacing: 2px; /* Jarak antar huruf */
      text-transform: uppercase; /* Mengubah semua huruf menjadi kapital */
    }
    .container {
      margin-top: 20px;
      padding: 30px;
      background: #ffffff; /* Latar belakang putih untuk kontainer */
      border-radius: 10px; /* Sudut membulat */
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam */
      border: 2px solid #a67b5b; /* Border coklat yang lebih tegas */
    }
    .nav-tabs {
      margin-top: 20px;
      border-bottom: none; /* Menghilangkan garis bawah */
      display: flex;
      justify-content: center; /* Meratakan tab ke tengah */
      gap: 10px; /* Jarak antar tab */
    }
    .nav-tabs li {
      list-style: none; /* Menghilangkan bullet pada list */
    }
    .nav-tabs li a {
      font-size: 18px; /* Ukuran font untuk tab */
      color: #fff; /* Teks putih untuk tab */
      background: #8b5a2b; /* Latar belakang coklat untuk tab */
      padding: 10px 20px; /* Padding untuk tab */
      border-radius: 5px; /* Sudut membulat pada tab */
      font-family: "Courier New", monospace; /* Menggunakan font monospace */
      transition: all 0.3s ease; /* Transisi halus */
      border: 1px solid #8b5a2b; /* Border yang sesuai dengan warna latar belakang */
      text-transform: capitalize; /* Mengubah huruf pertama menjadi kapital */
    }
    .nav-tabs .active a,
    .nav-tabs li a:hover {
      background-color: #5d4037; /* Coklat tua untuk hover dan aktif */
      border-color: #5d4037; /* Border saat hover */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Bayangan yang lebih mencolok saat hover */
    }
    .tab-content {
      margin-top: 20px;
      padding: 20px;
      text-align: center; /* Mengatur teks menjadi rata tengah */
      background-color: #f5f5f5; /* Latar belakang abu-abu muda untuk konten */
      border-radius: 8px; /* Sudut membulat pada konten */
      border: 1px solid #a67b5b; /* Border coklat yang lebih tegas */
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Kriteria</h1>
    <ul class="nav nav-tabs">
      <?php
        if($_GET['k']=='kriteria'){
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
      <li <?php echo $act1; ?>><a href="index.php?a=kriteria&k=kriteria">Data Kriteria</a></li>
      <li <?php echo $act2; ?>><a href="index.php?a=kriteria&k=tambah">Tambah Kriteria</a></li>
    </ul>

    <div class="tab-content">
      <?php
        if(@$_GET['a']=='kriteria' and @$_GET['k']=='kriteria'){
          include("datakriteria.php");
        } else if(@$_GET['k']=='tambah'){
          include("tambahkriteria.php");
        } else if(@$_GET['k']=='ubahk'){
          include("ubahkriteria.php");
        }
      ?>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
