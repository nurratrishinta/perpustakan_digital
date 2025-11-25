<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $major_name = escapeString($_POST['major_name']);
    $major_description = escapeString($_POST['major_description']);
    $head = escapeString($_POST['head']);
    $major_imageOld = $_FILES['major_image']['tmp_name'];
    $major_imageNew = time() . ".png";

    $storages = "../../../storages/major/";
    if (move_uploaded_file($major_imageOld, $storages . $major_imageNew)) {

        $qInsert = "INSERT INTO majors (major_name, major_description, head, major_image) VALUES('$major_name', '$major_description', '$head' , '$major_imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
        <script>    
            alert('Data berhasil ditambah');
            window.location.href='../../pages/major/index.php';
        </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/major/create.php';
    </script>
    ";
    }
}
?>