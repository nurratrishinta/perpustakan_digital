<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id user
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// ambil data user berdasarkan id
$qSelect = "SELECT * FROM user WHERE UserID = $id";
$res = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

if (mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data user tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// proses update data user
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $namalengkap = mysqli_real_escape_string($connect, $_POST['namalengkap']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

    // cek apakah password diisi
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $qUpdate = "UPDATE user 
                    SET Username='$username', Password='$password', Email='$email', NamaLengkap='$namalengkap', Alamat='$alamat' 
                    WHERE UserID=$id";
    } else {
        $qUpdate = "UPDATE user 
                    SET Username='$username', Email='$email', NamaLengkap='$namalengkap', Alamat='$alamat' 
                    WHERE UserID=$id";
    }

    if (mysqli_query($connect, $qUpdate)) {
        echo "<script>alert('Data user berhasil diperbarui'); window.location.href='./index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!-- CONTENT EDIT USER -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="<?= htmlspecialchars($data['Username']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="<?= htmlspecialchars($data['Email']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="namalengkap" id="namalengkap" class="form-control"
                                    value="<?= htmlspecialchars($data['NamaLengkap']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3"><?= htmlspecialchars($data['Alamat']) ?></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                            <a href="./index.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>