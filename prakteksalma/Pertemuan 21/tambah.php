<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'functions.php';

//cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])){


//cek apakah data berhasil di tambahkan atau tidak 
if ( tambah ($_POST) > 0) {
    echo "
    <script>
        alert('data berhasil di tambahkan!');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal di tambahkan!');
        document.location.href = 'index.php';
    </script>
    ";
}
}
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
</head>
<body>
    <h1>Tambah Data Pasien</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <ul> 
     <li>     
        <label for="id_pasien">ID_PASIEN</label><br>
        <input type="text" name="id_pasien" id="id_pasien" placeholder ="Contoh:100004" required> <br>
     </li>
     <li>   
        <label for="nama">Nama Pasien</label><br>
        <input type="text" name="nama" id="nama" placeholder ="Contoh:Chesta" required> <br>    
     </li>
     <li>   
        <label>Jenis Kelamin:</label> <br>
        <input type="radio" name ="jenis_kelamin" id="laki_laki" value ="L" required>
        <label for="laki_laki">Laki_Laki</label><br>
        <input type="radio" name ="jenis_kelamin" id="perempuan" value ="P" required>
        <label for="perempuan">Perempuan</label>
     </li>
     <li>   
        <label for="alamat">Alamat Pasien:</label><br>
        <input type="text" name ="alamat" id="alamat" placeholder ="Masukan Alamat Contoh:Jl.Borobudur"><br>
     </li>
     <li>
        <label for="no_hp">No Handphone</label><br>
        <input type="text" name="no_hp" id="no_hp" placeholder ="Masukan No Hp Contoh :087654334335"><br>
     </li>
     <li>
        <label for="foto">Foto Pasien</label><br>
        <input type="file" name ="foto" id="foto"><br><br>
     </li>
     <li>
        <button type ="submit" name="submit" id="submit">Tambah Data</button><br>
        <button type ="reset" name="reset" id="reset">Bersihkan Data</button><br><br>
        <a href="index.php" style="text-decoration: none;">
         <button type="button">Kembali ke Dashboard </button>
        </a>
     </li>
    </ul>
    </form>

</body>
</html>