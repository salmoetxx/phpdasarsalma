<?php
usleep(500000);
require'../functions.php';

$keyword = $_GET["keyword"];


$query = "SELECT * FROM pasien WHERE 
    nama LIKE '%$keyword%' OR
    id_pasien LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_hp LIKE '%$keyword%' 

    ";

$pasien = query($query);

?>
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