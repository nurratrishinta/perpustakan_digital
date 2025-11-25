<?php
require_once __DIR__ . '/../../config/connection.php';

// Ambil data dari tabel testimonials
$query = mysqli_query($connect, "SELECT * FROM testimonials");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font Awesome (untuk ikon kutip) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .testimonial-card {
            background: #222;
            border-radius: 15px;
            color: #fff;
            min-height: 350px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .testimonial-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 15px;
        }

        .testimonial-message {
            font-size: 14px;
            color: #ddd;
            margin-top: 10px;
        }

        .stars {
            font-size: 18px;
            color: #f1c40f;
            /* kuning */
            margin-bottom: 10px;
        }

        .swiper {
            padding: 20px 0;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        .swiper-pagination-bullet {
            background: #000;
        }
    </style>
</head>

<body>

    <section id="testimonials" class="site-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2 class="fw-bold">TESTIMONI</h2>
                    <p class="lead">Apa kata mereka tentang kami</p>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php while ($row = $query->fetch_object()): ?>
                        <div class="swiper-slide">
                            <div class="testimonial-card text-center">
                                <!-- Foto -->
                                <img src="../storages/testimonials/<?= htmlspecialchars($row->image) ?>"
                                    alt="<?= htmlspecialchars($row->name) ?>"
                                    class="testimonial-img mx-auto d-block">

                                <!-- Nama -->
                                <h5 class="fw-bold"><?= htmlspecialchars($row->name) ?></h5>

                                <!-- Status -->
                                <p class="text-muted mb-2"><?= htmlspecialchars($row->status) ?></p>

                                <!-- Rating -->
                                <div class="stars">⭐⭐⭐⭐⭐</div>

                                <!-- Pesan -->
                                <p class="testimonial-message">
                                    <i class="fas fa-quote-left"></i>
                                    <?= htmlspecialchars($row->message) ?>
                                    <i class="fas fa-quote-right"></i>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Tombol Navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3, // default: 3 di desktop
            spaceBetween: 30,
            loop: true, // muter terus
            autoplay: {
                delay: 3000, // geser tiap 3 detik
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: { // Responsive
                0: {
                    slidesPerView: 1
                }, // HP
                768: {
                    slidesPerView: 2
                }, // Tablet
                1024: {
                    slidesPerView: 3
                } // Laptop/desktop
            }
        });
    </script>

</body>

</html>