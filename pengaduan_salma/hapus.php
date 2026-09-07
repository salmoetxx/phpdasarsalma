<?php
require 'function.php';
  
$id_pelapor = $_GET["id_pelapor"];

if(hapus ($id_pelapor) > 0 ) {
     echo "
    <script>
        alert('data berhasil di hapus!');
        document.location.href = 'index.php';
    </script>
    ";
} else { 
    echo "
    <script>
        alert('data gagal di hapus!');
        document.location.href = 'index.php';
    </script>
    ";
}

?>