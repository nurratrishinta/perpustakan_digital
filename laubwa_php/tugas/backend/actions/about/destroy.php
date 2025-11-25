<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/about/";

// hapus gambar lama jika ada
if (!empty($abot->image) && file_exists($storages . $about->image)){
    unlink($storages . $about->image);
}

// hapus data
$qDelete = "DELETE FROM abouts WHERE id = '$about->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
            <script>    
                alert('Data Berhasil Dihapus');
                window.location.href='../../pages/about/index.php';
            </script>
            ";
} else {
    echo " 
            <script>    
                alert(' Data Gagal Dihapus');
                window.location.href='../../pages/about/index.php';
            </script>
            ";
}
?>