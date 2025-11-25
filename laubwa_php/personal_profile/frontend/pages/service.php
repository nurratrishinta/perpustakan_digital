 <?php
    $qService = "SELECT * FROM Services LIMIT 3";
    $resultService = mysqli_query($connect, $qService) or die(mysqli_error($connect));
    ?>

 <section class="ftco-section" id="services-section">
     <div class="container">
         <div class="row justify-content-center py-5 mt-5">
             <div class="col-md-12 heading-section text-center ftco-animate">
                 <h1 class="big big-2">Services</h1>
                 <h2 class="mb-4">Services</h2>
                 <p></p>
             </div>
         </div>
         <div class="row">
             <?php
                while ($item = $resultService->fetch_object()):
                ?>
                 <div class="col-md-4 text-center d-flex ftco-animate">
                     <a href="#" class="services-1">
                         <span class="icon">
                            <img src="../storages/service/<?= $item->icon;?>"  style="width: 60px; border-radius: =100;">
                         </span>
                         <div class="desc">
                             <h3 class="mb-5"><?= $item->job; ?></h3>
                         </div>
                     </a>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>
 </section>