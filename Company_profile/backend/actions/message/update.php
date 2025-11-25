<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $message = escapeString($_POST['message']);


    $qUpdate = "UPDATE message SET name='$name',
        email='$email', message='$message',' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/message/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/message/create.php';
                </script>
            ";
    }
}
?>