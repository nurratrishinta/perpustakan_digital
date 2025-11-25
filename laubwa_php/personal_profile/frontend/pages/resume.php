<?php 
// query atau perinth untuk mengambihldata dari database pada tabel resumes
$qResume = "SELECT * FROM resumes";

// menyambungkan query atau perintah ke database uang sudah di buat diatas
$resultResume = mysqli_query($connect, $qResume) or die(mysqli_error($connect));
?>


<section class="ftco-section ftco-no-pb" id="resume-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h1 class="big big-2">Resume</h1>
                <h2 class="mb-4">Resume</h2>
                <p>Ini adalah riwayat masa sd & smp</p>
            </div>
        </div>
        <div class="row">
            <?php
            // perulangan untuk menampilkan data dari database, ini dilakukan supaya simpele
            while ($item = $resultResume->fetch_object()):
            ?>
                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate">
                        <span class="date"><?= $item->date; ?></span>
                        <h2><?= $item->job; ?></h2>
                        <span class="position"><?= $item->place; ?></span>
                        <p class="mt-4"><?= $item->description; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>