<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbusers");

// Tambah data user baru
if(isset($_POST["submit"])){
    // Ambil data dari tiap elemen form
    $todo = $_POST["title"]; 

    // Query insert data user 
    $query = "INSERT INTO todos
                VALUES
                ('', '$todo', '', '')";
    $result = mysqli_query($conn, $query);
    var_dump($result);

    if($result){
        echo "Todo tidak berhasil ditambahkan";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Style.css">
   <title>To Do List</title>
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
    <h1>To Do List</h1>

    <form action="" method="post">
    <ul>
        <li>
            <label for="Todo">Todo :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <button type="submit" name="register" >Add</button>
        </li>
    </ul>
    </center>
</body>
</html>