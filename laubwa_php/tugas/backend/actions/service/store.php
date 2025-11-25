<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $job = escapeString($_POST['job']);
    $iconOld = $_FILES['icon']['tmp_name'];
    $iconNew = time() . ".png";

    $storages = "../../../storages/service/";
    if (move_uploaded_file($iconOld, $storages . $iconNew)) {
        $qInsert = "INSERT INTO services (job, icon) VALUES
     ('$job','$iconNew')";

        if (mysqli_query($connect, $qInsert)) {
            echo " 
    <script>    
        alert('Data Berhasil ditambah');
        window.location.href='../../pages/service/index.php';
    </script>
            ";
        } else {
            echo "
    <script>    
        alert('Data Gagal Ditambah : " . mysqli_error($connect) . "');
        window.location.href='../../pages/service/create.php';
    </script>
    ";
        }
    }
}
?>