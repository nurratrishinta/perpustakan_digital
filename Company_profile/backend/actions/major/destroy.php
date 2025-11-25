<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/major";

// Hpus gambar lama jika ada
if (!empty($major->image) && file_exists($storages . $major->image)) {
    unlink($storages . $major->image);
}

// hapus data
$qDelete = "DELETE FROM majors WHERE id = '$major->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/major/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/major/index.php';
                </script>
            ";
}
