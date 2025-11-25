<?php
session_start();
include '../../app.php';
//mengecek apakah form dikirim dengan method post?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
}
$qSelect = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($connect, $qSelect);
// num_rows untuk mengecek apakah ada hasil query tadi, klo ada 1 atau lebih baris yang cocok , artinya email terdaftar didatabase
if ($result->num_rows > 0) { //num_rows untuk mengecek $result dapat gk datanya dari database
    $row = $result->fetch_object();
    if (password_verify($password, $row->password)) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row->name;

        echo " 
        <script>    
             alert('berhasil login');
             window.location.href='../../pages/dashboard/index.php';
        </script>
           ";
    } else {
        echo " 
        <script>    
             alert('password salah');
             window.location.href='../../pages/auth/login.php';
        </script>
           ";
    }
} else {
    echo " 
        <script>    
             alert('email salah/belum terdaftar');
             window.location.href='../../pages/auth/login.php';
        </script>
           ";
}
?>