<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';

$pasien = query("SELECT * FROM pasien");


$mpdf = new \Mpdf\Mpdf([
    'allow_local_path' => true
]);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
</head>
<body>
    <h1>Daftar pasien</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Id_Pasien</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Foto</th>
        </tr>';

$i = 1;
foreach ($pasien as $row) {
    $html .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row["id_pasien"] . '</td>
        <td>' . $row["nama"] . '</td>
        <td>' . $row["jenis_kelamin"] . '</td>
        <td>' . $row["alamat"] . '</td>
        <td>' . $row["no_hp"] . '</td>
     <td><img src="http://localhost/prakteksalma/Pertemuan%2021/imgsalma/' . $row["foto"] . '" width="50"></td>
    </tr>'; 
    $i++;
}

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-pasien.pdf', \Mpdf\Output\Destination::INLINE);