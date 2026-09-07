<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data pasien  berdasarkan id nya
$psn = query("SELECT*FROM pasien WHERE id = $id")[0];

//cek tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])){


//cek apakah data berhasil di ubah atau tidak 
if ( ubah($_POST) > 0) {
    echo "
    <script>
        alert('data berhasil di ubah!');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal di ubah!');
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
    <title>Update Data Pasien</title>
</head>
<body>
    <h1>Update Data Pasien</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $psn["id"]; ?>">
        <input type="hidden" name="fotolama" value="<?= $psn["foto"]; ?>"> 
    <ul>
     <li>
        <label for="id_pasien">ID_PASIEN</label><br>
        <input type="text" name="id_pasien" id="id_pasien" placeholder ="Contoh:100004" required 
        value="<?= $psn["id_pasien"];?>"> <br>
     </li>
     <li>   
        <label for="nama">Nama Pasien</label><br>
        <input type="text" name="nama" id="nama" placeholder ="Contoh:Chesta" required
        value="<?= $psn["nama"];?>"> <br>    
     </li>
     <li>   
        <label>Jenis Kelamin:</label> <br>
        <input type="radio" name ="jenis_kelamin" id="laki_laki" value ="L" <?= ($psn["jenis_kelamin"] == 'L') ? 'checked' :''; ?>>        
        <label for="laki_laki">Laki_Laki</label><br>
        <input type="radio" name ="jenis_kelamin" id="perempuan" value ="P" <?= ($psn["jenis_kelamin"] == 'P') ? 'checked' :''; ?>>
        <label for="perempuan">Perempuan</label>
     </li>
     <li>   
        <label for="alamat">Alamat Pasien:</label><br>
        <input type="text" name ="alamat" id="alamat" placeholder ="Masukan Alamat Contoh:Jl.Borobudur" required
        value="<?= $psn["alamat"];?>"><br>
     </li>
     <li>
        <label for="no_hp">No Handphone</label><br>
        <input type="text" name="no_hp" id="no_hp" placeholder ="Masukan No Hp Contoh :087654334335" required
        value="<?= $psn["no_hp"];?>"><br>
     </li>
     <li>
        <label for="foto">Foto Pasien</label><br>
        <img src="imgsalma/<?= $psn ['foto'] ; ?>" width ="40"> <br>
        <input type="file" name ="foto" id="foto" ><br><br>
     </li>
     <li>
        <button type ="submit" name="submit" id="submit">Ubah Data</button><br>
     </li>
    </ul>
    </form>

</body>
</html>