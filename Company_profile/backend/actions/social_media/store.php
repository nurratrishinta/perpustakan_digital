<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $iconOld = $_FILES['icon']['tmp_name'];
    $iconNew = time() . ".png";
    $link_url = escapeString($_POST['link_url']);

    $storages = "../../../storages/social_media/";
    if (move_uploaded_file($iconOld, $storages . $iconNew)) {
        $qInsert = "INSERT INTO social_media (title, icon, link_url ) VALUES('$title', '$iconNew', '$link_url' )";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/social_media/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/social_media/create.php';
    </script>
    ";
    }
}