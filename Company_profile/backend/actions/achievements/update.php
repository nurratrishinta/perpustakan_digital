<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $description = escapeString($_POST['description']);


    $imageNew = $achievements->image;
    $storages = "../../../storages/achievements/";

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($achievements->image) && file_exists($storages . $achievements->image)) {
            unlink($storages . $achievements->image);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE achievements SET  title='$title', description='$description', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/achievements/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/achievements/create.php';
                </script>
            ";
    }
}
?>