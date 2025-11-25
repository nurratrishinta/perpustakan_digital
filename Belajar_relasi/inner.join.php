<?php
// INNER JOIN hanya menampilkan data yang cocok (matching) di ketua tabel.
// Kalo tidak ada pasangan datanya -> tidak di tampilkan.

     include 'koneksi.php';
     $sql = "SELECT siswa.nama, mapel.nama_mapel, nilai.nilai
     FROM nilai
     INNER JOIN siswa ON nilai.siswa_id = siswa.id
     INNER JOIN mapel ON nilai.mapel_id = mapel.id";

     $result = mysqli_query($koneksi, $sql);

     echo "<h2>INNER JOIN (Data nilai siswa)</h2>";
     while ($row = $result->fetch_assoc()) {
        echo $row ['nama'] . "-" . $row['nama_mapel'] .$row['nilai'] . "<br>";
     }
?>