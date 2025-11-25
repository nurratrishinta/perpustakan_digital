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
                <h5>Detail Data Pengumuman</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/announcement/show.php';
                ?>
                <form action="../../actions/announcement/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="announcement_titleInput" class="form-label">Judul</label>
                        <input type="text" class="form-control" value="<?= $announcement->announcement_title ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="announcement_descriptionInput" class="form-label">Deskripsi Pengumuman</label>
                        <textarea name="announcement_description" id="announcement_descriptionInput" class="form-control" rows="5" disabled><?= $announcement->announcement_description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/announcement/<?= $announcement->announcement_image ?>" alt="">
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