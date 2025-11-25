<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $major_link = escapeString($_POST['link']);

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($cooperations->image) && file_exists($storages . $cooperations->image)) {
            unlink($storages . $cooperations->image);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE cooperations SET 
        link='$link', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/cooperations/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/cooperations/create.php';
                </script>
            ";
    }
}
?>