<?php
    if (!isset($_GET['id'])) {
        echo "
        <script>
            alert('tidak bisa memilih ID ini');
            window.location.href ='../../pages/service/index.php';
        <script>
        ";
    }

    $id = $_GET['id'];
    $qSelect = "SELECT * FROM services WHERE id= '$id'";
    $result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

    $service = $result->fetch_object();
    if (!$service) {
        die("Data tidak ditemukan");
    }
    ?>