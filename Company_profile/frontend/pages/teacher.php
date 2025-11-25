<?php
$qTeacher = "SELECT * FROM Teachers";
$resultTeacher = mysqli_query($connect, $qTeacher) or die(mysqli_error($connect));
?>

<section id="teacher" class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold">GURU</h2>
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php while ($item = $resultTeacher->fetch_object()): ?>
                    <div class="swiper-slide">
                        <div class="card teacher-card shadow-sm h-100">
                            <img src="../storages/teacher/<?= $item->teacher_photo ?>"
                                alt="<?= htmlspecialchars($item->teacher_name) ?>"
                                class="card-img-top teacher-photo">

                            <div class="card-body text-center">
                                <h5 class="card-title mb-1"><?= htmlspecialchars($item->teacher_name) ?></h5>
                                <p class="card-text text-muted"><?= htmlspecialchars($item->teacher_major) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Navigasi -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        
    </div>
</section>

<!-- Swiper Init -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2500,
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
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            }   
        }
    });
</script>