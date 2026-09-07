<?php
$koneksi=mysqli_connect("localhost", "root", "", "rs_salma");
function query ($query) {
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query );
$rows = [];
while($row = mysqli_fetch_assoc($hasil)) {
    $rows[]=$row;
}
return $rows;
}
?>