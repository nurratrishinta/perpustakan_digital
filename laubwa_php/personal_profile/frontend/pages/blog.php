  <?php
    $qBlog = "SELECT * FROM Blogs LIMIT 3";
    $resultBlog = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));
    ?>

  <section class="ftco-section" id="blog-section">
      <div class="container">
          <div class="row justify-content-center mb-5 pb-5">
              <div class="col-md-7 heading-section text-center ftco-animate">
                  <h1 class="big big-2">Blog</h1>
                  <h2 class="mb-4">Blog Saya</h2>
                  <p>Berikut dibawah ini beberapa kegiatan saya</p>
              </div>
          </div>
          <div class="row d-flex">
              <?php
                while ($item = $resultBlog->fetch_object()):
                ?>
                  <div class="col-md-4 d-flex ftco-animate">
                      <div class="blog-entry justify-content-end">
                          <a href="single.html" class="block-20"
                              style="background-image: url('../storages/blog/<?= $item->image ?>');">
                          </a>
                          <div class="text mt-3 float-right d-block">
                              <div class="d-flex align-items-center mb-3 meta">
                                  <p class="mb-0">
                                      <span class="mr-2"><?= $item->date; ?></span>
                                      <a href="#" class="mr-2"><?= $item->author; ?></a>
                                  </p>
                              </div>
                              <h3 class="heading"><a href="single.html"><?= $item->tittle; ?></a>
                              </h3>
                              <p><?= $item->description; ?></p>
                          </div>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
      </div>
  </section>