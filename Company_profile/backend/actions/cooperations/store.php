<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $link = escapeString($_POST['link']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/cooperations/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO cooperations( link, image)
         VALUES('$link', '$imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/cooperations/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/cooperations/create.php';
    </script>
    ";
    }
}
?>