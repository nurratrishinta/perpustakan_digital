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
                <h5>Ubah Data About</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/about/show.php';
                ?>
                <form action="../../actions/about/update.php?id=<?= $about->id?>" method="POST"
                 enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nameInput"
                            placeholder="Masukan Nama..." required value="<?= $about->name ?>">
                    </div>

                    <div class="mb-3">
                        <label for="bornInput" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="born" class="form-control" id="bornInput"
                            required value="<?= $about->born ?>">
                    </div>

                    <div class="mb-3">
                        <label for="zip_codeInput" class="form-label">Kode Pos</label>
                        <input type="number" name="zip_code" class="form-control" id="zip_codeInput"
                            placeholder="Masukan Kode Pos..." required value="<?= $about->zip_code ?>">
                    </div>

                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailInput"
                            placeholder="Masukan Email..." required value="<?= $about->email ?>">
                    </div>

                    <div class="mb-3">
                        <label for="phoneInput" class="form-label">No Telepon</label>
                        <input type="text" name="phone" class="form-control" id="phoneInput"
                            placeholder="Masukan Nomer Telepon..." required value="<?= $about->phone ?>">
                    </div>

                    <div class="mb-3">
                        <label for="projectInput" class="form-label">Total projek</label>
                        <input type="number" name="total_project" class="form-control" id="projectInput"
                            placeholder="Masukan Total Projek..." required value="<?= $about->total_project ?>">
                    </div>

                    <div class="mb-3">
                        <label for="workInput" class="form-label">Pekerjaan Sekarang</label>
                        <input type="text" name="work" class="form-control" id="workInput"
                            placeholder="Masukan Pekerjaan Sekarang..." required value="<?= $about->work ?>">
                    </div>

                    <div class="mb-3">
                        <label for="addressInput" class="form-label">Alamat</label>
                        <textarea name="address" id="addressInput" class="form-control"
                            placeholder="Masukan Alamat" rows="5"><?= $about->address?></textarea>
                    </div>


                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/about/<?= $about->image?>" alt="">
                        <label for="gambarInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput"
                            placeholder="Masukan Pilih Gambar...">
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