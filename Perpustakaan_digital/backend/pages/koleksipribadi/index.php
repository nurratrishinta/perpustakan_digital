<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// QUERY AMBIL DATA KOLEKSI + USER + BUKU
$qKoleksi = "
    SELECT kp.KoleksiID, us.Username, b.Judul
    FROM koleksipribadi kp
    LEFT JOIN user us ON kp.UserID = us.UserID
    LEFT JOIN buku b ON kp.BukuID = b.BukuID
    ORDER BY kp.KoleksiID ASC
";

$result = mysqli_query($connect, $qKoleksi) or die("Query error: " . mysqli_error($connect));
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Koleksi Pribadi -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Koleksi Pribadi</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Koleksi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Judul Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = mysqli_fetch_object($result)):
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= htmlspecialchars($item->Username ?? '-') ?></td>
                                            <td><?= htmlspecialchars($item->Judul ?? '-') ?></td>
                                            <td class="text-center">
                                                <a href="./edit.php?id=<?= $item->KoleksiID ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/koleksipribadi/destroy.php?id=<?= $item->KoleksiID ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    if ($no === 1) {
                                        echo '<tr><td colspan="4" class="text-center">Data tidak tersedia</td></tr>';
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