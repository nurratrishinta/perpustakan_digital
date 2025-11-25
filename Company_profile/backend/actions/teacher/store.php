<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $teacher_name = escapeString($_POST['teacher_name']);
    $teacher_major = escapeString($_POST['teacher_major']);

    $teacher_photoOld = $_FILES['teacher_photo']['tmp_name'];
    $teacher_photoNew = time() . ".png";

    $storages = "../../../storages/teacher/";
    if (move_uploaded_file($teacher_photoOld, $storages . $teacher_photoNew)) {

        $qInsert = "INSERT INTO teachers (teacher_name, teacher_major, teacher_photo)
         VALUES('$teacher_name', '$teacher_major', '$teacher_photoNew')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/teacher/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/teacher/create.php';
    </script>
    ";
    }
}
?>