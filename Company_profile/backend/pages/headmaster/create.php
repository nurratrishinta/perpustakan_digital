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
                <h5>Tambah Data Kepala sekolah</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/headmaster/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="headmaster_nameInput" class="form-label">Nama</label>
                        <input type="headmaster_name" name="headmaster_name" class="form-control" id="headmaster_nameInput"
                            placeholder="Masukan Nama..." required>
                    </div>

                    <div class="mb-3">
                        <label for="headmaster_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="headmaster_description" id="headmaster_descriptionInput" class="form-control"
                            placeholder="Masukan Deskripsi ..." rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="headmaster_photoInput" class="form-label">pilih gambar</label>
                        <input type="file" name="headmaster_photo" class="form-control" id="headmaster_photoInput" required>
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