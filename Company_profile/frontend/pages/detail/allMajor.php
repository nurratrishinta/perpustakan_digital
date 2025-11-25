<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

// Ambil data jurusan
$qMajor = "SELECT * FROM majors";
$resultMajor = mysqli_query($connect, $qMajor) or die(mysqli_error($connect));
$majors = [];
while ($row = $resultMajor->fetch_object()) {
    $majors[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>Semua Jurusan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"><!-- Favicon -->
    <link rel="icon" type="images/logo.png" href="../../templates-user/images/logo.png">
    <style>
        body {
            background: #f4f7fc;
        }

        .major-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: left;
            padding: 15px;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .major-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .major-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .major-card h3 {
            font-size: 18px;
            font-weight: bold;
            color: #0a4275;
            margin-bottom: 8px;
        }

        .major-card p {
            font-size: 14px;
            color: #444;
            text-align: justify;
        }

        /* Potong deskripsi agar rapi */
        .major-card .desc {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 65px;
        }

        .major-card .head {
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
                <h2 class="fw-bold">SEMUA JURUSAN</h2>
            </div>
        </div>

        <!-- Baris Pertama: 4 kolom -->
        <div class="row">
            <?php foreach ($majors as $major): ?>
                <div class="col-md-4">
                    <div class="major-card">
                        <img src="../../../storages/major/<?= htmlspecialchars($major->major_image) ?>"
                            alt="<?= htmlspecialchars($major->major_name) ?>">
                        <h3><?= htmlspecialchars($major->major_name) ?></h3>
                        <p class="desc"><?= htmlspecialchars($major->major_description) ?></p>
                        <p class="head">
                            Kepala Jurusan:
                            <?= !empty($major->head) ? htmlspecialchars($major->head) : 'Belum ditentukan'; ?>
                        </p>
                        <a href="major.php?id=<?= $major->id ?>&redirect=major.php" class="btn-more">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Tombol Kembali -->
        <div class="see-more text-center">
            <a href="../../index.php#major" class="mt-2 btn btn-primary">Kembali</a>
        </div>
    </div>
</body>

</html>