<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Ambil data user & buku untuk dropdown
$user = mysqli_query($connect, "SELECT UserID, NamaLengkap FROM user ORDER BY NamaLengkap ASC");
$buku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku ORDER BY Judul ASC");

// Jika form disubmit
if (isset($_POST['submit'])) {
    $UserID = $_POST['UserID'];
    $BukuID = $_POST['BukuID'];

    $query = "INSERT INTO koleksipribadi (UserID, BukuID) VALUES ('$UserID', '$BukuID')";
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Koleksi berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan koleksi!');</script>";
    }
}
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Koleksi Pribadi</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <select name="UserID" class="form-select" required>
                            <option value="">-- Pilih User --</option>
                            <?php while ($u = mysqli_fetch_assoc($user)): ?>
                                <option value="<?= $u['UserID'] ?>"><?= $u['NamaLengkap'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <select name="BukuID" class="form-select" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php while ($b = mysqli_fetch_assoc($buku)): ?>
                                <option value="<?= $b['BukuID'] ?>"><?= $b['Judul'] ?></option>
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