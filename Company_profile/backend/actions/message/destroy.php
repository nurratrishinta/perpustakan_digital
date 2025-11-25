<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/message";

// Hpus gambar lama jika ada
if (!empty($message->image) && file_exists($storages . $message->image)) {
    unlink($storages . $message->image);
}

// hapus data
$qDelete = "DELETE FROM message WHERE id = '$message->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

//  cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    window.location.href='../../pages/message/index.php';
                </script>
            ";
} else {
    echo "
                <script>
                    alert('Data Gagal Dihapus');
                    window.location.href='../../pages/message/index.php';
                </script>
            ";
}
?>