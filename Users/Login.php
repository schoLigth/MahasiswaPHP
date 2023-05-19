<?php


require 'function.php';

if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_GET["id"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // Check username 
    if(mysqli_num_rows($result) === 1){
        // Chek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            // Set session
            $_SESSION["login"] = true;

            if($username = "july" && $id = 5){
                header("Location: index.php");
                exit;
            }else{
                header("Location: ../todols/index.php");
            exit;
            }
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
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
            <li><a href=""align=center>NIM : 215314087</a></li>
        </ul>
    </nav>
    <h1 align = "center" >Halaman Login</h1>

    <?php if( isset($error)):?>
        <p style="color: red; font-style: italic;">Username or password is wrong</p>
    <?php endif; ?>
    <form action="" method="post">
        <center>
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
        </center>
    </form>
</body>
</html>