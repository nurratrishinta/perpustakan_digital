<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/major/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM majors WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$major = $result->fetch_object();
if (!$major) {
    die("Data tidak di temukan");
}
?>