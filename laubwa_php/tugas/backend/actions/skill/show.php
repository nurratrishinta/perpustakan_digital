<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/skill/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM skills WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$skill = $result->fetch_object();
if (!$skill) {
    die("Data tidak di temukan");
}
?>