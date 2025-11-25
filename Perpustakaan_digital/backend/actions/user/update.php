<?php
include '../../../config/connection.php';

if (!isset($_GET['id'])) {
    die("UserID tidak ditemukan!");
}

$UserID = intval($_GET['id']);

// Ambil data dari form
$username    = mysqli_real_escape_string($connect, $_POST['username']);
$password    = mysqli_real_escape_string($connect, $_POST['password']);
$email       = mysqli_real_escape_string($connect, $_POST['email']);
$namalengkap = mysqli_real_escape_string($connect, $_POST['namalengkap']);
$alamat      = mysqli_real_escape_string($connect, $_POST['alamat']);

// 🔹 Ambil data lama sebelum diupdate
$qOld = mysqli_query($connect, "SELECT * FROM user WHERE UserID = $UserID");
if (!$qOld || mysqli_num_rows($qOld) == 0) {
    die("Data user tidak ditemukan!");
}
$oldData = mysqli_fetch_assoc($qOld);

// 🔹 Jika password diubah, hash ulang; kalau kosong, tetap pakai lama
if (!empty($password)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
} else {
    $hashedPassword = $oldData['Password'];
}

// 🔹 Update data user
$qUpdateUser = "
    UPDATE user 
    SET Username = '$username',
        Password = '$hashedPassword',
        Email = '$email',
        NamaLengkap = '$namalengkap',
        Alamat = '$alamat'
    WHERE UserID = $UserID
";

if (mysqli_query($connect, $qUpdateUser)) {
    echo "
    <script>
        alert('Data user berhasil diubah');
        window.location.href='../../pages/user/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Gagal mengubah data: " . mysqli_error($connect) . "');
        window.location.href='../../pages/user/edit.php?id=$UserID';
    </script>
    ";
}
?>
