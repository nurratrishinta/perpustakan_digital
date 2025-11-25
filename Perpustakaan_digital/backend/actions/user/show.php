<?php
include '../../../config/connection.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']); // pastikan angka
$q = "SELECT * FROM user WHERE id = $id LIMIT 1";
$result = mysqli_query($connect, $q) or die(mysqli_error($connect));

$user = mysqli_fetch_object($result);

if (!$user) {
    die("Data user tidak ditemukan!");
}
?>
