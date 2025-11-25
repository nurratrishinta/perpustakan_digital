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

$qSelect = "SELECT * FROM majors WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$major = $result->fetch_object();
if (!$major) {
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
        <div class="container my-5">
            <div class="card shadow border-0 rounded-3 p-4 mx-auto" style="max-width: 700px;">
                <img src="../../../storages/major/<?= htmlspecialchars($major->major_image); ?>"
                    alt="<?= htmlspecialchars($major->major_name); ?>"
                    class="card-img-top mx-auto d-block mb-3"
                    style="max-height: 320px; width: auto; object-fit: contain;">

                <h5 class="card-title text-center"><?= htmlspecialchars($major->major_name); ?></h5>

                <h6 class="card-subtitle text-muted text-center mb-2"><?= htmlspecialchars($major->head); ?></h6>

                <p class="card-text mt-3 text-justify"><?= htmlspecialchars($major->major_description); ?></p>

                <div class="text-center">
                    <a href="./allMajor.php" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
</body>

</html>