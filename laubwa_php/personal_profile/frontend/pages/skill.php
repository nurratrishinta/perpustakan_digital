 <?php
    $qSkill = "SELECT * FROM Skills LIMIT 3";
    $resultSkill = mysqli_query($connect, $qSkill) or die(mysqli_error($connect));
    ?>

 <section class="ftco-section" id="skills-section">
     <div class="container">
         <div class="row justify-content-center pb-5">
             <div class="col-md-12 heading-section text-center ftco-animate">
                 <h1 class="big big-2">Skills</h1>
                 <h2 class="mb-4">My Skills</h2>
                 <p></p>
             </div>
         </div>
         <div class="row">
             <?php
                while ($item = $resultSkill->fetch_object()):
                ?>
                 <div class="col-md-6 animate-box">
                     <div class="progress-wrap ftco-animate">
                         <h3><?= $item->skill; ?></h3>
                         <div class="progress">
                             <div class="progress-bar color-1" role="progressbar" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                 <span><?= $item->percent; ?></span>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>
 </section>