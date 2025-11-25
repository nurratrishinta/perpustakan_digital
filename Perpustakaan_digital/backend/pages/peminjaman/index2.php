<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qPinjam = "
    SELECT 
        p.PeminjamanID, 
        p.TanggalPeminjaman, 
        p.TanggalPengembalian, 
        p.StatusPeminjaman,
        u.username AS user,    
        b.Judul AS judul       
    FROM peminjaman p
    LEFT JOIN user u ON p.UserID = u.UserID
    LEFT JOIN buku b ON p.BukuID = b.BukuID
    ORDER BY p.TanggalPeminjaman DESC
";


$result = mysqli_query($connect, $qPinjam) or die("Query error: " . mysqli_error($connect));
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel Peminjaman -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data Peminjaman</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Peminjaman
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Nama peminjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($item = $result->fetch_object()):
                                        // ===== CEK STATUS PINJAMAN =====
                                        $statusBadge = '';
                                        if ($item->StatusPeminjaman == 'Dipinjam') {
                                            // jika sudah lebih dari 7 hari & belum dikembalikan → Terlambat
                                            $tglPinjam = strtotime($item->TanggalPeminjaman);
                                            $batas = strtotime('+7 days', $tglPinjam);
                                            if ($item->TanggalPengembalian == null && time() > $batas) {
                                                $statusBadge = '<span class="badge bg-primary">Terlambat</span>';
                                            } else {
                                                $statusBadge = '<span class="badge bg-warning text-dark">Dipinjam</span>';
                                            }
                                        } elseif ($item->StatusPeminjaman == 'Dikembalikan') {
                                            $statusBadge = '<span class="badge bg-success">Selesai</span>';
                                        } else {
                                            $statusBadge = '<span class="badge bg-secondary">' . $item->StatusPeminjaman . '</span>';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->judul ?></td>
                                            <td><?= $item->user ?></td>
                                            <td><?= $item->TanggalPeminjaman ?></td>
                                            <td><?= $item->TanggalPengembalian ?: '-' ?></td>
                                            <td><?= $statusBadge ?></td>
                                            <!-- <td>
                                                <a href="./edit.php?id=<?= $item->PeminjamanID ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="../../actions/peminjaman/destroy.php?id=<?= $item->PeminjamanID ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                            </td> -->
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    // jika tidak ada data
                                    if ($no === 1) {
                                        echo '<tr><td colspan="7" class="text-center">Data tidak tersedia</td></tr>';
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