<?php
include '../../../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    if (empty($_POST['id_pengaduan']) || empty($_POST['id_petugas'])) {
        die("Pengaduan atau Petugas harus dipilih!");
    }

    // Ambil data dari form
    $id_pengaduan   = mysqli_real_escape_string($connect, $_POST['id_pengaduan']);
    $id_petugas     = mysqli_real_escape_string($connect, $_POST['id_petugas']);
    $buku      = mysqli_real_escape_string($connect, $_POST['buku']);
    

    // Simpan ke database
    $query = "
        INSERT INTO buku (id_pengaduan, tgl_buku, buku, id_petugas)
        VALUES ('$id_pengaduan', '$tgl_buku', '$buku', '$id_petugas')
    ";

    if (mysqli_query($connect, $query)) {
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='../../pages/buku/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data: " . mysqli_error($connect) . "');
                window.location.href='../../pages/buku/create.php';
              </script>";
    }
}
?>
