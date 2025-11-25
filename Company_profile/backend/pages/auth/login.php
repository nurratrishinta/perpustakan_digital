<?php
session_start();
include '../../app.php';
// mengecek apakah user sudah login, jika sudah arahkan ke halaman dashbosrd untuk logout terlebih dahulu
if (isset($_SESSION['email'])) {
    echo "
            <script> 
            alert('Anda harus Logout dahulu');
            window.location.href='../../dashboard/index.php';
            </script>
         ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Login | Simple Template</title> -->
    <link rel="icon" href="assets/img/ft1.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgb(159, 20, 172), rgb(227, 20, 235));
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 350px;
            /* Lebar maksimal form */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 7px 10px rgba(250, 247, 249, 0.87);
            animation: fadeIn 0.8s ease-in-out;
            background: white;
            /* Supaya card jelas */
        }

        .logo {
            width: 80px;
            display: block;
            margin: 0 auto 20px;
        }

        .btn-primary {
            background-color: rgb(244, 79, 250);
            border-color: rgb(180, 49, 219);
        }

        .btn-primary:hover {
            background-color: rgb(95, 17, 105);
            border-color: rgb(110, 18, 75);
        }
    </style>

    <div class="login-card">
        <img src="../../templates-admin/material-dashboard-2/assets/img/lgsmk.jpeg" alt="Logo" class="logo">
        <h5 class="text-center mb-4">Login</h5>
        <form action="../../actions/auth/login.php" method='POST'>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>