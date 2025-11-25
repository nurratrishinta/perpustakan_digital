<?php
include '../../../config/connection.php';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// ===== QUERY DATA USER =====
$qUser = "SELECT UserID, Username, Password, Email, NamaLengkap, Alamat FROM user ORDER BY UserID ASC";
$result = mysqli_query($connect, $qUser);

if (!$result) {
    die("Query error: " . mysqli_error($connect));
}
?>

<!-- Content Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Tabel User -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Data User</h5>
                        <a href="./create.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah User
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($user = mysqli_fetch_object($result)):
                                        // Potong alamat jika lebih dari 10 huruf
                                        $alamatTampil = strlen($user->Alamat) > 10
                                            ? substr($user->Alamat, 0, 10) . '...'
                                            : $user->Alamat;
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= htmlspecialchars($user->Username) ?></td>
                                            <td class="text-center">******</td>
                                            <td><?= htmlspecialchars($user->Email) ?></td>
                                            <td><?= htmlspecialchars($user->NamaLengkap) ?></td>
                                            <td><?= htmlspecialchars($alamatTampil) ?></td>
                                            <td class="text-center">
                                                <!-- Tombol Edit -->
                                                <a href="./edit.php?id=<?= $user->UserID ?>" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <a href="../../actions/user/destroy.php?id=<?= $user->UserID ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endwhile;

                                    if ($no === 1) {
                                        echo '<tr><td colspan="7" class="text-center">Data tidak tersedia</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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