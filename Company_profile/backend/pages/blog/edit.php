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
                <h5>Ubah Data Blog</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/blog/show.php';
                ?>
                <form action="../../actions/blog/store.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput"
                            placeholder="Masukan judul..." required value="<?= $blog->title ?>">
                    </div>

                    <div class="mb-3">
                        <label for="contentInput" class="form-label">Content</label>
                        <input type="text" name="content" class="form-control" id="contentInput"
                            placeholder="Masukan content..." required value="<?= $blog->content ?>">
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