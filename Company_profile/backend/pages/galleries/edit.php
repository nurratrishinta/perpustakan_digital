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
                <h5>Ubah Data Galeri</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/galleries/show.php';
                ?>
                <form action="../../actions/galleries/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" id="descriptionInput"
                            placeholder="Masukan Deskripsi ..." rows="5"><?= $galleries->description ?></textarea>
                    </div>


                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/galleries/<?= $galleries->image ?>" alt="">
                        <label for="imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput">
                    </div>


                    <button type="submit" class="btn btn-success" name="tombol">Simpan</button>
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