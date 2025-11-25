<?php
require_once '../config/connection.php';


$qAbout = "SELECT * FROM abouts LIMIT 1";
$about = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
$dataAbout = mysqli_fetch_assoc($about);
?>

<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex no-gutters align-items-stretch">
            <!-- Bagian Gambar -->
            <div class="col-md-6 col-lg-5 d-flex" style="margin-top: 100px;">
                <div class="img-about img position-relative w-100" style="overflow: hidden;">
                    <!-- <div class="overlay position-absolute w-100" style="z-index: 1;"></div> -->
                    <img src="../storages/about/<?= $dataAbout['image'] ?>" alt=""
                        class="img-cover position-absolute w-100" style="object-fit: cover; z-index: 0;">
                </div>
            </div>

            <!-- Bagian Teks -->
            <div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5 d-flex align-items-center">
                <div class="py-md-5 w-100">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">ABOUT ME</h2>
                            <p>Saya siswa dari SMK Negeri 1 Sanden, di jurusan Rekayasa Perangkat Lunak (RPL), yang saat ini sedang menjalani Praktik Kerja Lapangan (PKL) sebagai bagian dari program pendidikan kejuruan. Jurusan RPL membekali saya dengan pengetahuan dan keterampilan di bidang pengembangan perangkat lunak, termasuk pemrograman.</p>

                            <ul class="about-info mt-4 px-md-0 px-2">
                                <li class="d-flex"><span>Neme:</span> <span><?= $dataAbout['name'] ?></span></li>
                                <li class="d-flex"><span>Date of birth:</span><span><?= $dataAbout['born'] ?></span></li>
                                <li class="d-flex"><span>Addres:</span> <span><?= $dataAbout['address'] ?></span></li>
                                <li class="d-flex"><span>Postal code:</span> <span><?= $dataAbout['zip_code'] ?></span></li>
                                <li class="d-flex"><span>E-mail:</span> <span><?= $dataAbout['email'] ?></span></li>
                                <li class="d-flex"><span>Phone number: </span> <span><?= $dataAbout['phone'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>