<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","pengaduan_salma");

//query
function query ($query){
    global $conn;   
    $result = mysqli_query($conn, $query);
    $rows = [];   
    while ($row = mysqli_fetch_assoc ($result)) {
        $rows[]=$row;
    }
    return $rows;
}
    

function tambah  ($data) {
    global $conn;
     
//ambil data dari tiap elemen dalam form
$id_pelapor = htmlspecialchars($data ["id_pelapor"]);
$nama_pelapor = htmlspecialchars ($data ["nama_pelapor"]);
$kelas_bagian = htmlspecialchars ($data ["kelas_bagian"]);
$lokasi_kejadian = htmlspecialchars ($data ["lokasi_kejadian"]);
$jenis_kerusakan= htmlspecialchars ($data ["jenis_kerusakan"]);
$deskripsi_kejadian= htmlspecialchars ($data ["deskripsi_kejadian"]);
$foto = upload();
if(!$foto) {
    return false;
}
$status= htmlspecialchars ($data ["status"]);
$tanggal_lapor= htmlspecialchars ($data ["tanggal_lapor"]);




// query insert data
$query = "INSERT INTO pelapor VALUES
        ('', '$nama_pelapor', '$kelas_bagian', '$lokasi_kejadian', '$jenis_kerusakan', '$deskripsi_kejadian', '$foto', '$status', '$tanggal_lapor')
        ";

mysqli_query($conn, $query); 

return mysqli_affected_rows($conn);


}

function upload() {
    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if($error === 4 ) {     
        return false;
    }
  
    //cek apakah yang di upload adalah gambar
    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];

    $targetekstensi = explode('.', $namafile);

    $ekstensifoto = strtolower (end($targetekstensi));
   
    if( !in_array($ekstensifoto, $ekstensifotovalid)) {
        echo "<script>
              alert('yang anda upload bukan gambar!');
             </script>"; 
        return false;
    }

    //cek jika ukurnnya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
              alert('Ukuran File Terlalu Besar!');
             </script>";
        return false;
    }

    //lolos pengecekan, gambar siap di upload

    //generate nama baru
     $namafilebaru = uniqid();
     $namafilebaru .= '.';
     $namafilebaru .= $ekstensifoto;


    move_uploaded_file($tmpname, 'imgsalma/' . $namafilebaru);
        return $namafilebaru;
}
 
function hapus ($id_pelapor){
    global $conn;
    mysqli_query($conn, "DELETE FROM pelapor WHERE id_pelapor = $id_pelapor");   
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
  //ambil data dari tiap elemen dalam form
$id_pelapor = htmlspecialchars($data ["id_pelapor"]);
$nama_pelapor = htmlspecialchars ($data ["nama_pelapor"]);
$kelas_bagian = htmlspecialchars ($data ["kelas_bagian"]);
$lokasi_kejadian = htmlspecialchars ($data ["lokasi_kejadian"]);
$jenis_kerusakan= htmlspecialchars ($data ["jenis_kerusakan"]);
$deskripsi_kejadian= htmlspecialchars ($data ["deskripsi_kejadian"]);
$fotolama = htmlspecialchars($data["fotolama"]);
$status= htmlspecialchars ($data ["status"]);
$tanggal_lapor= htmlspecialchars ($data ["tanggal_lapor"]);


//cek apakah user pilih gambar baru atau tidak
if ($_FILES['foto']['error'] === 4 ) {
    $foto = $fotolama;
} else {
     $foto = upload ();
    
}

  
// query update data
$query = "UPDATE pelapor SET
id_pelapor = '$id_pelapor',
nama_pelapor = '$nama_pelapor',
kelas_bagian = '$kelas_bagian',
lokasi_kejadian = '$lokasi_kejadian',
jenis_kerusakan = '$jenis_kerusakan',
deskripsi_kejadian = '$deskripsi_kejadian',
foto = '$foto',
status = '$status',
tanggal_lapor = '$tanggal_lapor'
WHERE id_pelapor = $id_pelapor
";


mysqli_query($conn, $query); 

return mysqli_affected_rows($conn);

}

?>
   