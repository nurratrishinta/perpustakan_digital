<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $announcement_title = escapeString($_POST['announcement_title']);
    $announcement_description = escapeString($_POST['announcement_description']);

    $announcement_imageOld = $_FILES['announcement_image']['tmp_name'];
    $announcement_imageNew = time() . ".png";

    $storages = "../../../storages/announcement/";
    if (move_uploaded_file($announcement_imageOld, $storages . $announcement_imageNew)) {
        $qInsert = "INSERT INTO announcements (announcement_title, announcement_description, announcement_image)
         VALUES('$announcement_title', '$announcement_description', '$announcement_imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/announcement/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/announcement/create.php';
    </script>
    ";
    }
}
?>