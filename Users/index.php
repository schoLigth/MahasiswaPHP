<?php
// Session
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: Login.php");
    exit;
}

require 'function.php';

// Ambil data dari tabel user / query data user
 $users = query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title padding=30px>Halaman Admin</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
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
    <h1>Halaman Admin</h1>
    <h2>Daftar Users</h2>
    <a href="tambah.php">Tambah data users</a>
    <a href="logout.php">Logout</a>

    <table border="2" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>username</th>
        <th>password</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $users as $row) : ?>
    <tr>
        <td><?php $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Data akan dihapus!');">hapus</a>
        </td>
        <td><?= $row["username"]; ?></td>
        <td><?= $row["password"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

    </table>
    </center> 
</body>
</html>