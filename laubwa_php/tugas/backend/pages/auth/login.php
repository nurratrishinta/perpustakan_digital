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
            background: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            padding-top: 100px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            width: 120px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card">
            <div class="card-body">
                <img src="../../template-admin/assets/img/ft1.jpg" alt="Logo" class="logo">
                <h5 class="text-center mb-4"> Login</h5>
                <form action="../../actions/auth/login.php" method='POST'>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">Belum punya akun</p>
                    </div>
                    <a class="text-primary fw-bold ms-2" href="./register.php">Buat Sekarang</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>