<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // masukkan yang di-hash ke database
    $qInsert = "INSERT INTO users (name, email, password)
                VALUES('$name', '$email', '$hashedPassword')";

    mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
    echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/user/index.php';
    </script>
    ";
} else {
    echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/user/create.php';
    </script>
    ";
}
