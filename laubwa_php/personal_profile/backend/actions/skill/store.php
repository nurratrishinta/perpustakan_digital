<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $skill = escapeString($_POST['skill']);
    $percent = escapeString($_POST['percent']);


    $qInsert = "INSERT INTO skills(skill, percent) VALUES ('$skill','$percent')";

    if (mysqli_query($connect, $qInsert)) {
        echo " 
    <script>    
        alert('Data Berhasil ditambah');
        window.location.href='../../pages/skill/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data Gagal Ditambah : " . mysqli_error($connect) . "');
        window.location.href='../../pages/skill/create.php';
    </script>
    ";
    }
}
?>