<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? '';
if (!$id) {
    echo "<script>alert('ID relasi tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

// Ambil data relasi berdasarkan ID
$qRelasi = mysqli_query($connect, "
    SELECT * FROM kategoribuku_relasi WHERE KategoriBukuID = '$id'
");
$relasi = mysqli_fetch_assoc($qRelasi);

// Ambil semua data buku & kategori
$buku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku ORDER BY Judul ASC");
$kategori = mysqli_query($connect, "SELECT KategoriID, NamaKategori FROM kategoribuku ORDER BY NamaKategori ASC");

// Jika form disubmit
if (isset($_POST['submit'])) {
    $BukuID = $_POST['BukuID'];
    $KategoriID = $_POST['KategoriID'];

    $update = "
        UPDATE kategoribuku_relasi 
        SET BukuID = '$BukuID', KategoriID = '$KategoriID' 
        WHERE KategoriBukuID = '$id'
    ";

    if (mysqli_query($connect, $update)) {
        echo "<script>alert('Relasi berhasil diperbarui!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui relasi!');</script>";
    }
}
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Edit Relasi Kategori Buku</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <select name="BukuID" class="form-select" required>
                            <?php while ($b = mysqli_fetch_assoc($buku)): ?>
                                <option value="<?= $b['BukuID'] ?>" <?= ($b['BukuID'] == $relasi['BukuID']) ? 'selected' : '' ?>>
                                    <?= $b['Judul'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="KategoriID" class="form-select" required>
                            <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                                <option value="<?= $k['KategoriID'] ?>" <?= ($k['KategoriID'] == $relasi['KategoriID']) ? 'selected' : '' ?>>
                                    <?= $k['NamaKategori'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Update
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