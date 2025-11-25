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

$qSelect = "SELECT * FROM projects WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$project = $result->fetch_object();
if (!$project) {
    die("Data tidak di temukan");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow border-0 rounded-3 p-5">
            <img src="../../../../storages/project/<?= htmlspecialchars($project->image); ?>" alt="<?= htmlspecialchars($project->title); ?>" class="card-img-top h-75 w-75 mx-auto">
            <h2><?= $project->title ?></h2>
            <h5><?= $project->job ?></h5>
            <p style="margin-top: 20px;">
                <?= $project->description ?>
            </p>
            <a href="../../../index.php" class="btn btn-secondary">Kembali</a>
        </div>
</body>

</html>