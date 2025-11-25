<?php
include '../../app.php';
include './show.php'; // sudah ambil $buku berdasarkan id di URL

// hapus data berdasarkan primary key BukuID
$qDelete = "DELETE FROM buku WHERE BukuID = '$buku->BukuID'";
$result  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if ($result) {
    echo "
        <script>    
            alert('Data Berhasil Dihapus');
            window.location.href='../../pages/buku/index.php';
        </script>
    ";
} else {
    echo "
        <script>    
            alert('Data Gagal Dihapus');
            window.location.href='../../pages/buku/index.php';
        </script>
    ";
}
?>
