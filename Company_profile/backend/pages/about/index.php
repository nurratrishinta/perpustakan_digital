<?php
include '../../partials/header.php';
include '../../partials/sidenav.php';
include '../../partials/navbar.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
?>


<!-- content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Tabel About</h5>
                    <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Logo</th>
                                    <th>Banner</th>
                                    <th>Nama</th>
                                    <th>Slogan</th>
                                    <th>Deskripsi</th>
                                    <th>Sejak</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($item = $result->fetch_object()):
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <img src="../../../storages/about/<?= $item->school_logo ?>" alt="Gambar" width="100" height="100">
                                        </td>

                                        <td>
                                            <img src="../../../storages/about/<?= $item->school_banner ?>" alt="Gambar" width="100" height="100">
                                        </td>

                                        <td><?= $item->school_name ?></td>
                                        <td>
                                            <?= mb_strimwidth($item->school_tagline, 0, 10, "...") ?>
                                        </td>
                                        <td>
                                            <?= mb_strimwidth($item->school_description, 0, 10, "...") ?>
                                        </td>
                                        <td><?= $item->since ?></td>
                                        <td>
                                            <?= mb_strimwidth($item->alamat, 0, 20, "...") ?>
                                        </td>
                                        <td>
                                            <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success">Detail</a>
                                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                            <a href="../../actions/about/destroy.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>