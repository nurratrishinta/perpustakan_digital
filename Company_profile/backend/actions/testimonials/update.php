<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $status = escapeString($_POST['status']);
    $message = escapeString($_POST['message']);

    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($galleries->image) && file_exists($storages . $galleries->image)) {
            unlink($storages . $galleries->image);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }


    $qUpdate = "UPDATE testimonials SET name='$name',
        status='$status', message='message' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/testimonials/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/testimonials/create.php';
                </script>
            ";
    }
}
?>