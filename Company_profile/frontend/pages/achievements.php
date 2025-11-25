<?php
require_once __DIR__ . '/../../config/connection.php'; // koneksi

$qAchievements = "SELECT * FROM achievements ORDER BY id DESC LIMIT 3";
$resultAchievements = mysqli_query($connect, $qAchievements) or die("Query error: " . mysqli_error($connect));
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .achievement-link {
        text-decoration: none !important;
        color: inherit !important;
        cursor: pointer;
    }

    .achievement-link:hover {
        color: #0d6efd;
    }
</style>



<section id="achievements" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">PSERTASI</h2>
            </div>
        </div>
        <div class="row">
            <?php if ($resultAchievements && $resultAchievements->num_rows > 0) : ?>
                <?php while ($row = $resultAchievements->fetch_object()) : ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Klik gambar/card -> buka modal -->
                            <a href="javascript:void(0);"
                                class="achievement-link"
                                data-bs-toggle="modal"
                                data-bs-target="#achievementModal<?= $row->id ?>">
                                <?php if (!empty($row->image)) : ?>
                                    <img src="../storages/achievements/<?= htmlspecialchars($row->image) ?>"
                                        alt="<?= htmlspecialchars($row->title) ?>"
                                        class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                <?php else: ?>
                                    <img src="templates-user/images/no-image.png"
                                        alt="No Image" class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row->title) ?></h5>
                                    <p class="card-text"><?= substr(strip_tags($row->description), 0, 100) ?>...</p>
                                </div>
                                <!-- Tombol Lihat Selengkapnya -->
                                <div class="mt-auto text-center">
                                    <a href="./pages/detail/achievements.php?id=<?= $row->id ?>"
                                        class="btn btn-primary btn-sm rounded-pill px-1">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="achievementModal<?= $row->id ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= htmlspecialchars($row->title) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <?php if (!empty($row->image)) : ?>
                                        <img src="../storages/achievements/<?= htmlspecialchars($row->image) ?>"
                                            alt="<?= htmlspecialchars($row->title) ?>"
                                            class="img-fluid mb-3"
                                            style="max-height:400px; object-fit:contain;">
                                    <?php endif; ?>
                                    <p class="text-start"><?= nl2br(htmlspecialchars($row->description)) ?></p>
                                </div>

                                <!-- Tambah tombol kembali -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada achievements.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Tombol Lihat Semua -->
        <div class="text-center mt-4">
            <a href="./pages/detail/allAchievements.php" class="btn btn-primary px-4 py-2 rounded-pill">Lihat Semua</a>
        </div>
    </div>
</section>