-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 20.37
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_user`, `nama`, `usia`, `tanggal`, `sesi`) VALUES
(514023, 4, 'Muhammad', 24, '2023-08-30', 6),
(602095, 3, 'Andika Lubis', 24, '2023-08-30', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_cf`
--

INSERT INTO `hasil_cf` (`id_hasil_cf`, `id_hasil`, `kode_kriteria`, `kriteria`, `bobot`) VALUES
(110, 514023, 'K2', 'Logika-Matematika', 77.52),
(111, 514023, 'K4', 'Musical', 74.15),
(112, 514023, 'K7', 'Intrapersonal', 69.38),
(113, 602095, 'K1', 'Linguistik-Verbal', 67.57),
(114, 602095, 'K2', 'Logika-Matematika', 55.99),
(115, 602095, 'K3', 'Visual-Spacial', 55.99);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_nb`
--

INSERT INTO `hasil_nb` (`id_hasil_nb`, `id_hasil`, `kode_kriteria`, `kriteria`, `bobot`) VALUES
(34, 514023, 'K2', 'Interpersonal', 77.52),
(35, 514023, 'K4', 'Intrapersonal', 74.15),
(36, 514023, 'K7', 'Musical', 69.38),
(37, 602095, 'K1', 'Interpersonal', 67.57),
(38, 602095, 'K2', 'Intrapersonal', 55.99),
(39, 602095, 'K3', 'Musical', 55.99);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2173, 4, '', 0, 5, 1, 4, 'G1', 0.4, 1, '2023-08-30'),
(2174, 4, '', 0, 9, 1, 5, 'G2', 0.4, 1, '2023-08-30'),
(2175, 4, '', 0, 10, 1, 6, 'G3', 0.4, 1, '2023-08-30'),
(2176, 4, '', 0, 11, 1, 7, 'G4', 0, 1, '2023-08-30'),
(2177, 4, '', 0, 12, 1, 8, 'G5', 1, 1, '2023-08-30'),
(2178, 4, '', 0, 13, 2, 10, 'G6', 0, 1, '2023-08-30'),
(2179, 4, '', 0, 14, 2, 11, 'G7', 0.4, 1, '2023-08-30'),
(2180, 4, '', 0, 15, 2, 12, 'G8', 0, 1, '2023-08-30'),
(2181, 4, '', 0, 16, 2, 13, 'G9', 0.4, 1, '2023-08-30'),
(2182, 4, '', 0, 18, 3, 14, 'G10', 1, 1, '2023-08-30'),
(2183, 4, '', 0, 19, 3, 15, 'G11', 0, 1, '2023-08-30'),
(2184, 4, '', 0, 20, 4, 16, 'G12', 0.4, 1, '2023-08-30'),
(2185, 4, '', 0, 21, 4, 17, 'G13', 1, 1, '2023-08-30'),
(2186, 4, '', 0, 22, 4, 20, 'G14', 1, 1, '2023-08-30'),
(2187, 4, '', 0, 23, 4, 21, 'G15', 1, 1, '2023-08-30'),
(2188, 4, '', 0, 24, 5, 22, 'G16', 0.7, 1, '2023-08-30'),
(2189, 4, '', 0, 25, 5, 23, 'G17', 0.4, 1, '2023-08-30'),
(2190, 4, '', 0, 26, 5, 24, 'G18', 1, 1, '2023-08-30'),
(2191, 4, '', 0, 27, 5, 25, 'G19', 1, 1, '2023-08-30'),
(2192, 4, '', 0, 28, 6, 26, 'G20', 0.4, 1, '2023-08-30'),
(2193, 4, '', 0, 29, 6, 27, 'G21', 0.7, 1, '2023-08-30'),
(2194, 4, '', 0, 30, 6, 28, 'G22', 0, 1, '2023-08-30'),
(2195, 4, '', 0, 31, 6, 29, 'G23', 1, 1, '2023-08-30'),
(2196, 4, '', 0, 32, 7, 30, 'G24', 1, 1, '2023-08-30'),
(2197, 4, '', 0, 33, 7, 31, 'G25', 1, 1, '2023-08-30'),
(2198, 4, '', 0, 34, 7, 32, 'G26', 0.4, 1, '2023-08-30'),
(2199, 4, '', 0, 35, 9, 33, 'G27', 0.7, 1, '2023-08-30'),
(2200, 4, '', 0, 36, 9, 34, 'G28', 1, 1, '2023-08-30'),
(2201, 4, '', 0, 37, 7, 35, 'G29', 0.4, 1, '2023-08-30'),
(2202, 4, '', 0, 38, 9, 36, 'G30', 0, 1, '2023-08-30'),
(2560, 4, '', 0, 5, 1, 4, 'G1', 0.4, 2, '2023-08-30'),
(2561, 4, '', 0, 9, 1, 5, 'G2', 0, 2, '2023-08-30'),
(2562, 4, '', 0, 10, 1, 6, 'G3', 0.7, 2, '2023-08-30'),
(2563, 4, '', 0, 11, 1, 7, 'G4', 1, 2, '2023-08-30'),
(2564, 4, '', 0, 12, 1, 8, 'G5', 1, 2, '2023-08-30'),
(2565, 4, '', 0, 13, 2, 10, 'G6', 0.7, 2, '2023-08-30'),
(2566, 4, '', 0, 14, 2, 11, 'G7', 0.7, 2, '2023-08-30'),
(2567, 4, '', 0, 15, 2, 12, 'G8', 0.4, 2, '2023-08-30'),
(2568, 4, '', 0, 16, 2, 13, 'G9', 0, 2, '2023-08-30'),
(2569, 4, '', 0, 18, 3, 14, 'G10', 0, 2, '2023-08-30'),
(2570, 4, '', 0, 19, 3, 15, 'G11', 0.4, 2, '2023-08-30'),
(2571, 4, '', 0, 20, 4, 16, 'G12', 0, 2, '2023-08-30'),
(2572, 4, '', 0, 21, 4, 17, 'G13', 1, 2, '2023-08-30'),
(2573, 4, '', 0, 22, 4, 20, 'G14', 0.7, 2, '2023-08-30'),
(2574, 4, '', 0, 23, 4, 21, 'G15', 0.4, 2, '2023-08-30'),
(2575, 4, '', 0, 24, 5, 22, 'G16', 0.4, 2, '2023-08-30'),
(2576, 4, '', 0, 25, 5, 23, 'G17', 0.7, 2, '2023-08-30'),
(2577, 4, '', 0, 26, 5, 24, 'G18', 0.4, 2, '2023-08-30'),
(2578, 4, '', 0, 27, 5, 25, 'G19', 0.4, 2, '2023-08-30'),
(2579, 4, '', 0, 28, 6, 26, 'G20', 0.4, 2, '2023-08-30'),
(2580, 4, '', 0, 29, 6, 27, 'G21', 0, 2, '2023-08-30'),
(2581, 4, '', 0, 30, 6, 28, 'G22', 0.4, 2, '2023-08-30'),
(2582, 4, '', 0, 31, 6, 29, 'G23', 0.7, 2, '2023-08-30'),
(2583, 4, '', 0, 32, 7, 30, 'G24', 0, 2, '2023-08-30'),
(2584, 4, '', 0, 33, 7, 31, 'G25', 0, 2, '2023-08-30'),
(2585, 4, '', 0, 34, 7, 32, 'G26', 0.7, 2, '2023-08-30'),
(2586, 4, '', 0, 35, 9, 33, 'G27', 0.4, 2, '2023-08-30'),
(2587, 4, '', 0, 36, 9, 34, 'G28', 0.4, 2, '2023-08-30'),
(2588, 4, '', 0, 37, 7, 35, 'G29', 0, 2, '2023-08-30'),
(2589, 4, '', 0, 38, 9, 36, 'G30', 0.4, 2, '2023-08-30'),
(2590, 4, '', 0, 5, 1, 4, 'G1', 0.4, 3, '2023-08-30'),
(2591, 4, '', 0, 9, 1, 5, 'G2', 0, 3, '2023-08-30'),
(2592, 4, '', 0, 10, 1, 6, 'G3', 0.7, 3, '2023-08-30'),
(2593, 4, '', 0, 11, 1, 7, 'G4', 1, 3, '2023-08-30'),
(2594, 4, '', 0, 12, 1, 8, 'G5', 1, 3, '2023-08-30'),
(2595, 4, '', 0, 13, 2, 10, 'G6', 0.7, 3, '2023-08-30'),
(2596, 4, '', 0, 14, 2, 11, 'G7', 0.7, 3, '2023-08-30'),
(2597, 4, '', 0, 15, 2, 12, 'G8', 0.4, 3, '2023-08-30'),
(2598, 4, '', 0, 16, 2, 13, 'G9', 0, 3, '2023-08-30'),
(2599, 4, '', 0, 18, 3, 14, 'G10', 0, 3, '2023-08-30'),
(2600, 4, '', 0, 19, 3, 15, 'G11', 0.4, 3, '2023-08-30'),
(2601, 4, '', 0, 20, 4, 16, 'G12', 0, 3, '2023-08-30'),
(2602, 4, '', 0, 21, 4, 17, 'G13', 1, 3, '2023-08-30'),
(2603, 4, '', 0, 22, 4, 20, 'G14', 0.7, 3, '2023-08-30'),
(2604, 4, '', 0, 23, 4, 21, 'G15', 0.4, 3, '2023-08-30'),
(2605, 4, '', 0, 24, 5, 22, 'G16', 0.4, 3, '2023-08-30'),
(2606, 4, '', 0, 25, 5, 23, 'G17', 0.7, 3, '2023-08-30'),
(2607, 4, '', 0, 26, 5, 24, 'G18', 0.4, 3, '2023-08-30'),
(2608, 4, '', 0, 27, 5, 25, 'G19', 0.4, 3, '2023-08-30'),
(2609, 4, '', 0, 28, 6, 26, 'G20', 0.4, 3, '2023-08-30'),
(2610, 4, '', 0, 29, 6, 27, 'G21', 0, 3, '2023-08-30'),
(2611, 4, '', 0, 30, 6, 28, 'G22', 0.4, 3, '2023-08-30'),
(2612, 4, '', 0, 31, 6, 29, 'G23', 0.7, 3, '2023-08-30'),
(2613, 4, '', 0, 32, 7, 30, 'G24', 0, 3, '2023-08-30'),
(2614, 4, '', 0, 33, 7, 31, 'G25', 0, 3, '2023-08-30'),
(2615, 4, '', 0, 34, 7, 32, 'G26', 0.7, 3, '2023-08-30'),
(2616, 4, '', 0, 35, 9, 33, 'G27', 0.4, 3, '2023-08-30'),
(2617, 4, '', 0, 36, 9, 34, 'G28', 0.4, 3, '2023-08-30'),
(2618, 4, '', 0, 37, 7, 35, 'G29', 0, 3, '2023-08-30'),
(2619, 4, '', 0, 38, 9, 36, 'G30', 0.4, 3, '2023-08-30'),
(2620, 4, '', 0, 5, 1, 4, 'G1', 0.4, 4, '2023-08-30'),
(2621, 4, '', 0, 9, 1, 5, 'G2', 0, 4, '2023-08-30'),
(2622, 4, '', 0, 10, 1, 6, 'G3', 0.7, 4, '2023-08-30'),
(2623, 4, '', 0, 11, 1, 7, 'G4', 1, 4, '2023-08-30'),
(2624, 4, '', 0, 12, 1, 8, 'G5', 1, 4, '2023-08-30'),
(2625, 4, '', 0, 13, 2, 10, 'G6', 0.7, 4, '2023-08-30'),
(2626, 4, '', 0, 14, 2, 11, 'G7', 0.7, 4, '2023-08-30'),
(2627, 4, '', 0, 15, 2, 12, 'G8', 0.4, 4, '2023-08-30'),
(2628, 4, '', 0, 16, 2, 13, 'G9', 0, 4, '2023-08-30'),
(2629, 4, '', 0, 18, 3, 14, 'G10', 0, 4, '2023-08-30'),
(2630, 4, '', 0, 19, 3, 15, 'G11', 0.4, 4, '2023-08-30'),
(2631, 4, '', 0, 20, 4, 16, 'G12', 0, 4, '2023-08-30'),
(2632, 4, '', 0, 21, 4, 17, 'G13', 1, 4, '2023-08-30'),
(2633, 4, '', 0, 22, 4, 20, 'G14', 0.7, 4, '2023-08-30'),
(2634, 4, '', 0, 23, 4, 21, 'G15', 0.4, 4, '2023-08-30'),
(2635, 4, '', 0, 24, 5, 22, 'G16', 0.4, 4, '2023-08-30'),
(2636, 4, '', 0, 25, 5, 23, 'G17', 0.7, 4, '2023-08-30'),
(2637, 4, '', 0, 26, 5, 24, 'G18', 0.4, 4, '2023-08-30'),
(2638, 4, '', 0, 27, 5, 25, 'G19', 0.4, 4, '2023-08-30'),
(2639, 4, '', 0, 28, 6, 26, 'G20', 0.4, 4, '2023-08-30'),
(2640, 4, '', 0, 29, 6, 27, 'G21', 0, 4, '2023-08-30'),
(2641, 4, '', 0, 30, 6, 28, 'G22', 0.4, 4, '2023-08-30'),
(2642, 4, '', 0, 31, 6, 29, 'G23', 0.7, 4, '2023-08-30'),
(2643, 4, '', 0, 32, 7, 30, 'G24', 0, 4, '2023-08-30'),
(2644, 4, '', 0, 33, 7, 31, 'G25', 0, 4, '2023-08-30'),
(2645, 4, '', 0, 34, 7, 32, 'G26', 0.7, 4, '2023-08-30'),
(2646, 4, '', 0, 35, 9, 33, 'G27', 0.4, 4, '2023-08-30'),
(2647, 4, '', 0, 36, 9, 34, 'G28', 0.4, 4, '2023-08-30'),
(2648, 4, '', 0, 37, 7, 35, 'G29', 0, 4, '2023-08-30'),
(2649, 4, '', 0, 38, 9, 36, 'G30', 0.4, 4, '2023-08-30'),
(2650, 4, '', 0, 5, 1, 4, 'G1', 0, 5, '2023-08-30'),
(2651, 4, '', 0, 9, 1, 5, 'G2', 0.4, 5, '2023-08-30'),
(2652, 4, '', 0, 10, 1, 6, 'G3', 0.7, 5, '2023-08-30'),
(2653, 4, '', 0, 11, 1, 7, 'G4', 0, 5, '2023-08-30'),
(2654, 4, '', 0, 12, 1, 8, 'G5', 0.4, 5, '2023-08-30'),
(2655, 4, '', 0, 13, 2, 10, 'G6', 0, 5, '2023-08-30'),
(2656, 4, '', 0, 14, 2, 11, 'G7', 0, 5, '2023-08-30'),
(2657, 4, '', 0, 15, 2, 12, 'G8', 0.4, 5, '2023-08-30'),
(2658, 4, '', 0, 16, 2, 13, 'G9', 0.7, 5, '2023-08-30'),
(2659, 4, '', 0, 18, 3, 14, 'G10', 0, 5, '2023-08-30'),
(2660, 4, '', 0, 19, 3, 15, 'G11', 1, 5, '2023-08-30'),
(2661, 4, '', 0, 20, 4, 16, 'G12', 0.7, 5, '2023-08-30'),
(2662, 4, '', 0, 21, 4, 17, 'G13', 0.4, 5, '2023-08-30'),
(2663, 4, '', 0, 22, 4, 20, 'G14', 0.4, 5, '2023-08-30'),
(2664, 4, '', 0, 23, 4, 21, 'G15', 0.7, 5, '2023-08-30'),
(2665, 4, '', 0, 24, 5, 22, 'G16', 0.4, 5, '2023-08-30'),
(2666, 4, '', 0, 25, 5, 23, 'G17', 0.4, 5, '2023-08-30'),
(2667, 4, '', 0, 26, 5, 24, 'G18', 0.7, 5, '2023-08-30'),
(2668, 4, '', 0, 27, 5, 25, 'G19', 0.4, 5, '2023-08-30'),
(2669, 4, '', 0, 28, 6, 26, 'G20', 1, 5, '2023-08-30'),
(2670, 4, '', 0, 29, 6, 27, 'G21', 0, 5, '2023-08-30'),
(2671, 4, '', 0, 30, 6, 28, 'G22', 0, 5, '2023-08-30'),
(2672, 4, '', 0, 31, 6, 29, 'G23', 0.4, 5, '2023-08-30'),
(2673, 4, '', 0, 32, 7, 30, 'G24', 0, 5, '2023-08-30'),
(2674, 4, '', 0, 33, 7, 31, 'G25', 0.4, 5, '2023-08-30'),
(2675, 4, '', 0, 34, 7, 32, 'G26', 0, 5, '2023-08-30'),
(2676, 4, '', 0, 35, 9, 33, 'G27', 0.7, 5, '2023-08-30'),
(2677, 4, '', 0, 36, 9, 34, 'G28', 1, 5, '2023-08-30'),
(2678, 4, '', 0, 37, 7, 35, 'G29', 1, 5, '2023-08-30'),
(2679, 4, '', 0, 38, 9, 36, 'G30', 1, 5, '2023-08-30'),
(2680, 4, 'Muhammad', 24, 5, 1, 4, 'G1', 0.7, 6, '2023-08-30'),
(2681, 4, 'Muhammad', 24, 9, 1, 5, 'G2', 0.7, 6, '2023-08-30'),
(2682, 4, 'Muhammad', 24, 10, 1, 6, 'G3', 0, 6, '2023-08-30'),
(2683, 4, 'Muhammad', 24, 11, 1, 7, 'G4', 0.7, 6, '2023-08-30'),
(2684, 4, 'Muhammad', 24, 12, 1, 8, 'G5', 0.4, 6, '2023-08-30'),
(2685, 4, 'Muhammad', 24, 13, 2, 10, 'G6', 0.4, 6, '2023-08-30'),
(2686, 4, 'Muhammad', 24, 14, 2, 11, 'G7', 0.4, 6, '2023-08-30'),
(2687, 4, 'Muhammad', 24, 15, 2, 12, 'G8', 0.4, 6, '2023-08-30'),
(2688, 4, 'Muhammad', 24, 16, 2, 13, 'G9', 0, 6, '2023-08-30'),
(2689, 4, 'Muhammad', 24, 18, 3, 14, 'G10', 0, 6, '2023-08-30'),
(2690, 4, 'Muhammad', 24, 19, 3, 15, 'G11', 0, 6, '2023-08-30'),
(2691, 4, 'Muhammad', 24, 20, 4, 16, 'G12', 0.7, 6, '2023-08-30'),
(2692, 4, 'Muhammad', 24, 21, 4, 17, 'G13', 0.4, 6, '2023-08-30'),
(2693, 4, 'Muhammad', 24, 22, 4, 20, 'G14', 0.4, 6, '2023-08-30'),
(2694, 4, 'Muhammad', 24, 23, 4, 21, 'G15', 0.4, 6, '2023-08-30'),
(2695, 4, 'Muhammad', 24, 24, 5, 22, 'G16', 0, 6, '2023-08-30'),
(2696, 4, 'Muhammad', 24, 25, 5, 23, 'G17', 0, 6, '2023-08-30'),
(2697, 4, 'Muhammad', 24, 26, 5, 24, 'G18', 0.4, 6, '2023-08-30'),
(2698, 4, 'Muhammad', 24, 27, 5, 25, 'G19', 0, 6, '2023-08-30'),
(2699, 4, 'Muhammad', 24, 28, 6, 26, 'G20', 0, 6, '2023-08-30'),
(2700, 4, 'Muhammad', 24, 29, 6, 27, 'G21', 0.4, 6, '2023-08-30'),
(2701, 4, 'Muhammad', 24, 30, 6, 28, 'G22', 0.4, 6, '2023-08-30'),
(2702, 4, 'Muhammad', 24, 31, 6, 29, 'G23', 0, 6, '2023-08-30'),
(2703, 4, 'Muhammad', 24, 32, 7, 30, 'G24', 0.7, 6, '2023-08-30'),
(2704, 4, 'Muhammad', 24, 33, 7, 31, 'G25', 0.4, 6, '2023-08-30'),
(2705, 4, 'Muhammad', 24, 34, 7, 32, 'G26', 0.4, 6, '2023-08-30'),
(2706, 4, 'Muhammad', 24, 35, 9, 33, 'G27', 0.4, 6, '2023-08-30'),
(2707, 4, 'Muhammad', 24, 36, 9, 34, 'G28', 0, 6, '2023-08-30'),
(2708, 4, 'Muhammad', 24, 37, 7, 35, 'G29', 0.4, 6, '2023-08-30'),
(2709, 4, 'Muhammad', 24, 38, 9, 36, 'G30', 0, 6, '2023-08-30'),
(2710, 3, 'Andika Lubis', 24, 5, 1, 4, 'G1', 0.7, 2, '2023-08-30'),
(2711, 3, 'Andika Lubis', 24, 9, 1, 5, 'G2', 0.7, 2, '2023-08-30'),
(2712, 3, 'Andika Lubis', 24, 10, 1, 6, 'G3', 0.7, 2, '2023-08-30'),
(2713, 3, 'Andika Lubis', 24, 11, 1, 7, 'G4', 0, 2, '2023-08-30'),
(2714, 3, 'Andika Lubis', 24, 12, 1, 8, 'G5', 0, 2, '2023-08-30'),
(2715, 3, 'Andika Lubis', 24, 13, 2, 10, 'G6', 0, 2, '2023-08-30'),
(2716, 3, 'Andika Lubis', 24, 14, 2, 11, 'G7', 0, 2, '2023-08-30'),
(2717, 3, 'Andika Lubis', 24, 15, 2, 12, 'G8', 0, 2, '2023-08-30'),
(2718, 3, 'Andika Lubis', 24, 16, 2, 13, 'G9', 0, 2, '2023-08-30'),
(2719, 3, 'Andika Lubis', 24, 18, 3, 14, 'G10', 0, 2, '2023-08-30'),
(2720, 3, 'Andika Lubis', 24, 19, 3, 15, 'G11', 0, 2, '2023-08-30'),
(2721, 3, 'Andika Lubis', 24, 20, 4, 16, 'G12', 0, 2, '2023-08-30'),
(2722, 3, 'Andika Lubis', 24, 21, 4, 17, 'G13', 0, 2, '2023-08-30'),
(2723, 3, 'Andika Lubis', 24, 22, 4, 20, 'G14', 0, 2, '2023-08-30'),
(2724, 3, 'Andika Lubis', 24, 23, 4, 21, 'G15', 0, 2, '2023-08-30'),
(2725, 3, 'Andika Lubis', 24, 24, 5, 22, 'G16', 0, 2, '2023-08-30'),
(2726, 3, 'Andika Lubis', 24, 25, 5, 23, 'G17', 0, 2, '2023-08-30'),
(2727, 3, 'Andika Lubis', 24, 26, 5, 24, 'G18', 0, 2, '2023-08-30'),
(2728, 3, 'Andika Lubis', 24, 27, 5, 25, 'G19', 0, 2, '2023-08-30'),
(2729, 3, 'Andika Lubis', 24, 28, 6, 26, 'G20', 0, 2, '2023-08-30'),
(2730, 3, 'Andika Lubis', 24, 29, 6, 27, 'G21', 0, 2, '2023-08-30'),
(2731, 3, 'Andika Lubis', 24, 30, 6, 28, 'G22', 0, 2, '2023-08-30'),
(2732, 3, 'Andika Lubis', 24, 31, 6, 29, 'G23', 0, 2, '2023-08-30'),
(2733, 3, 'Andika Lubis', 24, 32, 7, 30, 'G24', 0, 2, '2023-08-30'),
(2734, 3, 'Andika Lubis', 24, 33, 7, 31, 'G25', 0, 2, '2023-08-30'),
(2735, 3, 'Andika Lubis', 24, 34, 7, 32, 'G26', 0, 2, '2023-08-30'),
(2736, 3, 'Andika Lubis', 24, 35, 9, 33, 'G27', 0, 2, '2023-08-30'),
(2737, 3, 'Andika Lubis', 24, 36, 9, 34, 'G28', 0, 2, '2023-08-30'),
(2738, 3, 'Andika Lubis', 24, 37, 7, 35, 'G29', 0, 2, '2023-08-30'),
(2739, 3, 'Andika Lubis', 24, 38, 9, 36, 'G30', 0, 2, '2023-08-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(25) DEFAULT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tlp` varchar(20) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `email`, `tlp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'cirebon', 'perempuan', 'admin@gmail.com', '0823452332', 'admin'),
(3, 'velya', 'ee11cbb19052e40b07aac0ca060c23ee', 'Velya', 'cirebon', 'perempuan', 'user@gmail.com', '2934092', 'user'),
(4, 'inamfalahuddin', '598147631c57ef841def7ae8ed9a87da', 'In\'am Falahuddin', 'kudumulya', 'laki-laki', 'inam@mail.com', '2147483647', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `kode_kriteria` varchar(25) NOT NULL,
  `kode_gejala` varchar(25) NOT NULL,
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_hasil_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  MODIFY `id_hasil_nb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2740;

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
