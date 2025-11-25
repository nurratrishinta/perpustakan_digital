<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/user/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM users WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$user = $result->fetch_object();
if (!$user) {
    die("Data tidak di temukan");
}
?>