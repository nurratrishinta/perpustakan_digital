<?php
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('tidak bisa memilih ID ini');
            window.location.href ='../../pages/about/index.php';
        <?script>
        ";
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM abouts WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$about = $result->fetch_object();
if (!$about) {
    die("Data tidak ditemukan");
}
