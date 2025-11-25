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
                <h5>Tambah data user</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/user/show.php';
                ?>
                <form action="../../actions/user/update.php?id=<?= $user->id ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Masukan nama..." value="<?= $user->name ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="emailInput" placeholder="Masukan Email..." value="<?= $user->email ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="passwordInput" placeholder="Masukan password..." value="<?= $user->password ?>" required>
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