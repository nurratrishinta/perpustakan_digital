<?php
include '../../app.php';
include './show.php'; // koneksi


if (isset($_POST['tombol'])) {
    $tgl_buku = escapeString($_POST['tgl_buku']);
    $buku = escapeString($_POST['buku']);
    
  


   
    $qUpdate = "UPDATE buku 
                SET tgl_buku='$tgl_buku', buku='$buku','";


    $result = mysqli_query($connect, $qUpdate);

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/buku/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal diubah: " . mysqli_error($connect) . "');
                window.location.href='../../pages/buku/edit.php';
              </script>";
    }
} else {
    // kalau file ini diakses langsung tanpa submit
    header("Location: ../../pages/buku/index.php");
    exit;
}
?>
