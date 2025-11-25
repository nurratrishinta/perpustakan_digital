<?php
$qAboutHero = mysqli_query($connect, "SELECT * FROM abouts LIMIT 1");
?>

<section id="home" class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(templates-user/images/hmm.jpg);">
    <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
            <div class="col-md-8 text-center">

                <?php while ($hero = mysqli_fetch_assoc($qAboutHero)) : ?>
                    <div class="mb-5 element-animate">
                        <h1><?= $hero['school_name'] ?></h1>
                        <p class="lead"><?= $hero['school_tagline'] ?></p>

                        <!-- Jam besar -->
                        <div id="clock" style="font-size:2cm; color:white; font-weight:bold; line-height:1.2;"></div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>

<!-- Script untuk Jam -->
<script>
    function updateClock() {
        const now = new Date();
        const time = now.toLocaleTimeString('id-ID');
        document.getElementById("clock").innerHTML = time;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>