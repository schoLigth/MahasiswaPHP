<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbusers");
// Join table users and todos
// $query = "SELECT td.*, us.username FROM todos td, users us WHERE us.id = td.user_id";
// $result = mysqli_query($conn, $query);


// Ambil data users 
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    // Ambil data dari tiap elemen form
    global $conn;

    $username = htmlspecialchars($data["username"]); 
    $password = htmlspecialchars($data["password"]);

    // Query insert data user 
    $query = "INSERT INTO users
                VALUES
                ('', '$username', '$password')
             ";
    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan userbaru kedalam database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    // Chek apakah data user baru dapat ditambahkan atau error
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
     // Chek apakah data user baru dapat dihapus atau error
    return mysqli_affected_rows($conn);
}

function ubah($data){
        // Ambil data dari tiap elemen form
        global $conn;

        $id = $data["id"];
        $username = htmlspecialchars($data["username"]); 
        $password = htmlspecialchars($data["password"]);

        // Query insert data user 
        $query = "UPDATE users SET 
                    username = '$username'
                WHERE id = $id
                ";
        mysqli_query($conn, $query);

        // Chek apakah data user baru dapat ditambahkan atau error
        return mysqli_affected_rows($conn);
}


function login(){
    $host="localhost";
    $user="root";
    $pass="";
    $database="dbusers";

    $koneksi=mysqli_connect($host, $user, "", $pass);
    if($koneksi){
        $buka=mysqli_select_db($koneksi, $database);
       
        if(!$buka){
            echo "Database tidak dapat terhubung";
        }
    }else{
        echo "MySQL tidak Terhubung";
    }

}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes ($data["username"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $password2 = mysqli_real_escape_string ($conn, $data["password2"]);

    // Chek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc ($result)){
        echo "<script>
                alert('Username sudah terdaftar!')
            </script>";
        return false;
    }

    // Chek konfirmasi password
    if($password !== $password2){
        echo "<script>
            alert('Password is incorrect')
        </script>";
        return false;
    } 

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan userbaru kedalam database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}


?>