<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $status = escapeString($_POST['status']);
    $message = escapeString($_POST['message']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";


    $storages = "../../../storages/testimonials/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO testimonials (name, status, message, image)
         VALUES('$name', '$status', '$message', '$imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/testimonials/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/testimonials/create.php';
    </script>
    ";
    }
} 
?>