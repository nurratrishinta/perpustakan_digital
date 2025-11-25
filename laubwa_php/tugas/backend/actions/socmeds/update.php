<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $iconNew = $socmed->icon;
    $link = escapeString($_POST['link']);
    $storages = "../../../storages/socmed/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['icon']['tmp_name'])) {
        $iconOld = $_FILES['icon']['tmp_name'];
        $iconNew = time() . '.png';

        // hapus gambar lama jika ada
        if (!empty($socmed->icon) && file_exists($storages . $socmed->icon)) {
            unlink($storages . $socmed->icon);
        }

        // simpan gambar baru
        move_uploaded_file($iconOld, $storages . $iconNew);
    }



    $qUpdate = "UPDATE socmeds SET icon='$iconNew', link='$link' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
         <script>    
            alert('Data berhasil diubah');
            window.location.href='../../pages/socmed/index.php';
        </script>
            ";
    } else {
        echo "
         <script>    
            alert('Data gagal diubah');
            window.location.href='../../pages/socmed/create.php';
         </script>
     ";
    }
}
?>