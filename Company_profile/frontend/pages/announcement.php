<?php
$qannouncement = "SELECT * FROM announcements LIMIT 3";
$resultannouncement = mysqli_query($connect, $qannouncement) or die(mysqli_error($connect));
?>

<style>
    .announcement-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .announcement-link h3,
    .announcement-link p {
        text-decoration: none;
        color: inherit;
    }

    .announcement-link:hover {
        text-decoration: none;
    }

    .announcements-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        /* mirip card berita */
        gap: 25px;
        padding: 20px;
        margin-top: 2cm;
        margin-bottom: 2cm;
    }

    .announcement-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        text-align: left;
        /* biar mirip card berita */
    }

    .announcement-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .announcement-card img {
        width: 100%;
        height: 200px;
        /* tinggi gambar tetap */
        object-fit: cover;
        /* biar proporsional */
        display: block;
    }

    .announcement-card h3 {
        font-size: 18px;
        font-weight: bold;
        margin: 15px;
        margin-bottom: 8px;
        color: #222;
    }

    .announcement-card p {
        font-size: 14px;
        color: #444;
        margin: 0 15px 10px 15px;
        text-align: justify;
    }

    .announcement-card .head {
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

<section id="announcement" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">Pengumuman</h2>
            </div>
        </div>
        <div class="announcements-grid">
            <?php while ($row = $resultannouncement->fetch_object()): ?>
                <div class="announcement-card">
                    <a href="./pages/detail/announcement.php?id=<?= $row->id ?>" class="announcement-link position-relative">
                        <img src="../storages/announcement/<?= htmlspecialchars($row->announcement_image) ?>"
                            alt="<?= htmlspecialchars($row->announcement_title) ?>">
                        <h3><?= htmlspecialchars($row->announcement_title) ?></h3>
                        <p><?= substr(strip_tags($row->announcement_description), 0, 90) ?></p>

                        <!-- Tombol Lihat Selengkapnya -->
                        <div class="mt-auto text-center">
                            <a href="./pages/detail/announcement.php?id=<?= $row->id ?>"
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
            <a href="./pages/detail/allannouncement.php" class="btn btn-primary px-4 py-2 rounded-pill">Lihat Semua</a>
        </div>
    </div>
</section>