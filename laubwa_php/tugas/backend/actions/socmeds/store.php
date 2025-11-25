<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $iconOld = $_FILES['icon']['tmp_name'];
    $iconNew = time() . ".png";
    $link = escapeString($_POST['link']);

    $storages = "../../../storages/socmed/";
    if (move_uploaded_file($iconOld, $storages . $iconNew)) {
        $qInsert = "INSERT INTO socmeds (link, icon) VALUES('$link','$iconNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data Berhasil ditambah');
        window.location.href='../../pages/socmed/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data Gagal Ditambah');
        window.location.href='../../pages/socmed/create.php';
    </script>
    ";
    }
}
?>