<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id kategori
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = (int) $_GET['id'];

// ambil data kategori berdasarkan ID
$qSelect = "SELECT KategoriID, NamaKategori FROM kategoribuku WHERE KategoriID = ? LIMIT 1";
$stmt = mysqli_prepare($connect, $qSelect);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res || mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// proses update kategori (kalau form dikirim ke halaman ini langsung)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namakategori = trim($_POST['NamaKategori']);

    $qUpdate = "UPDATE kategoribuku SET NamaKategori = ? WHERE KategoriID = ?";
    $stmtUpd = mysqli_prepare($connect, $qUpdate);
    mysqli_stmt_bind_param($stmtUpd, "si", $namakategori, $id);

    if (mysqli_stmt_execute($stmtUpd)) {
        echo "<script>alert('Kategori berhasil diupdate'); window.location.href='./index.php';</script>";
        exit;
    } else {
        echo "Error update: " . mysqli_error($connect);
    }
}
?>

<!-- Content -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Kategori Buku</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="KategoriID" value="<?= htmlspecialchars($data['KategoriID']) ?>">
                            <div class="mb-3">
                                <label for="NamaKategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="NamaKategori" id="NamaKategori" value="<?= htmlspecialchars($data['NamaKategori']) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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