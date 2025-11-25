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
                <h5>Ubah data about</h5>
            </div>
            <div class="card-body">
                <form action="../../actions/about/store.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="school_nameInput" class="form-label">Nama Sekolah</label>
                        <input type="text" name="school_name" class="form-control" id="school_nameInput" placeholder="Masukan Nama...." required>
                    </div>

                    <div class="mb-3">
                        <label for="school_taglineInput" class="form-label">Slogan Sekolah</label>
                        <input type="text" name="school_tagline" class="form-control" id="school_taglineInput" placeholder="Masukan slogan" required>
                    </div>

                    <div class="mb-3">
                        <label for="school_descriptionInput" class="form-label">Deskripsi Sekolah</label>
                        <input type="text" name="school_description" class="form-control" id="school_descriptionInput" placeholder="Masukan deskripsi..." required>
                    </div>

                    <div class="mb-3">
                        <label for="sinceInput" class="form-label">Sejak</label>
                        <input type="date" name="since" class="form-control" id="sinceInput" placeholder="Masukan sejak..." required>
                    </div>

                    <div class="mb-3">
                        <label for="alamatInput" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" rows="5"></textarea>
                    </div>



                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/about/" alt="">
                        <label for="school_bannerInput" class="form-label">pilih gambar</label>
                        <input type="file" name="school_banner" class="form-control" id="school_bannerInput">
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/about/" alt="">
                        <label for="school_logoInput" class="form-label">pilih gambar</label>
                        <input type="file" name="school_logo" class="form-control" id="school_logoInput">
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