<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

$qgalleries = "SELECT * FROM galleries";
$resultGalleries = mysqli_query($connect, $qgalleries) or die(mysqli_error($connect));
?>


<!DOCTYPE html>
<html>

<head>
    <title>Detail Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"><!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="../../templates-user/images/logo.png">
</head>

<div class="container">
    <!-- Judul -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
            <h2 class="fw-bold">SEMUA GAMBAR</h2>
        </div>
    </div>

    <div class="row blog-entries">
        <?php if ($resultGalleries && $resultGalleries->num_rows > 0): ?>
            <?php while ($row = $resultGalleries->fetch_object()): ?>
                <div class="col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Gambar -->
                        <?php if (!empty($row->image)): ?>
                            <img src="../../../storages/galleries/<?= htmlspecialchars($row->image) ?>"
                                alt="Image placeholder" class="card-img-top"
                                style="height:200px; object-fit:cover;">
                        <?php else: ?>
                            <img src="templates-user/images/no-image.png"
                                alt="No Image" class="card-img-top"
                                style="height:200px; object-fit:cover;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <!-- Deskripsi singkat -->
                            <p class="card-text" style="font-size:14px; color:#444; text-align:justify;">
                                <?= substr(strip_tags($row->description), 0, 100) ?>...
                            </p>

                            <!-- Tombol Lihat Selengkapnya -->
                            <div class="mt-auto text-center">
                                <a href="galleries.php?id=<?= $row->id ?>"
                                    class="btn btn-primary btn-sm rounded-pill px-3">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
        <?php endif; ?>
    </div>

    <!-- Tombol Kembali -->
    <div class="see-more text-center">
        <a href="../../index.php#galleries" class="mt-2 btn btn-primary">Kembali</a>
    </div>
</div>

</html>