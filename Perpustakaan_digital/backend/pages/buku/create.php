<?php
// koneksi database
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul        = trim($_POST['judul']);
    $penulis      = trim($_POST['penulis']);
    $penerbit     = trim($_POST['penerbit']);
    $tahun        = (int) $_POST['tahun'];
    $stok         = (int) $_POST['stok'];
    $jumlah_buku  = (int) $_POST['jumlah_buku'];
    $sinopsis     = trim($_POST['sinopsis']);
    $kategori     = $_POST['kategori'] ?? [];

    // === Proses upload gambar ===
    $fileName = $_FILES['image']['name'] ?? '';
    $finalImage = '';

    if ($fileName) {
        $targetDir = "../../../uploads/";
        $newName = time() . "_" . basename($fileName);
        $targetPath = $targetDir . $newName;

        $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowed)) {
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
            $finalImage = $newName;
        } else {
            echo "<script>alert('Format gambar tidak didukung! Hanya JPG, PNG, GIF, WEBP');</script>";
        }
    }

    // === Simpan buku ke tabel buku ===
    $qInsert = "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit, stok, jumlah_buku, sinopsis, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $qInsert);
    mysqli_stmt_bind_param($stmt, "sssiiiss", $judul, $penulis, $penerbit, $tahun, $stok, $jumlah_buku, $sinopsis, $finalImage);
    mysqli_stmt_execute($stmt);

    // Ambil ID buku baru
    $bukuID = mysqli_insert_id($connect);

    // === Simpan kategori relasi ===
    foreach ($kategori as $katID) {
        $qRelasi = "INSERT INTO kategoribuku_relasi (BukuID, KategoriID) VALUES (?, ?)";
        $stmtRel = mysqli_prepare($connect, $qRelasi);
        mysqli_stmt_bind_param($stmtRel, "ii", $bukuID, $katID);
        mysqli_stmt_execute($stmtRel);
    }

    echo "<script>alert('Buku berhasil ditambahkan'); window.location.href='./index.php';</script>";
    exit;
}
?>

<!-- FORM TAMBAH BUKU -->
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Buku</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah Buku</label>
                        <input type="number" name="jumlah_buku" class="form-control" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label>Sinopsis</label>
                        <textarea name="sinopsis" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image"
                            placeholder="Masukan Pilih Gambar..." required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label><br>
                        <?php
                        $qKat = "SELECT * FROM kategoribuku";
                        $resKat = mysqli_query($connect, $qKat);
                        while ($kat = mysqli_fetch_assoc($resKat)) {
                            echo "<div class='form-check'>
                                <input type='checkbox' name='kategori[]' value='{$kat['KategoriID']}' class='form-check-input'>
                                <label class='form-check-label'>{$kat['NamaKategori']}</label>
                              </div>";
                        }
                        ?>
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