<?php
session_start();
include '../../app.php';

// mengecek apakah user sudah login
if (!isset($_SESSION['email'])) {
  echo "
            <script> 
            alert('Anda Harus Login dahulu');
            window.location.href='../auth/login.php';
            </script>
         ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>tugas pp</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="../../template-admin/assets/img/ft1.jpg"
    type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="../../template-admin/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["../../template-admin/assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="../../template-admin/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../template-admin/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="../../template-admin/assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="../../template-admin/assets/css/demo.css" />
</head>