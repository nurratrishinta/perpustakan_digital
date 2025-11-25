<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ✅ QUERY AMBIL DATA BUKU + KATEGORIBUKU_RELASI + STOK + JUMLAH_BUKU + SINOPSIS + IMAGE
$qBuku = "
    SELECT 
        buku.BukuID, 
        buku.Judul, 
        buku.Penulis, 
        buku.Penerbit, 
        buku.TahunTerbit, 
        buku.stok, 
        buku.jumlah_buku,
        buku.sinopsis,
        buku.image,
        kategori.NamaKategori
    FROM buku buku
    LEFT JOIN kategoribuku_relasi kategoribuku_relasi 
        ON buku.BukuID = kategoribuku_relasi.BukuID
    LEFT JOIN kategoribuku kategori 
        ON kategoribuku_relasi.KategoriID = kategori.KategoriID
";

$result = mysqli_query($connect, $qBuku) or die("Query error: " . mysqli_error($connect));
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Buku -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Daftar Buku</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>NO</th>
                                        <th>JUDUL</th>
                                        <th>PENULIS</th>
                                        <th>PENERBIT</th>
                                        <th>TAHUN TERBIT</th>
                                        <th>KATEGORI</th>
                                        <th>STOK</th>
                                        <th>JUMLAH BUKU</th>
                                        <th>SINOPSIS</th>
                                        <th>GAMBAR</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= htmlspecialchars($item->Judul) ?></td>
                                            <td><?= htmlspecialchars($item->Penulis) ?></td>
                                            <td><?= htmlspecialchars($item->Penerbit) ?></td>
                                            <td><?= htmlspecialchars($item->TahunTerbit) ?></td>
                                            <td><?= htmlspecialchars($item->NamaKategori ?? '-') ?></td>
                                            <td><?= htmlspecialchars($item->stok) ?></td>
                                            <td><?= htmlspecialchars($item->jumlah_buku) ?></td>
                                            <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?= htmlspecialchars(substr($item->sinopsis, 0, 20)) ?>...
                                            </td>
                                            <td>
                                                <?php if (!empty($item->image)): ?>
                                                    <img src="../../../uploads/<?= htmlspecialchars($item->image) ?>"
                                                        width="60" height="80"
                                                        style="object-fit: cover; border-radius: 5px;">
                                                <?php else: ?>
                                                    <span class="text-muted">Tidak ada gambar</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <a href="./edit.php?id=<?= $item->BukuID ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/buku/destroy.php?id=<?= $item->BukuID ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
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