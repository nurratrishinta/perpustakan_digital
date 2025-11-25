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
                <h5>Tambah Data Guru</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/teacher/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="teacher_nameInput" class="form-label">Nama Guru</label>
                        <input type="teacher_name" name="teacher_name" class="form-control" id="teacher_nameInput"
                            placeholder="Masukan Nama..." required>

                    </div>

                    <div class="mb-3">
                        <label for="teacher_majorInput" class="form-label">Jurusan Guru</label>
                        <input type="teacher_major" name="teacher_major" class="form-control" id="teacher_majorInput"
                            placeholder="Masukan Jurusan..." required>
                    </div>


                    <div class="mb-3">
                        <label for="teacher_photoInput" class="form-label">pilih gambar</label>
                        <input type="file" name="teacher_photo" class="form-control" id="teacher_photoInput" required>
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