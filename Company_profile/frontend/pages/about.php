<?php
$connect = mysqli_connect("localhost", "root", "", "magang-sekolah");
if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$qAbout = "SELECT * FROM abouts LIMIT 1";
$abouts = mysqli_query($connect, $qAbout);
if (!$abouts) {
    die("Query gagal: " . mysqli_error($connect));
}

$dataAbout = mysqli_fetch_object($abouts);
?>
<style>
    /* Styling foto */
    .about-img {
        height: 360px;
        object-fit: cover;
        width: 100%;
        border-radius: 8px;
    }

    /* Styling deskripsi */
    .about-description {
        font-size: 15px;
        line-height: 1.7;
        text-align: justify;
        margin-bottom: 15px;
    }

    /* Info sekolah */
    .about-info {
        font-size: 14px;
    }

    .about-info p {
        margin: 6px 0;
        display: flex;
        align-items: center;
    }

    .about-info i {
        width: 20px;
        color: #555;
        margin-right: 8px;
        text-align: center;
    }

    /* Responsif di HP */
    @media (max-width: 768px) {
        .about-img {
            height: 250px;
        }
    }
</style>

<section id="about" class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">ABOUT</h2>
            </div>
        </div>


        <div class="row align-items-center">
            <!-- Foto -->
            <div class="col-md-5 col-12 mb-3 mb-md-0">
                <img src="../storages/about/<?= htmlspecialchars($dataAbout->school_banner) ?>"
                    alt="Banner <?= htmlspecialchars($dataAbout->school_name) ?>"
                    class="about-img shadow-sm">
            </div>

            <!-- Deskripsi -->
            <div class="col-md-7 col-12">
                <h3 class="mb-3"><?= htmlspecialchars($dataAbout->school_name) ?></h3>
                <p class="about-description">
                    <?= nl2br(strip_tags($dataAbout->school_description)) ?>
                </p>
                <div class="text-muted about-info">
                    <p><i class="fa fa-calendar"></i><?= date("d F Y", strtotime($dataAbout->since)) ?></p>
                    <p><i class="fa fa-quote-left"></i><?= htmlspecialchars($dataAbout->school_tagline) ?></p>
                    <p><i class="fa fa-map-marker"></i><?= htmlspecialchars($dataAbout->alamat) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>