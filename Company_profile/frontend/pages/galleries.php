<?php
require_once __DIR__ . '/../../config/connection.php';

// Query ambil data dari tabel 'galleries'
$qGalleries = "SELECT * FROM galleries LIMIT 3";
$resultGalleries = mysqli_query($connect, $qGalleries) or die(mysqli_error($connect));
?>



<section id="galleries" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">GALERI</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <?php if ($resultGalleries && $resultGalleries->num_rows > 0): ?>
                <?php while ($row = $resultGalleries->fetch_object()): ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Gambar -->
                            <?php if (!empty($row->image)): ?>
                                <img src="../storages/galleries/<?= htmlspecialchars($row->image) ?>"
                                    alt="Image placeholder" class="card-img-top"
                                    style="height:200px; object-fit:cover;">
                            <?php else: ?>
                                <img src="templates-user/images/no-image.png"
                                    alt="No Image" class="card-img-top"
                                    style="height:200px; object-fit:cover;">
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column">
                                <!-- Deskripsi singkat -->
                                <p class="card-text" style="font-size:14px; color:#444; text-align:justify;">
                                    <?= substr(strip_tags($row->description), 0, 100) ?>...
                                </p>

                                <!-- Tombol Lihat Selengkapnya -->
                                <div class="mt-auto text-center">
                                    <a href="./pages/detail/galleries.php?id=<?= $row->id ?>"
                                        class="btn btn-primary btn-sm rounded-pill px-3">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Tidak ada data galeri tersedia.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Tombol Lihat Semua Galeri -->
        <div class="text-center mt-4">
            <a href="./pages/detail/allGalleries.php" class="btn btn-primary px-4 py-2 rounded-pill">Lihat Semua</a>
        </div>
    </div>
</section>