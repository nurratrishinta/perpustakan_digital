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
                <h5>Tambah data contact</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/contact/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="contactInput" class="form-label">Judul</label>
                        <input type="text" name="contact" class="form-control" id="contactInput" placeholder="Masukan Judul..." required>
                    </div>

                    <div class="mb-3">
                        <label for="link_urlInput" class="form-label">Link_url</label>
                        <input type="link_url" name="link_url" class="form-control" id="link_urlInput" placeholder="Masukan link_url..." required>
                    </div>

                    <div class="mb-3">
                        <label for="imgInput" class="form-label">pilih gambar</label>
                        <input type="file" name="img" class="form-control" id="imgInput" required>
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