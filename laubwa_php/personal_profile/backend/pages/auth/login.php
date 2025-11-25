<?php
    session_start();
    include '../../app.php';
  // mengecek apakah user sudah login, jika sudah arahkan ke halaman dashbosrd untuk logout terlebih dahulu
if (isset($_SESSION['email'])) {
    echo "
            <script> 
            alert('Anda harus Logout dahulu');
            window.location.href='../dashboard/index.php';
            </script>
         ";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../templates-admin/templates/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../templates-admin/templates/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../../templates-admin/templates/src/assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Login</p>
                                <form action="../../actions/auth/login.php" method='POST'>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password"  name= "password"  class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Belum punya akun</p>
                                        <a class="text-primary fw-bold ms-2" href="./register.php">Buat Sekarang</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../templates-admin/templates/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../templates-admin/templates/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>