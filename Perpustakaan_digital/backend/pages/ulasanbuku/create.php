<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data user & buku untuk dropdown
$qUser = mysqli_query($connect, "SELECT UserID, username FROM user");
$qBuku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku");

// proses simpan ulasan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $bukuid = $_POST['bukuid'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $qInsert = "INSERT INTO ulasanbuku (UserID, BukuID, Ulasan, Rating) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $qInsert);
    mysqli_stmt_bind_param($stmt, "iisi", $userid, $bukuid, $ulasan, $rating);
    mysqli_stmt_execute($stmt);

    echo "<script>alert('Ulasan berhasil ditambahkan'); window.location.href='./index.php';</script>";
    exit;
}
?>

<!-- FORM TAMBAH ULASAN BUKU -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Ulasan Buku</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Nama User</label>
                        <select name="userid" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            <?php while ($u = mysqli_fetch_assoc($qUser)): ?>
                                <option value="<?= $u['UserID'] ?>"><?= $u['username'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <select name="bukuid" class="form-control" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php while ($b = mysqli_fetch_assoc($qBuku)): ?>
                                <option value="<?= $b['BukuID'] ?>"><?= $b['Judul'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Ulasan</label>
                        <textarea name="ulasan" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Rating</label>
                        <input type="number" name="rating" class="form-control" min="1" max="5" required>
                        <small class="text-muted">Isi nilai rating antara 1 - 5</small>
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