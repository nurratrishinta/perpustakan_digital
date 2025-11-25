<?php
//memanggil file koneksi
include '../koneksi.php';

//mengambil nilai dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

//mengambil nilai gari gambar
$gambar = $_FILES['gambar']['tmp_name'];

// membuat nama file baru
$nama = time() . ".png";

// proses upload foto
move_uploaded_file($gambar, "../images/" .$nama);


//proses insert ke database
$insert = "INSERT INTO  galeri(judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi',
'$nama')";
$resInsert = mysqli_query($connect, $insert) or die(mysqli_error($connect));

//alert jika data berhasil ditambahkan
echo "
 <script>
   alert('Data berhasil Ubah')
   window.location.href = '../index.php';
 </script>
";
?>