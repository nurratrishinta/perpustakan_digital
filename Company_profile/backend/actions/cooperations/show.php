<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/cooperations/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM cooperations WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$cooperations = $result->fetch_object();
if (!$cooperations) {
    die("Data tidak di temukan");
}
