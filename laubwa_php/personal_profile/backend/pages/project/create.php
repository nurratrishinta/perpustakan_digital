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
                <h5>Tambah Data Project</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/project/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput"
                            placeholder="Masukan judul..." required>
                    </div>

                    <div class="mb-3">
                        <label for="jobInput" class="form-label">Pekerjaan</label>
                        <input type="text" name="job" class="form-control" id="jobInput"
                            placeholder="Masukan Pekerjaan..." required>
                    </div>

                    <div class="mb-3">
                        <label for="imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput" required>
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