<?php
// RIGHT JOIN -> semua data dari kanan + relasi jika ada
     include 'koneksi.php';
     $sql = "SELECT siswa.nama, mapel.nama_mapel, nilai.nilai
     FROM nilai
       RIGHT JOIN siswa ON nilai.siswa_id = siswa.id
       RIGHT JOIN mapel ON nilai.mapel_id = mapel.id";

     $result = mysqli_query($koneksi, $sql);

     echo "<h2>RIGHT JOIN (Semua mapel, meski belum ada siswa)</h2>";
     while ($row = $result->fetch_assoc()) {
        echo $row ['nama_mapel'] . "-" . ($row['nama'] ?? 'Belum Ada Siswa') .
        " : " . ($row['nilai'] ?? "Belum Ada Nilai") . "<br>";
     }
?>