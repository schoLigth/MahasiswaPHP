<?php 
// Session 
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: Login.php");
    exit;
}
require 'function.php';

$id = $_GET["id"];

if( hapus($id) > 0){
    echo "Data berhasil dihapus";
}else{
    echo "Data gagal dihapus";
}

?>