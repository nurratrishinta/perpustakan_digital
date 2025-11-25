<?php
include '../../app.php';
include './show.php'; // sudah ambil $peminjaman berdasarkan id di URL

$id = $_GET['id'];
$query = "DELETE FROM peminjaman WHERE PeminjamanID=$id";
mysqli_query($connect, $query);
if ($result) {
    echo "
        <script>    
            alert('Data Berhasil Dihapus');
            window.location.href='../../pages/peminjaman/index.php';
        </script>
    ";
} else {
    echo "
        <script>    
            alert('Data Gagal Dihapus');
            window.location.href='../../pages/peminjaman/index.php';
        </script>
    ";
}
?>
