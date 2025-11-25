<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $category = escapeString($_POST['category']);
    $text = escapeString($_POST['text']);


    $qUpdate = "UPDATE visi_missions SET category='$category', text='$text' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
         <script>    
            alert('Data berhasil diubah');
            window.location.href='../../pages/visi_mission/index.php';
        </script>
            ";
    } else {
        echo "
         <script>    
            alert('Data gagal diubah');
            window.location.href='../../pages/visi_mission/create.php';
         </script>
     ";
    }
}
?>