 <?php
    $qAbout = "SELECT * FROM abouts LIMIT 1";
    $resultAbout = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
    ?>

 <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
     <div class="container">
         <?php
            while ($item = $resultAbout->fetch_object()):
            ?>
             <div class="row d-flex">
                 <div class="col-md-6 col-lg-5 d-flex">
                     <div class="img-about img d-flex align-items-stretch">
                         <div class="overlay"></div>
                         <div class="img d-flex align-self-stretch align-items-center"
                             style="background-image:url(../storages/about/<?= $item->image ?>);">
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                     <div class="row justify-content-start pb-3">
                         <div class="col-md-12 heading-section ftco-animate">
                             <h1 class="big">About Me</h1>
                             <h2 class="mb-4">Tentang Saya</h2>
                             <p>Saya siswa dari SMK Negeri 1 Sanden, di jurusan Rekayasa Perangkat Lunak (RPL), yang saat ini sedang menjalani Praktik Kerja Lapangan (PKL) sebagai bagian dari program pendidikan kejuruan. Jurusan RPL membekali
                                 saya dengan pengetahuan dan keterampilan di bidang pengembangan perangkat lunak, termasuk pemrograman.</p>
                             <ul class="about-info mt-4 px-md-0 px-2">
                                 <li class="d-flex"><span>Name:</span> <span><?= $item->name ?></span></li>
                                 <li class="d-flex"><span>Date of birth:</span> <span><?= $item->born ?></span></li>
                                 <li class="d-flex"><span>Address:</span> <span><?= $item->address ?></span></li>
                                 <li class="d-flex"><span>Zip code:</span> <span><?= $item->zip_code ?></span></li>
                                 <li class="d-flex"><span>Email:</span> <span><?= $item->email ?></span></li>
                                 <li class="d-flex"><span>Phone: </span> <span><?= $item->phone ?></span></li>
                             </ul>
                         </div>
                     </div>
                     <div class="counter-wrap ftco-animate d-flex mt-md-3">
                         <div class="text">
                             <p class="mb-4">
                                 <span class="number"><?= $item->total_project ?></span>
                                 <span>Project complete</span>
                             </p>
                             <!-- <p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p> -->
                         </div>
                     </div>
                 </div>
             </div>
         <?php endwhile; ?>

     </div>
 </section>