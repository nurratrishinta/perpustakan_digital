<?php
require_once '../config/connection.php';

$qSkill = "SELECT * FROM skills";
$Skill = mysqli_query($connect, $qSkill) or die(mysqli_error($connect));
?>

<section class="ftco-section bg-light" id="skills-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <!-- <span class="subheading">Skills</span> -->
                <h2 class="mb-4">SKILLS</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php while ($dataSkill = mysqli_fetch_assoc($Skill)) : ?>
                    <h5 class="mb-1 fw-bold"><?= $dataSkill['skill'] ?></h5>
                    <p class="mb-1"><?= $dataSkill['description'] ?></p>
                    <div class="progress mb-4" style="height: 25px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $dataSkill['percent'] ?>%;" aria-valuenow="<?= $dataSkill['percent'] ?>" aria-valuemin="0" aria-valuemax="100">
                            <?= $dataSkill['percent'] ?>%
                        </div>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>