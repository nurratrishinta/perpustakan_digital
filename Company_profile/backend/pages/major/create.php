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
                <h5>Tambah Data Jurusan</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/major/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="major_nameInput" class="form-label">Nama Jurusan</label>
                        <input type="major_name" name="major_name" class="form-control" id="major_nameInput"
                            placeholder="Masukan Nama jurusan..." required>
                    </div>

                    <div class="mb-3">
                        <label for="major_descriptionInput" class="form-label">Deskripsi Jurusan</label>
                        <textarea name="major_description" id="major_descriptionInput" class="form-control"
                            placeholder="Masukan Deskripsi jurusan..." rows="5"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="head" name="head" class="form-control" id="headInput"
                            placeholder="Masukan Kepala jurusan..." required>
                    </div>



                    <div class="mb-3">
                        <label for="major_imageInput" class="form-label">Gambar</label>
                        <input type="file" name="major_image" class="form-control" id="major_imageInput"
                            placeholder="Masukan Pilih Gambar..." required>
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