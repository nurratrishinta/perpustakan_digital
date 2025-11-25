<?php
session_start();
include '../../app.php';


//  mengecek apakah form dikirim dengan method POST?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
}
$qSelect = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($connect, $qSelect);

// num_rows untuk mengecek apakah ada hasil query tadi, klo ada 1 atau lebih baris yg cocok, artinya email terdaftar di database
if ($result->num_rows > 0) { // num_rows untuk mengecek $result dapet nggak datanya dari database
    $row = $result->fetch_object();
    // password_verify()
    //mencocokan $password input dari user dengan $row->password dari database
    //klo memang cocok benar mana lanjut untuk login
    if (password_verify($password, $row->password)) {
        //menyimpan infromasi user ke session, fungsinya untuk sistem/aplikasi tahu siapa yang sedang login
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $row->username;

        echo "
            <script> 
            alert('Berhasil Login');
            window.location.href='../../pages/dashboard/index.php';
            </script>
            ";
    } else {
        echo "
            <script> 
            alert('Password Salah');
            window.location.href='../../pages/auth/login.php';
            </script>
            ";
    }
} else {
    echo "
            <script> 
            alert('Email Salah/Belum Terdaftar');
            window.location.href='../../pages/auth/login.php';
            </script>
            ";
}
?>