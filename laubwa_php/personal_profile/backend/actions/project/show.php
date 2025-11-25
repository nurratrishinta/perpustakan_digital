<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/project/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM projects WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$project = $result->fetch_object();
if (!$project) {
    die("Data tidak di temukan");
}
