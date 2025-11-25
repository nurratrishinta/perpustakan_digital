<?php
include '../../app.php';

//  mengecek apakah form dikirim dengan method POST?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // htmlspecialchars() digunakan untuk mencegah input anomali dari user
    // password_hash() digunakan untuk meng-enkripsi password dengan aman (bcrypt default)
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}
    $qInsert = "INSERT INTO users(username, email, password) VALUES('$username','$email', '$password')";
    
    
    if(mysqli_query($connect, $qInsert)){
    echo "
    <script>
        alert('Akun berhasil dibuat, silahkan login');
        window.location.href = '../../pages/auth/login.php';
    </script>
    ";
    } else {
    echo "
    <script>
        alert('Akun Gagal Dibuat : " . mysqli_error($connect)."');
        window.location.href = '../../pages/auth/register.php';
    </script>
        ";
        }       
?>