<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $announcement_title = escapeString($_POST['announcement_title']);
    $announcement_image = escapeString($_POST['announcement_image']);
    $announcement_description = escapeString($_POST['announcement_description']);

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['announcement_image']['tmp_name'])) {
        $announcement_imageOld = $_FILES['announcement_image']['tmp_name'];
        $announcement_imageNew = time() . '.png';

        if (!empty($announcement->announcement_image) && file_exists($storages . $announcement->announcement_image)) {
            unlink($storages . $announcement->announcement_image);
        }

        //  simpan gambar baru
        move_uploaded_file($announcement_imageOld, $storages . $announcement_imageNew);
    }

    $qUpdate = "UPDATE announcements SET announcement_title='$announcement_title',
        announcement_description='$announcement_description', announcement_image='$announcement_imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/announcement/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/announcement/create.php';
                </script>
            ";
    }
}
?>