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
                <h5>Detail Data About</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/about/show.php';
                ?>
                <form>
                    <div class="mb-3">
                        <label for="school_name" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" value="<?= $about->school_name ?>" disabled>
                    </div>


                    <div class="mb-3">
                        <label for="school_logo" class="form-label">Logo Sekolah</label>
                        <input type="text" class="form-control" value="<?= $about->school_logo ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="school_banner" class="form-label">Banner Sekolah</label>
                        <input type="text" class="form-control" value="<?= $about->school_banner ?>" disabled>
                    </div>



                    <div class="mb-3">
                        <label for="school_tagline" class="form-label">Slogan Sekolah</label>
                        <input type="text" class="form-control" value="<?= $about->school_tagline ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="school_description" class="form-label">Deskripsi Sekolah</label>
                        <textarea name="school_description" id="school_description" class="form-control"
                            rows="5" disabled><?= $about->school_description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sinceInput" class="form-label">Sejak</label>
                        <input type="dete" class="form-control" value="<?= $about->since ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="alamatInput" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamatInput" class="form-control"
                            rows="5" disabled><?= $about->alamat ?></textarea>
                    </div>

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