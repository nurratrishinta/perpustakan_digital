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
                <h5>Tambah Data Skill</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/skill/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="skillInput" class="form-label">skill</label>
                        <input type="text" name="skill" class="form-control" id="sekillInput"
                            holder="Masukan skill..." required>
                    </div>


                    <div class="mb-3">
                        <label for="percentInput" class="form-label">persen</label>
                        <input type=percent name="percent" class="form-control" id="percentInput"
                            placeholder="Masukan persen" required>
                    </div>

                    <div class=" mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="decriptionInput" class="form-control"
                            placeholder="Masukan Deskripsi" rows="5" required></textarea>
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