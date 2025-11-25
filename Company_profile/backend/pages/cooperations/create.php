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
                <h5>Tambah Data Kerja sama</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/cooperations/store.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="linkInput" class="form-label">link</label>
                        <input type="link" name="link" class="form-control" id="linkInput"
                            placeholder="Masukan link..." required>
                    </div>



                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput"
                            placeholder="Masukan Pilih Gambar..." required>
                    </div>

                    <button type="submit" class="btn btn-success" name="tombol">Tambah</button>
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