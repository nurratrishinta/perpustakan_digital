<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $skill = escapeString($_POST['skill']);
    $percent = escapeString($_POST['percent']);
    $description = escapeString($_POST['description']);



    $qUpadate = "UPDATE skills SET skill='$skill', percent='$percent', description='$description' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpadate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
            <script>    
                alert('Data berhasil ubah');
                window.location.href='../../pages/skill/index.php';
            </script>
            ";
    } else {
        echo " 
            <script>    
                alert('Gagal di ubah');
                window.location.href='../../pages/skill/edit.php';
            </script>
            ";
    }
}
?>