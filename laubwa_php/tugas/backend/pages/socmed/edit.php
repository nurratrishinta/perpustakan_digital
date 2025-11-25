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
                <h5>Ubah Data Sosial Media</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/socmeds/show.php';
                ?>
                <form action="../../actions/socmeds/update.php?id=<?= $socmed->id ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class=" mb-3">
                        <img class="w-25" src="../../../storages/socmed/<?= $socmed->icon ?>" alt="">
                        <label for="iconInput" class="form-label"> pilih Icon</label>
                        <input type="file" name="icon" class="form-control" id="iconInput">
                    </div>


                    <div class=" mb-3">
                        <label for="linkInput" class="form-label">link Sosial Media</label>
                        <input type="url" name="link" class="form-control" id="linkInput"
                            placeholder="Masukan link sosial media.." required value="<?= $socmed->link ?>">
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