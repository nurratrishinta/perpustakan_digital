<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/announcement/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM announcements WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$announcement = $result->fetch_object();
if (!$announcement) {
    die("Data tidak di temukan");
}
?>