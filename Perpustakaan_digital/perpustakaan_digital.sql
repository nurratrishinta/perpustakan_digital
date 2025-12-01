-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 02:18 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `BukuID` int NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Penerbit` varchar(255) DEFAULT NULL,
  `TahunTerbit` int DEFAULT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `jumlah_buku` int NOT NULL,
  `sinopsis` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `stok`, `jumlah_buku`, `sinopsis`, `image`) VALUES
(4, 'LASKAR PELANGI', 'Andrea Hirata', 'Bentang Pustaka', 2005, 8, 15, '“Laskar Pelangi” karya Andrea Hirata menceritakan perjuangan sepuluh anak miskin di Belitung yang bersekolah di SD Muhammadiyah. Dengan segala keterbatasan, mereka tetap semangat mengejar ilmu, dibimbing oleh dua guru yang penuh dedikasi. Kisah ini menggambarkan keajaiban persahabatan, harapan, dan keteguhan dalam menghadapi hidup.”', '1761100744_laskr.jpg'),
(7, 'DORAEMON', 'Fojiko', 'Shogakukan', 2002, 12, 16, 'Doraemon adalah robot kucing dari abad ke-22 yang dikirim kembali ke masa lalu untuk membantu Nobita Nobi, seorang anak sekolah dasar yang ceroboh dan sering mengalami kesialan. Dengan berbagai alat ajaib yang keluar dari kantong ajaibnya, Doraemon berusaha membantu Nobita agar hidupnya menjadi lebih baik dan masa depannya lebih cerah. Namun, sering kali alat-alat itu justru menimbulkan kekacauan yang lucu dan penuh makna persahabatan.', '1761100038_dora.jpg.jpg'),
(8, 'LISA JACKSON', 'Andrea Hirata', 'Sylfentri', 2009, 13, 14, 'Ketika jurnalis Nikki Gillette menyelidiki kasus pembunuhan berantai yang mengguncang kota kecil Savannah, ia menemukan rahasia kelam yang menghubungkan korban dengan dirinya sendiri. Bersama detektif Pierce Reed, Nikki berjuang melawan waktu untuk mengungkap identitas pelaku sebelum menjadi target berikutnya. Penuh ketegangan, intrik, dan kejutan tak terduga, Bestseller karya Lisa Jackson menghadirkan kisah misteri yang mencekam dan emosional.', '1761101019_lisa.jpg.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KategoriID` int NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`KategoriID`, `NamaKategori`) VALUES
(1, 'Sejarah'),
(3, 'Anime'),
(4, 'Horor');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int NOT NULL,
  `BukuID` int DEFAULT NULL,
  `KategoriID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `BukuID`, `KategoriID`) VALUES
(6, 4, 1),
(7, 7, 3),
(8, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `BukuID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`KoleksiID`, `UserID`, `BukuID`) VALUES
(5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamanID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `BukuID` int DEFAULT NULL,
  `TanggalPeminjaman` date DEFAULT NULL,
  `TanggalPengembalian` date DEFAULT NULL,
  `StatusPeminjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES
(14, 3, 4, '2025-04-08', '2025-08-08', 'Dikembalikan'),
(15, 3, 4, '2025-08-10', '2025-10-10', 'Dikembalikan'),
(18, 6, 4, '2222-02-22', '2222-02-02', 'Dipinjam'),
(20, 6, 4, '2024-04-04', '2024-08-04', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `BukuID` int DEFAULT NULL,
  `Ulasan` text,
  `Rating` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`UlasanID`, `UserID`, `BukuID`, `Ulasan`, `Rating`) VALUES
(7, 3, 4, 'Aku Suka Bukunya, Bgus Bangett Ceritanya', 5),
(9, 4, 4, 'Bukunya bagut bangettt aku sukaa', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `NamaLengkap` varchar(255) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'admin', '$2y$10$UJDTYQOQaF2IfNwVeelc..W0venJrBqaZkOp7AKFa4/C90h46nGbm', 'shinta@gmail.com', 'NUR RATRI BEKTI SHINTA TAMA', 'Jln Samas, Kalijurang,  Serigading sanden Bantul'),
(2, 'petugas', '$2y$10$kD7/u6pTQbjNCSpGTiVLWeBSjmsDP/fbQhUFhYFpEXqaMlmeAaWmi', 'nisa@gmail.com', 'NISA ', 'Jln Samas, Mayungan, Srigading, Sanden, Bantul'),
(3, 'peminjam1', '$2y$10$ZGeSgzH6f/hU.Rb5xszyk.yc6Amh2JExn.off.3rdiHLJQyx4/Dc6', 'an@gmail.com', 'RARTI', 'Bonggalan Srigading, Sanden Bantul'),
(4, 'peminjam2', '$2y$10$iPUPsEVI6JERNUA8UuusEeu4sxm/MQ1SlEmjISSu4UPIcj.a1/n12', 'kina@gmail.com', 'KINA ANNA', 'Jln Samas, Wuluhaded, Srigading Snden Bantul'),
(5, 'anisa', '$2y$10$tbt7cOmFZirW9A/awuiuTenZCf1QWYf8ir53i5FXdw/4Z1vbxD0.e', 'anisa@gmail.com', 'anisa', 'srigaring sanden bantul'),
(6, 'nana', '$2y$10$EoN0hCD5juuzCyxsf8nAKuwn83mlObYhIJsosjWBMcCvaIdmWJ4hi', 'nana@gmail.com', 'nana', 'ceme, srigading sanden bantul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`),
  ADD KEY `BukuID` (`BukuID`),
  ADD KEY `KategoriID` (`KategoriID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `KategoriID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`KategoriID`) REFERENCES `kategoribuku` (`KategoriID`) ON DELETE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE;

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
