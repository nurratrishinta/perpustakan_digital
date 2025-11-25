<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

// Ambil data jurusan
$qannouncement = "SELECT * FROM announcements";
$resultannouncement = mysqli_query($connect, $qannouncement) or die(mysqli_error($connect));
$announcements = [];
while ($row = $resultannouncement->fetch_object()) {
    $announcements[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>Semua pengumuman</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"><!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="../../templates-user/images/logo.png">
    <style>
        body {
            background: #f4f7fc;
        }

        .announcement-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: left;
            padding: 15px;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .announcement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .announcement-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .announcement-card h3 {
            font-size: 18px;
            font-weight: bold;
            color: #0a4275;
            margin-bottom: 8px;
        }

        .announcement-card p {
            font-size: 14px;
            color: #444;
            text-align: justify;
        }

        /* Potong deskripsi agar rapi */
        .announcement-card .desc {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 65px;
        }

        .announcement-card .head {
            margin-top: 10px;
            font-weight: bold;
            color: #0d6efd;
            font-size: 14px;
        }

        .btn-more {
            margin-top: 10px;
            display: inline-block;
            padding: 5px 12px;
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
    <div class="container">
        <!-- Judul -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">SEMUA PENGUMUMAN</h2>
            </div>
        </div>

        <!-- Baris Pertama: 4 kolom -->
        <div class="row">
            <?php foreach ($announcements as $announcement): ?>
                <div class="col-md-4">
                    <div class="announcement-card">
                        <img src="../../../storages/announcement/<?= htmlspecialchars($announcement->announcement_image) ?>"
                            alt="<?= htmlspecialchars($announcement->announcement_title) ?>">
                        <h3><?= htmlspecialchars($announcement->announcement_title) ?></h3>
                        <p><?= htmlspecialchars($announcement->announcement_description) ?></p>
                        <a href="announcement.php?id=<?= $announcement->id ?>&redirect=announcement.php" class="btn-more">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Tombol Kembali -->
        <div class="see-more text-center">
            <a href="../../index.php#announcement" class="mt-2 btn btn-primary">Kembali</a>
        </div>
    </div>
</body>

</html>