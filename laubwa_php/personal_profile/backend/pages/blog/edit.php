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
                <h5>Ubah Data Blog</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/blog/show.php';
                ?>
                <form action="../../actions/blog/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="dateInput"
                            placeholder="Masukan Tanggal...." required value="<?= $blog->date ?>">
                    </div>

                    <div class="mb-3">
                        <label for="authorInput" class="form-label">Penulis</label>
                        <input type="text" name="author" class="form-control" id="authorInput"
                            placeholder="Masukan pembuat..." required value="<?= $blog->author ?>">
                    </div>

                    <div class="mb-3">
                        <label for="tittleInput" class="form-label">Judul</label>
                        <input type="text" name="tittle" class="form-control" id="tittleInput"
                            placeholder="Masukan judul..." required value="<?= $blog->tittle ?>">
                    </div>

                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="Masukan deskripsi" rows="5"><?= $blog->description ?>"></textarea>
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/blog/<?= $blog->image ?>" alt="">
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
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>