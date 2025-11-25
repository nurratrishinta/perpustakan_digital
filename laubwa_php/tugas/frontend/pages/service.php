<?php
require_once '../config/connection.php';

$qService = "SELECT * FROM services";
$service = mysqli_query($connect, $qService) or die(mysqli_error($connect));
?>

<section class="ftco-section ftco-service" id="services-section">
    <div class="container px-md-4">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading"></span>
                <h2 class="mb-4">SERVICES</h2>
            </div>
        </div>
        <div class="row">
            <?php while ($dataService = mysqli_fetch_assoc($service)) : ?>
                <div class="col-md-3 mb-4">
                    <div class="project shadow ftco-animate text-center p-4 h-100 d-flex flex-column justify-content-center align-items-center">
                        <img src="/laubwa_php/tugas/storages/service/<?= htmlspecialchars($dataService['icon']) ?>"
                            alt="icon"
                            style="width: 80px; height: auto; margin-bottom: 15px;">
                        <h3><?= htmlspecialchars($dataService['job']) ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>