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
                <h5>Ubah Data Guru</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/teacher/show.php';
                ?>
                <form action="../../actions/teacher/store.php" method="POST" enctype="multipart/form-data">


                    <div class="mb-3">
                        <label for="teacher_nameInput" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" value="<?= $teacher->teacher_name ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="teacher_majorInput" class="form-label">Jurusan Guru</label>
                        <input type="text" class="form-control" value="<?= $teacher->teacher_major ?>" disabled>
                    </div>



                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/teacher/<?= $teacher->teacher_photo ?>" alt="">
                    </div>

                    <button type="submit" class="btn btn-success" name="tombol">Simpan</button>
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