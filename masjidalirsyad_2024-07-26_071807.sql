/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: masjidalirsyad
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES
(1,'rommy ivandika haris','hashed_password','Admin Masjid','ivanris146@gmail.com','081383737320');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` enum('Wirid Bulanan','Tahsin Al-Quran','Majelis Talim Ibu-Ibu','Kajian Sirah Nabawiyah','Kajian Bulughul Maram') NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES
(3,'Majelis Talim Ibu-Ibu','2024-07-30','04:30:00','05:30:00','Jamaah tetap shalat subuh setiap hari Minggu'),
(4,'Tahsin Al-Quran','2024-07-27','19:00:00','21:00:00','Pengajian rutin setiap Rabu'),
(6,'Kajian Sirah Nabawiyah','2024-07-31','20:00:00','21:30:00','bawa buku catatam');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

--
-- Table structure for table `infaq`
--

DROP TABLE IF EXISTS `infaq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infaq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jamaah` int(11) NOT NULL,
  `uang_masuk` decimal(10,2) NOT NULL,
  `keterangan` enum('OPERASIONAL MASJID','GHARIN','KHATIB JUMAT','MDTA') NOT NULL,
  `tanggal` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infaq`
--

/*!40000 ALTER TABLE `infaq` DISABLE KEYS */;
INSERT INTO `infaq` VALUES
(1,1,10000.00,'GHARIN','2025-11-11','IMG_9333.JPG'),
(3,1,25000.00,'KHATIB JUMAT','2024-07-09','frr'),
(4,2,2000.00,'OPERASIONAL MASJID','2024-07-31','IMG_9330.JPG');
/*!40000 ALTER TABLE `infaq` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `laporan_keuangan` AFTER INSERT ON `infaq` FOR EACH ROW BEGIN
    INSERT INTO uang_masuk (tanggal, uang_masuk, keterangan)
    VALUES (NEW.tanggal, NEW.uang_masuk, NEW.keterangan);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `inventaris`
--

DROP TABLE IF EXISTS `inventaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pendataan` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` int(4) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') DEFAULT 'tersedia',
  PRIMARY KEY (`id_inventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventaris`
--

/*!40000 ALTER TABLE `inventaris` DISABLE KEYS */;
INSERT INTO `inventaris` VALUES
(2,'2024-07-19','Sound System',2,'Untuk penggunaan acara besar','tersedia'),
(3,'2024-07-20','Al-Qur\'an Terjemah',10,'Digunakan dalam pengajian','tersedia'),
(5,'2024-07-25','mic',1,'beli di toko ahsui','tersedia');
/*!40000 ALTER TABLE `inventaris` ENABLE KEYS */;

--
-- Table structure for table `jadwal_kegiatan_ibadah`
--

DROP TABLE IF EXISTS `jadwal_kegiatan_ibadah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_kegiatan_ibadah` (
  `nama_penceramah` varchar(100) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_kegiatan_ibadah`
--

/*!40000 ALTER TABLE `jadwal_kegiatan_ibadah` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_kegiatan_ibadah` ENABLE KEYS */;

--
-- Table structure for table `jamaah`
--

DROP TABLE IF EXISTS `jamaah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jamaah` (
  `id_jamaah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jamaah` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jamaah`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamaah`
--

/*!40000 ALTER TABLE `jamaah` DISABLE KEYS */;
INSERT INTO `jamaah` VALUES
(1,'Dahniar','Jl. APK Dalam No. 4','081234567890'),
(2,'Edwati','Jl. KH Sulamaiman No. 7','081298765432'),
(3,'Maiyulis','Jl. APK No. 1A','081276543210'),
(4,'erwadi','parakgasang','082333011119'),
(5,'Mawardi','alai','08111292910'),
(6,'taufan','pisang','082822222233'),
(7,'chandra yudasswara','bandung','082211085000'),
(9,'denis','khatib sulaiman','082211085000'),
(10,'sandu','khatib sulaiman','082211085000'),
(11,'akhyar','tabing','08122222222'),
(12,'akhyar','malang','08122222222'),
(13,'denis','parakgasang','08992929292'),
(14,'denis','parakgasang','082822222233'),
(15,'denis','parakgasang','082822222233'),
(16,'akhyar','parakgasang','082822222233'),
(17,'iskandar','parakgadang','082822222233'),
(18,'iskandar','parakgadang','082822222233'),
(19,'akhyar','parakgasang','082822222233'),
(20,'akhyar','parakgasang','082822222233');
/*!40000 ALTER TABLE `jamaah` ENABLE KEYS */;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
INSERT INTO `kegiatan` VALUES
(1,'Ceramah Jumat','2024-07-19','13:00:00','14:30:00','Dengan Ustadz Ahmad'),
(2,'Pengajian Rutin','2024-07-20','19:00:00','21:00:00','Tema: Tafsir Surah Yasin'),
(3,'Bakti Sosial','2024-07-22','08:00:00','12:00:00','Bantu Warga Terdampak Banjir');
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;

--
-- Table structure for table `kritik_saran`
--

DROP TABLE IF EXISTS `kritik_saran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_submit` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kritik_saran`
--

/*!40000 ALTER TABLE `kritik_saran` DISABLE KEYS */;
INSERT INTO `kritik_saran` VALUES
(2,'Jane Smith','janesmith@example.com','08567891234','Saya merasa ada beberapa area yang perlu diperbaiki dalam fasilitas Anda. Semoga bisa segera ditangani.','2024-07-17 07:58:31'),
(3,'Michael Brown','michaelbrown@example.com','08765432100','Saran saya adalah untuk meningkatkan kualitas acara yang diselenggarakan. Terima kasih.','2024-07-17 07:58:31'),
(4,'Emily Davis','emilydavis@example.com','08987654321','Sangat menghargai inisiatif Anda dalam memperbaiki layanan kepada jamaah.','2024-07-17 07:58:31'),
(5,'David Wilson','davidwilson@example.com','08234567890','Tingkatkan komunikasi terbuka dengan pengurus untuk menjaga transparansi di masjid kami.','2024-07-17 07:58:31'),
(6,'ahmad dhani','samue@gmail.com','08111112882','bersihkan kamar\r\n','2024-07-18 08:55:41'),
(7,'karfindo','ivanris146@gmail.com','082222110808','mohon untuk sajadah dibersihkan dan perbaiki penerangan lampu','2024-07-18 09:12:37'),
(8,'khoirul','ivansammm@com','071100101229','mantap pengurus masjidnya','2024-07-18 12:40:28'),
(9,'azura','ivanris146@gmail.com','081383737320','mohon perbaiki micnya agak kurang','2024-07-18 13:09:50'),
(10,'juned','sandysisk@gmail.com','072222117117','mohon lampu ganti terlalu terang ','2024-07-18 13:11:52'),
(11,'khoirul','ivanriss@aman.com','08112222221','masukkan air','2024-07-18 13:12:48'),
(12,'khoirul','ivanriss@aman.com','08112222221','masukkan air','2024-07-18 13:13:41'),
(14,'khoirul','ivanriss@aman.com','08112222221','masukkan air','2024-07-18 13:15:47'),
(15,'khoirul','ivanriss@aman.com','08112222221','masukkan air','2024-07-18 13:17:13'),
(16,'khoirul','ivanriss@aman.com','08112222221','masukkan air','2024-07-18 13:17:50'),
(17,'azura','sandysisk@gmail.com','072222117117','mantap','2024-07-18 13:28:04'),
(18,'azura','sandysisk@gmail.com','072222117117','mantap','2024-07-18 13:28:09'),
(19,'rapindo','ivansammm@com','071100101229','anka','2024-07-18 16:33:21'),
(20,'akhyar','sandysisk@gmail.com','072222117117','toilet bau\r\n','2024-07-20 06:04:51'),
(21,'azusa','ivansammm@com','071100101229','enak','2024-07-20 08:45:14'),
(22,'yahud','sandysisk@gmail.com','072222117117','ok','2024-07-20 08:46:42'),
(23,'yahud','sandysisk@gmail.com','072222117117','ok','2024-07-20 08:47:36'),
(24,'yahud','sandysisk@gmail.com','072222117117','ok','2024-07-20 08:48:36'),
(25,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 08:54:01'),
(26,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 08:54:54'),
(27,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 08:56:41'),
(28,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 08:57:40'),
(29,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 08:59:47'),
(30,'yahud','sandysisk@gmail.com','072222117117','OK','2024-07-20 09:00:21'),
(31,'khoirul','ivanris146@gmail.com','082222110808','pp','2024-07-20 09:00:53'),
(32,'khoirul','ivanris146@gmail.com','082222110808','dd','2024-07-22 04:24:48');
/*!40000 ALTER TABLE `kritik_saran` ENABLE KEYS */;

--
-- Table structure for table `laporan_keuangan`
--

DROP TABLE IF EXISTS `laporan_keuangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_keuangan` (
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `uang_masuk` decimal(32,2) DEFAULT NULL,
  `uang_keluar` decimal(32,2) DEFAULT NULL,
  `sisa_saldo` decimal(33,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_keuangan`
--

/*!40000 ALTER TABLE `laporan_keuangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_keuangan` ENABLE KEYS */;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkout_link` varchar(255) DEFAULT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

--
-- Table structure for table `penceramah`
--

DROP TABLE IF EXISTS `penceramah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penceramah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penceramah` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penceramah`
--

/*!40000 ALTER TABLE `penceramah` DISABLE KEYS */;
INSERT INTO `penceramah` VALUES
(2,'Saiful efendi','lubuk buaya','081364075349'),
(3,'Rahmad','belimbing kuranji','081374003366'),
(4,'DR.H.IZHARMAN','SIITEBA','082233101010'),
(5,'Johardi',NULL,NULL),
(7,'DR.H.IZHARMAN','SIITEBA','082233101010');
/*!40000 ALTER TABLE `penceramah` ENABLE KEYS */;

--
-- Table structure for table `pengurus_masjid`
--

DROP TABLE IF EXISTS `pengurus_masjid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengurus_masjid` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengurus` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengurus_masjid`
--

/*!40000 ALTER TABLE `pengurus_masjid` DISABLE KEYS */;
INSERT INTO `pengurus_masjid` VALUES
(1,'DR.H.Abdullah Wali Nasution','Ketua Pengurus','Pasaman Barat','0811662597'),
(2,'Johardi Dt.Bandaro Putiah','Pembina','Pesisir Selatan','0811266721675'),
(3,'Imam Soleh Nasution','Imam Tetap','Mandailing Natal','082318347528');
/*!40000 ALTER TABLE `pengurus_masjid` ENABLE KEYS */;

--
-- Table structure for table `uang_keluar`
--

DROP TABLE IF EXISTS `uang_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `uang_keluar` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uang_keluar`
--

/*!40000 ALTER TABLE `uang_keluar` DISABLE KEYS */;
INSERT INTO `uang_keluar` VALUES
(2,'2024-07-15','beli kompor',12000.00);
/*!40000 ALTER TABLE `uang_keluar` ENABLE KEYS */;

--
-- Table structure for table `uang_masuk`
--

DROP TABLE IF EXISTS `uang_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `uang_masuk` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uang_masuk`
--

/*!40000 ALTER TABLE `uang_masuk` DISABLE KEYS */;
INSERT INTO `uang_masuk` VALUES
(1,'2024-07-09','KHATIB JUMAT',25000.00),
(2,'2024-07-31','OPERASIONAL MASJID',2000.00);
/*!40000 ALTER TABLE `uang_masuk` ENABLE KEYS */;

--
-- Dumping routines for database 'masjidalirsyad'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-26  7:18:27
