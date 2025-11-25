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

$qSelect = "SELECT * FROM teachers WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$teacher = $result->fetch_object();
if (!$teacher) {
    die("Data tidak di temukan");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h2 class="fw-bold text-center mb-4">Daftar Guru</h2>
        <div class="row">
            <?php while ($item = $resultTeacher->fetch_object()): ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card teacher-card shadow-sm h-100">
                        <img src="../storages/teacher/<?= $item->teacher_photo ?>"
                            alt="<?= htmlspecialchars($item->teacher_name) ?>"
                            class="card-img-top teacher-photo">

                        <div class="card-body text-center">
                            <h5 class="card-title mb-1"><?= htmlspecialchars($item->teacher_name) ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($item->teacher_major) ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Tombol kembali -->
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary px-4 py-2 rounded-pill">⬅ Kembali</a>
        </div>
    </div>
</body>

</html>

<style>
    .teacher-card {
        border-radius: 12px;
        overflow: hidden;
        border-top: 5px solid #0d6efd;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #f9fbff;
    }

    .teacher-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        background-color: #eaf3ff;
    }

    .teacher-photo {
        height: 220px;
        object-fit: cover;
    }

    .card-title {
        font-size: 16px;
        font-weight: bold;
        color: #0d6efd;
    }

    .card-text {
        font-size: 14px;
        color: #444;
        border-top: 1px solid #dbe9ff;
        padding-top: 6px;
        margin-top: 6px;
    }
</style>