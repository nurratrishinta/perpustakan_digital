<?php
require_once '../config/connection.php';

// Ambil semua data dari tabel resumes
$query = "SELECT * FROM resumes ORDER BY id ASC";
$result = mysqli_query($connect, $query);
$resumes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $resumes[] = $row;
}

// Fungsi untuk memotong teks secara rapi
function truncateText($text, $maxLength = 150)
{
    $text = strip_tags($text);
    if (strlen($text) <= $maxLength) return $text;
    $cutText = substr($text, 0, strrpos(substr($text, 0, $maxLength), ' '));
    return $cutText . '...';
}
?>

<section class="ftco-section ftco-no-pb" id="resume-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">RESUME</h2>
            </div>
        </div>

        <?php foreach ($resumes as $resume): ?>
            <div class="row justify-content-center mb-4">
                <div class="col-md-10">
                    <div class="resume-wrap ftco-animate p-4 bg-white shadow rounded text-center">
                        <span class="date d-block mb-3 text-muted"><?= $resume['date'] ?></span>
                        <h2 class="text-uppercase"><?= htmlspecialchars($resume['job']) ?></h2>
                        <span class="position d-block mb-3"><?= htmlspecialchars($resume['place']) ?></span>
                        <p class="text-justify mb-3">
                            <?= truncateText($resume['description'], 180) ?>
                        </p>
                        <a href="./pages/detail/resume.php?id=<?= $resume['id'] ?>">
                            <button type="button" class="btn btn-primary">
                                Lihat Selengkapnya
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>