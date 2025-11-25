<?php
include '../../app.php';
include './show.php';

// Hapus data
$qDelete = "DELETE FROM socmeds WHERE id = '$socmed->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
         <script>    
            alert('Data berhasil dihapus');
            window.location.href='../../pages/socmed/index.php';
        </script>
            ";
} else {
    echo "
         <script>    
            alert('Data gagal dihapus');
            window.location.href='../../pages/socmed/index.php';
         </script>
     ";
}
?>