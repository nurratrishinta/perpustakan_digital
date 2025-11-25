<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Ambil data buku & kategori untuk dropdown
$buku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku ORDER BY Judul ASC");
$kategori = mysqli_query($connect, "SELECT KategoriID, NamaKategori FROM kategoribuku ORDER BY NamaKategori ASC");

// Jika form disubmit
if (isset($_POST['submit'])) {
    $BukuID = $_POST['BukuID'];
    $KategoriID = $_POST['KategoriID'];

    $query = "INSERT INTO kategoribuku_relasi (BukuID, KategoriID) VALUES ('$BukuID', '$KategoriID')";
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Relasi berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan relasi!');</script>";
    }
}
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Relasi Kategori Buku</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <select name="BukuID" class="form-select" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php while ($b = mysqli_fetch_assoc($buku)): ?>
                                <option value="<?= $b['BukuID'] ?>"><?= $b['Judul'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="KategoriID" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                                <option value="<?= $k['KategoriID'] ?>"><?= $k['NamaKategori'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>