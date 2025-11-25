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
                <h5>Tambah data Sosial media</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/social_media/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" required>
                    </div>

                    <div class="mb-3">
                        <label for="iconInput" class="form-label">pilih icon</label>
                        <input type="file" name="icon" class="form-control" id="iconInput" placeholder="Masukan icon" required>
                    </div>

                    <div class="mb-3">
                        <label for="link_urlInput" class="form-label">link_url</label>
                        <input type="text" name="link_url" class="form-control" id="link_urlInput" placeholder="Masukan link sosial media...." required>
                    </div>

                    <button type="submit" class="btn btn-success" name="tombol">Tambah</button>
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