<?php
require_once '../../../config/connection.php';

// Cek apakah ID ada
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']); // Amankan input ID
$query = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($connect, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data blog tidak ditemukan.";
    exit;
}

$blog = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($blog['tittle']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blog-content img {
            max-width: 100%;
            height: auto;
        }

        .blog-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .blog-content table,
        .blog-content th,
        .blog-content td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .blog-content th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <img src="/laubwa_php/tugas/storages/blog/<?= htmlspecialchars($blog['image']) ?>"
                class="card-img-top" alt="<?= htmlspecialchars($blog['tittle']) ?>">

            <div class="card-body">
                <h3 class="card-title"><?= htmlspecialchars($blog['tittle']) ?></h3>

                <div class="text-muted mb-3" style="font-size: 14px;">
                    <?= htmlspecialchars($blog['date']) ?> | <?= htmlspecialchars($blog['author']) ?>
                </div>

                <div class="blog-content">
                    <?= $blog['description'] ?>
                    <a href="../../../index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>