 <?php
    $qHome = "SELECT * FROM abouts LIMIT 3";
    $resultHome = mysqli_query($connect, $qHome) or die(mysqli_error($connect));
    ?>
 <section id="home-section" class="hero">
     <div class="home-slider  owl-carousel">
         <?php
            while ($item = $resultHome->fetch_object()):
            ?>
             <div class="slider-item ">
                 <div class="overlay"></div>
                 <div class="container">
                     <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                         <div class="one-third js-fullheight order-md-last img"
                             style="background-image:url(../storages/about/<?= $item->image ?>); width:50%">
                             <div class="overlay"></div>
                         </div>
                         <div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                             <div class="text">
                                 <span class="subheading">Hello!</span>
                                 <h1 class="mb-4 mt-3">I'm <span><?= $item->name ?></span></h1>
                                 <h2 class="mb-4"><?=$item ->work?></h2>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         <?php endwhile; ?>
     </div>
 </section>