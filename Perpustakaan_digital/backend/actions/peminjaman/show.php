<?php
// panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('tidak bisa memilih ID ini');
        window.location.href ='../../pages/peminjaman/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // biar aman
$qSelect = "SELECT * FROM peminjaman WHERE peminjamanID = '$id'";
$result = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

$peminjaman = $result->fetch_object();
if (!$peminjaman) {
    die("Data tidak ditemukan");
}
?>
