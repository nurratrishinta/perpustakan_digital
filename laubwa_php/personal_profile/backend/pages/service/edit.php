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
                <h5>Ubah Data service</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/service/show.php';
                ?>
                <form action="../../actions/service/update.php?id=<?= $service->id ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class=" mb-3">
                            <label for="jobInput" class="form-label">Perkerjaan</label>
                            <input type="jobInput" name="job" class="form-control" id="jobInput"
                                typeholder="Masukan Perkerjaan" required value="<?= $service->job ?>">
                        </div>


                        <div class=" mb-3">
                            <icon class="w-25" src="../../../storages/service/<?=$service->icon?>" alt="">
                            <label for="iconInput" class="form-label">pilih gambar</label>
                            <input type="file" name="icon" class="form-control" id="iconInput">
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