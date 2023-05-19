<?php
// Session
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: Login.php");
    exit;
}

// Registrasi user baru
require 'function.php';
login();

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo    "<script>
                    alert('User berhasil ditambahkan')
                </script>";
        // Set session
        $_SESSION["register"] = true;
        // Lanjut ke window login untuk user
        header("Location: Login.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}

// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "dbusers");

// Tambah data user baru
if (isset($_POST["submit"])) {
    // Ambil data dari tiap elemen form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query insert data user 
    $query = "INSERT INTO users
                VALUES
                ('', '$username', '$password')";
    $result = mysqli_query($conn, $query);
    var_dump($result);

    if ($result) {
        echo "Table user tidak berhasil";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
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
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">register</button>
            </li>
            <li>OR</li>
            <li> <a href="Login.php">Login</a></li>
        </ul>
    </center>
</body>

</html>