<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/teacher/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM teachers WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$teacher = $result->fetch_object();
if (!$teacher) {
    die("Data tidak di temukan");
}
?>