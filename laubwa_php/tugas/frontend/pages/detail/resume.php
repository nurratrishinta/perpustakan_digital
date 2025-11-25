<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

// Validasi ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "
        <script>
            alert('ID tidak valid!');
            window.location.href = '../../../index.php';
        </script>
    ";
    exit;
}

$id = intval($_GET['id']); // Hindari SQL Injection

// Query data resume
$qSelect = "SELECT * FROM resumes WHERE id = '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$resume = mysqli_fetch_object($result);
if (!$resume) {
    die("Data tidak di temukan");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Resume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2><?= $resume->place ?></h2>
        <h5><?= $resume->date ?> - <?= $resume->job ?></h5>
        <p class="mt-20px"><?= $resume->description ?></p>
        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>


    </div>
</body>

</html>