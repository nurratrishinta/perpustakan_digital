<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

// Ambil data blog
$qblog = "SELECT * FROM blogs ORDER BY id DESC";
$resultblog = mysqli_query($connect, $qblog) or die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../../templates-user/images/logo.png">

    <style>
        body {
            background: #f4f7fc;
        }

        .blog-entry {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .blog-entry:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .blog-entry img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-entry .card-body {
            padding: 15px;
            text-align: left;
        }

        .blog-entry h5 {
            font-size: 18px;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 6px;
        }

        .blog-entry p {
            font-size: 14px;
            color: #444;
            margin-bottom: 8px;
            text-align: justify;
        }

        .btn-more {
            display: inline-block;
            padding: 6px 14px;
            font-size: 13px;
            background: #0d6efd;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-more:hover {
            background: #094db1;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
            <h2 class="fw-bold">BLOG</h2>
        </div>
    </div>

    <section id="blog" class="site-section bg-light">
        <div class="container">
            <div class="row">
                <?php if ($resultblog && $resultblog->num_rows > 0): ?>
                    <?php while ($row = $resultblog->fetch_object()): ?>
                        <div class="col-md-4 col-sm-6 col-12 mb-4">
                            <div class="blog-entry card h-100">
                                <!-- Gambar -->
                                <?php if (!empty($row->image)): ?>
                                    <img src="../../../storages/blog/<?= htmlspecialchars($row->image) ?>" alt="Blog Image">
                                <?php else: ?>
                                    <img src="templates-user/images/no-image.png" alt="No Image">
                                <?php endif; ?>

                                <div class="card-body">
                                    <!-- Judul -->
                                    <h5 class="card-title"><?= htmlspecialchars($row->title) ?></h5>
                                    <!-- Content ringkas -->
                                    <p class="card-text"><?= substr(strip_tags($row->content), 0, 100) ?>...</p>
                                    <!-- Tombol -->
                                    <a href="blog.php?id=<?= $row->id ?>&redirect=blog.php" class="btn-more">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p>Tidak ada blog ditemukan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center">
                <a href="../../index.php#blog" class="mt-3 btn btn-primary">Kembali</a>
            </div>
        </div>
    </section>
</body>

</html>