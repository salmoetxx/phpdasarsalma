<?php
require 'functions.php';

//cek tombol submit sudah di tekan atau belum
if(isset($_POST["login"])) {

    $username = $_POST["username"] ;
    $password = $_POST["password"];

//cek apakah ada username di dalam database yang sama dengan yang di input kan user

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

//cek username
if(mysqli_num_rows($result) === 1 ) {
     
$row = mysqli_fetch_assoc($result);

//cek password
if  (password_verify($password, $row["password"]) ) {
     header("location: index.php");
     exit;
}

}

$error = true;


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>

    <h1>Halaman Login</h1>

    <?php if(isset($error)) :?>
        <p style="color: red; font-style: italic;">username atau password yang anda masukan salah</p>
    <?php endif; ?>
 
<form action="" method="post">

    <ul>
        <li>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </li>
        
        <li>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
          <button type="submit" name ="login">Login</button>
        </li>
    </ul>

</form>
</body>
</html>