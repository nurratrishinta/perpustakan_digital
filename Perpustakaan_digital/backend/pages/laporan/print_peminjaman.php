<?php
include '../../../config/connection.php';

// Ambil data peminjaman
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

// Format tanggal sekarang dalam bahasa Indonesia
date_default_timezone_set('Asia/Jakarta');
$hari = date('l');
$namaHari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
][$hari];
$tanggalSekarang = $namaHari . ', ' . date('d F Y');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-size: 14px;
            color: #000;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        .judul {
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
        }

        hr {
            border-top: 2px solid #000;
            margin: 10px 0 20px;
        }

        .ttd-section {
            margin-top: 50px;
        }

        .ttd-section p {
            margin: 3px 0;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container mt-4">
        <div class="text-center">
            <h5 class="judul">Laporan Data Peminjaman Buku</h5>
            <p>Perpustakaan Digital</p>
            <hr>
        </div>

        <table class="table table-bordered table-striped text-center">
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
                    if ($item->StatusPeminjaman == 'Dipinjam') {
                        $tglPinjam = strtotime($item->TanggalPeminjaman);
                        $batas = strtotime('+7 days', $tglPinjam);
                        if ($item->TanggalPengembalian == null && time() > $batas) {
                            $status = 'Terlambat';
                        } else {
                            $status = 'Dipinjam';
                        }
                    } elseif ($item->StatusPeminjaman == 'Dikembalikan') {
                        $status = 'Selesai';
                    } else {
                        $status = $item->StatusPeminjaman;
                    }
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($item->JudulBuku) ?></td>
                        <td><?= htmlspecialchars($item->NamaPeminjam) ?></td>
                        <td><?= $item->TanggalPeminjaman ?></td>
                        <td><?= $item->TanggalPengembalian ?: '-' ?></td>
                        <td><?= $status ?></td>
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

        <!-- Bagian tanda tangan -->
        <div class="row ttd-section">
            <div class="col-6"></div>
            <div class="col-6 text-end">
                <p><?= $tanggalSekarang ?></p>
                <p>Mengetahui,</p>
                <p><strong>Kepala Perpustakaan</strong></p>
                <br><br><br>
                <p>(___________________)</p>
            </div>
        </div>

        <!-- Tombol print -->
        <div class="no-print text-center mt-4">
            <button onclick="window.print()" class="btn btn-success">Print Sekarang</button>
            <a href="./index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</body>

</html>