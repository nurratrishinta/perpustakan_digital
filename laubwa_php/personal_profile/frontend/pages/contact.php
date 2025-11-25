<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">


        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h1 class="big big-2">Contact Me</h1>
                <h2 class="mb-4">Contact Me</h2>
                <p>Silahkan Kalo Mau Cat</p>
            </div>

        </div>
        <div class="row no-gutters block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="./actions/contact.php" method="post" class="bg-light p-4 p-md-5 contact-form">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" require placeholder=" Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" require placeholder=" Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" id="subject" require placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="7" class="form-control" id="message" require placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="tombol" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>

            <div class="col-md-6 d-flex">
                <?php
                $qAbout = "SELECT * FROM abouts LIMIT 1";
                $resultAbout = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
                ?>
                <?php
                while ($item = $resultAbout->fetch_object()):
                ?>
                    <div class="img" style="background-image: url(../storages/about/<?= $item->image ?>);"></div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>