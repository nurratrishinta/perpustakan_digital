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
                <h5>Detail Data Galeri</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/galleries/show.php';
                ?>
                <form action="../../actions/galleries/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="descriptionInput" class="form-control"
                            rows="5" disabled><?= $galleries->description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/galleries/<?= $galleries->image ?>" alt="">
                    </div>


                    <a href="./index.php" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>