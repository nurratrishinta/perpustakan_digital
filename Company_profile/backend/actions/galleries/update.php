<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $description = escapeString($_POST['description']);

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($galleries->image) && file_exists($storages . $galleries->image)) {
            unlink($storages . $galleries->image);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE galleries SET 
        description='$description', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/galleries/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/galleries/create.php';
                </script>
            ";
    }
}
?>