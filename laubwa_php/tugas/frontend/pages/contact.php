 <?php
    require_once __DIR__ . '/../../config/connection.php';

    $qAbout = "SELECT * FROM abouts";
    $about = mysqli_query($connect, $qAbout) or die(mysqli_error($connect));
    $dataAbout = mysqli_fetch_assoc($about);
    ?>

 <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
     <div class="container">
         <div class="row justify-content-center mb-5 pb-3">
             <div class="col-md-7 heading-section text-center ftco-animate">
                 <!-- <span class="subheading">CONTACT</span> -->
                 <h2 class="mb-4">CONTACT ME</h2>
             </div>
         </div>

         <div class="row block-9">
             <div class="col-md-8">
                 <form action="./action/contact.php" method="POST">
                     <div class="row">
                         <input type="text" name="name" class="form-control" required placeholder="Nama">
                         <input type="text" name="email" class="form-control" required placeholder="Email">
                         <input type="text" name="subject" class="form-control" required placeholder="Subject">
                         <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Pesan" required></textarea>

                         <button type="submit" class="btn btn-primary py-3 px-5 my-5" name="tombol">Tambah</button>
                     </div>
                 </form>
             </div>

             <div class="col-md-4 d-flex pl-md-5">
                 <div class="row">
                     <div class="dbox w-100 d-flex">
                         <div class="icon d-flex align-items-center justify-content-center">
                             <span class="fa fa-map-marker"></span>
                         </div>
                         <div class="text">
                             <p><span>Addres:</span><?= $dataAbout['address'] ?></p>
                         </div>
                     </div>
                     <div class="dbox w-100 d-flex">
                         <div class="icon d-flex align-items-center justify-content-center">
                             <span class="fa fa-phone"></span>
                         </div>
                         <div class="text">
                             <p><span>Phone number:</span> <a href="tel://1234567920"><?= $dataAbout['phone'] ?></a></p>
                         </div>
                     </div>
                     <div class="dbox w-100 d-flex">
                         <div class="icon d-flex align-items-center justify-content-center">
                             <span class="fa fa-paper-plane"></span>
                         </div>
                         <div class="text">
                             <p><span>E-mail:</span> <a href="mailto:info@yoursite.com"><?= $dataAbout['email'] ?></a></p>
                         </div>
                     </div>

                 </div>
                 <!-- <div id="map" class="map"></div> -->
             </div>
         </div>
     </div>
 </section>