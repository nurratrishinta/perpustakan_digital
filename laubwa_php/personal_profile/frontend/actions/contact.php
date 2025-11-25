<?php
include '../../config/connection.php';
include '../../config/escapeString.php';

if  (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $subject = escapeString($_POST['subject']);
    $message = escapeString($_POST['message']);

    $qInsert = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Data berhasil dikirim');
            window.location.href = '../index.php';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href = '';
        </script>
    ";
    }
}
?>