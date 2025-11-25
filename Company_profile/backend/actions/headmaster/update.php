<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $headmaster_name = escapeString($_POST['headmaster_name']);
    $headmaster_photo = escapeString($_POST['headmaster_photo']);
    $headmaster_description = escapeString($_POST['headmaster_description']);


    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['headmaster_photo']['tmp_name'])) {
        $imageOld = $_FILES['headmaster_photo']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($headmaster->photo) && file_exists($storages . $headmaster->photo)) {
            unlink($storages . $headmaster->photo);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE headmasters SET headmaster_name='$headmaster_name',
        headmaster_description='$headmaster_description', headmaster_image='$headmaster_imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/headmaster/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/headmaster/create.php';
                </script>
            ";
    }
}
?>