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
    exit;
}

$id = $_GET['id'];

// ambil data dari galleries
$qSelect = "SELECT * FROM galleries WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$gallery = $result->fetch_object();
if (!$gallery) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"><!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="../../templates-user/images/logo.png">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow border-0 rounded-3 p-4 mx-auto" style="max-width: 700px;">
            <!-- Gambar -->
            <?php if (!empty($gallery->image)): ?>
                <img src="../../../storages/galleries/<?= htmlspecialchars($gallery->image); ?>"
                    alt="Gallery Image"
                    class="card-img-top mx-auto d-block mb-3"
                    style="max-height: 320px; width: auto; object-fit: contain;">
            <?php else: ?>
                <img src="templates-user/images/no-image.png"
                    alt="No Image"
                    class="card-img-top mx-auto d-block mb-3"
                    style="max-height: 320px; width: auto; object-fit: contain;">
            <?php endif; ?>


            <!-- Subjudul opsional (misal kategori) -->
            <?php if (!empty($gallery->category)): ?>
                <h6 class="card-subtitle text-muted text-center mb-2">
                    <?= htmlspecialchars($gallery->category); ?>
                </h6>
            <?php endif; ?>

            <!-- Deskripsi -->
            <p class="card-text mt-3 text-justify">
                <?= nl2br(htmlspecialchars($gallery->description ?? '')); ?>
            </p>

            <!-- Tombol kembali -->
            <div class="text-center">
                <a href="../detail/allGalleries.php" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>