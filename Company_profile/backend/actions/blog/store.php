<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $content = escapeString($_POST['content']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/blog/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO blogs(title, content, image)
         VALUES('$title', '$content', '$imageNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/blog/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/blog/create.php';
    </script>
    ";
    }
}
?>