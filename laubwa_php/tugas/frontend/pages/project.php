<?php
require_once '../config/connection.php';

$qProject = "SELECT * FROM projects";
$project = mysqli_query($connect, $qProject) or die(mysqli_error($connect));

// Fungsi potong deskripsi pendek
function previewText($text, $limit = 100)
{
    $text = strip_tags($text);
    return strlen($text) > $limit ? substr($text, 0, strpos($text . ' ', ' ', $limit)) . '...' : $text;
}
?>

<section class="ftco-section bg-light" id="projects-section">
    <div class="container">
        <!-- Judul -->
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">PROJECTS</h2>
                <p>Ini Sebagian Dari Tugas Saya</p>
            </div>
        </div>

        <!-- Daftar Project -->
        <div class="row">
            <?php while ($dataProject = mysqli_fetch_assoc($project)) : ?>
                <div class="col-md-6 col-lg-4 d-flex ftco-animate mb-4">
                    <div class="blog-entry w-100 shadow rounded">
                        <!-- Gambar -->
                        <a href="./pages/detail/project.php/?id=<?= $dataProject['id'] ?>" class="block-20 rounded-top" style="
                            background-image: url('/laubwa_php/tugas/storages/project/<?= htmlspecialchars($dataProject['image']) ?>');
                            height: 220px;
                            background-size: cover;
                            background-position: center;">
                        </a>

                        <!-- Konten -->
                        <div class="p-3 bg-white rounded-bottom">
                            <small class="text-muted d-block mb-1"><?= htmlspecialchars($dataProject['job']); ?></small>
                            <h6 class="fw-bold mb-2" style="font-size: 16px;"><?= htmlspecialchars($dataProject['title']); ?></h6>
                            <p class="mb-2 text-muted" style="font-size: 13px; line-height: 1.4;">
                                <?= previewText($dataProject['description'], 100); ?>
                            </p>
                            <a href="./pages/detail/project.php/?id=<?= $dataProject['id'] ?>" class="btn btn-sm btn-outline-primary mt-2">
                                Lihat selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>