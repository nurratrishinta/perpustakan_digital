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
                <h5>Ubah data project</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../actions/project/show.php';
                ?>
                <form action="../../actions/project/update.php?id=<?= $project->id ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" placeholder="Masukan judul...." required value="<?= $project->title ?>">
                    </div>

                    <div class="mb-3">
                        <label for="jobInput" class="form-label">pekerjaan</label>
                        <input type="text" name="job" class="form-control" id="jobInput" required value="<?= $project->job ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="decriptionInput" class="form-control"
                            placeholder="Masukan Deskripsi" rows="5" required><?= $project->description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/project/<?= $project->image ?>" alt="">
                        <label for="imageInput" class="form-label">pilih gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput">
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