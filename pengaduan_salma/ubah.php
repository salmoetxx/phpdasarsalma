<?php
require 'function.php';

//ambil data di url
$id_pelapor = $_GET["id_pelapor"];

//query data pasien  berdasarkan id nya
$pelapor = query("SELECT*FROM pelapor WHERE id_pelapor = $id_pelapor")[0];

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
    <title>Update Data Laporan</title>
</head>
<body>
    <h1>Update Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pelapor" value="<?= $pelapor["id_pelapor"]; ?>">
        <input type="hidden" name="fotolama" value="<?= $pelapor["foto"]; ?>"> 
    <ul>

     <li>   
        <label for="nama_pelapor">Nama Pelapor</label><br>
        <input type="text" name="nama_pelapor" id="nama_pelapor" placeholder ="Contoh:Chesta" required
        value="<?= $pelapor["nama_pelapor"];?>"> <br>    
     </li>
      <label for="kelas_bagian">Kelas Bagian</label><br>
        <select name="kelas_bagian" id="kelas_bagian" required
        value="<?= $pelapor["kelas_bagian"];?>"> <br>
         <option value="">--Pilih Kelas--</option>          
         <optgroup label="Kelas 10">
           <option value="10 RPL">10 RPL</option>
           <option value="10 DKV">10 DKV</option>
           <option value="10 TSM">10 TSM</option>
           <option value="10 TKR">10 TKR</option>
         </optgroup><br>
         <optgroup label="Kelas 11">
           <option value="11 RPL">11 RPL</option>
           <option value="11 DKV">11 DKV</option>
           <option value="11 TSM">11 TSM</option>
           <option value="11 TKR">11 TKR</option>
         </optgroup><br>
         <optgroup label="Kelas 12">
           <option value="12 RPL">12 RPL</option>
           <option value="12 DKV">12 DKV</option>
           <option value="12 TSM">12 TSM</option>
           <option value="12 TKR">12 TKR</option>
         </optgroup>
        </select> <br><br>

        <label for="lokasi_kejadian">Lokasi Kejadian</label><br>
        <input type="text" name ="lokasi_kejadian" id="lokasi_kejadian" 
        value="<?= $pelapor["lokasi_kejadian"];?>"> <br>
        <label for="jenis_kerusakan">Jenis Kerusakan</label><br>
        <input type="text" name ="jenis_kerusakan" id="jenis_kerusakan" 
        value="<?= $pelapor["jenis_kerusakan"];?>"> <br>
        <label for="deskripsi_kejadian">Deskripsi Kejadian</label><br>
        <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows ="5" 
        value="<?= $pelapor["deskripsi_kejadian"];?>"></textarea><br>
        <label for="foto">Foto Bukti Kejadian</label><br>
        <img src="imgsalma/<?= $pelapor ['foto'] ; ?>" width ="40"> <br>
        <input type="file" name ="foto" id="foto" ><br><br>
        <label for="tanggal_lapor">Tanggal Lapor</label>
        <input type="timestamp" name="tanggal_lapor" id="tanggal_lapor" 
        value="<?= $pelapor["tanggal_lapor"];?>"><br>

        <button type ="submit" name="submit" id="submit">Ubah Data</button><br>
        
    </form>

</body>
</html>