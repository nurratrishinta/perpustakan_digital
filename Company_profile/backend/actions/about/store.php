<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $school_name = escapeString($_POST['school_name']);
    $school_tagline = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since = escapeString($_POST['since']);
    $alamat = escapeString($_POST['alamat']);

    $school_bannerOld = $_FILES['school_banner']['tmp_name'];
    $school_bannerName = uniqid() . "_banner.png";
    $school_bannerPath = "../../../storages/about/" . $school_bannerName;

    $school_logoOld = $_FILES['school_logo']['tmp_name'];
    $school_logoName = uniqid() . "_logo.png";
    $school_logoPath = "../../../storages/about/" . $school_logoName;

    if (move_uploaded_file($school_bannerOld, $school_bannerPath) && move_uploaded_file($school_logoOld, $school_logoPath)) {
        $qInsert = "INSERT INTO abouts(school_name, school_tagline, school_description, since, alamat, school_banner, school_logo) 
    VALUES('$school_name', '$school_tagline', '$school_description', '$since', '$alamat', '$school_bannerName', '$school_logoName')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/about/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/about/create.php';
    </script>
    ";
    }
}
?>