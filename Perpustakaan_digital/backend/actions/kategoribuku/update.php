<?php
include '../../app.php';
include './show.php'; // koneksi

if (isset($_POST['tombol'])) {
    $id = intval($_POST['KategoriID']); // ambil ID kategori
    $namaKategori = escapeString($_POST['NamaKategori']);

    $qUpdate = "UPDATE kategori 
                SET NamaKategori = '$namaKategori'
                WHERE KategoriID = $id";

    $result = mysqli_query($connect, $qUpdate);

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/kategoribuku/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal diubah: " . mysqli_error($connect) . "');
                window.location.href='../../pages/kategoribuku/edit.php?id=$id';
              </script>";
    }
} else {
    // kalau file ini diakses langsung tanpa submit
    header("Location: ../../pages/kategoribuku/index.php");
    exit;
}
?>
