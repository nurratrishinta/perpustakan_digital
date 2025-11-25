<?php
include_once '../../../config/escapeString.php';


// ambil id dari URL
$id = $_GET['id'] ?? '';

if (!$id) {
    echo "
        <script>
            alert('ID Relasi tidak ditemukan');
            window.location.href='../../pages/kategoribuku_relasi/index.php';
        </script>
    ";
    exit;
}

// ambil data relasi berdasarkan ID
$qShow = "
    SELECT kr.*, b.Judul AS NamaBuku, k.NamaKategori
    FROM kategoribuku_relasi kr
    LEFT JOIN buku b ON kr.BukuID = b.BukuID
    LEFT JOIN kategoribuku k ON kr.KategoriID = k.KategoriID
    WHERE kr.KategoriBukuID = '$id'
    LIMIT 1
";

$result = mysqli_query($connect, $qShow) or die(mysqli_error($connect));
$relasi = mysqli_fetch_object($result);

if (!$relasi) {
    echo "
        <script>
            alert('Data relasi tidak ditemukan');
            window.location.href='../../pages/kategoribuku_relasi/index.php';
        </script>
    ";
    exit;
}
?>
