<?php 
// Session
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: Login.php");
    exit;
}
 
require 'function.php';

$id = $_GET["id"];

// Query data mahasiswa berdasarkan id
$user = query("SELECT * FROM users WHERE id = $id")[0];

// Tambah data user baru
if(isset($_POST["submit"])){
    // Chek apakah data user baru dapat diubah atau error
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
    }else{
        echo "
        <script>
            alert('Data gagal diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
   <title>Ubah data user</title>
   <style>
        label {
            display: block;
        }
   </style>
</head>
<body>
<nav>
    <div class="logo">
            <h4><img src="Profil.jpeg" alt="Profil" width="50"></h4>
        </div>
        <ul>
            <li><a href="https://instagram.com/scho_light13?igshid=YmMyMTA2M2Y=" align=center><strong>Instagram: @Scho_light13</a></li>
            <li><a href="" align=center>Name : Lusia Juliana Silaban</a></li>
            <li><a href="">NIM : 215314087</a></li>
        </ul>
    </nav>
    <center>
    <h1>Ubah Data User</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user["id"]; ?>">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required value="<?= $user["username"]; ?>">
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password" required value="<?= $user["password"]; ?>">
        </li>
        <li>
        <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2" required value="<?= $user["password"]; ?>">
        </li>
        <li>
            <button type="submit" name="submit" >Ubah data</button>
        </li>
    </ul>
    </center>
</body>
</html>