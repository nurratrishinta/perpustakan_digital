<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// cek id
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$id = (int) $_GET['id'];

// ambil data berdasarkan id
$qSelect = "SELECT 
                BukuID AS id, 
                Judul AS judul, 
                Penulis AS penulis, 
                Penerbit AS penerbit, 
                TahunTerbit AS tahunterbit,
                Stok AS stok,
                jumlah_buku,
                sinopsis,
                image
            FROM buku
            WHERE BukuID = ?
            LIMIT 1";

$stmt = mysqli_prepare($connect, $qSelect);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res || mysqli_num_rows($res) === 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href='./index.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($res);

// proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul       = trim($_POST['judul']);
    $penulis     = trim($_POST['penulis']);
    $penerbit    = trim($_POST['penerbit']);
    $tahunterbit = (int) $_POST['tahunterbit'];
    $stok        = (int) $_POST['stok'];
    $jumlah_buku = (int) $_POST['jumlah_buku'];
    $sinopsis    = trim($_POST['sinopsis']);

    // Proses upload gambar
    $gambarBaru = $_FILES['image']['name'] ?? '';
    $gambarLama = $_POST['gambar_lama'];

    if ($gambarBaru) {
        $targetDir = "../../../uploads/";
        $fileName = time() . "_" . basename($gambarBaru);
        $targetFilePath = $targetDir . $fileName;

        // validasi sederhana (opsional)
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowed)) {
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
            $finalImage = $fileName;
        } else {
            echo "<script>alert('Format gambar tidak didukung!');</script>";
            $finalImage = $gambarLama;
        }
    } else {
        $finalImage = $gambarLama;
    }

    // Query update
    $qUpdate = "UPDATE buku 
                SET Judul = ?, Penulis = ?, Penerbit = ?, TahunTerbit = ?, Stok = ?, jumlah_buku = ?, sinopsis = ?, image = ?
                WHERE BukuID = ?";

    $stmtUpd = mysqli_prepare($connect, $qUpdate);
    mysqli_stmt_bind_param($stmtUpd, "sssiiissi", $judul, $penulis, $penerbit, $tahunterbit, $stok, $jumlah_buku, $sinopsis, $finalImage, $id);

    if (mysqli_stmt_execute($stmtUpd)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='./index.php';</script>";
        exit;
    } else {
        echo "Error update: " . mysqli_error($connect);
    }
}
?>

<!-- Content -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Buku</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    value="<?= htmlspecialchars($data['judul']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="form-control"
                                    value="<?= htmlspecialchars($data['penulis']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" class="form-control"
                                    value="<?= htmlspecialchars($data['penerbit']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahunterbit" id="tahunterbit" class="form-control"
                                    min="1900" max="2099" value="<?= htmlspecialchars($data['tahunterbit']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control"
                                    min="0" value="<?= htmlspecialchars($data['stok']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                                <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control"
                                    min="0" value="<?= htmlspecialchars($data['jumlah_buku']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="sinopsis" class="form-label">Sinopsis</label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" required><?= htmlspecialchars($data['sinopsis']) ?></textarea>
                            </div>

                            <div class="mb-3">

                                <?php if (!empty($data['image'])): ?>
                                    <img src="../../../uploads/<?= htmlspecialchars($data['image']) ?>" width="100" class="mb-2" style="border-radius:5px;"><br>
                                <?php endif; ?>
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($data['image']) ?>">
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