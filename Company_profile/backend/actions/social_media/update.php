<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $iconNew = $social_media->icon;
    $link_url = escapeString($_POST['link_url']);
    $storages = "../../../storages/social_media/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['icon']['tmp_name'])) {
        $iconOld = $_FILES['icon']['tmp_name'];
        $iconNew = time() . '.png';

        // hapus gambar lama jika ada
        if (!empty($social_media->icon) && file_exists($storages . $social_media->icon)) {
            unlink($storages . $social_media->icon);
        }

        // simpan gambar baru
        move_uploaded_file($iconOld, $storages . $iconNew);
    }

    $qUpdate = "UPDATE social_media SET title='$title', icon='$iconNew', link_url='$link_url' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
         <script>    
            alert('Data berhasil diubah');
            window.location.href='../../pages/social_media/index.php';
        </script>
            ";
    } else {
        echo "
         <script>    
            alert('Data gagal diubah');
            window.location.href='../../pages/social_media/create.php';
         </script>
     ";
    }
}