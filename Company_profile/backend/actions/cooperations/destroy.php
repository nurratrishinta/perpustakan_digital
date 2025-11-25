<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/cooperations";

// Hpus gambar lama jika ada
if (!empty($cooperations->image) && file_exists($storages . $cooperations->image)) {
    unlink($storages . $cooperations->image);
}

// hapus data
$qDelete = "DELETE FROM cooperations WHERE id = '$cooperations->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/cooperations/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/cooperations/index.php';
                </script>
            ";
}
?>