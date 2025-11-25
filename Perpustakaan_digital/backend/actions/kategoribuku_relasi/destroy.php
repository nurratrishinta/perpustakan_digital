<?php
include_once '../../app.php';
include_once './show.php'; // sudah ambil $relasi berdasarkan id di URL

// hapus data berdasarkan primary key KategoriBukuID
$qDelete = "DELETE FROM kategoribuku_relasi WHERE KategoriBukuID = '$relasi->KategoriBukuID'";
$result  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if ($result) {
    echo "
        <script>    
            alert('Data Relasi Berhasil Dihapus');
            window.location.href='../../pages/kategoribuku_relasi/index.php';
        </script>
    ";
} else {
    echo "
        <script>    
            alert('Data Relasi Gagal Dihapus');
            window.location.href='../../pages/kategoribuku_relasi/index.php';
        </script>
    ";
}
?>
