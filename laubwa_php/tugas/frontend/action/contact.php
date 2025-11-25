<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../config/connection.php';
include '../../config/escapeString.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $subject = escapeString($_POST['subject']);
    $message = escapeString($_POST['message']);

    $qInsert = "INSERT INTO contacs (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Data berhasil ditambah');
            window.location.href = '../../frontend/?#contact-section';
        </script>
    ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambah: " . mysqli_error($connect) . "');
            window.location.href = '../../frontend/?#contact-section';
        </script>
    ";
    }
}
