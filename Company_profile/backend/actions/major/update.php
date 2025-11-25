<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $major_name = escapeString($_POST['major_name']);
    $major_description = escapeString($_POST['major_description']);
    $head = escapeString($_POST['head']);

    $major_imageOld = $major->major_image;
    $major_imageNew = $major->major_image;

    $storages = "../../../storages/major/";

    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['major_image']['tmp_name'])) {
        $major_imageOld = $_FILES['major_image']['tmp_name'];
        $major_imageNew = time() . '.png';

        if (!empty($major->major_image) && file_exists($storages . $major->major_image)) {
            unlink($storages . $major->major_image);
        }

        //  simpan gambar baru
        move_uploaded_file($major_imageOld, $storages . $major_imageNew);
    }

    $qUpdate = "UPDATE majors SET major_name='$major_name', head='$head',
        major_description='$major_description', major_image='$major_imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/major/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/major/create.php';
                </script>
            ";
    }
}
?>