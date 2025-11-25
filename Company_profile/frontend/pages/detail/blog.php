<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

if (!isset($_GET['id'])) {
    echo "
    <script>    
        alert('Tidak bisa memilih ID ini');
        window.location.href='../../../index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM blogs WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$blog = $result->fetch_object();
if (!$blog) {
    die("Data tidak di temukan");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"><!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="../../templates-user/images/logo.png">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow border-0 rounded-3 p-5">
            <img src="../../../storages/blog/<?= htmlspecialchars($blog->image); ?>" alt="<?= htmlspecialchars($blog->title); ?>" class="card-img-top h-75 w-75 mx-auto">

            <br>
            <h5 class="card-title"><?= htmlspecialchars($blog->title); ?></h5>
            <br>
            <p class="card-text"><?= htmlspecialchars($blog->content); ?></p>

        </div>
        <div class="text-center">
            <a href="../detail/allBlog.php" class="btn btn-secondary">Kembali</a>
        </div>
</body>

</html>