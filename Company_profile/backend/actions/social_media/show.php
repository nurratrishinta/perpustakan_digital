<?php
if (!isset($_GET['id'])) {
    echo "
            <script>
                alert('Tidak bisa memilih ID ini');
                window.location.href = '../../pages/social_media/index.php';
            <script>

        ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM social_media WHERE id= '$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$social_media = $result->fetch_object();
if (!$social_media) {
    die("Data tidak di temukan");
}
