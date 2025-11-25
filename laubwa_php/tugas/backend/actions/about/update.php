<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $born = escapeString($_POST['born']);
    $address = escapeString($_POST['address']);
    $zip_code = escapeString($_POST['zip_code']);
    $email = escapeString($_POST['email']);
    $phone = escapeString($_POST['phone']);
    $total_project = escapeString($_POST['total_project']);
    $work = escapeString($_POST['work']);

    $imageNew = $about->image;
    $storages = "../../../storages/about/";

    // cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';


        // hapus gambar lama jika ada
        if (!empty($about->image) && file_exists($storages . $about->image)) {
            unlink($storages . $about->image);
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpadate = "UPDATE abouts SET name='$name', born='$born', address='$address',
    zip_code='$zip_code', email='$email', phone='$phone', total_project='$total_project',
    work='$work', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpadate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
            <script>    
                alert('Data berhasil ubah');
                window.location.href='../../pages/about/index.php';
            </script>
            ";
    } else {
        echo " 
            <script>    
                alert('Gagal di ubah');
                window.location.href='../../pages/about/edit.php';
            </script>
            ";
    }
}
