-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2023 pada 23.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(25) DEFAULT NULL,
  `nama_gejala` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(4, 'G1', 'Suka Bercerita'),
(5, 'G2', 'Suka Membaca'),
(6, 'G3', 'Suka Menulis'),
(7, 'G4', 'Suka Memecahkan Teka Teki'),
(8, 'G5', 'Gemar Berdebat'),
(10, 'G6', ' Melakukan Permainan Logika Seperti Catur'),
(11, 'G7', 'Suka Membaca Buku Tentang Ilmu Pengetahuan '),
(12, 'G8', 'Suka Berhitung Tanpa Alat Bantu'),
(13, 'G9', 'Melakukan Permainan Yang Melibatkan Gambar atau 3D'),
(14, 'G10', 'Mudah Mengenali Pola dan Berimajinasi'),
(15, 'G11', 'Suka Menggambar atau Coret -Coret'),
(16, 'G12', 'Bisa Memainkan Salah Satu Alat Musik'),
(17, 'G14', 'Suka Bernyanyi'),
(20, 'G14', 'Suka Mendengarkan Musik'),
(21, 'G15', 'Suka Belajar Di Iringi Musik'),
(22, 'G16', 'Suka Melakukan Kegiatan Fisik Seperti Bersepeda'),
(23, 'G17', 'Suka Menari'),
(24, 'G18', 'Suka Olahraga atau Bela Diri'),
(25, 'G19', 'Suka Menirukan Gerak Tubuh Untuk Berbicara'),
(26, 'G20', 'Senang Bekerja Sama Dengan Orang Lain, Kelompok'),
(27, 'G21', 'Suka Berkenalan Dengan Orang Baru'),
(28, 'G22', 'Mudah Bergaul atau Bersosialisasi'),
(29, 'G23', 'Memiliki Empati Yang Tinggi Dengan Teman'),
(30, 'G24', 'Suka Belajar Sendiri Maupun Bermain'),
(31, 'G25', 'Suka Keadaan Tenang'),
(32, 'G26', 'Menyukai Hobi Bersifat Pribadi'),
(33, 'G27', 'Suka Dengan Binatang'),
(34, 'G28', 'Senang Berjalan - Jalan Di Taman'),
(35, 'G29', 'Senang Berkebun'),
(36, 'G30', 'Suka Berkemah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `usia` int(50) DEFAULT NULL,
  `hasil_kriteria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_user`, `nama`, `bobot`, `tanggal`, `usia`, `hasil_kriteria`) VALUES
(37, 4, '', 100, '2023-08-11', 0, 'K1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `cf_user` float DEFAULT NULL,
  `sesi` int(11) NOT NULL,
  `tanggal` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_user`, `nama`, `usia`, `id_pertanyaan`, `id_kriteria`, `id_gejala`, `kode_gejala`, `cf_user`, `sesi`, `tanggal`) VALUES
(93, 3, 'Velya', 22, 5, 1, 4, 'G1', 1, 1, '2023-07-29'),
(94, 3, 'Velya', 22, 9, 1, 5, 'G2', 0.5, 1, '2023-07-29'),
(95, 3, 'Velya', 22, 10, 1, 6, 'G3', 0.5, 1, '2023-07-29'),
(96, 3, 'Velya', 22, 11, 1, 7, 'G4', 0.5, 1, '2023-07-29'),
(97, 3, 'Velya', 22, 12, 1, 8, 'G5', 1, 1, '2023-07-29'),
(98, 3, 'Velya', 22, 13, 2, 10, 'G6', 1, 1, '2023-07-29'),
(99, 3, 'Velya', 22, 14, 2, 11, 'G7', 0, 1, '2023-07-29'),
(100, 3, 'Velya', 22, 15, 2, 12, 'G8', 0.5, 1, '2023-07-29'),
(101, 3, 'Velya', 22, 16, 2, 13, 'G9', 0, 1, '2023-07-29'),
(102, 3, 'Velya', 22, 18, 3, 14, 'G10', 0, 1, '2023-07-29'),
(103, 3, 'Velya', 22, 19, 3, 15, 'G11', 0, 1, '2023-07-29'),
(104, 3, 'Velya', 22, 20, 4, 16, 'G12', 0.5, 1, '2023-07-29'),
(105, 3, 'Velya', 22, 21, 4, 17, 'G13', 0.5, 1, '2023-07-29'),
(106, 3, 'Velya', 22, 22, 4, 20, 'G14', 0.5, 1, '2023-07-29'),
(107, 3, 'Velya', 22, 23, 4, 21, 'G15', 0.5, 1, '2023-07-29'),
(108, 3, 'Velya', 22, 24, 5, 22, 'G16', 0.5, 1, '2023-07-29'),
(109, 3, 'Velya', 22, 25, 5, 23, 'G17', 0, 1, '2023-07-29'),
(110, 3, 'Velya', 22, 26, 5, 24, 'G18', 0, 1, '2023-07-29'),
(111, 3, 'Velya', 22, 27, 5, 25, 'G19', 0, 1, '2023-07-29'),
(112, 3, 'Velya', 22, 28, 6, 26, 'G20', 0, 1, '2023-07-29'),
(113, 3, 'Velya', 22, 29, 6, 27, 'G21', 0, 1, '2023-07-29'),
(114, 3, 'Velya', 22, 30, 6, 28, 'G22', 0, 1, '2023-07-29'),
(115, 3, 'Velya', 22, 31, 6, 29, 'G23', 0.5, 1, '2023-07-29'),
(116, 3, 'Velya', 22, 32, 7, 30, 'G24', 0.5, 1, '2023-07-29'),
(117, 3, 'Velya', 22, 33, 7, 31, 'G25', 0.5, 1, '2023-07-29'),
(118, 3, 'Velya', 22, 34, 7, 32, 'G26', 0, 1, '2023-07-29'),
(119, 3, 'Velya', 22, 35, 9, 33, 'G27', 0.5, 1, '2023-07-29'),
(120, 3, 'Velya', 22, 36, 9, 34, 'G28', 1, 1, '2023-07-29'),
(121, 3, 'Velya', 22, 37, 7, 35, 'G29', 0.5, 1, '2023-07-29'),
(122, 3, 'Velya', 22, 38, 9, 36, 'G30', 0.5, 1, '2023-07-29'),
(528, 4, '', 0, 5, 1, 4, 'G1', 0, 1, '2023-08-11'),
(529, 4, '', 0, 9, 1, 5, 'G2', 0.5, 1, '2023-08-11'),
(530, 4, '', 0, 10, 1, 6, 'G3', 0.5, 1, '2023-08-11'),
(531, 4, '', 0, 11, 1, 7, 'G4', 1, 1, '2023-08-11'),
(532, 4, '', 0, 12, 1, 8, 'G5', 0.5, 1, '2023-08-11'),
(533, 4, '', 0, 13, 2, 10, 'G6', 0, 1, '2023-08-11'),
(534, 4, '', 0, 14, 2, 11, 'G7', 1, 1, '2023-08-11'),
(535, 4, '', 0, 15, 2, 12, 'G8', 0.5, 1, '2023-08-11'),
(536, 4, '', 0, 16, 2, 13, 'G9', 0, 1, '2023-08-11'),
(537, 4, '', 0, 18, 3, 14, 'G10', 0.5, 1, '2023-08-11'),
(538, 4, '', 0, 19, 3, 15, 'G11', 1, 1, '2023-08-11'),
(539, 4, '', 0, 20, 4, 16, 'G12', 0.5, 1, '2023-08-11'),
(540, 4, '', 0, 21, 4, 17, 'G13', 1, 1, '2023-08-11'),
(541, 4, '', 0, 22, 4, 20, 'G14', 0, 1, '2023-08-11'),
(542, 4, '', 0, 23, 4, 21, 'G15', 0.5, 1, '2023-08-11'),
(543, 4, '', 0, 24, 5, 22, 'G16', 1, 1, '2023-08-11'),
(544, 4, '', 0, 25, 5, 23, 'G17', 0.5, 1, '2023-08-11'),
(545, 4, '', 0, 26, 5, 24, 'G18', 0, 1, '2023-08-11'),
(546, 4, '', 0, 27, 5, 25, 'G19', 0, 1, '2023-08-11'),
(547, 4, '', 0, 28, 6, 26, 'G20', 0.5, 1, '2023-08-11'),
(548, 4, '', 0, 29, 6, 27, 'G21', 0, 1, '2023-08-11'),
(549, 4, '', 0, 30, 6, 28, 'G22', 0, 1, '2023-08-11'),
(550, 4, '', 0, 31, 6, 29, 'G23', 0, 1, '2023-08-11'),
(551, 4, '', 0, 32, 7, 30, 'G24', 0.5, 1, '2023-08-11'),
(552, 4, '', 0, 33, 7, 31, 'G25', 1, 1, '2023-08-11'),
(553, 4, '', 0, 34, 7, 32, 'G26', 0, 1, '2023-08-11'),
(554, 4, '', 0, 35, 9, 33, 'G27', 0, 1, '2023-08-11'),
(555, 4, '', 0, 36, 9, 34, 'G28', 0, 1, '2023-08-11'),
(556, 4, '', 0, 37, 7, 35, 'G29', 0, 1, '2023-08-11'),
(557, 4, '', 0, 38, 9, 36, 'G30', 1, 1, '2023-08-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(25) DEFAULT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `deskripsi`) VALUES
(1, 'K1', 'Linguistik-Verbal', 'Kecerdasan Linguistik (Bahasa) adalah kemampuan seseorang  untuk menggunakan bahasa dan kata-kata secara efektif, baik  secara tertulis maupun lisan, dalam berbagai bentuk yang berbeda  untuk mengekspresikan gagasan-gagasannya.'),
(2, 'K2', 'Logika-Matematika', 'Kecerdasan Logika (Matematika) berkaitan dengan kemahiran  seseorang dalam menggunakan logika atau penalaran,  menggunakan bilangan, dan dalam berpikir kritis.'),
(3, 'K3', 'Visual-Spacial', 'Kecerdasan Visual Spasial (Imajinasi) berkaitan dengan  kemampuan seseorang dalam memvisualisasikan gambar di  dalam benak mereka, menangkap dunia ruang visual secara tepat  atau berhubungan dengan kemampuan indera pandang dan  berimajinasi.'),
(4, 'K4', 'Musical', 'Kecerdasan Musical (Musik) berkaitan dengan kepekaan  seseorang terhadap suara, ritme, nada, dan musik.'),
(5, 'K5', 'Kinestetik', 'Kecerdasan Musical (Musik) berkaitan dengan kepekaan  seseorang terhadap suara, ritme, nada, dan musik.'),
(6, 'K6', 'Interpersonal', 'Kecerdasan Interpersonal (Antara pribadi) berkaitan dengan  kemampuan seseorang dalam memahami, berinteraksi, dan  bekerja sama dengan orang lain.'),
(7, 'K7', 'Intrapersonal', 'Kecerdasan Intrapersonal (Intropeksi) berkaitan dengan  kemampuan seseorang dalam hubungannya dengan kapasitas  introspektif, memiliki pemahaman yang mendalam tentang diri  mereka sendiri, apa kekuatan atau kelemahan dirinya, dan apa  yang membuat dirinya unik.'),
(9, 'K8', 'Naturalisme', 'Kecerdasan Naturalis (Alami) berkaitan dengan kepekaan  seseorang dalam menghadapi fenomena alam.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakar`
--

CREATE TABLE `pakar` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pakar`
--

INSERT INTO `pakar` (`id`, `kode_kriteria`, `kode_gejala`, `cf_pakar`) VALUES
(38, 'K1', 'G1', 0.7),
(39, 'K1', 'G2', 0.4),
(40, 'K1', 'G3', 0.7),
(41, 'K1', 'G4', 1),
(42, 'K1', 'G5', 0.7),
(43, 'K2', 'G2', 1),
(44, 'K2', 'G6', 0.7),
(45, 'K2', 'G7', 0.4),
(46, 'K2', 'G8', 0.7),
(47, 'K2', 'G9', 0.4),
(48, 'K3', 'G3', 0.4),
(49, 'K3', 'G9', 0.7),
(50, 'K3', 'G10', 0.7),
(51, 'K3', 'G11', 0.4),
(52, 'K4', 'G12', 0.4),
(53, 'K4', 'G13', 0.4),
(54, 'K4', 'G14', 0.7),
(55, 'K4', 'G15', 0.4),
(56, 'K5', 'G16', 0.4),
(57, 'K5', 'G17', 0.7),
(58, 'K5', 'G18', 0.4),
(59, 'K5', 'G19', 1),
(60, 'K6', 'G5', 1),
(61, 'K6', 'G20', 0.4),
(62, 'K6', 'G21', 0.7),
(63, 'K6', 'G22', 0.4),
(64, 'K6', 'G23', 1),
(65, 'K7', 'G2', 0.4),
(66, 'K7', 'G7', 0.4),
(67, 'K7', 'G15', 0.4),
(68, 'K7', 'G24', 0.7),
(69, 'K7', 'G25', 0.7),
(70, 'K7', 'G26', 1),
(71, 'K8', 'G27', 0.4),
(72, 'K8', 'G28', 0.4),
(73, 'K8', 'G29', 0.7),
(74, 'K8', 'G30', 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `kode_pertanyaan` varchar(25) DEFAULT NULL,
  `pertanyaan` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_gejala`, `id_kriteria`, `kode_gejala`, `kode_pertanyaan`, `pertanyaan`) VALUES
(5, 4, 1, 'G1', 'KP-01', 'Apakah Anak Suka Bercerita ?'),
(9, 5, 1, 'G2', 'KP-02', 'Apakah Anak Suka Membaca ?'),
(10, 6, 1, 'G3', 'KP-03', 'Apakah Anak Suka Menulis ?'),
(11, 7, 1, 'G4', 'KP-04', 'Apakah Anak Suka Memecahkan Teka Teki ?'),
(12, 8, 1, 'G5', 'KP-05', 'Apakah Anak Gemar Berdebat ?'),
(13, 10, 2, 'G6', 'KP-06', 'Apakah Anak Suka Dengan Permainan Catur ?'),
(14, 11, 2, 'G7', 'KP-07', 'Apakah Anak Suka Buku Ilmu Pengetahuan ?'),
(15, 12, 2, 'G8', 'KP-08', 'Apakah Anak Suka Berhitung Tanpa Alat Bantu ?'),
(16, 13, 2, 'G9', 'KP-09', 'Apakah Anak Suka Permainan Gambar Atau 3D ?'),
(18, 14, 3, 'G10', 'KP-10', 'Apakah Anak Mudah Mengenali Pola dan Berimajinasi ?'),
(19, 15, 3, 'G11', 'KP-11', 'Apakah Anak Suka Menggambar ?'),
(20, 16, 4, 'G12', 'KP-12', 'Apakah Anak Bisa Memainkan Alat Musik ?'),
(21, 17, 4, 'G13', 'KP-13', 'Apakah Anak Suka Bernyanyi ?'),
(22, 20, 4, 'G14', 'KP-14', 'Apakah Anak Suka Mendengarkan Musik ?'),
(23, 21, 4, 'G15', 'KP-15', 'Apakah Anak Suka Belajar Di Iringi Musik ?'),
(24, 22, 5, 'G16', 'KP-16', 'Apakah Anak Suka Melakukan Kegiatan Fisik ?'),
(25, 23, 5, 'G17', 'KP-17', 'Apakah Anak Suka Menari ?'),
(26, 24, 5, 'G18', 'KP-18', 'Apakah Anak Suka Olahraga atau Bela Diri ?'),
(27, 25, 5, 'G19', 'KP-19', 'Apakah Anak Suka Menirukan Gerak Tubuh Untuk Bicara ?'),
(28, 26, 6, 'G20', 'KP-20', 'Apakah Anak Suka Bekerja Sama Dengan Orang Lain ?'),
(29, 27, 6, 'G21', 'KP-21', 'Apakah Anak Suka Berkenalan Dengan Orang Baru ? '),
(30, 28, 6, 'G22', 'KP-22', 'Apakah Anak Suka Bergaul atau Bersosialisasi ?'),
(31, 29, 6, 'G23', 'KP-23', 'Apakah Anak Memiliki Empati Yang Tinggi ?'),
(32, 30, 7, 'G24', 'KP-24', 'Apakah Anak Suka Belajar Sendiri Maupun Bermain ?'),
(33, 31, 7, 'G25', 'KP-25', 'Apakah Anak Suka Keadaan Tenang ?'),
(34, 32, 7, 'G26', 'KP-26', 'Apakah Anak Suka Hobi Yang Bersifat Pribadi ?'),
(35, 33, 9, 'G27', 'KP-27', 'Apakah Anak Suka Dengan Binatang ?'),
(36, 34, 9, 'G28', 'KP-28', 'Apakah Anak Suka Bejalan - Jalan Di Taman ?'),
(37, 35, 7, 'G29', 'KP-29', 'Apakah Anak Suka Berkebun ?'),
(38, 36, 9, 'G30', 'KP-30', 'Apakah Anak Suka Berkemah ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `tlp` int(20) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `email`, `tlp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'cirebon', 'perempuan', 'admin@gmail.com', 238572345, 'admin'),
(3, 'velya', 'ee11cbb19052e40b07aac0ca060c23ee', 'Velya', 'cirebon', 'perempuan', 'user@gmail.com', 2934092, 'user'),
(4, 'inamfalahuddin', '598147631c57ef841def7ae8ed9a87da', 'In\'am Falahuddin', 'kudumulya', 'laki-laki', 'inam@mail.com', 2147483647, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `kode_kriteria` varchar(25) NOT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `kode_kriteria`, `kode_gejala`, `cf_pakar`) VALUES
(1, 'K1', 'G1', 0.7),
(2, 'K1', 'G2', 0.4),
(3, 'K1', 'G3', 0.7),
(4, 'K1', 'G4', 1),
(5, 'K1', 'G5', 0.7),
(6, 'K2', 'G2', 1),
(7, 'K2', 'G6', 0.7),
(8, 'K2', 'G7', 0.4),
(9, 'K2', 'G8', 0.7),
(10, 'K2', 'G9', 0.4),
(11, 'K3', 'G3', 0.4),
(12, 'K3', 'G9', 0.7),
(13, 'K3', 'G10', 0.7),
(14, 'K3', 'G11', 0.4),
(15, 'K4', 'G12', 0.4),
(16, 'K4', 'G13', 0.4),
(17, 'K4', 'G14', 0.7),
(18, 'K4', 'G15', 0.4),
(19, 'K5', 'G16', 0.4),
(20, 'K5', 'G17', 0.7),
(21, 'K5', 'G18', 0.4),
(22, 'K5', 'G19', 1),
(23, 'K6', 'G5', 1),
(24, 'K6', 'G20', 0.4),
(25, 'K6', 'G21', 0.7),
(26, 'K6', 'G22', 0.4),
(27, 'K6', 'G23', 1),
(28, 'K7', 'G2', 0.4),
(29, 'K7', 'G7', 0.4),
(30, 'K7', 'G15', 0.4),
(31, 'K7', 'G24', 0.7),
(32, 'K7', 'G25', 0.7),
(33, 'K7', 'G26', 1),
(34, 'K8', 'G27', 0.4),
(35, 'K8', 'G28', 0.4),
(36, 'K8', 'G29', 0.7),
(37, 'K8', 'G30', 0.1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `hasil` (`id_user`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `jawaban_ibfk_3` (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=558;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pakar`
--
ALTER TABLE `pakar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`),
  ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_4` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
