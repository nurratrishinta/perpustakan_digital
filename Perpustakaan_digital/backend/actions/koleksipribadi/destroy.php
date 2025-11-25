<?php
// Koneksi database
require_once __DIR__ . '/../../../config/connection.php';

// Pastikan ID dikirim
if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak ditemukan!');
        window.location.href='../../pages/koleksipribadi/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // sanitasi input agar aman

// Pastikan data ada sebelum dihapus
$qCheck = "SELECT * FROM koleksipribadi WHERE KoleksiID = ?";
$stmtCheck = mysqli_prepare($connect, $qCheck);
mysqli_stmt_bind_param($stmtCheck, "i", $id);
mysqli_stmt_execute($stmtCheck);
$resCheck = mysqli_stmt_get_result($stmtCheck);

if (mysqli_num_rows($resCheck) === 0) {
    echo "
    <script>
        alert('Data tidak ditemukan!');
        window.location.href='../../pages/koleksipribadi/index.php';
    </script>
    ";
    exit;
}

// Hapus data
$qDelete = "DELETE FROM koleksipribadi WHERE KoleksiID = ?";
$stmtDelete = mysqli_prepare($connect, $qDelete);
mysqli_stmt_bind_param($stmtDelete, "i", $id);
$success = mysqli_stmt_execute($stmtDelete);

if ($success) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        window.location.href='../../pages/koleksipribadi/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Gagal menghapus data!');
        window.location.href='../../pages/koleksipribadi/index.php';
    </script>
    ";
}
?>
