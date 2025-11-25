<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan_digital";

// Membuat koneksi ke database
$connect = mysqli_connect($hostname, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>