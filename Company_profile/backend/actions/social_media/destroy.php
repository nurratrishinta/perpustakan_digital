<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/social_media";

// Hpus gambar lama jika ada
if (!empty($social_media->image) && file_exists($storages . $social_media->image)) {
    unlink($storages . $social_media->image);
}

// hapus data
$qDelete = "DELETE FROM social_media WHERE id = '$social_media->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/social_media/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/social_media/index.php';
                </script>
            ";
}
?>