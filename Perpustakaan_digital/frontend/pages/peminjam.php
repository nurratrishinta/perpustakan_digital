<?php
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

<!-- FORM TAMBAH PEMINJAMAN TANPA CARD -->
<div id="peminjaman" class="body-wrapper py-5 px-3" style="background: linear-gradient(135deg, rgb(37, 63, 122), #dde7f5); min-height: 100vh;">
    <div class="container-fluid" style="max-width: 900px;">
        <h4 class="mb-4 fw-semibold text-dark">Tambah Peminjaman</h4>
        <form method="POST" class="needs-validation" novalidate>

            <!-- Dropdown Nama Peminjam -->
            <div class="mb-3">
                <label class="form-label">Nama Peminjam</label>
                <select name="userid" class="form-select" required>
                    <option value="">-- Pilih User --</option>
                    <?php while ($u = mysqli_fetch_assoc($qUser)): ?>
                        <option value="<?= $u['UserID'] ?>"><?= htmlspecialchars($u['username']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Dropdown Buku -->
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <select name="bukuid" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php while ($b = mysqli_fetch_assoc($qBuku)): ?>
                        <option value="<?= $b['BukuID'] ?>"><?= htmlspecialchars($b['Judul']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggalpinjam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggalkembali" class="form-control">
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Dikembalikan">Dikembalikan</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="./index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>