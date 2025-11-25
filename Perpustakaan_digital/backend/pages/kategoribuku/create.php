<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// proses simpan kategori
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namakategori = $_POST['namakategori'];

    $qInsert = "INSERT INTO kategoribuku (NamaKategori) VALUES (?)";
    $stmt = mysqli_prepare($connect, $qInsert);
    mysqli_stmt_bind_param($stmt, "s", $namakategori);
    mysqli_stmt_execute($stmt);

    echo "<script>alert('Kategori berhasil ditambahkan'); window.location.href='./index.php';</script>";
    exit;
}
?>

<!-- FORM TAMBAH KATEGORI -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Kategori Buku</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Nama Kategori</label>
                        <input type="text" name="namakategori" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="./index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>