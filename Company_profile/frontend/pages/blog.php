<?php
$qblog = "SELECT * FROM blogs LIMIT 3"; // ambil 2 data saja untuk preview
$resultblog = mysqli_query($connect, $qblog) or die(mysqli_error($connect));
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<?php
$qblog = "SELECT * FROM blogs LIMIT 3"; // ambil 3 data saja untuk preview
$resultblog = mysqli_query($connect, $qblog) or die(mysqli_error($connect));
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Hilangkan garis bawah link blog */
    .blog-link {
        text-decoration: none !important;
        color: inherit !important;
    }

    /* Efek hover */
    .blog-link:hover {
        text-decoration: none !important;
        color: #0d6efd;
        /* opsional: biru saat hover */
    }
</style>


<section id="blog" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">BLOG</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <?php if ($resultblog && $resultblog->num_rows > 0) : ?>
                <?php while ($row = $resultblog->fetch_object()) : ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-4">
                        <!-- Card Blog -->
                        <div class="blog-entry card h-100 shadow-sm" style="cursor:pointer;">

                            <!-- Link ke detail -->
                            <a href="./pages/detail/blog.php?id=<?= $row->id ?>" class="blog-link">
                                <!-- Gambar -->
                                <?php if (!empty($row->image)) : ?>
                                    <img src="../storages/blog/<?= htmlspecialchars($row->image) ?>"
                                        alt="Image placeholder" class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                <?php else: ?>
                                    <img src="templates-user/images/no-image.png"
                                        alt="No Image" class="card-img-top"
                                        style="height:200px; object-fit:cover;">
                                <?php endif; ?>

                                <div class="card-body">
                                    <!-- Judul -->
                                    <h5 class="card-title"><?= htmlspecialchars($row->title) ?></h5>
                                    <!-- Content ringkas -->
                                    <p class="card-text"><?= substr(strip_tags($row->content), 0, 90) ?>...</p>
                                </div>
                                <!-- Tombol Lihat Selengkapnya -->
                                <div class="mt-auto text-center">
                                    <a href="./pages/detail/blog    .php?id=<?= $row->id ?>"
                                        class="btn btn-primary btn-sm rounded-pill px-1">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada blog.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Tombol Lihat Semua Blog -->
        <div class="text-center mt-4">
            <a href="./pages/detail/allBlog.php" class="btn btn-primary px-4 py-2 rounded-pill">Lihat Semua</a>
        </div>
    </div>
</section>
<!-- END section -->

<!-- END section -->