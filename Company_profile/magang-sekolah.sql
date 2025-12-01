-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 02:26 AM
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
-- Database: `magang-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` text NOT NULL,
  `school_banner` varchar(200) NOT NULL,
  `school_tagline` varchar(255) NOT NULL,
  `school_description` text NOT NULL,
  `since` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `school_name`, `school_logo`, `school_banner`, `school_tagline`, `school_description`, `since`, `alamat`) VALUES
(1, 'SMKN 1 SANDEN', '68a29f3d2bc4c_logo.png', '68a7e3299c131_banner.png', 'SMKN 1 SANDEN JAYA JAYA SEPANJANG MASA', 'SMK Negeri 1 Sanden adalah salah satu sekolah menengah kejuruan di Kabupaten Bantul, Yogyakarta, yang berfokus pada pendidikan vokasi untuk mencetak lulusan siap kerja, berwirausaha, maupun melanjutkan studi. Dengan berbagai jurusan yang sesuai kebutuhan dunia industri, sekolah ini berkomitmen memberikan pembelajaran berbasis kompetensi, praktik kerja lapangan, serta pengembangan karakter siswa agar mampu bersaing di era global.', '2004-05-04', 'Jl. Samas Km. 11 (Kreteg Abang) Ngemplak, Srigading, Sanden, Bantul, Yogyakarta'),
(3, '.', '68a347f88c1ce_logo.png', '68a7e33c610e1_banner.png', '.', '.', '0007-07-07', '.');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `image`, `title`, `description`) VALUES
(16, '1756173448.png', 'LOMBA CIPTA KARYA PUISI', 'Dalam rangka menyemarakkan, memeriahkan dan mengisi kemerdekaan Republik Indonesia ke 78, maka Perpustakaan Samudera Ilmu SMK Negeri 1 Sanden mengadakn lomba cipta karya puisi. Lomba ini diikuti oleh perwakilan siswa seluruh kelas. Dari seluruh kelas yang ada akhirnya muncul pemenang lomba, yakni juara 1 2 dan 3 antara lain sebagai berikut: Juara 1. Reni Nur Hanifah (XI TKR 1) puisi berjudul \" Tumpah Darah Indonesia\" Juara 2. Salsabila (XI APHPI) puisi berjudul \"Merah Putih Indonesiaku\" Juara 3. Syach Jehan (XI RPL) puisi berjudul \"Taruna\" Selamat kepada pemenang lomba, terus berkarya dan semoga dapat menginspirasi teman temannya.'),
(17, '1756096149.png', 'LOMBA LKS', 'Selamat dan Sukses kepada taruna Malvin Rio Anggriawan XI NKPi meraih Juara 1 dalam Lomba Kompetensi Siswa (LKS) Tingkat Provinsi, bidang lomba Nautika.'),
(18, '1756096456.png', 'KEJURDA SOFBSLL', 'Selamat, taruni Noviana Ramadhani, XII APHPi yang tergabung dalam tim softball Bantul, meraih juara 2 Putri dalam Kejurda Softball DIY 2024 pada 1 Desember 2024. Terus semangat meraih prestasi'),
(19, '1756096613.png', 'KEJUARAAN DAYUNG ARUNG JERAM', 'Selamat kepada taruna taruni yang meraih juara dalam Kejuaraan Dayung Arung Jeram IRF Asia Pasifik Arung Progo Festival 2024\r\n\r\nJuara 1 Local Mixed Slalom\r\n1. M. Irham Alfiandika (X TKPI)\r\n2. Febriana Dwi Rahmawati (X TBKR)\r\n3. Andini Ayu Firgarinata (X RPL 2)\r\n\r\nJuara 1 Local Mixed Head to Head\r\n1. Lazunka Awie Prihandoko (X NKPI 1)\r\n2. M. Daffa Alfarizi (X NKPI 1)\r\n3. Yusuf Dwi Purnomo (X TBKR)\r\n4. Galuh Rindiani (X RPL 2)\r\n5. Indah Dwi Saputri (X APAT'),
(20, '1756098531.png', 'OLIMPIADE OLAHRAGA', 'Selamat kepada taruna:\r\n1. Reno Eka Putra (XI NKPI 1) meraih Juara 2 Olimpiade Olahraga Siswa Nasional (O2SN) Jenjang SMK Tingkat Provinsi DIY 2024 Bidang Lomba Atletik.\r\n2. Garda Aulia (XI TKR 2) meraih Juara 3 Olimpiade Olahraga Siswa Nasional (O2SN) Jenjang SMK Tingkat Provinsi DIY 2024 Bidang Lomba Bulutangkis.');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_image` text NOT NULL,
  `announcement_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_title`, `announcement_image`, `announcement_description`) VALUES
(8, 'PENGUMUMAN KELULUSAN SISWA', '1755530914.png', 'Pengumuman kelulusan siswa kelas XII SMK N 1 Sanden akan dilaksanakan pada Senin, 5 Mei 2025. Siswa tidak perlu datang ke sekolah untuk mengambil pengumuman, karena hasil kelulusan dapat diakses tanpa tatap muka langsung. Dalam rangka menjaga ketertiban dan keamanan, siswa diimbau untuk tidak merayakan kelulusan secara berlebihan, seperti melakukan konvoi, aksi corat-coret, maupun kegiatan lain yang dapat mengganggu lingkungan. Selain itu, siswa juga dilarang mencorat-coret pakaian seragam sekolah.'),
(9, 'PENDAFTARAN CALON MURID BARU SMKN 1 SANDEN', '1756085695.png', 'Hallo adik-adik calon murid baru SMKN 1 Sanden, jangan lupa untuk mendaftarkan diri bagi yang berkesempatan mendaftar di Jalur Domisili Radius, Jalur Afirmasi, Jalur Prestasi, dan Jalur Mutasi pada Rabu dan Kamis, 25 dan 26 Juni 2025 secara daring di yogyaprov.spmb.id. Bagi yang Jalur Domisili Wilayah sabar dulu ya. Kami siap melayani Anda di Posko SPMB SMKN 1 Sanden.'),
(10, 'PENDAFTARAN REGULER & DOMISI WILAYAH', '1756087644.png', 'Hallo adik-adik calon murid baru SMKN 1 Sanden, Jangan sampai terlewat ya, pendaftaran jalur reguler / Domisili Wilayah, daring di spmb.jogjaprov.id, Senin, 30 Juni 2025 pukul 08.00 WIB sampai dengan Selasa, 1 Juli 2025 pukul 16.00 WIB.');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `content`) VALUES
(22, '1756178803.png', 'SELEKSI PT. JIAEC DALAM RANGKA SELEKSI KERJA DI PERUSAHAAN JEPANG', 'Hari ini, Kamis 9 Februari 2023, telah dilaksanakan seleksi untuk kesempatan bekerja di Jepang yang diselenggarakan oleh PT. JIAEC. Kegiatan seleksi tersebut bertempat di SMK Negeri 1 Sanden dan diikuti oleh siswa-siswi kelas XII.  Kegiatan ini rutin dilaksanakan guna merekrut tenaga kerja yang akan ditempatkan di perusahaan-perusahaan di Jepang. PT. JIAEC merupakan mitra kami sejak tahun 2014, khususnya dalam membuka kesempatan bagi siswa dan alumni untuk bekerja di Jepang.  Sampai saat ini sudah banyak alumni SMK Negeri 1 Sanden yang bekerja di Jepang, salah satunya melalui seleksi yang dilaksanakan oleh PT. JIAEC seperti pada hari ini.  Kami mengucapkan terima kasih kepada PT. JIAEC yang masih memberikan kepercayaan kepada SMK Negeri 1 Sanden serta memberikan kesempatan kepada siswa-siswi kami untuk meraih cita-citanya.'),
(23, '1756178902.png', 'WEBINAR KELAS INDUSTRI GAMELAB KELAS X RPL', 'Webinar Sosialisasi Kelas Industri Gamelab Program Rekayasa Perangkat Lunak SMK Negeri 1 Sanden  Kegiatan webinar berkelanjutan ini dilaksanakan pada Rabu, 11 Januari 2023 secara virtual melalui Zoom, diikuti oleh peserta didik kelas industri Gamelab yang didampingi oleh guru pendamping, Ibu Ari Wahyu Saptarini, S.Kom.  Acara dipandu oleh Ibu Evi, S.Kom. selaku admin Kelas Industri Gamelab.id, dengan narasumber Bapak Bima Syroth Rizkiawan selaku trainer Kelas Industri Gamelab.id.  Kegiatan berlangsung dengan tertib dan lancar hingga selesai.  Kelas Industri Gamelab sendiri merupakan kelas khusus yang bertujuan mencetak lulusan SMK dengan program intensif bernama Kelas Industri, untuk mempersiapkan siswa agar mampu menguasai kompetensi digital di bidangnya. Lulusan diharapkan siap berkarir maupun berwirausaha secara profesional serta memiliki daya saing tinggi di dunia kerja dan dunia usaha.'),
(24, '1756178978.png', 'MENGIKUTI GIAT PELAYARAN NUSANTARA', 'Taruna Nino Farrel Mahendra (XI NKPI 1) menjadi salah satu perwakilan Saka Bahari Yogyakarta dalam kegiatan Pelayaran Nusantara (Pelantara 2024) dengan tajuk Pelayaran dan Perkemahan Pembinaan Karakter Maritim (PPKM) 2024.  Kegiatan ini berlangsung dengan rute Jakarta – Surabaya – Makassar menggunakan KRI Dr. Radjiman Wedyodiningrat 992, pada 5 – 18 November 2024.'),
(25, '1756179059.png', 'KUNJUNGAN KE TVRI', 'Kunjungan dan Apresiasi Budaya ke TVRI Yogyakarta, Jumat 13 September 2024'),
(26, '1756179119.png', 'LATIHAN DASAR', 'Latihan Dasar SAR (Search and Rescue) dilakukan oleh taruna kelas XII Program Keahlian NKPI (Nautika Kapal Penangkap Ikan) dan TKPI (Teknika Kapal Penangkap Ikan) sebagai persiapan pelaksanaan Praktek Kerja Lapangan (PKL) di laut, Selasa 10 September 2024.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `link_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `img`, `contact`, `link_url`) VALUES
(8, '1756109973.png', 'Alamat sekolah', 'https://share.google/Gk13Wua6Q0IL0OakZ'),
(9, '1756110087.png', 'Web resmi sekolah', 'https://smkn1sanden.sch.id/index.php/routing/index');

-- --------------------------------------------------------

--
-- Table structure for table `cooperations`
--

CREATE TABLE `cooperations` (
  `id` bigint NOT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cooperations`
--

INSERT INTO `cooperations` (`id`, `image`, `link`) VALUES
(1, '1755228329.png', 'https://www.gamelab.id/'),
(2, '1755228421.png', 'https://bumenredjaabadi.co.id/'),
(3, '1755228660.png', 'https://jiaec.co.id/'),
(4, '1755228877.png', 'https://disnakertrans.bantulkab.go.id/'),
(5, '1755228985.png', 'https://nissan.co.id//');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `description`) VALUES
(19, '1756178240.png', 'Smk Negeri 1 Sanden Bantul bersama Pangkalan TNI Angkatan Laut Yogyakarta menggelar makan bergizi gratis bagi 300 orang siswa. Selain menjadi bagian dari rangkaian HUT TNI AL ke-79, kegiatan ini juga sebagai uji coba program dari Presiden dan Wapres terpilih Prabowo – Gibran.'),
(20, '1756178320.png', 'SMK N 1 Sanden selalu disiplin dengan cara sebelum jam pelajaran dimulai, biasanya apel terlebih dahulu.'),
(21, '1756178367.png', 'Pembaretan siswa kelas XI (Angkatan 20) SMKN 1 Sanden dilaksanakan pada Rabu, 24 Juli 2024 di Desa Wisata Srikeminut, Sriharjo, Imogiri, Bantul. Peserta melakukan long march di sekitar wilayah tersebut. Pembaretan ini dilakukan untuk menambah kebugaran, kedisiplinan, dan memupuk jiwa korsa antarsiswa SMKN 1 Sanden.'),
(22, '1756178483.png', 'Kamis, 29 Agustus 2024, SMKN 1 Sanden memberikan apresiasi kepada para taruna-taruni anggota Paskibraka Kabupaten Bantul, Paskibraka Kapanewon Sanden, Pleton Inti putra dan putri, serta taruna-taruni berprestasi di POPKAB, POPDA, O2SN, dan LKS dengan mengadakan kunjungan ke Museum Soeharto, Bendungan Karangtalun Ancol, dan Museum Benteng Vredeburg. Selain sebagai acara refreshing, kunjungan ini juga diharapkan dapat memupuk rasa nasionalisme siswa dan meningkatkan rasa syukur atas nikmat yang diberikan Tuhan. Berikut ini adalah dokumentasi di Museum Soeharto.'),
(23, '1756178580.png', 'Dalam pelaksanaan Projek Penguatan Profil Pelajar Pancasila (P5) dengan tema Bangunlah Jiwa Raganya, SMKN 1 Sanden mengadakan kegiatan \"Susur Jalur Gerilya Tentara Pelajar dan Taruna Akademi Militer Pasca Agresi Militer Belanda ke-2\" dengan rute Monumen Plataran - Makam Gatak - Markas Historia - SMP N 2 Kalasan. Dengan berjalan sepanjang jalur tersebut, diharapkan para siswa dapat meneladani semangat juang para pahlawan yang pantang menyerah dalam mempertahankan kemerdekaan Indonesia (Rabu, 22 Juni 2024).');

-- --------------------------------------------------------

--
-- Table structure for table `headmasters`
--

CREATE TABLE `headmasters` (
  `id` bigint NOT NULL,
  `headmaster_name` varchar(255) NOT NULL,
  `headmaster_photo` text NOT NULL,
  `headmaster_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `headmasters`
--

INSERT INTO `headmasters` (`id`, `headmaster_name`, `headmaster_photo`, `headmaster_description`) VALUES
(10, '  SUTAPA, S.Pd', '1755480558.png', 'Yang saya hormati Bapak/Ibu guru, staf, serta anak-anakku siswa-siswi SMK N Sanden yang saya banggakan. Puji syukur kita panjatkan ke hadirat Allah SWT, karena pada hari ini kita dapat berkumpul dalam keadaan sehat. Sebagai Kepala Sekolah, saya mengajak seluruh keluarga besar SMK N Sanden untuk terus menjaga kebersamaan, meningkatkan prestasi, dan menanamkan disiplin serta akhlak mulia. Semoga sekolah kita semakin maju, dan para siswa menjadi generasi yang membanggakan. Terima kasih atas perhatian dan kerjasamanya.');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int NOT NULL,
  `major_name` varchar(255) NOT NULL,
  `major_image` text NOT NULL,
  `major_description` text NOT NULL,
  `head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `major_name`, `major_image`, `major_description`, `head`) VALUES
(15, 'AGRIBISNIS PENGOLAHAN HASIL PERIKANAN (APHPI)', '1755826930.png', 'Agribisnis Pengolahan Hasil Perikanan (APHPI) adalah jurusan yang mempelajari seluruh proses pengolahan, pengawetan, dan pemasaran hasil perikanan agar memiliki nilai tambah dan daya jual yang lebih tinggi. Siswa dibekali keterampilan mulai dari penanganan bahan baku, pengolahan menjadi produk siap konsumsi, pengemasan, hingga strategi pemasaran.', 'WIWIK WIDYASTUTI, S.P.t'),
(17, 'REKAYASA PERANGKAT LUNAK (RPL)', '1755827086.png', 'Rekayasa Perangkat Lunak (RPL) adalah salah satu bidang keahlian di jurusan Teknologi Informasi dan Komunikasi yang mempelajari cara merancang, membuat, mengembangkan, menguji, dan memelihara perangkat lunak.\r\nDalam RPL, siswa dibekali pengetahuan dan keterampilan mulai dari pemrograman, analisis kebutuhan sistem, desain aplikasi, pengelolaan basis data, hingga penerapan teknologi terkini.', 'BUKHORI SULIATYANTO, S.KOM. M.M.'),
(18, 'AGRIBISNIS PERIKANAN AIR TAWAR (APAT)', '1755827153.png', 'Agribisnis Perikanan Air Tawar (APAT) adalah jurusan yang mempelajari budidaya ikan air tawar, mulai dari pembenihan, pembesaran, pengelolaan pakan, hingga pemasaran hasil perikanan. Siswa dibekali keterampilan teknis dan manajerial untuk mengembangkan usaha perikanan yang produktif dan berkelanjutan.', ' SUTRISNA, S.P.'),
(19, 'TEKNIKA KAPAL PENANGKAP IKAN (TKPI)', '1755827235.png', 'Teknika Kapal Penangkap Ikan (TKPI) adalah jurusan yang mempelajari teknik pengoperasian, perawatan, dan perbaikan mesin kapal penangkap ikan. Siswa dibekali keterampilan dalam mengelola sistem permesinan kapal, kelistrikan, hidrolik, hingga keselamatan pelayaran, agar siap bekerja di industri perikanan laut maupun sektor maritim lainnya.', 'M. SETYAWAN, S.Pi'),
(20, 'TEKNIK KENDARAAN RINGAN OTOMOTIF (TKRO)', '1755827301.png', 'Teknik Kendaraan Ringan Otomotif (TKRO) adalah jurusan yang mempelajari perawatan, perbaikan, dan perakitan kendaraan roda empat. Siswa dibekali keterampilan dalam sistem mesin, kelistrikan, sasis, serta teknologi otomotif modern agar siap bekerja di bengkel, industri otomotif, maupun membuka usaha mandiri.', 'JAJULI PANCA SAMBADA, S,Pd.,M.Pd '),
(21, 'NAUTIKA PENANGKAP IKAN (NKPI)', '1755827367.png', 'Nautika Penangkap Ikan (NKPI) adalah jurusan yang mempelajari teknik navigasi, pengoperasian kapal, serta strategi penangkapan ikan di laut. Siswa dibekali pengetahuan tentang permesinan kapal, penggunaan alat tangkap modern, keselamatan pelayaran, hingga pengelolaan hasil tangkapan. Jurusan ini menyiapkan tenaga kerja terampil yang mampu bekerja di sektor perikanan tangkap, industri maritim, maupun melanjutkan pendidikan di bidang kelautan.', 'M. SETYAWAN, S.Pi '),
(22, 'TEKNIK BODI OTOMOTIF (TBO)', '1755827439.png', 'Teknik Bodi Otomotif (TBO) adalah jurusan yang mempelajari perawatan, perbaikan, dan rekayasa bodi kendaraan bermotor. Siswa dibekali keterampilan dalam memperbaiki rangka dan bodi mobil, pengecatan, pengelasan, hingga penggunaan peralatan modern untuk perbaikan kerusakan akibat kecelakaan. Jurusan ini menyiapkan tenaga terampil yang mampu bekerja di industri karoseri, bengkel perbaikan bodi, maupun membuka usaha di bidang otomotif.', 'SINUNG WAHYUDI, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `phone`) VALUES
(6, 'Shinta', 'nurratrishinta@gmail.com', 'ppp', ''),
(10, 'Shinta', 'nurratrishinta@gmail.com', 'haii', '0895398985571');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int NOT NULL,
  `icon` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `title`, `link_url`) VALUES
(5, '1754802059.png', 'Instragam', 'https://www.instagram.com/smknegeri1sanden/'),
(6, '1755437778.png', ' Facebook ', 'https://web.facebook.com/smknegeri1sanden?_rdc=1&_rdr#'),
(7, '1755423757.png', 'Youtube', 'https://www.youtube.com/@smknegeri1sanden167'),
(8, '1755424166.png', 'Twitter', 'https://x.com/smkn1sanden1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_photo` text NOT NULL,
  `teacher_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_photo`, `teacher_major`) VALUES
(34, 'GUNDAN BAHTERA, S.PD', '1755837544.png', ' Guru Prod. TKR'),
(35, 'WIWIK WIDYASTUTI, S.PT.', '1755837610.png', 'Guru Produktif APHPi '),
(36, 'YANIKA RUDI, S.PD.', '1755837833.png', 'Kajur TBKR & TBO Guru Produktif TBKR '),
(37, 'ISTIYAH, M.PD', '1755837907.png', 'Guru Produktif APAT'),
(38, 'BUKHORI SULIATYANTO, S.KOM., M.M.', '1755837957.png', 'Kajur RPL & Guru produktif RPL'),
(39, 'ASROFI, S.PI.', '1755837991.png', 'Guru Produktif TKPI '),
(41, 'ANOM WULANSARI, S.PD.', '1755838065.png', ' Guru PAI'),
(42, 'SUSMANDIYAH, S.PD', '1755838141.png', 'Guru Seni Budaya'),
(43, 'LIA RUSMIYANTI, S.PD.', '1755838223.png', ' Guru Bahasa Jawa'),
(44, 'RETNO BUDIARTI, S.PD', '1755838276.png', 'Guru Penjas'),
(46, '  SUHARINI, SPD', '1755838381.png', 'Guru Bahasa Inggris '),
(52, 'FARIDA NUR RAHMAWATI, S.PD.', '1756107231.png', 'Guru Matematika'),
(53, 'AMIRUDIN, S.KOM.', '1756107566.png', 'Guru Rpl'),
(54, 'EKO PRASETYO HADI, S.PI., M.SI.', '1756107602.png', 'Guru Produktif NKPI'),
(55, 'SUKA HARIYANA, S.PD', '1756108601.png', ' Guru Pendidikan  Pancasila'),
(56, 'SAIFUL KURNIA ADHY SETIAWAN, S. PD', '1756108875.png', 'Guru Produktif TKR'),
(57, 'YUNITA MAHARANI, S.PD.', '1756108904.png', ' Guru Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `status`, `message`, `image`) VALUES
(9, 'Lestari', 'Wirausaha', 'Pengalaman belajar di SMK N 1 Sanden membuat saya percaya diri untuk membuka usaha sendiri.', '1755526268.png'),
(10, 'annaa', 'Pelajar', 'SMK N 1 Sanden memberikan bekal ilmu dan keterampilan yang sangat bermanfaat dalam dunia kerja.', '1755526293.png'),
(11, 'tata', 'Wirausaha', '\"SMK N 1 Sanden memberikan pengalaman belajar yang tidak hanya teori, tetapi juga praktik nyata. Saya merasa lebih siap menghadapi dunia kerja setelah lulus dari sini.\"', '1755846983.png'),
(13, 'Shinta', 'Pelajar', '\"Lingkungan belajar yang nyaman dan fasilitas yang lengkap membuat saya semakin semangat menimba ilmu. Terima kasih SMK N 1 Sanden!\"', '1755847172.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(10, 'Shinta', 'shintaaa@gmail.com', '$2y$10$kr4y1/WOlO4zheT.JP6YxOhhIz/7rcONvnjm/YtMlVbe/7DdBkriS'),
(15, 'Shinta', 'nurratrishinta@gmail.com', '$2y$10$ZWIfUB8qgjr.mfCbrGSlcuFUEz5y3ZdW75cWq9wMzFZkWAssH.qvq');

-- --------------------------------------------------------

--
-- Table structure for table `visi_missions`
--

CREATE TABLE `visi_missions` (
  `id` bigint NOT NULL,
  `category` enum('visi','misi') NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visi_missions`
--

INSERT INTO `visi_missions` (`id`, `category`, `text`) VALUES
(3, 'visi', '“TERWUJUDNYA SEKOLAH YANG BERKUALITAS, MENGHASILKAN LULUSAN BERIMAN DAN BERTAQWA KEPADA TUHAN YANG MAHA ESA, BERAKHLAK MULIA, BERBUDAYA, CERDAS, UNGGUL, TANGGUH, KREATIF, INOVATIF, PROFESIONAL, MANDIRI, BERJIWA WIRAUSAHA, BERWAWASAN GLOBAL, SERTA BERSERTIFIKAT STANDAR NASIONAL DAN INTERNASIONAL UNTUK MAMPU BERSAING DI ERA REVOLUSI INDUSTRI 4.0 DAN MASYARAKAT EKONOMI ASEAN.”'),
(4, 'misi', 'MISI SMK N 1 SANDEN  MELAKSANAKAN PENDIDIKAN SESUAI DENGAN STANDAR NASIONAL PENDIDIKAN (SNP). MELAKSANAKAN PENDIDIKAN BIDANG KEMARITIMAN SESUAI STANDAR STCW-IMO. MELAKSANAKAN PEMBELAJARAN YANG BERBASIS SAINS, TEKNOLOGI DAN BUDAYA. MENGIMPLEMENTASIKAN IMAN, TAQWA DAN NILAI-NILAI KARAKTER SERTA BUDAYA DALAM KEHIDUPAN SEHARI-HARI.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperations`
--
ALTER TABLE `cooperations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headmasters`
--
ALTER TABLE `headmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_missions`
--
ALTER TABLE `visi_missions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cooperations`
--
ALTER TABLE `cooperations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `headmasters`
--
ALTER TABLE `headmasters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visi_missions`
--
ALTER TABLE `visi_missions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
