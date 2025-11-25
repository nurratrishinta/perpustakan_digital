
<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
require_once __DIR__ . '/../../../config/connection.php';

// ====== HITUNG DATA ======
$qUser = mysqli_query($connect, "SELECT COUNT(*) AS total FROM user");
$jumlahUser = mysqli_fetch_assoc($qUser)['total'];

$qKategori = mysqli_query($connect, "SELECT COUNT(*) AS total FROM kategoribuku");
$jumlahKategori = mysqli_fetch_assoc($qKategori)['total'];

$qBuku = mysqli_query($connect, "SELECT COUNT(*) AS total FROM buku");
$jumlahBuku = mysqli_fetch_assoc($qBuku)['total'];

$qUlasan = mysqli_query($connect, "SELECT COUNT(*) AS total FROM ulasanbuku");
$jumlahUlasan = mysqli_fetch_assoc($qUlasan)['total'];

$qPeminjaman = mysqli_query($connect, "SELECT COUNT(*) AS total FROM peminjaman");
$jumlahPeminjaman = mysqli_fetch_assoc($qPeminjaman)['total'];

// Karena tabel 'pengaduan' tidak ada di database, bagian ini dihapus
$jumlahLaporan = 0;

// ====== DATA BULANAN (contoh dari peminjaman) ======
$qBulanan = mysqli_query($connect, "
    SELECT 
        MONTH(TanggalPeminjaman) AS bulan,
        COUNT(CASE WHEN StatusPeminjaman = 'Pending' THEN 1 END) AS pending,
        COUNT(CASE WHEN StatusPeminjaman = 'Proses' THEN 1 END) AS proses,
        COUNT(CASE WHEN StatusPeminjaman = 'Selesai' THEN 1 END) AS selesai
    FROM peminjaman
    GROUP BY MONTH(TanggalPeminjaman)
    ORDER BY bulan
");

$namaBulan = [
    1 => "Januari",
    2 => "Februari",
    3 => "Maret",
    4 => "April",
    5 => "Mei",
    6 => "Juni",
    7 => "Juli",
    8 => "Agustus",
    9 => "September",
    10 => "Oktober",
    11 => "November",
    12 => "Desember"
];

$bulanLabels = [];
$dataPending = [];
$dataProses = [];
$dataSelesai = [];

?>

<div class="page-wrapper" style="margin-left:70px; min-height:216vh; background-color:#f8f9fa;">
    <div class="container-fluid py-4">
        <h3 class="mb-4 fw-bold">Dashboard Data Perpustakaan Digital</h3>

        <!-- Cards -->
        <div class="row g-4 mb-4">

            <!-- User -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="../user/index.php" class="text-decoration-none">
                    <div class="card text-white bg-primary shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">User</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahUser ?></h2>
                            </div>
                            <i class="fas fa-user fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kategori Buku -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="../kategoribuku/index.php" class="text-decoration-none">
                    <div class="card text-white bg-info shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Kategori Buku</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahKategori ?></h2>
                            </div>
                            <i class="fas fa-tags fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Buku -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="../buku/index.php" class="text-decoration-none">
                    <div class="card text-white bg-success shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Buku</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahBuku ?></h2>
                            </div>
                            <i class="fas fa-book fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ulasan -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="../ulasanbuku/index.php" class="text-decoration-none">
                    <div class="card text-white bg-warning shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Ulasan Buku</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahUlasan ?></h2>
                            </div>
                            <i class="fas fa-comment-dots fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Peminjaman -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="../peminjaman/index.php" class="text-decoration-none">
                    <div class="card text-white bg-secondary shadow-sm border-0 h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 text-white">Peminjaman</h6>
                                <h2 class="fw-bold text-white"><?= $jumlahPeminjaman ?></h2>
                            </div>
                            <i class="fas fa-handshake fa-2x opacity-75"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Grafik -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Total Peminjaman Bulanan</h5>
                <canvas id="laporanBulananChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title mb-4">Ringkasan Peminjaman Bulanan</h5>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Bulan</th>
                            <th>Pending</th>
                            <th>Proses</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bulanLabels as $i => $bln) : ?>
                            <tr>
                                <td><?= $bln ?></td>
                                <td><?= $dataPending[$i] ?></td>
                                <td><?= $dataProses[$i] ?></td>
                                <td><?= $dataSelesai[$i] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('laporanBulananChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($bulanLabels) ?>,
            datasets: [{
                    label: 'Pending',
                    data: <?= json_encode($dataPending) ?>,
                    backgroundColor: 'rgba(255,193,7,0.7)',
                    borderColor: 'rgba(255,193,7,1)',
                    borderWidth: 1
                },
                {
                    label: 'Proses',
                    data: <?= json_encode($dataProses) ?>,
                    backgroundColor: 'rgba(0,123,255,0.7)',
                    borderColor: 'rgba(0,123,255,1)',
                    borderWidth: 1
                },
                {
                    label: 'Selesai',
                    data: <?= json_encode($dataSelesai) ?>,
                    backgroundColor: 'rgba(40,167,69,0.7)',
                    borderColor: 'rgba(40,167,69,1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>