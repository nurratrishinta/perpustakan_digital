<?php
if (!isset($_GET['id'])) {
    echo "
        <script>
            alert('tidak bisa memilih ID ini');
            window.location.href ='../../pages/contacs/index.php';
        <?script>
        ";
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM contacs WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$contacs = $result->fetch_object();
if (!$contacs) {
    die("Data tidak ditemukan");
}
