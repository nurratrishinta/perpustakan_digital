<?php
// LEFT JOIN -> semua data dari kiri + relasi jika ada
     include 'koneksi.php';
     $sql = "SELECT siswa.nama, mapel.nama_mapel, nilai.nilai
     FROM nilai
       LEFT JOIN siswa ON nilai.siswa_id = siswa.id
       LEFT JOIN mapel ON nilai.mapel_id = mapel.id";

     $result = mysqli_query($koneksi, $sql);

     echo "<h2>LEFT JOIN (Semua siswa, meski belum ada nilai)</h2>";
     while ($row = $result->fetch_assoc()) {
        echo $row ['nama'] . "-" . ($row['nama_mapel'] ?? 'Belum Ada Mapel') .
        " : " . ($row['nilai'] ?? "Belum Ada Nilai") . "<br>";
     }
?>