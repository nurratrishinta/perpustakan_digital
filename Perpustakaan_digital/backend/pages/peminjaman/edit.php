<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id peminjaman
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Peminjaman tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// ambil data peminjaman berdasarkan id
$qSelect = "SELECT * FROM peminjaman WHERE PeminjamanID = $id";
$res = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

if (mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data peminjaman tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// ambil data user & buku untuk dropdown
$qUser = mysqli_query($connect, "SELECT UserID, Username FROM user ORDER BY Username ASC");
$qBuku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku ORDER BY Judul ASC");

// proses update data peminjaman
if (isset($_POST['submit'])) {
    $UserID = intval($_POST['UserID']);
    $BukuID = intval($_POST['BukuID']);
    $TanggalPeminjaman = mysqli_real_escape_string($connect, $_POST['TanggalPeminjaman']);
    $TanggalPengembalian = mysqli_real_escape_string($connect, $_POST['TanggalPengembalian']);
    $StatusPeminjaman = mysqli_real_escape_string($connect, $_POST['StatusPeminjaman']);

    $qUpdate = "
        UPDATE peminjaman 
        SET 
            UserID = '$UserID', 
            BukuID = '$BukuID', 
            TanggalPeminjaman = '$TanggalPeminjaman', 
            TanggalPengembalian = '$TanggalPengembalian', 
            StatusPeminjaman = '$StatusPeminjaman'
        WHERE PeminjamanID = $id
    ";

    if (mysqli_query($connect, $qUpdate)) {
        echo "<script>alert('Data peminjaman berhasil diperbarui'); window.location.href='./index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!-- CONTENT EDIT PEMINJAMAN -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <!-- Dropdown User -->
                            <div class="mb-3">
                                <label for="UserID" class="form-label">User</label>
                                <select name="UserID" id="UserID" class="form-select" required>
                                    <option value="">-- Pilih User --</option>
                                    <?php while ($u = mysqli_fetch_assoc($qUser)): ?>
                                        <option value="<?= $u['UserID'] ?>" <?= $u['UserID'] == $data['UserID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($u['Username']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <!-- Dropdown Buku -->
                            <div class="mb-3">
                                <label for="BukuID" class="form-label">Judul Buku</label>
                                <select name="BukuID" id="BukuID" class="form-select" required>
                                    <option value="">-- Pilih Buku --</option>
                                    <?php while ($b = mysqli_fetch_assoc($qBuku)): ?>
                                        <option value="<?= $b['BukuID'] ?>" <?= $b['BukuID'] == $data['BukuID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($b['Judul']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <!-- Input tanggal peminjaman -->
                            <div class="mb-3">
                                <label for="TanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" name="TanggalPeminjaman" id="TanggalPeminjaman" class="form-control"
                                    value="<?= htmlspecialchars($data['TanggalPeminjaman']) ?>" required>
                            </div>

                            <!-- Input tanggal pengembalian -->
                            <div class="mb-3">
                                <label for="TanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" name="TanggalPengembalian" id="TanggalPengembalian" class="form-control"
                                    value="<?= htmlspecialchars($data['TanggalPengembalian']) ?>" required>
                            </div>

                            <!-- Input status -->
                            <div class="mb-3">
                                <label for="StatusPeminjaman" class="form-label">Status Peminjaman</label>
                                <select name="StatusPeminjaman" id="StatusPeminjaman" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Dipinjam" <?= $data['StatusPeminjaman'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                                    <option value="Dikembalikan" <?= $data['StatusPeminjaman'] == 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                                    <option value="Terlambat" <?= $data['StatusPeminjaman'] == 'Terlambat' ? 'selected' : '' ?>>Terlambat</option>
                                </select>
                            </div>

                            <!-- Tombol -->
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