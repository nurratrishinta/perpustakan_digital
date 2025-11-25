<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/testimonials";

// Hpus gambar lama jika ada
if (!empty($testimonials->image) && file_exists($storages . $testimonials->image)) {
    unlink($storages . $testimonials->image);
}

// hapus data
$qDelete = "DELETE FROM testimonials WHERE id = '$testimonials->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/testimonials/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/testimonials/index.php';
                </script>
            ";
}
?>