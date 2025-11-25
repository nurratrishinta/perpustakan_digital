<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/headmaster";

// Hpus gambar lama jika ada
if (!empty($headmaster->image) && file_exists($storages . $headmaster->image)) {
    unlink($storages . $headmaster->image);
}

// hapus data
$qDelete = "DELETE FROM headmasters WHERE id = '$headmaster->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/headmaster/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/headmaster/index.php';
                </script>
            ";
}
?>