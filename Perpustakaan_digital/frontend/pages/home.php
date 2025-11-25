<?php
// Hapus query ke tabel abouts
// $qAboutHero = mysqli_query($connect, "SELECT * FROM abouts LIMIT 1");
?>

<section id="home" class="site-hero overlay" data-stellar-background-ratio="0.5"
    style="background-image: url(templates-user/images/pp.jpg);">
    <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
            <div class="col-md-8 text-center">
                <div class="mb-5 element-animate">
                    <h1>Perpustakaan Digital</h1>
                    <p class="lead">Selamat datang di web aplikasi perpustakaan digital kami</p>

                    <!-- Jam besar -->
                    <div id="clock"
                        style="font-size:2cm; color:white; font-weight:bold; line-height:1.2;"></div>
                </div>
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