<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $description = escapeString($_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/achievements/";

    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO achievements ( title, description, image) VALUES ( '$title', '$description', '$imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
            <script>    
                alert('Data berhasil ditambah');
                window.location.href='../../pages/achievements/index.php';
            </script>
         ";
    } else {
        echo "
            <script>    
                alert('Data gagal ditambah');
                window.location.href='../../pages/achievements/create.php';
            </script>
         ";
    }
}
?>