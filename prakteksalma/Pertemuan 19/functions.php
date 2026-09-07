<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","rs_salma_p19");

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
$id_pasien = htmlspecialchars($data ["id_pasien"]);
$nama = htmlspecialchars ($data ["nama"]);
$jenis_kelamin = htmlspecialchars ($data ["jenis_kelamin"]);
$alamat = htmlspecialchars ($data ["alamat"]);
$no_hp = htmlspecialchars ($data ["no_hp"]);

// upload gambar
$foto = upload();
if(!$foto) {
    return false;

}

// query insert data
$query = "INSERT INTO pasien VALUES
        ('','$id_pasien', '$nama', '$jenis_kelamin', '$alamat', '$no_hp', '$foto')
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
 
function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id = $id");   
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
  //ambil data dari tiap elemen dalam form
$id = $data["id"];
$id_pasien = htmlspecialchars($data ["id_pasien"]);
$nama = htmlspecialchars ($data ["nama"]);
$jenis_kelamin = htmlspecialchars ($data ["jenis_kelamin"]);
$alamat = htmlspecialchars ($data ["alamat"]);
$no_hp = htmlspecialchars ($data ["no_hp"]);
$fotolama = htmlspecialchars($data["fotolama"]);

//cek apakah user pilih gambar baru atau tidak
if ($_FILES['foto']['error'] === 4 ) {
    $foto = $fotolama;
} else {
     $foto = upload ();
    
}

  
// query update data
$query = "UPDATE pasien SET
id_pasien = '$id_pasien',
nama = '$nama',
jenis_kelamin = '$jenis_kelamin',
alamat = '$alamat',
no_hp = '$no_hp',
foto = '$foto'
WHERE id = $id
";


mysqli_query($conn, $query); 

return mysqli_affected_rows($conn);

}

function cari($keyword) {
    $query = "SELECT * FROM pasien WHERE 
    nama LIKE '%$keyword%' OR
    id_pasien LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_hp LIKE '%$keyword%' 

    ";

    return query($query);
}

function registrasi($data) {
     global $conn;

     $username = strtolower(stripslashes($data["username"]));
     $password = mysqli_real_escape_string($conn, $data["password"]); 
     $password2 = mysqli_real_escape_string($conn, $data["password2"]); 


    //cek username sudah atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('username yang dipilih sudah terdaftar!')
              </script>";
        return false;
    }

    //cek konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>
        alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash ($password, PASSWORD_DEFAULT);

    //tambahkan username baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);


 

}

?>
   