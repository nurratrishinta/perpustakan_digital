<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $major_name = escapeString($_POST['major_name']);
    $major_image = escapeString($_POST['major_image']);
    $major_description = escapeString($_POST['major_description']);
    $head = escapeString($_POST['head']);

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        if (!empty($blog->image) && file_exists($storages . $blog->image)) {
            unlink($storages . $blog->image);
        }

        //  simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE blogs SET title='$title',
        content='$content', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/blog/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/blog/create.php';
                </script>
            ";
    }
}
?>