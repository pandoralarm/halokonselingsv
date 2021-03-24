-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 10:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hksv`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ArticleID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Header` text NOT NULL,
  `Content` text NOT NULL,
  `KonselorNIP` varchar(255) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `ThreadID` int(11) NOT NULL,
  `ThreadKey` varchar(255) NOT NULL,
  `MahasiswaNIM` varchar(255) NOT NULL,
  `KonselorNIP` varchar(255) NOT NULL,
  `ThreadStatus` enum('OPEN','CLOSED') NOT NULL DEFAULT 'OPEN',
  `Started_at` datetime DEFAULT NULL,
  `Closed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`ThreadID`, `ThreadKey`, `MahasiswaNIM`, `KonselorNIP`, `ThreadStatus`, `Started_at`, `Closed_at`) VALUES
(6, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', 'NIP000000', 'CLOSED', '2021-03-17 23:40:12', '2021-03-18 02:30:41'),
(7, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', 'NIP000002', 'CLOSED', '2021-03-17 23:40:12', '2021-03-18 02:30:41'),
(8, 'de55dbad88b95c69d12db84cafe5bf3f', 'J3C118094', 'NIP000001', 'CLOSED', '2021-03-17 23:50:45', '2021-03-18 03:16:08'),
(9, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201811199105111021', 'CLOSED', '2021-03-18 00:29:48', '2021-03-18 02:30:41'),
(10, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201806198703072001', 'CLOSED', '2021-03-18 00:32:47', '2021-03-18 02:30:41'),
(11, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198307101001', 'CLOSED', '2021-03-18 00:33:43', '2021-03-18 02:30:41'),
(12, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201811198806252001', 'CLOSED', '2021-03-18 00:34:16', '2021-03-18 02:30:41'),
(13, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201811197709092012', 'CLOSED', '2021-03-18 00:34:16', '2021-03-18 02:30:41'),
(14, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198507182001', 'CLOSED', '2021-03-18 00:35:37', '2021-03-18 02:30:41'),
(15, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198001031001', 'CLOSED', '2021-03-18 00:36:47', '2021-03-18 02:30:41'),
(16, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807197006012001', 'CLOSED', '2021-03-18 00:37:24', '2021-03-18 02:30:41'),
(17, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198705242001', 'CLOSED', '2021-03-18 00:42:41', '2021-03-18 02:30:41'),
(18, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198705242001', 'CLOSED', '2021-03-18 00:43:34', '2021-03-18 02:30:41'),
(19, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807197208122001', 'CLOSED', '2021-03-18 00:43:34', '2021-03-18 02:30:41'),
(20, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201811198211141001', 'CLOSED', '2021-03-18 00:44:57', '2021-03-18 02:30:41'),
(21, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807197509181001', 'CLOSED', '2021-03-18 00:47:21', '2021-03-18 02:30:41'),
(22, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198103302001', 'CLOSED', '2021-03-18 00:48:22', '2021-03-18 02:30:41'),
(23, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', 'J3P219078', '201807198501202001', 'CLOSED', '2021-03-18 00:49:52', '2021-03-18 02:30:41'),
(24, 'de55dbad88b95c69d12db84cafe5bf3f', 'J3C118094', '201807198305122001', 'CLOSED', '2021-03-18 00:50:06', '2021-03-18 03:16:08'),
(25, 'de55dbad88b95c69d12db84cafe5bf3f', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:00:51', '2021-03-18 03:16:08'),
(26, 'b7a99126905a7c8218c893c35eb50c37', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:19:35', '2021-03-18 03:22:38'),
(27, 'c74564078166bd3ff07e8d999234b09c', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:25:17', '2021-03-18 03:28:10'),
(28, 'cb1eb23a41fe8c06354ae390f42c6a04', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:32:02', '2021-03-18 03:39:48'),
(29, '4dbdfb2d20f0be698b2afe15968d64f1', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:47:23', '2021-03-18 03:47:39'),
(30, '79b33c53834b7498ee50a9a66c759514', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:51:50', '2021-03-18 03:52:12'),
(31, 'ae076fdb00ee462e4201af78457e7f19', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:55:23', '2021-03-18 03:55:39'),
(32, '2fed96de71b30f66642e666654fd30b9', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:57:03', '2021-03-18 03:57:19'),
(33, 'fe834342e6080fda7dd0c91622acdeee', 'J3C118094', 'NIP000000', 'CLOSED', '2021-03-18 03:58:53', '2021-03-18 03:59:09'),
(34, '7e275e70a91bdc8dc715ac593780412e', 'J3P219078', 'NIP000000', 'CLOSED', '2021-03-18 04:00:21', '2021-03-18 04:00:42'),
(35, '1ccef6a16e1ed9c8bb10f27fe0bc2972', 'J3P219078', 'NIP000000', 'CLOSED', '2021-03-18 04:34:48', '2021-03-18 04:35:34'),
(36, 'e1f37b67810371756b21bb36f0b8e802', 'J3C118094', 'NIP000000', 'OPEN', '2021-03-18 04:34:58', NULL),
(37, 'e1f37b67810371756b21bb36f0b8e802', 'J3C118094', 'NIP000002', 'OPEN', '2021-03-18 04:34:58', NULL),
(38, 'e1f37b67810371756b21bb36f0b8e802', 'J3C118094', 'NIP000001', 'OPEN', '2021-03-18 04:38:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Prodi` varchar(255) NOT NULL,
  `Pns` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `Nama`, `Prodi`, `Pns`) VALUES
(' 196106181986091001', 'Arief Darjanto, Dr. Ir. M.Ec.', '', 1),
('195712231986032001', 'Daisy D.S.J. Tambajong, Dr. Ir. MP', 'Teknologi dan Manajemen Ternak', 1),
('195805041985032001', 'C.C. Nurwitri, Ir.DAA', 'Supervisor Jaminan Mutu Pangan ', 1),
('195808191980031003', 'Agus Cahyana, SE., MM', 'Akuntansi', 1),
('196003131980031002', 'Wonny Ahmad Ridwan, Dr. SE.,MM', 'Teknik dan Manajemen Lingkungan', 1),
('19600410198503001', 'Asdar Iswati, Dr. Ir. MS', 'Teknologi dan Manajemen Produksi Perkebunan', 1),
('196005031985031003', 'Bagus Priyo Purwanto,Dr. Ir. M.Agr', 'Teknologi dan Manajemen Ternak', 1),
('196203011988031001', 'Iman Firmansyah, drs. M.Si', 'Akuntansi', 1),
('196210161988012001 ', 'Irma Rasita Gloria Barus, Dra. MA ', 'Komunikasi', 1),
('196302201990031001', 'D. Iwan Riswandi, Dr. SE., M.Si', 'Manajemen Agribisnis', 1),
('196303261987031001', 'Suparman, Ir. MM', 'Komunikasi', 1),
('196304192007011001', 'Dahri,Dr. Ir.  M.Si', 'Manajemen Agribisnis', 1),
('196312291989031001', 'Andi Murfi, Ir. M.Si', 'Teknologi dan Manajemen Ternak', 1),
('196509262014091001', 'Hermawan Wana, Ir. M.Si', 'Manajemen Agribisnis', 1),
('196610161991031004', 'Wawan Oktariza, Dr. Ir. M.Si', '', 1),
('196612072007102001', 'R.A. Hangesti Emi Widyasari, Dr. S.Pi., M.Si', 'Manajemen Industri Jasa Makanan dan Gizi', 1),
('196705032014091002', 'Gatot Widodo, S.Pd., M.Pd', 'Ekowisata', 1),
('196710122007012001', 'Erni Sulistiawati, Dr. drh. SP1', 'Paramedik Veteriner', 1),
('196710241993022001', 'Anita Ristianingrum, Dr. Ir. M.Si', 'Manajemen Agribisnis', 1),
('196903282009102002', 'Rina Martini, Dr. Ir. M.Si', 'Manajemen Industri Jasa Makanan dan Gizi', 1),
('196906151994032001', 'Nurul Jannah,Ir. Ph.D., MM', 'Teknik dan Manajemen Lingkungan', 1),
('197102262002122001', 'Andi Early Febrinda, Dr. STP., MP', 'Supervisor Jaminan Mutu Pangan ', 1),
('197105102014092001', 'RR. Renny Soelistyowati, SS., M.Hum', 'Komunikasi', 1),
('197212202006042001', 'Mela Nurdialy, SE., M.AK', 'Akuntansi', 1),
('197309092008121003 ', 'Melewanto Patabang, Dr. S.Hut. M.Si', 'Ekowisata', 1),
('197403202003122001', 'Miesriany Hidiya, STP, M.Si', 'Teknik dan Manajemen Lingkungan', 1),
('197610271999032001', 'Sulassih, SP.,M.Si', 'Teknologi Industri Benih', 1),
('197611032014092002', 'Farida Laila, Dr. S.Si., M.Si', 'Analisis Kima', 1),
('197702272007012001', 'Veralianta BR. Sebayang, Dr. SP. M.Si', 'Manajemen Agribisnis', 1),
('198007302009101002', 'Uding Sastrawan, SP., M.Si', 'Manajemen Agribisnis', 1),
('198205052007102001', 'Ika Resmeiliana, S.Hut, M.Si', 'Analisis Kima', 1),
('198507302019032007', 'Yudith Vega Paramitadevi, ST., M.Si', 'Teknik dan Manajemen Lingkungan', 1),
('198605122019031004 ', 'Surya Kusuma Wijaya ,drh. S.KH., M.Si ', 'Paramedik Veteriner', 1),
('198810122019032020 ', 'Merry Gloria Meliala, Sp., M.Si ', 'Teknologi dan Manajemen Produksi Perkebunan', 1),
('199003012020121001', 'Ahmad Aulia Arsyad, S.K.Pm, M.Si', 'Komunikasi', 1),
('199101152020122002', 'Rianti Dyah Hapsari, S.T.P., M.Sc', 'Supervisor Jaminan Mutu Pangan ', 1),
('199208202019032028 ', 'Asty Khairi Inayah Syahwani, S.STAT., MM., M.SM ', 'Akuntansi', 1),
('199410122020122005', 'Vieta Annisa Nurhidayati, S.Gz, M.Sc', 'Manajemen Industri Jasa Makanan dan Gizi', 1),
('199603182020122002', 'Natasha Indah Rahmani, S.T, M.T', 'Ekowisata', 1),
('201806198703072001', 'ADE ASTRI MULIASARI, SP., M.Si', 'Teknologi dan Manajemen Produksi Perkebunan', 0),
('201807196009212001', 'DEWI SARASTANI, IR. M.SI.', 'Supervisor Jaminan Mutu Pangan ', 0),
('201807196307252001', 'LILI DAHLIANI, Dr. Ir. MM.,M.Si', 'Teknologi dan Manajemen Produksi Perkebunan', 0),
('201807196707211001', 'PURANA INDRAWAN, IR. MP', 'Manajemen Industri', 0),
('201807196804162001', 'LENI LIDYA, IR, MM', 'Manajemen Agribisnis', 0),
('201807196912282001', 'WIEN KUNTARI, IR, M.Si', 'Manajemen Agribisnis', 0),
('201807197006012001', 'DWI YUNI HASTATI, S.TP., DEA.', 'Supervisor Jaminan Mutu Pangan ', 0),
('201807197208122001', 'HENNY ENDAH ANGGRAENI, Drh. M.Sc', 'Paramedik Veteriner', 0),
('201807197507041001', 'EMIL WAHDI, S.Si, M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('201807197509112001', 'HELIANTHI DEWI, S. Hut, M.Si', 'Ekowisata', 0),
('201807197509181001', 'GURUH RAMDHANI, S.Sn.,M.Sn', 'Komunikasi', 0),
('201807197608202001', 'MRR. LUKIE TRIANAWATI, STP., MSi', 'Supervisor Jaminan Mutu Pangan ', 0),
('201807197702011001', 'WIYOTO, Dr. S.Pi, M.Sc', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201807197710281001', 'HENDRI WIJAYA, S. TP., M.Si', 'Manajemen Industri', 0),
('201807197806101001', 'MUH. FATUROKHMAN, S.Pt., M.Si', 'Manajemen Agribisnis', 0),
('201807197807262001', 'FARANITA RATIH LISTIASARI, SH. MH', 'Analisis Kima', 0),
('201807197904071001', 'BEDI MULYANA, S.Hut., M.Par., M.OT', 'Ekowisata', 0),
('201807197904232001', 'MARIA SUSAN ANGGREAINY, Dr.M.Kom', 'Manajemen Informatika', 0),
('201807198001031001', 'ATEP DIAN SUPARDAN, S.Si, M.Si', 'Analisis Kima', 0),
('201807198005241001', 'HUDI SANTOSO, S.SOS, MP', 'Komunikasi', 0),
('201807198103302001', 'IRA RESMAYASARI, S.S., M.Par.,  MTHM', 'Ekowisata', 0),
('201807198201022001', 'WINA YULIANTI S.Si, M.Si', 'Analisis Kima', 0),
('201807198203182001', 'TETTY BARUNAWATI SIAGIAN, Drh, MSi', 'Paramedik Veteriner', 0),
('201807198304202001', 'AULIA HIDAYATI, SE., M.Ak', 'Akuntansi', 0),
('201807198305122001', 'MEDHANITA DEWI RENANTI, S.KOM, M.Kom', 'Manajemen Informatika', 0),
('201807198307101001', 'ALDI KAMAL WIJAYA, SP, MP., M.ST  ', 'Teknologi Industri Benih', 0),
('201807198402242001', 'WIDA LESMANAWATI, S.Pi, M.Si', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201807198410052001', 'SOFIYANTI INDRIASARI, S.KOM.,M.Kom', 'Manajemen Informatika', 0),
('201807198412112001', 'WALIDATUSH SHOLIHAH, S.Si.,M.Kom', 'Teknik Komputer', 0),
('201807198501202001', 'KANIA S. RAHAYU, S.I.Kom., M.Par., MTHM', 'Ekowisata', 0),
('201807198506061001', 'RAHMAT SALEH, SE.,M.Ak', 'Akuntansi', 0),
('201807198507182001', 'AMATA FAMI, M.Ds', 'Manajemen Informatika', 0),
('201807198611222001', 'RESTU PUJI MUMPUNI, SP., M.Si', 'Produksi dan Pengembangan Pertanian Terpadu', 0),
('201807198705132001', 'RATIH KEMALA DEWI, SP. M.Si', 'Produksi dan Pengembangan Pertanian Terpadu', 0),
('201807198705242001', 'EKA MERDEKAWATI, SE., M.Ak', 'Akuntansi', 0),
('201807198706232001', 'RATIH PRATIWI, SE., M.Ak', 'Akuntansi', 0),
('201807198804152001', 'HIDAYATI FATCHUR ROCHMAH, SP., M.Si', 'Teknologi dan Manajemen Produksi Perkebunan', 0),
('201807198810161001', 'PRIA SEMBADA, Dr. S.Pt.,MST., M.Si', 'Teknologi dan Manajemen Ternak', 0),
('201811196611052010', 'CECILIA ENY INDRIASTUTI, IR, M.Si', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811197709092012', 'DYAH PRABANDARI, SP., M.Si', 'Ekowisata', 0),
('201811197804211004', 'ANDRI ISKANDAR, S.PI., M.SI., M.Sc', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811197903052022', 'NENY MARIYANI, S.TP., M.Si', 'Supervisor Jaminan Mutu Pangan ', 0),
('201811197908061001', 'INSAN KURNIA, S.HUT., M.SI', 'Ekowisata', 0),
('201811197911222005', 'ANI NURAENI, S.Pd., M.Pd', 'Manajemen Industri Jasa Makanan dan Gizi', 0),
('201811198202021024', 'PUNJUNG MEDARAJI SUWARNO, SP, M.Si', 'Teknologi Industri Benih', 0),
('201811198204071001', 'HARI OTANG SASMITA, S.PT.,M.SI', 'Komunikasi', 0),
('201811198207221001', 'M. AGUNG ZAIM ADZKIA, S.SI., M.SI', 'Supervisor Jaminan Mutu Pangan ', 0),
('201811198211141001', 'BAYU SURIAATMAJA SUWANDA, S.IKOM., M.IKOM', 'Komunikasi', 0),
('201811198302191003', 'ANDRI HENDRIANA, S.Pi., M.Si', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811198304191030', 'UNDANG, SP.,M.SI', 'Teknologi Industri Benih', 0),
('201811198305221001', 'ANTONYA RUMONDANG SINAGA, SE., MM', 'Manajemen Industri', 0),
('201811198306292026', 'ROSYDA DIANAH, SKM., MKM', 'Manajemen Industri Jasa Makanan dan Gizi', 0),
('201811198309142016', 'INTANI DEWI, S.Pt., M.Sc., M.Si', 'Manajemen Agribisnis', 0),
('201811198312152006', 'ANNISA KARTINAWATI, S.TP., MT', 'Manajemen Industri', 0),
('201811198401161017', 'KHOIRUL AZIZ HUSYAIRI, SE., M.Si', 'Manajemen Agribisnis', 0),
('201811198402231029', 'SESAR HUSEN SANTOSA, S.TP.,MM', 'Manajemen Industri', 0),
('201811198408062019', 'LIISA FIRHANI RAHMASARI, SP., M.Si', 'Manajemen Agribisnis', 0),
('201811198504262013', 'FANI APRILIANI, SE., MT', 'Manajemen Industri', 0),
('201811198511021001', 'AEP SETIAWAN, S.Si, M.Si', 'Teknik Komputer', 0),
('201811198603082027', 'SANITIANING ANGGRAINI, SP., MM', 'Manajemen Agribisnis', 0),
('201811198605291018', 'LEONARD DHARMAWAN, SP.,M.Si', 'Komunikasi', 0),
('201811198610282023', 'OCCY BONANZA, SP., MT', 'Ekowisata', 0),
('201811198611192014', 'INNA NOVIANTY, Dr. S.Si., M.Si', 'Teknik Komputer', 0),
('201811198702142002', 'AI IMAS FAIDOH FATIMAH, S.TP. MP.,M.SC', 'Supervisor Jaminan Mutu Pangan ', 0),
('201811198703132001', 'IMA KUSUMANTI, S.Pi., M.Sc', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811198704041028', 'SAZLI TUTUR RISYAHADI, S.TP.,MT', 'Manajemen Industri', 0),
('201811198711271001', 'WILLY BACHTIAR, S.IKOM., M.IKOM', 'Komunikasi', 0),
('201811198806252001', 'BEATA RATNAWATI, ST. M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('201811198808132007', 'ANNISA RIZKIRIANI, S.Gz., M.Si', 'Manajemen Industri Jasa Makanan dan Gizi', 0),
('201811198901031001', 'RIDWAN SISKANDAR, S.Si., M.SI', 'Teknik Komputer', 0),
('201811198902132001', 'ANNISA HAKIM, S.PT.,M.SI', 'Teknologi dan Manajemen Ternak', 0),
('201811199012132001', 'SILVIA DEWI SAGITA ANDIK, S.Si., M.Si', 'Manajemen Industri Jasa Makanan dan Gizi', 0),
('201811199012221001', 'DIMAS ARDI PRASETYA, ST., M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('201811199105111021', 'MUHAMMAD IQBAL NURULHAQ, SP.,M.Si', 'Teknologi dan Manajemen Produksi Perkebunan', 0),
('201811199109242001', 'AMALIA PUTRI FIRDAUSI,S,PI.,M.SI', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811199203062001', 'DIAN EKA RAMADHANI. S.PI.,M.SI', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 0),
('201811199302252001', 'AYUTYAS SAYEKTI, SE., M.Si', 'Manajemen Agribisnis', 0),
('201811199303262001', 'TERA FIT RAYANI,S.PT.,M.SI', 'Teknologi dan Manajemen Ternak', 0),
('201910196509081001', 'BAYU WIDODO, ST.,MT', 'Manajemen Informatika', 0),
('201910198602051001', 'FARIZ AM KURNIAWAN, S.Pt, M.SI', 'Teknologi dan Manajemen Ternak', 0),
('201910198606242001', 'FALDIENA MARCELITA, ST.,M.KOM', 'Teknik Komputer', 0),
('201910198608091001', 'DUDI FIRMANSYAH, S.Pt., M.SI', 'Teknologi dan Manajemen Ternak', 0),
('201910198711081001', 'DANANG PRIYAMBODO, S.Pt., M.Si', 'Teknologi dan Manajemen Ternak', 0),
('201910198806022001', 'YUNI RESTI, S.Pt., M.Sc', 'Teknologi dan Manajemen Ternak', 0),
('201910198811072001', 'GILANG AYUNINGTYAS, S.Pt., M.Si', 'Teknologi dan Manajemen Ternak', 0),
('202103197703041001', 'DONI YUSRI, Dr., S.P., M.M', 'Manajemen Industri', 0),
('202103197905101001', 'IKA SARTIKA, S.Sn., M.Sn', 'Komunikasi', 0),
('202103198005062001', 'RINI UNTARI, Dr. S.Hut., M.Si', 'Ekowisata', 0),
('202103198401081001', 'DERRY DARDANELLA, S.TP., M.Si', 'Manajemen Industri', 0),
('202103198406282001', 'RESTI JAYENG RAMADHANTI, S.E.,M.S.Ak', 'Akuntansi', 0),
('202103198509121001', 'AIDIL AZHAR, Dr. S.P, M.Sc', 'Teknologi dan Manajemen Produksi Perkebunan', 0),
('202103198602051001', 'HENRY KASMANHADI SAPUTRA, S.Pi.,M.Si', 'Teknologi dan Manajemen Produksi Perikanan Budidaya', 0),
('202103198602152001', 'LESIA FATMA GINOGA, S.E.,M.Si', 'Akuntansi', 0),
('202103198603181001', 'MUHAMMAD ARIF MULYA, S.Pi., M.Si', 'Teknologi dan Manajemen Produksi Perikanan Budidaya', 0),
('202103198604211001', 'PRIMA GANDHI, S.P., M.Si', 'Manajemen Agribisnis', 0),
('202103198604272001', 'ANDINI TRIBUANA TUNGGADEWI, S.E., M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('202103198610031001', 'DONI SAHAT TUA MANALU, Dr.SE., M.Si', 'Manajemen Agribisnis', 0),
('202103198611092001', 'NOVI ROSYANTI, S.E.M.Ak', 'Akuntansi', 0),
('202103198701151001', 'ABUNG SUPAMA WIJAYA, S.I.Kom., M.Si', 'Komunikasi', 0),
('202103198702202001', 'VIVIEN FEBRBI ASTUTI, S.Ikom., M.I.Kom', 'Komunikasi', 0),
('202103198703062001', 'IVONE WULANDARI BUDIHARTO, S.Si, M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('202103198703282001', 'HARRIES MARITHASARI, S.S., M.Pd', 'Komunikasi', 0),
('202103198707041001', 'ADITYA WICAKSONO, S.Komp., M.Komp', 'Manajemen Informatika', 0),
('202103198709161001', 'SEPTIAN FAUZI DWI SAPUTRA, S.T.P.,M.Si', 'Teknik dan Manajemen Lingkungan', 0),
('202103198710102001', 'GEMA PARASTI MINDARA, S.Si., M.Kom', 'Manajemen Informatika', 0),
('202103198805202001', 'FITRIANI EKA PUJI LESTARI, S.Pt., M.Si', 'Teknologi dan Manajemen Ternak', 0),
('202103198806282001', 'NUR AZIEZAH, S.Si., M.Si', 'Manajemen Informatika', 0),
('202103198910161001', 'TRI BUDIARTO, S.KPm, M.Si', 'Teknologi Produksi dan Pengembangan Masyarakat Pertanian', 0),
('202103199001062001', 'MADE GAYATRI ANGGARKASIH, S.TP.,M.Si', 'Supervisor Jaminan Mutu Pangan', 0),
('202103199011031001', 'TEKAD URIP PAMBUDI SUJARNOKO, Dr.S.Pt., M.Si', 'Analisis Kimia', 0),
('202103199102202001', 'ULIL AZMI NURLAILI AFIFAH, S.P., M.Si', 'Teknologi Industri Benih', 0),
('202103199201151001', 'SUHENDI IRAWAN, S.T., M.Sc', 'Manajemen Industri', 0),
('202103199202101001', 'DWI BUDIONO, Drh.,M.Si', 'Paramedik Veteriner', 0),
('202103199205261001', 'AGUNG PRAYUDHA HIDAYAT, S.T., M.T', 'Manajemen Industri', 0),
('202103199206082001', 'SARI PUTRI DEWI, Dr., S.Pt., M.Si', 'Teknologi dan Manajemen Ternak', 0),
('202103199210272001', 'HENNY RUSMIYATI, S.P.,M.Si', 'Teknologi Industri Benih', 0),
('202103199307261001', 'AGIEF JULIO PRATAMA, S.P.,M.Si', 'Teknologi Produksi dan Pengembangan Masyarakat Pertanian', 0),
('202103199411282001', 'WIDYA HASIAN SITUMEANG, S.K.Pm., M.Si', 'Teknologi Produksi dan Pengembangan Masyarakat Pertanian', 0),
('NIP000000', 'adminDummy, Ph.D', '', 1),
('NIP000001', 'konselorDummy, Ph.D', '', 1),
('NIP000002', 'sekprodiDummy, Ph.D', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Location` text NOT NULL,
  `KonselorNIP` varchar(255) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `LaporanID` int(11) NOT NULL,
  `ThreadKey` varchar(255) NOT NULL,
  `Masalah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`LaporanID`, `ThreadKey`, `Masalah`) VALUES
(1, '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', ''),
(2, 'de55dbad88b95c69d12db84cafe5bf3f', ''),
(3, 'b7a99126905a7c8218c893c35eb50c37', ''),
(4, 'c74564078166bd3ff07e8d999234b09c', ''),
(5, 'cb1eb23a41fe8c06354ae390f42c6a04', 'Array;Array'),
(6, '4dbdfb2d20f0be698b2afe15968d64f1', 'Array'),
(7, '79b33c53834b7498ee50a9a66c759514', ''),
(8, 'ae076fdb00ee462e4201af78457e7f19', ''),
(9, '2fed96de71b30f66642e666654fd30b9', ''),
(10, 'fe834342e6080fda7dd0c91622acdeee', 'AkademikKeluargaKemasyarakatan'),
(11, '7e275e70a91bdc8dc715ac593780412e', 'Akademik;Pergaulan;Lain-lain;;'),
(12, '1ccef6a16e1ed9c8bb10f27fe0bc2972', 'Ekonomi;Keluarga;;');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `LogID` int(11) NOT NULL,
  `ActorUsername` text NOT NULL,
  `Action` text NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `SenderID` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `ThreadKey` varchar(255) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `SenderID`, `Message`, `ThreadKey`, `Timestamp`) VALUES
(35, 'NIP000000', 'Halo', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:40:21'),
(36, 'J3P219078', 'Iya bu', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:40:28'),
(37, 'NIP000000', 'Iya', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:41:18'),
(38, 'NIP000000', 'Iya kah?', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:49:00'),
(39, 'J3P219078', 'IIya lo\n', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:49:10'),
(40, 'J3C118094', 'Hola', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-17 23:51:08'),
(41, 'NIP000000', 'up', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-17 23:59:32'),
(42, 'J3P219078', 'bru\n', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:14:15'),
(43, 'J3P219078', 'cmon la', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:14:19'),
(44, 'J3P219078', 'wat', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:14:48'),
(45, 'J3P219078', 'duh', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:15:09'),
(46, 'J3P219078', 'lah\n\n\n\nkogitu', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:16:05'),
(47, 'J3P219078', 'bruh', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:16:10'),
(48, 'NIP000000', 'wat', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:17:08'),
(49, 'J3P219078', 'lol', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-18 00:17:16'),
(50, 'NIP000000', 'ad', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-18 03:01:10'),
(51, 'J3C118094', 'lol', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-18 03:02:45'),
(52, 'J3C118094', 'try', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-18 03:03:13'),
(53, 'NIP000000', 'Assalamualaikum bu', 'b7a99126905a7c8218c893c35eb50c37', '2021-03-18 03:19:52'),
(54, 'J3C118094', 'Eh kebalik', 'b7a99126905a7c8218c893c35eb50c37', '2021-03-18 03:20:00'),
(55, 'J3C118094', 'assda', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:25:22'),
(56, 'NIP000000', 'k', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:25:30'),
(57, 'J3C118094', 'bu', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:31:21'),
(58, 'J3C118094', 'bu yah', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:31:28'),
(59, 'J3C118094', 'ilang', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:31:34'),
(60, 'NIP000000', 'a', 'cb1eb23a41fe8c06354ae390f42c6a04', '2021-03-18 03:32:10'),
(61, 'NIP000000', 'test', '4dbdfb2d20f0be698b2afe15968d64f1', '2021-03-18 03:47:33'),
(62, 'NIP000000', 'Jadi', '79b33c53834b7498ee50a9a66c759514', '2021-03-18 03:52:01'),
(63, 'J3C118094', 'Coba baer dah', '79b33c53834b7498ee50a9a66c759514', '2021-03-18 03:52:05'),
(64, 'NIP000000', 'a', 'ae076fdb00ee462e4201af78457e7f19', '2021-03-18 03:55:31'),
(65, 'J3C118094', 'a', 'ae076fdb00ee462e4201af78457e7f19', '2021-03-18 03:55:33'),
(66, 'NIP000000', 'ad', 'fe834342e6080fda7dd0c91622acdeee', '2021-03-18 03:59:02'),
(67, 'NIP000000', 'ad', '1ccef6a16e1ed9c8bb10f27fe0bc2972', '2021-03-18 04:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-03-10-055400', 'App\\Database\\Migrations\\Dosen', 'default', 'App', 1615950269, 1),
(2, '2021-03-10-063553', 'App\\Database\\Migrations\\Role', 'default', 'App', 1615950269, 1),
(3, '2021-03-10-071818', 'App\\Database\\Migrations\\Chats', 'default', 'App', 1615950269, 1),
(4, '2021-03-10-072728', 'App\\Database\\Migrations\\Request', 'default', 'App', 1615950269, 1),
(5, '2021-03-10-073310', 'App\\Database\\Migrations\\Messages', 'default', 'App', 1615950269, 1),
(6, '2021-03-10-074057', 'App\\Database\\Migrations\\Events', 'default', 'App', 1615950269, 1),
(7, '2021-03-10-074925', 'App\\Database\\Migrations\\Articles', 'default', 'App', 1615950269, 1),
(8, '2021-03-10-075235', 'App\\Database\\Migrations\\Logs', 'default', 'App', 1615950269, 1),
(9, '2021-03-17-175139', 'App\\Database\\Migrations\\Laporan', 'default', 'App', 1616004233, 2);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `MahasiswaNIM` varchar(255) NOT NULL,
  `MahasiswaNama` varchar(255) NOT NULL,
  `RequestDetail` text NOT NULL,
  `ThreadKey` varchar(255) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `MahasiswaNIM`, `MahasiswaNama`, `RequestDetail`, `ThreadKey`, `Timestamp`) VALUES
(4, 'J3P219078', 'Berliana Savira Putri', 'test', '5ec6f1d8cf8f4cf28f0dc2c41ff7c39d', '2021-03-17 23:39:32'),
(5, 'J3C118094', 'Alan Raihan Maulana', 'joanna', 'de55dbad88b95c69d12db84cafe5bf3f', '2021-03-17 23:50:29'),
(6, 'J3C118094', 'Alan Raihan Maulana', 'Try', 'b7a99126905a7c8218c893c35eb50c37', '2021-03-18 03:19:23'),
(7, 'J3C118094', 'Alan Raihan Maulana', 'bru', 'c74564078166bd3ff07e8d999234b09c', '2021-03-18 03:25:05'),
(8, 'J3C118094', 'Alan Raihan Maulana', 'Coba sesi', 'cb1eb23a41fe8c06354ae390f42c6a04', '2021-03-18 03:31:53'),
(9, 'J3C118094', 'Alan Raihan Maulana', 'asdasd', '4dbdfb2d20f0be698b2afe15968d64f1', '2021-03-18 03:47:14'),
(10, 'J3C118094', 'Alan Raihan Maulana', 'again', '79b33c53834b7498ee50a9a66c759514', '2021-03-18 03:51:41'),
(11, 'J3C118094', 'Alan Raihan Maulana', 'test', 'ae076fdb00ee462e4201af78457e7f19', '2021-03-18 03:55:15'),
(12, 'J3C118094', 'Alan Raihan Maulana', 'adad', '2fed96de71b30f66642e666654fd30b9', '2021-03-18 03:56:52'),
(13, 'J3C118094', 'Alan Raihan Maulana', 'asdfasf', 'fe834342e6080fda7dd0c91622acdeee', '2021-03-18 03:58:46'),
(14, 'J3C118094', 'Alan Raihan Maulana', 'adad', 'e1f37b67810371756b21bb36f0b8e802', '2021-03-18 03:59:51'),
(15, 'J3P219078', 'Berliana Savira Putri', 'asdasd', '7e275e70a91bdc8dc715ac593780412e', '2021-03-18 04:00:12'),
(16, 'J3P219078', 'Berliana Savira Putri', 'asdsad', '1ccef6a16e1ed9c8bb10f27fe0bc2972', '2021-03-18 04:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `Role` enum('dosen','konselor','sekprodi','admin') NOT NULL DEFAULT 'dosen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `NIP`, `Role`) VALUES
(1, '201806198703072001', 'sekprodi'),
(2, '201807198307101001', 'sekprodi'),
(3, '201807198507182001', 'admin'),
(4, '201807198001031001', 'konselor'),
(5, '201807198304202001', 'dosen'),
(6, '201807197904071001', 'dosen'),
(7, '201807196009212001', 'dosen'),
(8, '201807197006012001', 'konselor'),
(9, '201807198705242001', 'konselor'),
(10, '201807197507041001', 'dosen'),
(11, '201807197807262001', 'dosen'),
(12, '201807197509181001', 'sekprodi'),
(13, '201807197509112001', 'dosen'),
(14, '201807197710281001', 'dosen'),
(15, '201807197208122001', 'admin'),
(16, '201807198804152001', 'dosen'),
(17, '201807198005241001', 'dosen'),
(18, '201807198103302001', 'konselor'),
(19, '201807198501202001', 'sekprodi'),
(20, '201807196804162001', 'konselor'),
(21, '201807196307252001', 'dosen'),
(22, '201807197904232001', 'dosen'),
(23, '201807198305122001', 'sekprodi'),
(24, '201807197608202001', 'konselor'),
(25, '201807197806101001', 'dosen'),
(26, '201807198810161001', 'dosen'),
(27, '201807196707211001', 'dosen'),
(28, '201807198506061001', 'konselor'),
(29, '201807198705132001', 'konselor'),
(30, '201807198706232001', 'sekprodi'),
(31, '201807198611222001', 'dosen'),
(32, '201807198410052001', 'dosen'),
(33, '201807198203182001', 'dosen'),
(34, '201807198412112001', 'konselor'),
(35, '201807198402242001', 'dosen'),
(36, '201807196912282001', 'dosen'),
(37, '201807198201022001', 'dosen'),
(38, '201807197702011001', 'dosen'),
(39, '201811199109242001', 'dosen'),
(40, '201811198511021001', 'dosen'),
(41, '201811198702142002', 'dosen'),
(42, '201811198302191003', 'konselor'),
(43, '201811197804211004', 'sekprodi'),
(44, '201811197911222005', 'konselor'),
(45, '201811198902132001', 'konselor'),
(46, '201811198312152006', 'sekprodi'),
(47, '201811198808132007', 'sekprodi'),
(48, '201811198305221001', 'dosen'),
(49, '201811199302252001', 'dosen'),
(50, '201811198211141001', 'konselor'),
(51, '201811198806252001', 'konselor'),
(52, '201811196611052010', 'konselor'),
(53, '201811199203062001', 'dosen'),
(54, '201811199012221001', 'dosen'),
(55, '201811197709092012', 'konselor'),
(56, '201811198504262013', 'dosen'),
(57, '201811198204071001', 'konselor'),
(58, '201811198703132001', 'dosen'),
(59, '201811198611192014', 'sekprodi'),
(60, '201811197908061001', 'dosen'),
(61, '201811198309142016', 'sekprodi'),
(62, '201811198401161017', 'dosen'),
(63, '201811198605291018', 'konselor'),
(64, '201811198408062019', 'konselor'),
(65, '201811198207221001', 'dosen'),
(66, '201811199105111021', 'konselor'),
(67, '201811197903052022', 'sekprodi'),
(68, '201811198610282023', 'konselor'),
(69, '201811198202021024', 'dosen'),
(70, '201811198901031001', 'dosen'),
(71, '201811198306292026', 'admin'),
(72, '201811198603082027', 'dosen'),
(73, '201811198704041028', 'dosen'),
(74, '201811198402231029', 'dosen'),
(75, '201811199012132001', 'dosen'),
(76, '201811199303262001', 'dosen'),
(77, '201811198304191030', 'konselor'),
(78, '201811198711271001', 'dosen'),
(79, '201910196509081001', 'dosen'),
(80, '201910198711081001', 'sekprodi'),
(81, '201910198608091001', 'dosen'),
(82, '201910198606242001', 'konselor'),
(83, '201910198602051001', 'dosen'),
(84, '201910198811072001', 'dosen'),
(85, '201910198806022001', 'dosen'),
(86, '202103198701151001', 'dosen'),
(87, '202103198707041001', 'dosen'),
(88, '202103199307261001', 'dosen'),
(89, '202103199205261001', 'dosen'),
(90, '202103198509121001', 'dosen'),
(91, '202103198604272001', 'dosen'),
(92, '202103198401081001', 'dosen'),
(93, '202103198610031001', 'dosen'),
(94, '202103197703041001', 'dosen'),
(95, '202103199202101001', 'dosen'),
(96, '202103198805202001', 'dosen'),
(97, '202103198710102001', 'konselor'),
(98, '202103198703282001', 'dosen'),
(99, '202103199210272001', 'dosen'),
(100, '202103198602051001', 'dosen'),
(101, '202103197905101001', 'konselor'),
(102, '202103198703062001', 'konselor'),
(103, '202103198602152001', 'konselor'),
(104, '202103199001062001', 'dosen'),
(105, '202103198603181001', 'dosen'),
(106, '202103198611092001', 'dosen'),
(107, '202103198806282001', 'dosen'),
(108, '202103198604211001', 'dosen'),
(109, '202103198406282001', 'dosen'),
(110, '202103198005062001', 'dosen'),
(111, '202103199206082001', 'dosen'),
(112, '202103198709161001', 'dosen'),
(113, '202103199201151001', 'dosen'),
(114, '202103199011031001', 'dosen'),
(115, '202103198910161001', 'dosen'),
(116, '202103199102202001', 'dosen'),
(117, '202103198702202001', 'dosen'),
(118, '202103199411282001', 'dosen'),
(119, '195808191980031003', 'dosen'),
(120, '199003012020121001', 'dosen'),
(121, '197102262002122001', 'dosen'),
(122, '196312291989031001', 'dosen'),
(123, '196710241993022001', 'dosen'),
(124, ' 196106181986091001', 'dosen'),
(125, '19600410198503001', 'dosen'),
(126, '199208202019032028 ', 'dosen'),
(127, '196005031985031003', 'dosen'),
(128, '195805041985032001', 'konselor'),
(129, '196302201990031001', 'dosen'),
(130, '196304192007011001', 'dosen'),
(131, '195712231986032001', 'dosen'),
(132, '196710122007012001', 'dosen'),
(133, '197611032014092002', 'dosen'),
(134, '196705032014091002', 'dosen'),
(135, '196509262014091001', 'dosen'),
(136, '198205052007102001', 'sekprodi'),
(137, '196203011988031001', 'dosen'),
(138, '196210161988012001 ', 'konselor'),
(139, '197212202006042001', 'dosen'),
(140, '197309092008121003 ', 'dosen'),
(141, '198810122019032020 ', 'dosen'),
(142, '197403202003122001', 'dosen'),
(143, '199603182020122002', 'dosen'),
(144, '196906151994032001', 'dosen'),
(145, '196612072007102001', 'dosen'),
(146, '199101152020122002', 'dosen'),
(147, '196903282009102002', 'dosen'),
(148, '197105102014092001', 'dosen'),
(149, '197610271999032001', 'dosen'),
(150, '196303261987031001', 'dosen'),
(151, '198605122019031004 ', 'konselor'),
(152, '198007302009101002', 'dosen'),
(153, '197702272007012001', 'dosen'),
(154, '199410122020122005', 'dosen'),
(155, '196610161991031004', 'dosen'),
(156, '196003131980031002', 'dosen'),
(157, '198507302019032007', 'konselor'),
(158, '201811198504262013', 'konselor'),
(159, 'NIP000000', 'admin'),
(160, 'NIP000001', 'konselor'),
(161, 'NIP000002', 'sekprodi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ArticleID`),
  ADD KEY `Articles_KonselorNIP_foreign` (`KonselorNIP`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`ThreadID`),
  ADD KEY `Chats_KonselorNIP_foreign` (`KonselorNIP`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `Events_KonselorNIP_foreign` (`KonselorNIP`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`LaporanID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Role_NIP_foreign` (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ArticleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `ThreadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `LaporanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_KonselorNIP_foreign` FOREIGN KEY (`KonselorNIP`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `Chats_KonselorNIP_foreign` FOREIGN KEY (`KonselorNIP`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `Events_KonselorNIP_foreign` FOREIGN KEY (`KonselorNIP`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `Role_NIP_foreign` FOREIGN KEY (`NIP`) REFERENCES `dosen` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
