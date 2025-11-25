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
                <h5>Ubah Data Skill</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/skill/show.php';
                ?>
                <form action="../../actions/skill/update.php?id=<?= $skill->id ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="skillInput" class="form-label">Skill</label>
                        <input type="text" name="skill" class="form-control" id="skillInput"
                            placeholder="Masukan Skill" required value="<?= $skill->skill ?>">
                    </div>

                    <div class="mb-3">
                        <label for="percentInput" class="form-label">Persen</label>
                        <input type="number" name="percent" class="form-control" id="percentInput"
                            placeholder="Masukan Persen" required value="<?= $skill->percent ?>">
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