<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $headmaster_name = escapeString($_POST['headmaster_name']);
    $headmaster_description = escapeString($_POST['headmaster_description']);

    $headmaster_photoOld = $_FILES['headmaster_photo']['tmp_name'];
    $headmaster_photoNew = time() . ".png";

    $storages = "../../../storages/headmaster/";
    if (move_uploaded_file($headmaster_photoOld, $storages . $headmaster_photoNew)) {

        $qInsert = "INSERT INTO headmasters (headmaster_name, headmaster_description, headmaster_photo)
         VALUES('$headmaster_name', '$headmaster_description' , '$headmaster_photoNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/headmaster/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/headmaster/create.php';
    </script>
    ";
    }
}
?>