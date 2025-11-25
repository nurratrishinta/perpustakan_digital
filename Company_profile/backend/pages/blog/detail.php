<?php
include '../../partials/header.php';
include '../../partials/sidenav.php';
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
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" value="<?= $blog->title ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="contentInput" class="form-label">content</label>
                        <input type="text" class="form-control" value="<?= $blog->content ?>" disabled>
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