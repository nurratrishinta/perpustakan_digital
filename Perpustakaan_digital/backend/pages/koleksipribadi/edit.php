<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id koleksi
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Koleksi tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// ambil data koleksi berdasarkan id
$qSelect = "SELECT * FROM koleksipribadi WHERE KoleksiID = $id";
$res = mysqli_query($connect, $qSelect) or die("Query error: " . mysqli_error($connect));

if (mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data koleksi tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// ambil data user & buku untuk dropdown
$qUser = mysqli_query($connect, "SELECT UserID, Username FROM user ORDER BY Username ASC");
$qBuku = mysqli_query($connect, "SELECT BukuID, Judul FROM buku ORDER BY Judul ASC");

// proses update data koleksi
if (isset($_POST['submit'])) {
    $UserID = intval($_POST['UserID']);
    $BukuID = intval($_POST['BukuID']);

    $qUpdate = "
        UPDATE koleksipribadi 
        SET UserID = '$UserID', BukuID = '$BukuID'
        WHERE KoleksiID = $id
    ";

    if (mysqli_query($connect, $qUpdate)) {
        echo "<script>alert('Data koleksi berhasil diperbarui'); window.location.href='./index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>

<!-- CONTENT EDIT KOLEKSI -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Koleksi Pribadi</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
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