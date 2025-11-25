<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/blog";

// Hpus gambar lama jika ada
if (!empty($blog->image) && file_exists($storages . $blog->image)) {
    unlink($storages . $blog->image);
}

// hapus data
$qDelete = "DELETE FROM blogs WHERE id = '$blog->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/blog/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/blog/index.php';
                </script>
            ";
}
?>