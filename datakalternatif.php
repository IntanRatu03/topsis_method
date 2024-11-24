<div class="box-header"> 
    <h3 class="box-title">Data Alternatif</h3>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Id Alternatif</th>
                <th class="text-center">Nama Alternatif</th>
                <th class="text-center">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($k21, "select * from alternatif order by id_alternatif ASC");
            while ($d = mysqli_fetch_assoc($s)) {
            ?>
            <tr>
                <td class="text-center"><?php echo $d['id_alternatif']; ?></td>
                <td class="text-center"><?php echo $d['nm_alternatif']; ?></td>
                <td class="text-center">
                    <a href="?a=alternatif&k=ubaha&id=<?php echo $d['id_alternatif']; ?>" class="btn btn-custom">Ubah</a>
                    <a href="hapusalternatif.php?id=<?php echo $d['id_alternatif']; ?>" class="btn btn-custom-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    /* Mengatur font untuk seluruh halaman */
    body {
        font-family: "Georgia", serif; /* Mengubah font menjadi Georgia */
        background-color: #f0f4f7; /* Latar belakang yang lebih cerah */
        color: #333; /* Teks berwarna gelap untuk kontras yang baik */
    }

    .box-header {
        text-align: left;
        margin: 0px 0;
    }

    .box-header h3 {
        color: #8b5a2b; /* Coklat untuk kesan vintage */
        font-weight: bold;
        font-size: 28px; /* Ukuran teks yang lebih besar */
        border-bottom: 2px solid #a67b5b; /* Garis bawah untuk pemisah */
        display: inline-block;
        padding-bottom: 10px;
    }

    .table {
        margin-top: px;
        background-color: #ffffff; /* Latar belakang putih untuk tabel */
        border: 1px solid #a67b5b; /* Border yang sesuai dengan tema */
    }

    th {
        background-color: #8b5a2b; /* Latar belakang coklat untuk header tabel */
        color: #fff; /* Teks putih untuk kontras */
        font-weight: bold;
    }

    td {
        color: #333; /* Teks gelap untuk kontras yang baik */
    }

    .text-center {
        text-align: center; /* Menyelaraskan teks ke tengah */
    }

    .btn-custom {
        background-color: #f0d45e; /* Warna kuning cerah untuk tombol Ubah */
        color: #4a4a2d; /* Teks coklat tua */
        border: 1px solid #e6c143; /* Border yang lebih gelap */
        border-radius: 5px; /* Sedikit membulatkan sudut */
        padding: 10px 20px; /* Padding untuk tombol */
        transition: background-color 0.3s, color 0.3s; /* Efek transisi */
    }

    .btn-custom-danger {
        background-color: #f9b2b2; /* Warna merah muda cerah untuk tombol Hapus */
        color: #4a4a2d; /* Teks coklat tua */
        border: 1px solid #e68a8a; /* Border yang lebih gelap */
        border-radius: 5px; /* Sedikit membulatkan sudut */
        padding: 10px 20px; /* Padding untuk tombol */
        transition: background-color 0.3s, color 0.3s; /* Efek transisi */
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
