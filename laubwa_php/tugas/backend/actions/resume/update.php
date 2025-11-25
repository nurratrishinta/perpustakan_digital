<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $date = escapeString($_POST['date']);
    $job = escapeString($_POST['job']);
    $place = escapeString($_POST['place']);
    $description = escapeString($_POST['description']);



    $qUpadate = "UPDATE resumes SET date='$date', job='$job', place='$place',
    description='$description' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpadate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
            <script>    
                alert('Data berhasil ubah');
                window.location.href='../../pages/resume/index.php';
            </script>
            ";
    } else {
        echo " 
            <script>    
                alert('Gagal di ubah');
                window.location.href='../../pages/resume/edit.php';
            </script>
            ";
    }
}
?>