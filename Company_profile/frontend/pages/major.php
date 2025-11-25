<?php
$qMajor = "SELECT * FROM majors LIMIT 3";
$resultMajor = mysqli_query($connect, $qMajor) or die(mysqli_error($connect));
?>

<style>
    .major-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .major-link h3,
    .major-link p {
        text-decoration: none;
        color: inherit;
    }

    .major-link:hover {
        text-decoration: none;
    }

    .majors-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        /* mirip card berita */
        gap: 25px;
        padding: 20px;
        margin-top: 2cm;
        margin-bottom: 2cm;
    }

    .major-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        text-align: left;
        /* biar mirip card berita */
    }

    .major-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .major-card img {
        width: 100%;
        height: 200px;
        /* tinggi gambar tetap */
        object-fit: cover;
        /* biar proporsional */
        display: block;
    }

    .major-card h3 {
        font-size: 18px;
        font-weight: bold;
        margin: 15px;
        margin-bottom: 8px;
        color: #222;
    }

    .major-card p {
        font-size: 14px;
        color: #444;
        margin: 0 15px 10px 15px;
        text-align: justify;
    }

    .major-card .head {
        font-size: 13px;
        font-weight: bold;
        margin: 0 15px 15px 15px;
        color: #0a4275;
    }

    .see-more {
        text-align: center;
        margin: 20px 0;
    }

    .see-more a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0d6efd;
        color: #fff;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;

    }

    .see-more a:hover {
        background-color: #094db1;
    }
</style>

<section id="major" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">JURUSAN</h2>
            </div>
        </div>
        <div class="majors-grid">
            <?php while ($row = $resultMajor->fetch_object()): ?>
                <div class="major-card">
                    <a href="./pages/detail/major.php?id=<?= $row->id ?>" class="major-link position-relative">
                        <img src="../storages/major/<?= htmlspecialchars($row->major_image) ?>"
                            alt="<?= htmlspecialchars($row->major_name) ?>">
                        <h3><?= htmlspecialchars($row->major_name) ?></h3>
                        <p> <?= mb_strimwidth($row->major_description, 0, 70, "...") ?></p>
                        <p class="head">Kepala Jurusan:
                            <?= !empty($row->head) ? htmlspecialchars($row->head) : 'Belum ditentukan'; ?>
                        </p>
                        <!-- Tombol Lihat Selengkapnya -->
                        <div class="mt-auto text-center">
                            <a href="./pages/detail/major.php?id=<?= $row->id ?>"
                                class="btn btn-primary btn-sm rounded-pill px-1">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </a>

                </div>
            <?php endwhile; ?>
        </div>
        <!-- Tombol Lihat Semua Galeri -->
        <div class="text-center mt-4">
            <a href="./pages/detail/allMajor.php" class="btn btn-primary px-4 py-2 rounded-pill">Lihat Semua</a>
        </div>
    </div>
</section>