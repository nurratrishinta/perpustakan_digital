<?php
// Panggil koneksi
require_once __DIR__ . '/../../config/connection.php';

// Query data abouts
$qAbout = "SELECT * FROM abouts LIMIT 1";
$qresultabout = mysqli_query($connect, $qAbout);

// Cek hasil query
if (!$qresultabout) {
    die("Query gagal: " . mysqli_error($connect));
}

// Ambil data kalau ada
$dataAbout = $qresultabout->fetch_object();
?>


<!doctype html>
<html lang="en">

<head>
    <title>SMKN 1 SANDEN</title>
    <meta charset="utf-8">
    <?php while ($item = $qresultabout->fetch_object()) : ?>
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../storages/about/<?= $item->school_logo ?>" alt="" style="height: 35px; margin-right: 8px;">
            <?= $item->school_name ?? '' ?>
            <span class="dot"></span>
        </a>
    <?php endwhile; ?>

    <!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="templates-user/images/logo.png">

    <link rel="stylesheet" href="templates-user/css/bootstrap.css">
    <link rel="stylesheet" href="templates-user/css/animate.css">
    <link rel="stylesheet" href="templates-user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="templates-user/css/fonts/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="templates-user/css/fonts/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" href="templates-user/css/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="templates-user/css/style.css">
</head>