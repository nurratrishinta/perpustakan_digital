<?php
// Pastikan koneksi sudah dibuat
require_once __DIR__ . '/../../config/connection.php';

$qheadmaster = "SELECT * FROM headmasters LIMIT 1";
$resultheadmaster = mysqli_query($connect, $qheadmaster) or die(mysqli_error($connect));

// Ambil satu data saja
$item = $resultheadmaster->fetch_object();
?>
<section id="headmaster" class="site-section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Teks Sambutan -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="fw-bold">KEPALA SEKOLAH</h2>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-4 text-uppercase fw-bold">Sambutan Kepala Sekolah</h2>
                <h4 class="fw-semibold text-primary">
                </h4>
                <p class="sambutan-text">
                    <?= nl2br(htmlspecialchars($item->headmaster_description)) ?>
                </p>
            </div>

            <!-- Foto Kepala Sekolah -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img src="../storages/headmaster/<?= htmlspecialchars($item->headmaster_photo) ?>"
                    alt="<?= htmlspecialchars($item->headmaster_name) ?>"
                    class="img-fluid rounded shadow"
                    style="width: 100%; max-width: 400px; height: auto; object-fit: cover;">

                <!-- Nama di bawah foto -->
                <p class="mt-3 fw-bold text-dark"><?= htmlspecialchars($item->headmaster_name) ?></p>
            </div>
        </div>
    </div>
</section>

<style>
    .sambutan-text {
        text-align: justify;
        font-size: 1rem;
        line-height: 1.8;
        color: #333;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
</style>