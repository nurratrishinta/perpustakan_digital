<?php
//memanggil file koneksi
include '../koneksi.php';

 if(isset($_GET)){
    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    //mengambil nilai gari gambar
    $gambar = $_FILES['gambar']['tmp_name'];

    // membuat nama file baru
    $nama = time() . ".png";

    // proses upload foto
    move_uploaded_file($gambar, "../images/" .$nama);

    //proses upddate ke database
    $qUpdate = "UPDATE galeri SET judul='$judul',deskripsi='$deskripsi', gambar='$nama'WHERE id='$id'";
    $resUpdate= mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    //alert jika data berhasil ditambahkan
    if($resUpdate){
     echo "
        <script>
        alert('Data berhasil ditambahkan')
        window.location.href = '../index.php';
        </script>
        ";

    }
   
}
?>