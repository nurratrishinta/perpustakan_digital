<?php
     include '../koneksi.php';
    // cek apakah ID ada
     if(isset($_GET['id'])){
        $id = $_GET['id'];
        // ambil data berdasarkan id
        $qSearch = "SELECT * FROM galeri WHERE id='$id'";
        $resultSearch = mysqli_query($connect, $qSearch) or die(mysqli_error($connect));
        $dataLama = mysqli_fetch_object($resultSearch);

        $pathGambar = "../images/" . $dataLama->gambar;
        //cek jika ada file di folder images
        if(file_exists($pathGambar)){
            // hapus gambar
            unlink($pathGambar);
        }
        // query hapus data 
        $qDelete = "DELETE FROM galeri WHERE id = '$id'";
        $resultDelete = mysqli_query($connect, $qDelete);


        if($resultDelete){
        echo "
        <script>
        alert('Data berhasil dihapus')
        window.location.href = '../index.php';
        </script>
        ";

        }
     }
?>