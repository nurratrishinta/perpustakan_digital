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
                <h5>Ubah Data Sosial Media</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/social_media/show.php';
                ?>
                <form action="../../actions/social_media/update.php?id=<?= $social_media->id ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="linkInput"
                            placeholder="Masukan judul sosial media...." value="<?= $social_media->title ?>" required>
                    </div>


                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/social_media/<?= $social_media->icon ?>" alt="">
                        <label for="iconInput" class="form-label">Pilih Icon</label>
                        <input type="file" name="icon" class="form-control" id="iconInput">
                    </div>

                    <div class="mb-3">
                        <label for="link_urlInput" class="form-label">Link Sosial Media</label>
                        <input type="text" name="link_url" class="form-control" id="linkInput"
                            placeholder="Masukan link sosial media...." value="<?= $social_media->link_url ?>" required>
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