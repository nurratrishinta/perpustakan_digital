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
                <h5>Ubah Data Kerja sama</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/cooperations/show.php';
                ?>
                <form action="../../actions/cooperations/store.php" method="POST" enctype="multipart/form-data">



                    <div class="mb-3">
                        <label for="linkInput" class="form-label">Judul</label>
                        <input type="text" name="link" class="form-control" id="linkInput"
                            placeholder="Masukan link..." required value="<?= $cooperations->link ?>">
                    </div>


                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/cooperations/<?= $cooperations->image ?>" alt="">
                        <label for="imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput" required>
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