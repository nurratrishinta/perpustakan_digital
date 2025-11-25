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
                <h5>Ubah Data Service</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/service/show.php';
                ?>
                <form action="../../actions/service/store.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="jobInput" class="form-label">Pekerjaan Sekarang</label>
                        <input type="text" name="job" class="form-control" id="jobInput"
                            placeholder="Masukan Pekerjaan Sekarang..." required value="<?= $service->job ?>">
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/service/<?= $service->icon ?>" alt="">
                        <label for="iconInput" class="form-label">pilih gambar</label>
                        <input type="file" name="icon" class="form-control" id="iconInput" required>
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