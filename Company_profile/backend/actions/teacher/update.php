<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $teacher_name = escapeString($_POST['teacher_name']);
    $teacher_major = escapeString($_POST['teacher_major']);
    


    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['teacher_photo']['tmp_name'])) {
        $teacher_photoOld = $_FILES['teacher_photo']['tmp_name'];
        $teacher_photoNew = time() . '.png';

        if (!empty($teacher->teacher_photo) && file_exists($storages . $teacher->teacher_photo)) {
            unlink($storages . $teacher->teacher_photo);
        }

        //  simpan gambar baru
        move_uploaded_file($teacher_photoOld, $storages . $teacher_photoNew);
    }

    $qUpdate = "UPDATE teacher SET teacher_name='$teacher_name', teacher_major='$teacher_major',
        teacher_name='$teacher_name', teacher_photo='$teacher_photoNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/teacher/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/teacher/create.php';
                </script>
            ";
    }
}
?>