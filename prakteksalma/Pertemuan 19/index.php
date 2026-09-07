<?php
session_start();
if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';
$pasien = query("SELECT*FROM pasien"); 

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
    "masukan keyword pencarian.." autocomplete="off" id= "keyword">
    <button type="submit" name="cari" id ="tombol-cari">Cari!</button>

    </form>
    <br>
<div id="container">
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
</div>
<script src="js/script.js">

</script>
</body>  
</html>