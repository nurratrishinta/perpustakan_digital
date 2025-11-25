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

$qSelect = "SELECT * FROM announcements WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$announcement = $result->fetch_object();
if (!$announcement) {
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
                <img src="../../../storages/announcement/<?= htmlspecialchars($announcement->announcement_image); ?>"
                    alt="<?= htmlspecialchars($announcement->announcement_title); ?>"
                    class="card-img-top mx-auto d-block mb-3"
                    style="max-height: 320px; width: auto; object-fit: contain;">

                <h5 class="card-title text-center"><?= htmlspecialchars($announcement->announcement_title); ?></h5>
                <p><?= htmlspecialchars($announcement->announcement_description) ?></p>
                <div class="text-center">
                    <a href="./allannouncement.php" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
</body>

</html>