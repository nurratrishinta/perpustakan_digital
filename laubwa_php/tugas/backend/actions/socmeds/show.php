<?php
    if(!isset($_GET['id'])){
        echo "
        <script>
            alert('tidak bisa memilih ID ini');
            window.location.href ='../../pages/socmed/index.php';
        <?script>
        ";
    }

    $id = $_GET['id'];
    $qSelect = "SELECT * FROM socmeds WHERE id= '$id'";
    $result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

    $socmed = $result->fetch_object();
    if(!$socmed){
        die("Data tidak ditemukan");
    }
?>