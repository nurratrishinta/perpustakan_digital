<?php
include '../../app.php';
include './show.php';


// hapus data
$qDelete = "DELETE FROM services WHERE id = '$service->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
            <script>    
                alert('Data Berhasil Dihapus');
                window.location.href='../../pages/service/index.php';
            </script>
            ";
} else {
    echo " 
            <script>    
                alert(' Data Gagal Dihapus');
                window.location.href='../../pages/service/index.php';
            </script>
            ";
}
?>