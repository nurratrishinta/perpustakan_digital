<?php

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

<!-- FORM TAMBAH ULASAN BUKU LEBAR -->
<div id="ulasanbuku" class="body-wrapper py-5 px-3" style="background: linear-gradient(135deg, rgb(37, 63, 122), #dde7f5); min-height: 100vh;">
    <div class="container-fluid" style="max-width: 960px;">
        <h4 class="mb-4 text-dark fw-semibold">Tambah Ulasan Buku</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama User</label>
                <select name="userid" class="form-select" required>
                    <option value="">-- Pilih User --</option>
                    <?php while ($u = mysqli_fetch_assoc($qUser)): ?>
                        <option value="<?= $u['UserID'] ?>"><?= htmlspecialchars($u['username']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <select name="bukuid" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php while ($b = mysqli_fetch_assoc($qBuku)): ?>
                        <option value="<?= $b['BukuID'] ?>"><?= htmlspecialchars($b['Judul']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Ulasan</label>
                <textarea name="ulasan" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" required>
                <small class="text-muted">Isi nilai rating antara 1 - 5</small>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="./index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
