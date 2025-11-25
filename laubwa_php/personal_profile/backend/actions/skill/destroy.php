<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/skill";

// hapus data
$qDelete = "DELETE FROM skills WHERE id = '$skill->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
            <script>    
                alert('Data Berhasil Dihapus');
                window.location.href='../../pages/skill/index.php';
            </script>
            ";
} else {
    echo " 
            <script>    
                alert(' Data Gagal Dihapus');
                window.location.href='../../pages/skill/index.php';
            </script>
            ";
}
?>