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
                <h5>Detail Data Kerja sama</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/cooperations/show.php';
                ?>
                <form action="../../actions/cooperations/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="linkInput" class="form-label">link</label>
                        <input type="link" class="form-control" value="<?= $cooperations->link ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/cooperations/<?= $cooperations->image ?>" alt="">
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