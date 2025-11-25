<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/user";

// Hpus gambar lama jika ada
if (!empty($user->image) && file_exists($storages . $user->image)) {
    unlink($storages . $user->image);
}

// hapus data
$qDelete = "DELETE FROM users WHERE id = '$user->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/user/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/user/index.php';
                </script>
            ";
}
?>