<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $id = intval($_GET['id']);
    $school_name = escapeString($_POST['school_name']);
    $school_tagline = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since = escapeString($_POST['since']);
    $alamat = escapeString($_POST['alamat']);

    // Ambil data lama
    $queryOld = mysqli_query($connect, "SELECT * FROM abouts WHERE id='$id'")
        or die(mysqli_error($connect));
    $dataOld = mysqli_fetch_assoc($queryOld);

    $school_bannerName = $dataOld['school_banner'];
    $school_logoName = $dataOld['school_logo'];

    // Jika upload banner baru
    if (!empty($_FILES['school_banner']['tmp_name'])) {
        $school_bannerOld = $_FILES['school_banner']['tmp_name'];
        $school_bannerName = uniqid() . "_banner.png";
        $school_bannerPath = "../../../storages/about/" . $school_bannerName;
        move_uploaded_file($school_bannerOld, $school_bannerPath);
    }

    // Jika upload logo baru
    if (!empty($_FILES['school_logo']['tmp_name'])) {
        $school_logoOld = $_FILES['school_logo']['tmp_name'];
        $school_logoName = uniqid() . "_logo.png";
        $school_logoPath = "../../../storages/about/" . $school_logoName;
        move_uploaded_file($school_logoOld, $school_logoPath);
    }

    // Update data
    $qUpdate = "UPDATE abouts SET 
                    school_name='$school_name',
                    school_tagline='$school_tagline',
                    school_description='$school_description',
                    since='$since',
                    alamat='$alamat',
                    school_banner='$school_bannerName',
                    school_logo='$school_logoName'
                WHERE id='$id'";

    mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    echo "<script>
        alert('Data berhasil diubah');
        window.location.href='../../pages/about/index.php';
    </script>";
}
?>