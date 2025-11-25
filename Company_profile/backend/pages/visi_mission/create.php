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
                <h5>Tambah data visi misi</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/visi_mission/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="categoryInput" class="form-label">Pilih Kategori</label>
                        <select name="category" class="form-control" id="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="visi">Visi</option>
                            <option value="misi">Misi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="textInput" class="form-label">Deskripsi</label>
                        <input type="text" name="text" class="form-control" id="text" placeholder="Masukan text...." required>
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