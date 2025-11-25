<?php
include '../../partials/header.php';
include '../../partials/sidenav.php';
include '../../partials/navbar.php';

$qVisi_missions = "SELECT * FROM visi_missions";
$result = mysqli_query($connect, $qVisi_missions) or die(mysqli_error($connect));
?>


<!-- content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Tabel visi misi</h5>
                    <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Categori</th>
                                    <th>Text</th>
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
                                        <td><?= $item->category ?></td>
                                        <td>
                                            <?= mb_strimwidth($item->text, 0, 30, "...") ?>
                                        </td>
                                        <td>
                                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                            <a href="../../actions/visi_mission/destroy.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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