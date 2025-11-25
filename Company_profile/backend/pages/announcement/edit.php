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
                <h5>Ubah Data Pengumuman</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/announcement/show.php';
                ?>
                <form action="../../actions/announcement/store.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="announcement_titleInput" class="form-label">Judul Pengumuman</label>
                        <input type="announcement_title" name="announcement_title" class="form-control" id="announcement_titleInput"
                            placeholder="Masukan judul..." required value="<?= $announcement->announcement_title ?>">
                    </div>


                    <div class="mb-3">
                        <label for="announcement_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="announcement_description" class="form-control" id="announcement_descriptionInput"
                            placeholder="Masukan Deskripsi ..." rows="5"><?= $announcement->announcement_description ?></textarea>
                    </div>



                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/announcement/<?= $announcement->announcement_image ?>" alt="">
                        <label for="announcement_imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="announcement_image" class="form-control" id="announcement_imageInput" required>
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