<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// QUERY AMBIL DATA ULASAN + USER + BUKU
$qUlasan = "
    SELECT u.UlasanID, us.username, b.Judul, u.Ulasan, u.Rating
    FROM ulasanbuku u
    LEFT JOIN user us ON u.UserID = us.UserID
    LEFT JOIN buku b ON u.BukuID = b.BukuID
";

$result = mysqli_query($connect, $qUlasan) or die("Query error: " . mysqli_error($connect));
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Ulasan Buku -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Ulasan Buku</h5>
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
                                        <th>User</th>
                                        <th>Judul Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->username ?></td>
                                            <td><?= $item->Judul ?></td>
                                            <td><?= $item->Ulasan ?></td>
                                            <td><?= $item->Rating ?></td>
                                            <td>
                                                <a href="./edit.php?id=<?= $item->UlasanID ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/ulasanbuku/destroy.php?id=<?= $item->UlasanID ?>"
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
                                        echo '<tr><td colspan="6" class="text-center">Data tidak tersedia</td></tr>';
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
