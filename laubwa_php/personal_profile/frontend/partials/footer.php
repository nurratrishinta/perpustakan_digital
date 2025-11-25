<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About</h2>
                    <p>Saya siswa dari SMK Negeri 1 Sanden, di jurusan Rekayasa Perangkat Lunak (RPL), yang saat ini sedang menjalani Praktik Kerja Lapangan (PKL) sebagai bagian dari program pendidikan kejuruan. Jurusan RPL membekali saya
                        dengan pengetahuan dan keterampilan di bidang pengembangan perangkat lunak, termasuk pemrograman..</p>
                    <?php
                    $qSocmed = "SELECT * FROM socmeds LIMIT 3";
                    $resultSocmed = mysqli_query($connect, $qSocmed) or die(mysqli_error($connect));
                    ?>
                    <?php
                    while ($item = $resultSocmed->fetch_object()):
                    ?>
                        <a href="<?= $item->link ?>">
                            <img src="../storages/socmed/<?= $item->icon; ?>" alt="<?= $item->icon; ?>" style=" width: 60px; height:60px; border-radius: 50%;">
                        </a></li>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                        <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                        <li><a href="#resume-section"><span class="icon-long-arrow-right mr-2"></span>Resume</a></li>
                        <li><a href="#services-section"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                        <li><a href="#skills-section"><span class="icon-long-arrow-right mr-2"></span>Skill</a></li>
                        <li><a href="#projects-section"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                        <li><a href="#blog-section"><span class="icon-long-arrow-right mr-2"></span>Blog</a></li>
                        <li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <?php
                $qAbout = "SELECT * FROM abouts LIMIT 1";
                $resultAbout = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
                ?>
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <?php
                            while ($item = $resultAbout->fetch_object()):
                            ?>
                                <li><span class="icon icon-map-marker"></span><span class="text"><?= $item->address ?></span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $item->phone ?></span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $item->email ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Shinta &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> froend developer<i class="icon-heart color-danger" aria-hidden="true"></i> by <a
                        href="" target="_blank"> beckend developer </a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</footer>