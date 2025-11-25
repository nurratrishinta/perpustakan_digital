<?php
include '../../partials/header.php';
include '../../partials/sidenav.php';
include '../../partials/navbar.php';

$qSocial_media = "SELECT * FROM social_media";
$result = mysqli_query($connect, $qSocial_media) or die(mysqli_error($connect));
?>


<!-- content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Tabel Sosial media</h5>
                    <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Judul</th>
                                    <th>Link</th>
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
                                            <img src="../../../storages/social_media/<?= $item->icon ?>" alt="icon" width="100" height="100"></img>
                                        </td>
                                        <td><?= $item->title ?></td>
                                        <td>
                                            <?= mb_strimwidth($item->link_url, 0, 20, "...") ?>
                                        </td>
                                        <td>
                                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                            <a href="../../actions/social_media/destroy.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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