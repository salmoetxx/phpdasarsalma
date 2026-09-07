<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","rs_salma_p10");

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


function tambah ($data) {
    global $conn;
     
//ambil data dari tiap elemen dalam form
$id_pasien = htmlspecialchars($data ["id_pasien"]);
$nama = htmlspecialchars ($data ["nama"]);
$jenis_kelamin = htmlspecialchars ($data ["jenis_kelamin"]);
$alamat = htmlspecialchars ($data ["alamat"]);
$no_hp = htmlspecialchars ($data ["no_hp"]);
$foto = htmlspecialchars ($data ["foto"]);

// query insert data
$query = "INSERT INTO pasien VALUES
        ('','$id_pasien', '$nama', '$jenis_kelamin', '$alamat', '$no_hp', '$foto')
        ";

mysqli_query($conn, $query); 

return mysqli_affected_rows($conn);


}
 
function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id = $id");   
    return mysqli_affected_rows($conn);
}
?>
  