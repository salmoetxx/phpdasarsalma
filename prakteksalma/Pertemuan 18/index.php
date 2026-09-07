<?php
session_start();
if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahdataperpage = 2; 
$jumlahdata = count (query("SELECT*FROM pasien"));
$jumlahalaman = ceil($jumlahdata / $jumlahdataperpage); 
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperpage * $halamanaktif) - $jumlahdataperpage ;

$pasien = query("SELECT*FROM pasien limit $awaldata, $jumlahdataperpage"); 
  
// tombol cari ditekan
if( isset($_POST["cari"])) {
    $pasien = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>
    <h1>Data Pasien</h1>
    <a href="tambah.php">Tambah Data Pasien</a>
    <br><br> 
    <form action="" method="post">

    <input type="text" name="keyword" size ="40" autofocus placeholder=
    "masukan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

    </form>
<br><br>
<?php if ($halamanaktif > 1) : ?>
<a href="?halaman=<?= $halamanaktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahalaman; $i++) : ?>
    <?php if ($i == $halamanaktif) : ?>
    <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
    <?php else : ?>
         <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanaktif < $jumlahalaman) : ?>
<a href="?halaman=<?= $halamanaktif + 1; ?>">&raquo;</a>
<?php endif; ?>

    
    <br>
<table border ="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Id_Pasien</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Foto</th>

    </tr>
    <?php $i = 1; ?> 
    <?php foreach ($pasien as $row ):?>
    <tr>
        <td><?= $i ?></td> 
        <td>
         <a href="ubah.php?id=<?= $row ["id"];?> ">Ubah</a> 
         <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>   
        </td>
        <td><?= $row["id_pasien"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["jenis_kelamin"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["no_hp"]; ?></td>
        <td> <img src="imgsalma/<?= $row["foto"]; ?>" width="50"></td>

    </tr>
    <?php $i++ ; ?>
    <?php endforeach; ?>
</table>
</body>  
</html>