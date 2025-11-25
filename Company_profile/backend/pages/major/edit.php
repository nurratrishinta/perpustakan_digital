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
                <h5>Ubah Data Jurusan</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/major/show.php';
                ?>
                <form action="../../actions/major/update.php?id=<?= $major->id ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="major_nameInput" class="form-label">Nama Jurusan</label>
                        <input type="text" name="major_name" class="form-control" id="major_nameInput"
                            placeholder="Masukan nama jurusan..." required value="<?= $major->major_name ?>">
                    </div>

                    <div class="mb-3">
                        <label for="major_descriptionInput" class="form-label">Deskripsi Jurusan</label>
                        <textarea name="major_description" class="form-control" id="major_descriptionInput"
                            placeholder="Masukan deskripsi jurusan..." rows="5"><?= $major->major_description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="text" name="head" class="form-control" id="headInput"
                            placeholder="Masukan kepala jurusan..." required value="<?= $major->head ?>">
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/major/<?= $major->major_image ?>" alt="">
                        <label for="major_imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="major_image" class="form-control" id="major_imageInput" required>
                    </div>

                    <button type="submit" class="btn btn-success" name="tombol">Simpan</button>
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