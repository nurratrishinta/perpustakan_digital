<?php
// Koneksi dan include layout
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ===== QUERY DATA PEMINJAMAN =====
$qPinjam = "
    SELECT 
        p.PeminjamanID, 
        p.TanggalPeminjaman, 
        p.TanggalPengembalian, 
        p.StatusPeminjaman,
        u.username AS NamaPeminjam,    
        b.Judul AS JudulBuku
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

        <!-- Judul Halaman -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold mb-0"><i class="bi bi-journal-text"></i> Data Panggilan Peminjaman</h4>

                </div>
                <a href="print_peminjaman.php" target="_blank" class="btn btn-primary btn-sm">

                    <i class="bi bi-printer"></i> Print
                </a>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($item = $result->fetch_object()):
                                // ===== CEK STATUS PINJAMAN =====
                                if ($item->StatusPeminjaman == 'Dipinjam') {
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
                                    <td><?= htmlspecialchars($item->JudulBuku) ?></td>
                                    <td><?= htmlspecialchars($item->NamaPeminjam) ?></td>
                                    <td><?= $item->TanggalPeminjaman ?></td>
                                    <td><?= $item->TanggalPengembalian ?: '-' ?></td>
                                    <td><?= $statusBadge ?></td>
                                </tr>
                            <?php
                                $no++;
                            endwhile;

                            if ($no === 1) {
                                echo '<tr><td colspan="6" class="text-center text-muted">Tidak ada data peminjaman</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>