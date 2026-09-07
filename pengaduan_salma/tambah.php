 <?php
require 'function.php';

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
    <title>Form Pengaduan</title>
 </head>
 <body>
    <h2>Formulir Pengaduan</h2>
    <p>Halo Pengguna Terhormat Selamat Datang Di Halaman Pengaduan, Silahkan Isi Data Data di Bawah Ini</p>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama Pelapor</label><br>
        <input type="text" name="nama_pelapor" id="nama_pelapor" placeholder ="Contoh:Udin" required> <br>
        <label for="kelas">Kelas Bagian</label><br>
        <select name="kelas_bagian" id="kelas_bagian" required><br>
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
        <input type="text" name ="lokasi_kejadian" id="lokasi_kejadian" placeholder ="Masukan Lokasi Kejadian Contoh:Rawa Imut"><br>
        <label for="jenis_kerusakan">Jenis Kerusakan</label><br>
        <input type="text" name ="jenis_kerusakan" id="jenis_kerusakan" placeholder ="Masukan Jenis Kerusakan Contoh:Keramik Pecah"><br>
        <label for="deskripsi">Deskripsi Kejadian</label><br>
        <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows ="5" placeholder ="Jelaskan Detail Kerusakan.."></textarea><br>
        <label for="foto">Foto Bukti Kejadian</label><br>
        <input type="file" name ="foto" id="foto" accept="imagsalma/" placeholder ="Masukan Foto (HANYA FOTO)"><br><br>
        <label for="tanggal_lapor">Tanggal Lapor</label>
        <input type="timestamp" name="tanggal_lapor" id="tanggal_lapor">
        <button type ="submit" name="submit" id="submit">Kirim Laporan</button><br>
        <button type ="reset" name="reset" id="reset">Batal</button>
        <a href="index.php" style="text-decoration: none;">
         <button type="button">Kembali ke Dashboard </button>
        </a>
    </form>        
 </body>
 </html>