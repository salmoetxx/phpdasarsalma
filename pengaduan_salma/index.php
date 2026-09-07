<?php
require 'function.php';
$pelapor = query("SELECT*FROM pelapor"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pelapor</title>
</head>
<body>
    <h1>Data Laporan</h1>
    <a href="tambah.php">Tambah Pengaduan</a>
    <br><br> 
    
<table border ="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Aksi</th>
        <th>Id Pelapor</th>
        <th>Nama Pelapor</th>
        <th>Kelas Bagian</th>
        <th>Lokasi Kejadian</th>
        <th>Jenis Kerusakan</th>
        <th>Deskripsi Kejadian</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Tanggal Lapor</th>

    </tr>
    <?php foreach ($pelapor as $row ):?>
    <tr>
        <td>
         <a href="ubah.php?id_pelapor=<?= $row ["id_pelapor"];?> ">Ubah</a> 
         <a href="hapus.php?id_pelapor=<?= $row["id_pelapor"]; ?>" onclick="return confirm('yakin?');">Hapus</a>   
        </td>
        <td><?= $row["id_pelapor"]; ?></td>
        <td><?= $row["nama_pelapor"]; ?></td>
        <td><?= $row["kelas_bagian"]; ?></td>
        <td><?= $row["lokasi_kejadian"]; ?></td>
        <td><?= $row["jenis_kerusakan"]; ?></td>
        <td><?= $row["deskripsi_kejadian"]; ?></td>
        <td> <img src="imgsalma/<?= $row["foto"]; ?>" width="50"></td>
        <td><?= $row["status"]; ?></td>
        <td><?= $row["tanggal_lapor"]; ?></td>

    </tr>
    <?php endforeach; ?>
</table>
</body>  
</html>