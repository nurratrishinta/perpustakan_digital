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
                <h5> Data Services</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/service/store.php" method="POST" enctype="multipart/form-data">

                    <div class=" mb-3">
                        <label for="jobInput" class="form-label">Perkerjaan</label>
                        <input type="text" name="job" class="form-control" id="jobInput"
                            placeholder="Masukan Perkerjaan..." required>
                    </div>


                    <div class=" mb-3">
                            <label for="iconInput" class="form-label">pilih gambar</label>
                            <input type="file" name="icon" class="form-control" id="iconInput">
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