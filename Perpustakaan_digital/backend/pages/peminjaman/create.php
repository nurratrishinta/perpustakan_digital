<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ambil data user & buku untuk dropdown
$qUser = mysqli_query($connect, "SELECT UserID, username FROM user");
$qBuku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku");

// proses simpan peminjaman
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $bukuid = $_POST['bukuid'];
    $tglpinjam = $_POST['tanggalpinjam'];
    $tglkembali = $_POST['tanggalkembali'];
    $status = $_POST['status'];

    $qInsert = "INSERT INTO peminjaman 
                (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) 
                VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connect, $qInsert);
    mysqli_stmt_bind_param($stmt, "iisss", $userid, $bukuid, $tglpinjam, $tglkembali, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Peminjaman berhasil ditambahkan'); window.location.href='./index.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!-- FORM TAMBAH PEMINJAMAN -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Peminjaman</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <!-- <div class="mb-3">
                        <label>Nama Peminjam</label>
                        <select name="userid" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            <?php while ($u = mysqli_fetch_assoc($qUser)): ?>
                                <option value="<?= $u['UserID'] ?>"><?= $u['username'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div> -->
                    <div class="mb-3">
                        <label>Buku</label>
                        <select name="bukuid" class="form-control" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php while ($b = mysqli_fetch_assoc($qBuku)): ?>
                                <option value="<?= $b['BukuID'] ?>"><?= $b['Judul'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggalpinjam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggalkembali" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
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