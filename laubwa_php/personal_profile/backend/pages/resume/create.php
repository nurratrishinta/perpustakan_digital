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
                <h5>Tambah Data Riwayat</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/resume/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Periode</label>
                        <input type="text" name="date" class="form-control" id="dateInput"
                            placeholder="contoh : 2016 - 2019" required>
                    </div>

                    <div class="mb-3">
                        <label for="jobInput" class="form-label">Perkerjaan / Pendidikan</label>
                        <input type="text" name="job" class="form-control" id="jobInput"
                            placeholder="Masukan Perkerjaan / Pendidikan" required>
                    </div>

                    <div class="mb-3">
                        <label for="placeInput" class="form-label">Tempat</label>
                        <input type="text" name="place" class="form-control" id="placeInput"
                            placeholder="Masukan Tempat" required>
                    </div>


                    <div class="mb-3">
                        <label for="decriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="decriptionInput" class="form-control"
                            placeholder="Masukan Deskripsi" rows="5"></textarea>
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