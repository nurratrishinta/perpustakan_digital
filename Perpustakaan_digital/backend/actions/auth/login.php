<?php
session_start();
require_once __DIR__ . '/../../../config/connection.php';

$error = '';
$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, trim($_POST['username'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = "Username dan password wajib diisi!";
    } else {
        $query = mysqli_query($connect, "SELECT * FROM user WHERE Username = '$username' LIMIT 1");

        if ($query && mysqli_num_rows($query) > 0) {
            $user = mysqli_fetch_assoc($query);

            if (isset($user['Password']) && !empty($user['Password'])) {
                if (password_verify($password, $user['Password'])) {

                    $_SESSION['UserID'] = $user['UserID'];
                    $_SESSION['Username'] = $user['Username'];
                    $_SESSION['NamaLengkap'] = $user['NamaLengkap'] ?? '';

                    $usernameLower = strtolower(trim($user['Username']));

                    if ($usernameLower === 'admin') {
                        $_SESSION['login_success'] = "Berhasil login sebagai Admin!";
                        header("Location: ../../pages/dashboard/index.php");
                        exit;
                    } elseif ($usernameLower === 'petugas') {
                        $_SESSION['login_success'] = "Berhasil login sebagai Petugas!";
                        header("Location: ../../pages/buku/index.php");
                        exit;
                    } else {
                        $_SESSION['login_success'] = "Berhasil login sebagai Peminjam!";
                        header("Location: ../../pages/peminjaman/index.php");
                        exit;
                    }
                } else {
                    $error = "Password salah!";
                }
            } else {
                $error = "Data user tidak valid (kolom password kosong)!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login | Perpustakaan Digital</title>
    <link rel="icon" type="image/png" sizes="128x128" href="../../templates-admin/assets/img/favicon/a1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* === BODY BACKGROUND === */
        body {
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* === LOGIN CARD === */
        .login-card {
            width: 380px;
            border-radius: 15px;
            background: linear-gradient(160deg, #cbd5f5, #dbeafe, #e0e7ff);
            background: linear-gradient(160deg, #b0b9ff 0%, #d9dfff 40%, #e7eafc 100%);
            color: #1e293b;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .login-card:hover {
            transform: translateY(-3px);
        }

        .login-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        h3 {
            color: #1e293b;
            font-weight: 700;
        }

        .btn-login {
            background: linear-gradient(90deg,rgb(33, 88, 177), #1e40af);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solidrgb(35, 88, 153);
        }

        .form-control:focus {
            border-color:rgb(118, 152, 207);
            box-shadow: 0 0 0 0.2rem rgba(155, 178, 216, 0.25);
        }

        a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .sub-link {
            color: #475569;
        }
    </style>
</head>

<body>
    <div class="card login-card shadow-lg p-4 text-center">
        <img src="../../templates-admin/assets/img/favicon/icon.png" alt="Logo" class="mx-auto mb-3">
        <h4 class="fw-bold mb-1">Selamat Datang Di Aplikasi Perpustakaan Digital</h4>
        <p class="mb-4 text-muted">Silahkan Login Dullu!!</p>

        <?php if (!empty($error)) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Login',
                    text: '<?= htmlspecialchars($error, ENT_QUOTES) ?>',
                    confirmButtonColor: '#2563eb'
                });
            </script>
        <?php endif; ?>

        <form method="POST" autocomplete="off">
            <div class="mb-3 text-start">
                <input type="text" name="username" class="form-control" placeholder="Username"
                    required value="<?= htmlspecialchars($username, ENT_QUOTES) ?>">
            </div>
            <div class="mb-3 text-start">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>

            
        </form>
    </div>
</body>

</html>