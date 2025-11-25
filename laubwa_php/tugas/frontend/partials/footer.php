 <?php
    require_once '../config/connection.php';


    $qAbout = "SELECT * FROM abouts LIMIT 1";
    $about = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
    $dataAbout = mysqli_fetch_assoc($about);
    ?>

 <footer class="ftco-footer ftco-section">
     <div class="container">
         <div class="row mb-5">
             <div class="col-md">
                 <div class="ftco-footer-widget mb-4">
                     <h2 class="ftco-heading-2">About Me</h2>
                     <p>Saya siswa dari SMK Negeri 1 Sanden, di jurusan Rekayasa Perangkat Lunak (RPL), yang saat ini sedang menjalani Praktik Kerja Lapangan (PKL) sebagai bagian dari program pendidikan kejuruan..</p>
                     <p><a href="#about-section" class="btn btn-primary">Learn more</a></p>
                 </div>
             </div>
             <div class="col-md">
                 <div class="ftco-footer-widget mb-4 ml-md-4">
                     <h2 class="ftco-heading-2">Links</h2>
                     <ul class="list-unstyled">
                         <li><a href="#home-section"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
                         <li><a href="#about-section"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
                         <li><a href="#resume-section"><span class="fa fa-chevron-right mr-2"></span>Resume</a></li>
                         <li><a href="#services-section"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
                         <li><a href="#projects-section"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
                         <li><a href="#blog-section"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                         <li><a href="#contact-section"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-md">
                 <div class="ftco-footer-widget mb-4">
                     <h2 class="ftco-heading-2">You Can Ask Here</h2>
                     <div class="block-23 mb-3">
                         <ul>
                             <li><span class="icon fa fa-map marker"></span><span class="text"><?= $dataAbout['address'] ?></span></li>
                             <li><a href="#"><span class="icon fa fa-phone"></span><span class="text"><?= $dataAbout['phone'] ?></span></a></li>
                             <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text"><?= $dataAbout['email'] ?></span></a></li>
                         </ul>
                     </div>

                     <?php
                        $qSocmed = "SELECT * FROM socmeds LIMIT 3";
                        $resultSocmed = mysqli_query($connect, $qSocmed) or die(mysqli_error($connect));
                        ?>
                     <?php
                        while ($item = $resultSocmed->fetch_object()):
                        ?>
                         <a href="<?= $item->link ?>">
                             <img src="../storages/socmed/<?= $item->icon; ?>" alt="<?= $item->icon; ?>" style="width: 40px; height:40px; border-radius: 50%; margin-right: 10px;">
                         </a>

                     <?php endwhile; ?>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 text-center">

                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     <script>
                         //  document.write(new Date().getFullYear());
                     </script> SHINTA | SMK N 1 SANDEN WEB DEVELOPER <i class="fa fa-heart" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                 </p>
             </div>
         </div>
     </div>
 </footer>