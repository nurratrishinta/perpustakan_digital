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

$qSelect = "SELECT * FROM achievements WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$achievements = $result->fetch_object();
if (!$achievements) {
    die("Data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Detail Achievement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body style="background:#f4f7fc;">
    <div class="container my-5">
        <div class="card shadow border-0 rounded-3 p-5">
            <!-- Gambar -->
            <?php if (!empty($achievements->image)): ?>
                <img src="../../../storages/achievements/<?= htmlspecialchars($achievements->image); ?>"
                    alt="<?= htmlspecialchars($achievements->title); ?>"
                    class="card-img-top h-75 w-75 mx-auto mb-4"
                    style="object-fit: contain;">
            <?php endif; ?>

            <!-- Judul -->
            <h5 class="card-title text-center"><?= htmlspecialchars($achievements->title); ?></h5>
            <hr>

            <!-- Deskripsi -->
            <p class="card-text"><?= nl2br(htmlspecialchars($achievements->description)); ?></p>
        </div>

        <!-- Tombol kembali -->
        <div class="text-center mt-3">
            <a href="../detail/allAchievements.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</body>

</html>