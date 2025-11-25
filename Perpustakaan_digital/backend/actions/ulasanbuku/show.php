<?php
// Panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

// Pastikan parameter id ada
if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak ditemukan!');
        window.location.href = '../../pages/ulasanbuku/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // sanitasi agar aman

// Ambil data ulasan berdasarkan UlasanID
$qSelect = "
    SELECT u.UlasanID, u.Ulasan, u.Rating, 
           b.Judul AS JudulBuku, 
           usr.Username AS NamaUser
    FROM ulasanbuku u
    LEFT JOIN buku b ON u.BukuID = b.BukuID
    LEFT JOIN user usr ON u.UserID = usr.UserID
    WHERE u.UlasanID = ?
    LIMIT 1
";
$stmt = mysqli_prepare($connect, $qSelect);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$ulasanbuku = mysqli_fetch_assoc($result);

if (!$ulasanbuku) {
    echo "
    <script>
        alert('Data tidak ditemukan!');
        window.location.href = '../../pages/ulasanbuku/index.php';
    </script>
    ";
    exit;
}
?>

<!-- Tampilan detail ulasan -->
<!-- <div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Detail Ulasan Buku</h5>
            </div>
            <div class="card-body">
                <p><strong>Judul Buku:</strong> <?= htmlspecialchars($ulasanbuku['JudulBuku']) ?></p>
                <p><strong>User:</strong> <?= htmlspecialchars($ulasanbuku['NamaUser']) ?></p>
                <p><strong>Ulasan:</strong> <?= htmlspecialchars($ulasanbuku['Ulasan']) ?></p>
                <p><strong>Rating:</strong> <?= htmlspecialchars($ulasanbuku['Rating']) ?></p>
                <a href="../../pages/ulasanbuku/index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div> -->