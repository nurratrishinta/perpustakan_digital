<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

// Ambil data achievements
$qAchievement = "SELECT * FROM achievements ORDER BY id DESC";
$resultAchievement = mysqli_query($connect, $qAchievement) or die(mysqli_error($connect));
$achievements = [];
while ($row = $resultAchievement->fetch_object()) {
    $achievements[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Achievements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f7fc;
        }

        .achievement-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: left;
            padding: 15px;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .achievement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .achievement-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .achievement-card h3 {
            font-size: 18px;
            font-weight: bold;
            color: #0a4275;
            margin-bottom: 8px;
        }

        .achievement-card p {
            font-size: 14px;
            color: #444;
            text-align: justify;
        }

        /* Potong deskripsi agar rapi */
        .achievement-card .desc {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 65px;
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
                <h2 class="fw-bold">DAFTAR ACHIEVEMENTS</h2>
            </div>
        </div>
        <!-- Baris Pertama: 4 kolom -->
        <div class="row">
            <?php for ($i = 0; $i < 4 && $i < count($achievements); $i++): ?>
                <div class="col-md-3">
                    <div class="achievement-card">
                        <?php if (!empty($achievements[$i]->image)): ?>
                            <img src="../../../storages/achievements/<?= htmlspecialchars($achievements[$i]->image) ?>"
                                alt="<?= htmlspecialchars($achievements[$i]->title) ?>">
                        <?php else: ?>
                            <img src="templates-user/images/no-image.png" alt="No Image">
                        <?php endif; ?>

                        <h3><?= htmlspecialchars($achievements[$i]->title) ?></h3>
                        <p class="desc"><?= htmlspecialchars($achievements[$i]->description) ?></p>

                        <a href="achievements.php?id=<?= $achievements[$i]->id ?>&redirect=achievements.php"
                            class="btn-more">Lihat Selengkapnya</a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Baris Kedua: 3 kolom -->
        <div class="row">
            <?php for ($i = 4; $i < 7 && $i < count($achievements); $i++): ?>
                <div class="col-md-4">
                    <div class="achievement-card">
                        <?php if (!empty($achievements[$i]->image)): ?>
                            <img src="../../../storages/achievements/<?= htmlspecialchars($achievements[$i]->image) ?>"
                                alt="<?= htmlspecialchars($achievements[$i]->title) ?>">
                        <?php else: ?>
                            <img src="templates-user/images/no-image.png" alt="No Image">
                        <?php endif; ?>

                        <h3><?= htmlspecialchars($achievements[$i]->title) ?></h3>
                        <p class="desc"><?= htmlspecialchars($achievements[$i]->description) ?></p>

                        <a href="achievements.php?id=<?= $achievements[$i]->id ?>&redirect=achievements.php"
                            class="btn-more">Lihat Selengkapnya</a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Tombol Kembali -->
        <div class="see-more text-center">
            <a href="../../index.php" class="mt-2 btn btn-primary">Kembali</a>
        </div>
    </div>
</body>

</html>