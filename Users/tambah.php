<?php 
require 'function.php';

// Tambah data user baru
if(isset($_POST["submit"])){
    // Chek apakah data user baru dapat ditambahkan atau error
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    }else{
        echo "
        <script>
            alert('Data gagal ditambahkan');
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
   <title>Tambah data user</title>
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
    <h1>Tambah Data User</h1>

    <form action="" method="post">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password" required>
        </li>
        <li>
        <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2" required>
        </li>
        <li>
            <button type="submit" name="submit" >register</button>
        </li>
    </ul>
    </center>
</body>
</html>