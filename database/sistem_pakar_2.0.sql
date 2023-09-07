-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2023 pada 16.15
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
  `id_hasil` int(25) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `sesi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_user`, `nama`, `usia`, `tanggal`, `sesi`) VALUES
(78424, 4, 'Budi Setiawan', 20, '2023-08-31', 4),
(344376, 4, 'Muhammad', 20, '2023-09-04', 5),
(581537, 4, 'Andika Lubis', 24, '2023-08-31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_cf`
--

CREATE TABLE `hasil_cf` (
  `id_hasil_cf` int(11) NOT NULL,
  `id_hasil` int(25) DEFAULT NULL,
  `kode_kriteria` varchar(25) DEFAULT NULL,
  `kriteria` varchar(30) NOT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_cf`
--

INSERT INTO `hasil_cf` (`id_hasil_cf`, `id_hasil`, `kode_kriteria`, `kriteria`, `bobot`) VALUES
(180, 581537, 'K2', 'K2', 85.11),
(181, 581537, 'K7', 'K7', 72.25),
(182, 581537, 'K5', 'K5', 63.71),
(189, 78424, 'K8', 'K8', 78.28),
(190, 78424, 'K2', 'K2', 70.29),
(191, 78424, 'K6', 'K6', 66.59),
(192, 344376, 'K1', 'K1', 92.32),
(193, 344376, 'K2', 'K2', 91.7),
(194, 344376, 'K3', 'K3', 87);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_nb`
--

CREATE TABLE `hasil_nb` (
  `id_hasil_nb` int(11) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL,
  `kode_kriteria` varchar(25) DEFAULT NULL,
  `kriteria` varchar(30) NOT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_nb`
--

INSERT INTO `hasil_nb` (`id_hasil_nb`, `id_hasil`, `kode_kriteria`, `kriteria`, `bobot`) VALUES
(104, 581537, 'K7', 'K7', 57.89),
(105, 581537, 'K2', 'K2', 55),
(106, 581537, 'K5', 'K5', 41),
(113, 78424, 'K8', 'K8', 73.53),
(114, 78424, 'K7', 'K7', 38.95),
(115, 78424, 'K2', 'K2', 36.79),
(116, 344376, 'K1', 'K1', 100),
(117, 344376, 'K3', 'K3', 60.53),
(118, 344376, 'K2', 'K2', 55.36);

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
(3429, 4, 'Andika Lubis', 24, 5, 1, 4, 'G1', 0.7, 1, '2023-08-30'),
(3430, 4, 'Andika Lubis', 24, 9, 1, 5, 'G2', 0.4, 1, '2023-08-30'),
(3431, 4, 'Andika Lubis', 24, 10, 1, 6, 'G3', 0, 1, '2023-08-30'),
(3432, 4, 'Andika Lubis', 24, 11, 1, 7, 'G4', 0.7, 1, '2023-08-30'),
(3433, 4, 'Andika Lubis', 24, 12, 1, 8, 'G5', 0, 1, '2023-08-30'),
(3434, 4, 'Andika Lubis', 24, 13, 2, 10, 'G6', 0.4, 1, '2023-08-30'),
(3435, 4, 'Andika Lubis', 24, 14, 2, 11, 'G7', 1, 1, '2023-08-30'),
(3436, 4, 'Andika Lubis', 24, 15, 2, 12, 'G8', 0.7, 1, '2023-08-30'),
(3437, 4, 'Andika Lubis', 24, 16, 2, 13, 'G9', 0.4, 1, '2023-08-30'),
(3438, 4, 'Andika Lubis', 24, 18, 3, 14, 'G10', 0.4, 1, '2023-08-30'),
(3439, 4, 'Andika Lubis', 24, 19, 3, 15, 'G11', 0, 1, '2023-08-30'),
(3440, 4, 'Andika Lubis', 24, 20, 4, 16, 'G12', 0, 1, '2023-08-30'),
(3441, 4, 'Andika Lubis', 24, 21, 4, 17, 'G13', 0.4, 1, '2023-08-30'),
(3442, 4, 'Andika Lubis', 24, 22, 4, 20, 'G14', 0.7, 1, '2023-08-30'),
(3443, 4, 'Andika Lubis', 24, 23, 4, 21, 'G15', 0, 1, '2023-08-30'),
(3444, 4, 'Andika Lubis', 24, 24, 5, 22, 'G16', 0, 1, '2023-08-30'),
(3445, 4, 'Andika Lubis', 24, 25, 5, 23, 'G17', 0.4, 1, '2023-08-30'),
(3446, 4, 'Andika Lubis', 24, 26, 5, 24, 'G18', 0.7, 1, '2023-08-30'),
(3447, 4, 'Andika Lubis', 24, 27, 5, 25, 'G19', 0.4, 1, '2023-08-30'),
(3448, 4, 'Andika Lubis', 24, 28, 6, 26, 'G20', 0.4, 1, '2023-08-30'),
(3449, 4, 'Andika Lubis', 24, 29, 6, 27, 'G21', 0, 1, '2023-08-30'),
(3450, 4, 'Andika Lubis', 24, 30, 6, 28, 'G22', 0.4, 1, '2023-08-30'),
(3451, 4, 'Andika Lubis', 24, 31, 6, 29, 'G23', 0, 1, '2023-08-30'),
(3452, 4, 'Andika Lubis', 24, 32, 7, 30, 'G24', 0.4, 1, '2023-08-30'),
(3453, 4, 'Andika Lubis', 24, 33, 7, 31, 'G25', 0.7, 1, '2023-08-30'),
(3454, 4, 'Andika Lubis', 24, 34, 7, 32, 'G26', 1, 1, '2023-08-30'),
(3455, 4, 'Andika Lubis', 24, 35, 9, 33, 'G27', 0.4, 1, '2023-08-30'),
(3456, 4, 'Andika Lubis', 24, 36, 9, 34, 'G28', 0, 1, '2023-08-30'),
(3457, 4, 'Andika Lubis', 24, 37, 7, 35, 'G29', 0.4, 1, '2023-08-30'),
(3458, 4, 'Andika Lubis', 24, 38, 9, 36, 'G30', 0.7, 1, '2023-08-30'),
(3459, 4, 'Andika Lubis', 24, 5, 1, 4, 'G1', 0.7, 2, '2023-08-30'),
(3460, 4, 'Andika Lubis', 24, 9, 1, 5, 'G2', 0.4, 2, '2023-08-30'),
(3461, 4, 'Andika Lubis', 24, 10, 1, 6, 'G3', 0, 2, '2023-08-30'),
(3462, 4, 'Andika Lubis', 24, 11, 1, 7, 'G4', 0.7, 2, '2023-08-30'),
(3463, 4, 'Andika Lubis', 24, 12, 1, 8, 'G5', 0, 2, '2023-08-30'),
(3464, 4, 'Andika Lubis', 24, 13, 2, 10, 'G6', 0.4, 2, '2023-08-30'),
(3465, 4, 'Andika Lubis', 24, 14, 2, 11, 'G7', 1, 2, '2023-08-30'),
(3466, 4, 'Andika Lubis', 24, 15, 2, 12, 'G8', 0.7, 2, '2023-08-30'),
(3467, 4, 'Andika Lubis', 24, 16, 2, 13, 'G9', 0.4, 2, '2023-08-30'),
(3468, 4, 'Andika Lubis', 24, 18, 3, 14, 'G10', 0.4, 2, '2023-08-30'),
(3469, 4, 'Andika Lubis', 24, 19, 3, 15, 'G11', 0, 2, '2023-08-30'),
(3470, 4, 'Andika Lubis', 24, 20, 4, 16, 'G12', 0, 2, '2023-08-30'),
(3471, 4, 'Andika Lubis', 24, 21, 4, 17, 'G13', 0.4, 2, '2023-08-30'),
(3472, 4, 'Andika Lubis', 24, 22, 4, 20, 'G14', 0.7, 2, '2023-08-30'),
(3473, 4, 'Andika Lubis', 24, 23, 4, 21, 'G15', 0, 2, '2023-08-30'),
(3474, 4, 'Andika Lubis', 24, 24, 5, 22, 'G16', 0, 2, '2023-08-30'),
(3475, 4, 'Andika Lubis', 24, 25, 5, 23, 'G17', 0.4, 2, '2023-08-30'),
(3476, 4, 'Andika Lubis', 24, 26, 5, 24, 'G18', 0.7, 2, '2023-08-30'),
(3477, 4, 'Andika Lubis', 24, 27, 5, 25, 'G19', 0.4, 2, '2023-08-30'),
(3478, 4, 'Andika Lubis', 24, 28, 6, 26, 'G20', 0.4, 2, '2023-08-30'),
(3479, 4, 'Andika Lubis', 24, 29, 6, 27, 'G21', 0, 2, '2023-08-30'),
(3480, 4, 'Andika Lubis', 24, 30, 6, 28, 'G22', 0.4, 2, '2023-08-30'),
(3481, 4, 'Andika Lubis', 24, 31, 6, 29, 'G23', 0, 2, '2023-08-30'),
(3482, 4, 'Andika Lubis', 24, 32, 7, 30, 'G24', 0.4, 2, '2023-08-30'),
(3483, 4, 'Andika Lubis', 24, 33, 7, 31, 'G25', 0.7, 2, '2023-08-30'),
(3484, 4, 'Andika Lubis', 24, 34, 7, 32, 'G26', 1, 2, '2023-08-30'),
(3485, 4, 'Andika Lubis', 24, 35, 9, 33, 'G27', 0.4, 2, '2023-08-30'),
(3486, 4, 'Andika Lubis', 24, 36, 9, 34, 'G28', 0, 2, '2023-08-30'),
(3487, 4, 'Andika Lubis', 24, 37, 7, 35, 'G29', 0.4, 2, '2023-08-30'),
(3488, 4, 'Andika Lubis', 24, 38, 9, 36, 'G30', 0.7, 2, '2023-08-30'),
(3489, 4, '', 0, 5, 1, 4, 'G1', 0.7, 3, '2023-08-30'),
(3490, 4, '', 0, 9, 1, 5, 'G2', 0.4, 3, '2023-08-30'),
(3491, 4, '', 0, 10, 1, 6, 'G3', 1, 3, '2023-08-30'),
(3492, 4, '', 0, 11, 1, 7, 'G4', 0, 3, '2023-08-30'),
(3493, 4, '', 0, 12, 1, 8, 'G5', 0.7, 3, '2023-08-30'),
(3494, 4, '', 0, 13, 2, 10, 'G6', 0.4, 3, '2023-08-30'),
(3495, 4, '', 0, 14, 2, 11, 'G7', 0.4, 3, '2023-08-30'),
(3496, 4, '', 0, 15, 2, 12, 'G8', 0, 3, '2023-08-30'),
(3497, 4, '', 0, 16, 2, 13, 'G9', 0, 3, '2023-08-30'),
(3498, 4, '', 0, 18, 3, 14, 'G10', 0.4, 3, '2023-08-30'),
(3499, 4, '', 0, 19, 3, 15, 'G11', 0.4, 3, '2023-08-30'),
(3500, 4, '', 0, 20, 4, 16, 'G12', 1, 3, '2023-08-30'),
(3501, 4, '', 0, 21, 4, 17, 'G13', 1, 3, '2023-08-30'),
(3502, 4, '', 0, 22, 4, 20, 'G14', 0.4, 3, '2023-08-30'),
(3503, 4, '', 0, 23, 4, 21, 'G15', 0, 3, '2023-08-30'),
(3504, 4, '', 0, 24, 5, 22, 'G16', 0.4, 3, '2023-08-30'),
(3505, 4, '', 0, 25, 5, 23, 'G17', 0.4, 3, '2023-08-30'),
(3506, 4, '', 0, 26, 5, 24, 'G18', 1, 3, '2023-08-30'),
(3507, 4, '', 0, 27, 5, 25, 'G19', 0.7, 3, '2023-08-30'),
(3508, 4, '', 0, 28, 6, 26, 'G20', 0.7, 3, '2023-08-30'),
(3509, 4, '', 0, 29, 6, 27, 'G21', 1, 3, '2023-08-30'),
(3510, 4, '', 0, 30, 6, 28, 'G22', 0.7, 3, '2023-08-30'),
(3511, 4, '', 0, 31, 6, 29, 'G23', 0.4, 3, '2023-08-30'),
(3512, 4, '', 0, 32, 7, 30, 'G24', 0.4, 3, '2023-08-30'),
(3513, 4, '', 0, 33, 7, 31, 'G25', 0, 3, '2023-08-30'),
(3514, 4, '', 0, 34, 7, 32, 'G26', 0.4, 3, '2023-08-30'),
(3515, 4, '', 0, 35, 9, 33, 'G27', 0, 3, '2023-08-30'),
(3516, 4, '', 0, 36, 9, 34, 'G28', 0, 3, '2023-08-30'),
(3517, 4, '', 0, 37, 7, 35, 'G29', 1, 3, '2023-08-30'),
(3518, 4, '', 0, 38, 9, 36, 'G30', 0.4, 3, '2023-08-30'),
(3519, 4, 'Budi Setiawan', 20, 5, 1, 4, 'G1', 0.7, 4, '2023-08-30'),
(3520, 4, 'Budi Setiawan', 20, 9, 1, 5, 'G2', 0.4, 4, '2023-08-30'),
(3521, 4, 'Budi Setiawan', 20, 10, 1, 6, 'G3', 0, 4, '2023-08-30'),
(3522, 4, 'Budi Setiawan', 20, 11, 1, 7, 'G4', 0.4, 4, '2023-08-30'),
(3523, 4, 'Budi Setiawan', 20, 12, 1, 8, 'G5', 0.7, 4, '2023-08-30'),
(3524, 4, 'Budi Setiawan', 20, 13, 2, 10, 'G6', 0, 4, '2023-08-30'),
(3525, 4, 'Budi Setiawan', 20, 14, 2, 11, 'G7', 0.7, 4, '2023-08-30'),
(3526, 4, 'Budi Setiawan', 20, 15, 2, 12, 'G8', 0.4, 4, '2023-08-30'),
(3527, 4, 'Budi Setiawan', 20, 16, 2, 13, 'G9', 0.4, 4, '2023-08-30'),
(3528, 4, 'Budi Setiawan', 20, 18, 3, 14, 'G10', 0, 4, '2023-08-30'),
(3529, 4, 'Budi Setiawan', 20, 19, 3, 15, 'G11', 0.7, 4, '2023-08-30'),
(3530, 4, 'Budi Setiawan', 20, 20, 4, 16, 'G12', 0, 4, '2023-08-30'),
(3531, 4, 'Budi Setiawan', 20, 21, 4, 17, 'G13', 0, 4, '2023-08-30'),
(3532, 4, 'Budi Setiawan', 20, 22, 4, 20, 'G14', 0.7, 4, '2023-08-30'),
(3533, 4, 'Budi Setiawan', 20, 23, 4, 21, 'G15', 0.4, 4, '2023-08-30'),
(3534, 4, 'Budi Setiawan', 20, 24, 5, 22, 'G16', 0, 4, '2023-08-30'),
(3535, 4, 'Budi Setiawan', 20, 25, 5, 23, 'G17', 0, 4, '2023-08-30'),
(3536, 4, 'Budi Setiawan', 20, 26, 5, 24, 'G18', 0.4, 4, '2023-08-30'),
(3537, 4, 'Budi Setiawan', 20, 27, 5, 25, 'G19', 0.4, 4, '2023-08-30'),
(3538, 4, 'Budi Setiawan', 20, 28, 6, 26, 'G20', 0.7, 4, '2023-08-30'),
(3539, 4, 'Budi Setiawan', 20, 29, 6, 27, 'G21', 0, 4, '2023-08-30'),
(3540, 4, 'Budi Setiawan', 20, 30, 6, 28, 'G22', 0.4, 4, '2023-08-30'),
(3541, 4, 'Budi Setiawan', 20, 31, 6, 29, 'G23', 0, 4, '2023-08-30'),
(3542, 4, 'Budi Setiawan', 20, 32, 7, 30, 'G24', 0.4, 4, '2023-08-30'),
(3543, 4, 'Budi Setiawan', 20, 33, 7, 31, 'G25', 0, 4, '2023-08-30'),
(3544, 4, 'Budi Setiawan', 20, 34, 7, 32, 'G26', 0.4, 4, '2023-08-30'),
(3545, 4, 'Budi Setiawan', 20, 35, 9, 33, 'G27', 1, 4, '2023-08-30'),
(3546, 4, 'Budi Setiawan', 20, 36, 9, 34, 'G28', 0.7, 4, '2023-08-30'),
(3547, 4, 'Budi Setiawan', 20, 37, 7, 35, 'G29', 0.7, 4, '2023-08-30'),
(3548, 4, 'Budi Setiawan', 20, 38, 9, 36, 'G30', 0.7, 4, '2023-08-30'),
(3549, 4, 'Muhammad', 20, 5, 1, 4, 'G1', 1, 5, '2023-09-04'),
(3550, 4, 'Muhammad', 20, 9, 1, 5, 'G2', 1, 5, '2023-09-04'),
(3551, 4, 'Muhammad', 20, 10, 1, 6, 'G3', 1, 5, '2023-09-04'),
(3552, 4, 'Muhammad', 20, 11, 1, 7, 'G4', 1, 5, '2023-09-04'),
(3553, 4, 'Muhammad', 20, 12, 1, 8, 'G5', 1, 5, '2023-09-04'),
(3554, 4, 'Muhammad', 20, 13, 2, 10, 'G6', 0.4, 5, '2023-09-04'),
(3555, 4, 'Muhammad', 20, 14, 2, 11, 'G7', 0, 5, '2023-09-04'),
(3556, 4, 'Muhammad', 20, 15, 2, 12, 'G8', 0.4, 5, '2023-09-04'),
(3557, 4, 'Muhammad', 20, 16, 2, 13, 'G9', 0.7, 5, '2023-09-04'),
(3558, 4, 'Muhammad', 20, 18, 3, 14, 'G10', 0, 5, '2023-09-04'),
(3559, 4, 'Muhammad', 20, 19, 3, 15, 'G11', 0, 5, '2023-09-04'),
(3560, 4, 'Muhammad', 20, 20, 4, 16, 'G12', 1, 5, '2023-09-04'),
(3561, 4, 'Muhammad', 20, 21, 4, 17, 'G13', 0, 5, '2023-09-04'),
(3562, 4, 'Muhammad', 20, 22, 4, 20, 'G14', 0, 5, '2023-09-04'),
(3563, 4, 'Muhammad', 20, 23, 4, 21, 'G15', 0.4, 5, '2023-09-04'),
(3564, 4, 'Muhammad', 20, 24, 5, 22, 'G16', 0, 5, '2023-09-04'),
(3565, 4, 'Muhammad', 20, 25, 5, 23, 'G17', 0, 5, '2023-09-04'),
(3566, 4, 'Muhammad', 20, 26, 5, 24, 'G18', 0.4, 5, '2023-09-04'),
(3567, 4, 'Muhammad', 20, 27, 5, 25, 'G19', 0, 5, '2023-09-04'),
(3568, 4, 'Muhammad', 20, 28, 6, 26, 'G20', 0, 5, '2023-09-04'),
(3569, 4, 'Muhammad', 20, 29, 6, 27, 'G21', 0, 5, '2023-09-04'),
(3570, 4, 'Muhammad', 20, 30, 6, 28, 'G22', 0, 5, '2023-09-04'),
(3571, 4, 'Muhammad', 20, 31, 6, 29, 'G23', 0, 5, '2023-09-04'),
(3572, 4, 'Muhammad', 20, 32, 7, 30, 'G24', 0, 5, '2023-09-04'),
(3573, 4, 'Muhammad', 20, 33, 7, 31, 'G25', 0.4, 5, '2023-09-04'),
(3574, 4, 'Muhammad', 20, 34, 7, 32, 'G26', 0, 5, '2023-09-04'),
(3575, 4, 'Muhammad', 20, 35, 9, 33, 'G27', 0, 5, '2023-09-04'),
(3576, 4, 'Muhammad', 20, 36, 9, 34, 'G28', 0, 5, '2023-09-04'),
(3577, 4, 'Muhammad', 20, 37, 7, 35, 'G29', 0, 5, '2023-09-04'),
(3578, 4, 'Muhammad', 20, 38, 9, 36, 'G30', 0.4, 5, '2023-09-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(25) DEFAULT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stimulasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `deskripsi`, `stimulasi`) VALUES
(1, 'K1', 'Linguistik-Verbal', 'Kecerdasan Linguistik (Bahasa) adalah kemampuan seseorang  untuk menggunakan bahasa dan kata-kata secara efektif, baik  secara tertulis maupun lisan, dalam berbagai bentuk yang berbeda  untuk mengekspresikan gagasan-gagasannya.', 'dapat memberikan buku cerita yang variatif berikan fast chard huruf rutin membacakan buku cerita melakukan dialog bersama'),
(2, 'K2', 'Logika-Matematika', 'Kecerdasan Logika (Matematika) berkaitan dengan kemahiran  seseorang dalam menggunakan logika atau penalaran,  menggunakan bilangan, dan dalam berpikir kritis.', 'Latihan permainan balok Lego dan berhubungan dengan angka  bermain yang menghabiskan berhitung atau mengukur atau mencari benda hilang mengelompokkan benda membandingkan benda dalam melakukan percobaan sains sederhana dapat mengajak anak ke outing ke museum'),
(3, 'K3', 'Visual-Spacial', 'Kecerdasan Visual Spasial (Imajinasi) berkaitan dengan  kemampuan seseorang dalam memvisualisasikan gambar di  dalam benak mereka, menangkap dunia ruang visual secara tepat  atau berhubungan dengan kemampuan indera pandang dan  berimajinasi.', 'Membiarkan ia eksplorasi menggambar dengan berbagai media yang ada di lingkungan sekitar berikan buku bergambar ajak ia mengunjungi museum seni atau menuangkan imajinasi ke dalam gambar atau Karya'),
(4, 'K4', 'Musical', 'Kecerdasan Musical (Musik) berkaitan dengan kepekaan  seseorang terhadap suara, ritme, nada, dan musik.', 'mendengarkan berbagai jenis aliran musik mengajak mencoba memainkan berbagai alat musik bernyanyi bersama penonton pertunjukan musik'),
(5, 'K5', 'Kinestetik', 'Kecerdasan Musical (Musik) berkaitan dengan kepekaan  seseorang terhadap suara, ritme, nada, dan musik.', 'Mengajak olahraga rutin eksplorasi permainan outdoor'),
(6, 'K6', 'Interpersonal', 'Kecerdasan Interpersonal (Antara pribadi) berkaitan dengan  kemampuan seseorang dalam memahami, berinteraksi, dan  bekerja sama dengan orang lain.', 'sering mengajak keluar untuk bermain bersama teman-teman atau sering mengajak keluar untuk bermain bersama keluarga besar. Menceritakan pengalaman-pengalaman rasa bahagia dan sedih dalam pengalaman itu ada rasa takut atau perasaan yang lainnyayang sedang dipikiran oleh anak '),
(7, 'K7', 'Intrapersonal', 'Kecerdasan Intrapersonal (Intropeksi) berkaitan dengan  kemampuan seseorang dalam hubungannya dengan kapasitas  introspektif, memiliki pemahaman yang mendalam tentang diri  mereka sendiri, apa kekuatan atau kelemahan dirinya, dan apa  yang membuat dirinya unik.', 'Sering berdiskusi tentang perasaannya dan pendapatnya berikan ia ruang yang nyaman untuk melakukan hobinya. Mengajak anak yoga dan meditasi '),
(9, 'K8', 'Naturalisme', 'Kecerdasan Naturalis (Alami) berkaitan dengan kepekaan  seseorang dalam menghadapi fenomena alam.', 'mengajak eksplorasi di alam bebas sambil mengajaknnya berdiskusi yang bermakna');

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
(58, 'K1', 'G1', 0.2),
(59, 'K1', 'G2', 0.5),
(60, 'K1', 'G3', 0.6),
(61, 'K1', 'G4', 0.4),
(62, 'K1', 'G5', 0.2),
(63, 'K2', 'G2', 0.8),
(64, 'K2', 'G6', 0.6),
(65, 'K2', 'G7', 0.5),
(66, 'K2', 'G8', 0.4),
(67, 'K2', 'G9', 0.5),
(68, 'K3', 'G3', 0.8),
(69, 'K3', 'G9', 0.5),
(70, 'K3', 'G10', 0.2),
(71, 'K3', 'G11', 0.4),
(72, 'K4', 'G12', 0.8),
(73, 'K4', 'G13', 0.6),
(74, 'K4', 'G14', 0.2),
(75, 'K4', 'G15', 0.4),
(76, 'K5', 'G16', 0.4),
(77, 'K5', 'G17', 0.8),
(78, 'K5', 'G18', 0.6),
(79, 'K5', 'G19', 0.2),
(80, 'K6', 'G5', 0.6),
(81, 'K6', 'G20', 0.4),
(82, 'K6', 'G21', 0.2),
(83, 'K6', 'G22', 0.5),
(84, 'K6', 'G23', 0.8),
(85, 'K7', 'G2', 0.4),
(86, 'K7', 'G7', 0.2),
(87, 'K7', 'G15', 0.2),
(88, 'K7', 'G24', 0.5),
(89, 'K7', 'G25', 0.2),
(90, 'K7', 'G26', 0.4),
(91, 'K8', 'G27', 0.2),
(92, 'K8', 'G28', 0.5),
(93, 'K8', 'G29', 0.6),
(94, 'K8', 'G30', 0.4);

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
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `hasil_cf`
--
ALTER TABLE `hasil_cf`
  ADD PRIMARY KEY (`id_hasil_cf`),
  ADD KEY `id_hasil` (`id_hasil`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indeks untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  ADD PRIMARY KEY (`id_hasil_nb`),
  ADD KEY `id_hasil` (`id_hasil`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

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
-- AUTO_INCREMENT untuk tabel `hasil_cf`
--
ALTER TABLE `hasil_cf`
  MODIFY `id_hasil_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  MODIFY `id_hasil_nb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3579;

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
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `hasil_cf`
--
ALTER TABLE `hasil_cf`
  ADD CONSTRAINT `hasil_cf_ibfk_1` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  ADD CONSTRAINT `hasil_nb_ibfk_1` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE;

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
