<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $link_url = escapeString($_POST['link_url']);
    $contact = escapeString($_POST['contact']);
    $imgOld = $_FILES['img']['tmp_name'];
    $imgNew = time() . ".png";

    $storages = "../../../storages/contact/";
    if (move_uploaded_file($imgOld, $storages . $imgNew)) {
        $qInsert = "INSERT INTO contacts(link_url, contact, img)
         VALUES('$link_url', '$contact', '$imgNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/contact/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/contact/create.php';
    </script>
    ";
    }
}
?>