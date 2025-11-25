<?php
include '../../app.php';
include './show.php';


if (isset($_POST['tombol'])) {
    $contact = escapeString($_POST['contact']);
    $img = escapeString($_POST['img']);
    $link_url = escapeString($_POST['link_url']);
  
    // cek apakah user menguplod gambar baru 
    if (!empty($_FILES['img']['tmp_name'])) {
        $imgOld = $_FILES['img']['tmp_name'];
        $imgNew = time() . '.png';

        if (!empty($contact->img) && file_exists($storages . $contact->img)) {
            unlink($storages . $contact->img);
        }

        //  simpan gambar baru
        move_uploaded_file($imgOld, $storages . $imgNew);
    }

    $qUpdate = "UPDATE contacts SET contact='$contact',
        link_url='$link_url', img='$imgNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    window.location.href='../../pages/contact/index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Diubah');
                    window.location.href='../../pages/contact/create.php';
                </script>
            ";
    }
}
?>