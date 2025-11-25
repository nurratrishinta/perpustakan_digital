 <?php
    require_once '../config/connection.php';

    $qblog = "SELECT * FROM blogs";
    $blog = mysqli_query($connect, $qblog) or die(mysqli_error($connect));
    ?>

 <section class="ftco-section bg-light" id="blog-section">
     <div class="container">
         <div class="row justify-content-center mb-5 pb-5">
             <div class="col-md-7 heading-section text-center ftco-animate">
                 <!-- <span class="subheading">BLOG</span> -->
                 <h2 class="mb-4">BLOG</h2>
             </div>
         </div>
         <div class="row d-flex">
             <?php while ($datablog = mysqli_fetch_assoc($blog)) : ?>

                 <div class="col-md-4 d-flex ftco-animate">
                     <div class="blog-entry">
                         <a href="single.html" class="block-20" style="background-image: url('/laubwa_php/tugas/storages/blog/<?= htmlspecialchars($datablog['image']) ?>');">
                         </a>
                         <div class="text mt-3 float-right d-block p-3 bg-white rounded-bottom">
                             <div class="d-flex align-items-center mb-2 text-muted" style="font-size: 13px;">
                                 <span class="mr-2"><?= htmlspecialchars($datablog['date']) ?></span> |
                                 <span class="ml-2"><?= htmlspecialchars($datablog['author']) ?></span>
                             </div>

                             <h6 class="fw-bold mb-2" style="font-size: 16px;">
                                 <?= htmlspecialchars($datablog['tittle']) ?>
                             </h6>

                             <p class="mb-2 text-muted" style="font-size: 13px; line-height: 1.4;">
                                 <?= previewText($datablog['description'], 100); ?>
                             </p>

                             <a href="./pages/detail/blog.php/?id=<?= $datablog['id'] ?>" class="btn btn-sm btn-outline-primary mt-2">
                                 Lihat selengkapnya
                             </a>
                         </div>

                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>
 </section>