<?php
include '../../../config/connection.php'; // pastikan path benar

if (isset($_POST['tombol'])) {
    // Escape input untuk keamanan
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $namalengkap = mysqli_real_escape_string($connect, $_POST['namalengkap']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert ke database
    $qInsert = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat) 
                VALUES ('$username', '$hashedPassword', '$email', '$namalengkap', '$alamat')";

    if (mysqli_query($connect, $qInsert)) {
        echo "
        <script>
            alert('Data user berhasil ditambahkan');
            window.location.href='../../pages/user/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan: " . mysqli_error($connect) . "');
            window.location.href='../../pages/user/create.php';
        </script>
        ";
    }
}
?>
