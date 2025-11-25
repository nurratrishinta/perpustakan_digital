<?php
require_once __DIR__ . '/../../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $alamat = trim($_POST['alamat']);

    $check = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, password, email, nama_lengkap, alamat, role)
                  VALUES ('$username', '$hashedPassword', '$email', '$nama_lengkap', '$alamat', 'peminjam')";

        if (mysqli_query($connect, $query)) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal mendaftar, coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register | Perpustakaan Digital</title>
    <link rel="icon" type="image/png" sizes="128x128" href="../../templates-admin/assets/img/favicon/a1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* === BACKGROUND BODY === */
        body {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6, #60a5fa);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* === CARD STYLE === */
        .register-card {
            width: 400px;
            border-radius: 15px;
            background: linear-gradient(160deg, #c7d2fe 0%, #dbeafe 50%, #e0f2fe 100%);
            color: #1e293b;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .register-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        h4 {
            color: #1e293b;
            font-weight: 700;
        }

        .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
        }

        a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        label {
            color: #334155;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="card register-card shadow-lg p-4">
       

        <h4 class="text-center mb-3">Daftar Akun Aplikasi Perpustakaan Digital</h4>

        <?php if (!empty($error)) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Daftar',
                    text: '<?= htmlspecialchars($error, ENT_QUOTES) ?>',
                    confirmButtonColor: '#2563eb'
                });
            </script>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-2">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" rows="2" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>

            <div class="text-center">
                <small>Sudah punya akun?
                    <a href="login.php">Login di sini</a>
                </small>
            </div>
        </form>
    </div>
</body>

</html>