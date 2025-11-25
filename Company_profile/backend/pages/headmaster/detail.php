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
                <h5>Detail Data Kepala sekolah</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/headmaster/show.php';
                ?>
                <form action="../../actions/headmaster/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="headmaster_nameInput" class="form-label">Nama</label>
                        <input type="headmaster_name" class="form-control" value="<?= $headmaster->headmaster_name ?>" disabled>
                    </div>


                    <div class="mb-3">
                        <label for="headmaster_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="headmaster_description" id="headmaster_descriptionInput" class="form-control"
                            rows="5" disabled><?= $headmaster->headmaster_description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/headmaster/<?= $headmaster->headmaster_photo ?>" alt="">
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