<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","rs_salma");

//ambil data dari tabel
$result = mysqli_query ($conn,"SELECT*FROM pasien");

//ambil data pasien dari object result
//while ($pasien = mysqli_fetch_assoc($result)) {
     
//}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Data Pasien</h1>
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
    <?php while( $row = mysqli_fetch_assoc($result)):?>
    <tr>
        <td><?= $i ?></td>
        <td>
         <a href="">Ubah</a>
         <a href="">Hapus</a>   
        </td>
        <td><?= $row["id_pasien"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["jenis_kelamin"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["no_hp"]; ?></td>
        <td> <img src="imgsalma/<?= $row["foto"]; ?>" width="50"></td>

    </tr>
    <?php $i++ ; ?>
    <?php endwhile; ?>
</table>
</body>
</html>