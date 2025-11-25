<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $job = escapeString($_POST['job']);

    $iconNew = $service->icon;

    $storages = "../../../storages/service/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['icon']['tmp_name'])) {
        $iconOld = $_FILES['icon']['tmp_name'];
        $iconNew = time() . '.png';

        // hapus gambar lama jika ada
        if (!empty($service->icon) && file_exists($storages . $service->icon)) {
            unlink($storages . $service->icon);
        }

        // simpan gambar baru
        move_uploaded_file($iconOld, $storages . $iconNew);
    }

    $qUpadate = "UPDATE services SET job='$job', icon='$iconNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpadate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
            <script>    
                alert('Data berhasil ubah');
                window.location.href='../../pages/service/index.php';
            </script>
            ";
    } else {
        echo " 
            <script>    
                alert('Gagal di ubah');
                window.location.href='../../pages/service/edit.php';
            </script>
            ";
    }
}
?>