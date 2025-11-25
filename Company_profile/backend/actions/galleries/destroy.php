<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/galleries";

// Hpus gambar lama jika ada
if (!empty($galleries->image) && file_exists($storages . $galleries->image)) {
    unlink($storages . $galleries->image);
}

// hapus data
$qDelete = "DELETE FROM galleries WHERE id = '$galleries->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/galleries/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/galleries/index.php';
                </script>
            ";
}
?>