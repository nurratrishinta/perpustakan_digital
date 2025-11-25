<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/headmaster/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM headmasters WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$headmaster = $result->fetch_object();
if (!$headmaster) {
    die("Data tidak di temukan");
}
?>