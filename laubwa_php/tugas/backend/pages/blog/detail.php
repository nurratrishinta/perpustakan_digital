<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>


<!-- content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data Blog</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/blog/show.php';
                ?>
                <form action="../../actions/blog/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" value="<?= $blog->date ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="authorInput" class="form-label">Penulis</label>
                        <input type="text" class="form-control" value="<?= $blog->author ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="tittleInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" value="<?= $blog->tittle ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="5" disabled><?= $blog->description ?>"></textarea>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/blog/<?= $blog->image ?>" alt="">
                    </div>


                    <a href="./index.php" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>