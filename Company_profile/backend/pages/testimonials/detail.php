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
                <h5>Detail Data Testimoni</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/testimonials/show.php';
                ?>
                <form action="../../actions/testimonials/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="nama" class="form-control" value="<?= $testimonials->name ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="statusInput" class="form-label">Status</label>
                        <input type="status" class="form-control" value="<?= $testimonials->status ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="messageInput" class="form-label">Pesan</label>
                        <input type="message" class="form-control" value="<?= $testimonials->message ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/testimonials/<?= $testimonials->image ?>" alt="">
                    </div>

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