<?php
$qvisi_mission = "SELECT * FROM visi_missions";
$resultvisi_mission = mysqli_query($connect, $qvisi_mission) or die(mysqli_error($connect));
?>

<style>
    /* Style untuk kartu visi misi */
    .visi-misi-card {
        transition: all 0.3s ease-in-out;
        border-top: 4px solid #0d6efd;
        /* garis aksen atas (biru bootstrap) */
        background: #f8faff;
        /* biru sangat muda */
    }

    .visi-misi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        background: #e9f2ff;
        /* sedikit lebih biru saat hover */
    }

    /* Judul */
    #visi-misi h1 {
        font-weight: 700;
        color: #0d6efd;
    }

    #visi-misi h2 {
        font-weight: 500;
        color: #6c757d;
    }

    .visi-misi-card h5 {
        color: #0d6efd;
        font-weight: 600;
    }

    .visi-misi-card p {
        color: #333;
        text-align: justify;
    }
</style>


<section id="visimisi" class="py-5">
    <div class="container">
        <!--Judul -->
        <div class="row">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="fw-bold">VISI & MISI</h2>
                </div>
            </div>
        </div>

        <div class="row g-4 align-items-stretch">
            <?php if ($resultvisi_mission && $resultvisi_mission->num_rows > 0): ?>
                <?php while ($item = $resultvisi_mission->fetch_object()): ?>
                    <div class="col-lg col-md-12 d-flex">
                        <div class="visi-misi-card text-center w-100 p-4 shadow-sm rounded bg-white">
                            <h5 class="mb-3">
                                <?= ucfirst(htmlspecialchars($item->category)) ?>
                            </h5>
                            <p><?= nl2br(htmlspecialchars($item->text)) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Data visi & misi belum tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</section>