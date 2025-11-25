<?php
// panggil koneksi
require_once __DIR__ . '/../../../config/connection.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('tidak bisa memilih ID ini');
        window.location.href ='../../pages/kategoribuku/index.php';
    </script>
    ";
    exit;
}

$id = intval($_GET['id']); // biar aman
$qSelect = "SELECT * FROM kategoribuku WHERE kategoriBukuID = '$id'";
$result = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

$kategoribuku = $result->fetch_object();
if (!$kategoribuku) {
    die("Data tidak ditemukan");
}
?>
