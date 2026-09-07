<?php
require 'function.php';
$pasien = query("SELECT*FROM pasien");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h2>DATA PASIEN</h2>
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>ID_Pasien</th>
        <th>Nama</th>
        <th>Jenis_Kelamin</th>
        <th>Alamat</th>
        <th>No_Hp</th>
        <th>Foto</th>
    </tr>
<?php $i=1;?>
<?php foreach ($pasien as $row) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td> 
            <a href="">Ubah</a> |
             <a href="">Hapus</a>
        </td>
        <td><?= $row["id_pasien"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["jenis_kelamin"];?></td>
        <td><?= $row["alamat"];?></td>
        <td><?= $row["no_hp"];?></td>
        <td>
            <img src="imgsalma/<?= $row["foto"];?> "width="70">
        </td>
    </tr>
<?php $i ++;?>
<?php endforeach;?>
</table>
</body>
</html>