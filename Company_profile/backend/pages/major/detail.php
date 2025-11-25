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
                <h5>Detail Data Jurusan</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/major/show.php';
                ?>
                <form action="../../actions/major/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="major_nameInput" class="form-label">Nama Jurusan</label>
                        <input type="major_name" class="form-control" value="<?= $major->major_name ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="major_descriptionInput" class="form-label">Deskripsi Jurusan</label>
                        <textarea name="major_description" id="major_descriptionInput" class="form-control"
                            rows="5" disabled><?= $major->major_description ?></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="head" class="form-control" value="<?= $major->head ?>" disabled>
                    </div>


                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/major/<?= $major->major_image ?>" alt="">
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