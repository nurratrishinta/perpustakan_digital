 <?php
    $qProject = "SELECT * FROM Projects LIMIT 3";
    $resultProject = mysqli_query($connect, $qProject) or die(mysqli_error($connect));
    ?>


 <section class="ftco-section ftco-project" id="projects-section">
     <div class="container">
         <div class="row justify-content-center pb-5">
             <div class="col-md-12 heading-section text-center ftco-animate">
                 <h1 class="big big-2">Projects</h1>
                 <h2 class="mb-4">Our Projects</h2>
                 <p>Ini sebagian tugas saya di masa pkl</p>
             </div>
         </div>
         <div class="row">
             <?php
                while ($item = $resultProject->fetch_object()):
                ?>
                 <div class="col-md-4">
                     <div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url( ../storages/project/<?= $item->image ?>);">
                         <div class="overlay"></div>
                         <div class="text text-center p-4">
                             <h3><a href="#"><?= $item->title; ?></a></h3>
                             <span><?= $item->job; ?></span>
                         </div>
                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>
 </section>