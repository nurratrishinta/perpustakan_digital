<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// QUERY AMBIL DATA RELASI BUKU + KATEGORI
$qRelasi = "
    SELECT 
        kr.KategoriBukuID,
        b.Judul AS NamaBuku,
        k.NamaKategori
    FROM kategoribuku_relasi kr
    LEFT JOIN buku b ON kr.BukuID = b.BukuID
    LEFT JOIN kategoribuku k ON kr.KategoriID = k.KategoriID
    ORDER BY kr.KategoriBukuID ASC
";

$result = mysqli_query($connect, $qRelasi) or die('Query error: ' . mysqli_error($connect));
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Relasi Kategori Buku -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Relasi Kategori Buku</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Relasi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>ID Relasi</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $row['KategoriBukuID'] ?></td>
                                            <td><?= $row['NamaBuku'] ?></td>
                                            <td><?= $row['NamaKategori'] ?></td>
                                            <td>
                                                <a href="./edit.php?id=<?= $row['KategoriBukuID'] ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/kategoribuku_relasi/destroy.php?id=<?= $row['KategoriBukuID'] ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus relasi ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    if ($no === 1) {
                                        echo '<tr><td colspan="5" class="text-center">Data tidak tersedia</td></tr>';
                                    }
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
