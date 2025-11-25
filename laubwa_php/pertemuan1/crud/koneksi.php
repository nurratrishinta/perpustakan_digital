<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbName = "php_crud";

$connect = mysqli_connect($host, $username, $password, $dbName);
if(mysqli_connect_errno()){
 echo "Koneksi Database Gagal". mysqli_connect_error();
}else {
    echo "Koneksi database berhasil";
}
?>