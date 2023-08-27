-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2023 pada 18.55
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
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_cf`
--

CREATE TABLE `hasil_cf` (
  `id_hasil_cf` int(11) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_nb`
--

CREATE TABLE `hasil_nb` (
  `id_hasil_nb` int(11) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(678, 3, 'Andika Lubis', 23, 5, 1, 4, 'G1', 0.7, 1, '2023-08-25'),
(679, 3, 'Andika Lubis', 23, 9, 1, 5, 'G2', 0.7, 1, '2023-08-25'),
(680, 3, 'Andika Lubis', 23, 10, 1, 6, 'G3', 0.4, 1, '2023-08-25'),
(681, 3, 'Andika Lubis', 23, 11, 1, 7, 'G4', 0, 1, '2023-08-25'),
(682, 3, 'Andika Lubis', 23, 12, 1, 8, 'G5', 0, 1, '2023-08-25'),
(683, 3, 'Andika Lubis', 23, 13, 2, 10, 'G6', 0.7, 1, '2023-08-25'),
(684, 3, 'Andika Lubis', 23, 14, 2, 11, 'G7', 0.4, 1, '2023-08-25'),
(685, 3, 'Andika Lubis', 23, 15, 2, 12, 'G8', 0.7, 1, '2023-08-25'),
(686, 3, 'Andika Lubis', 23, 16, 2, 13, 'G9', 0.7, 1, '2023-08-25'),
(687, 3, 'Andika Lubis', 23, 18, 3, 14, 'G10', 0.7, 1, '2023-08-25'),
(688, 3, 'Andika Lubis', 23, 19, 3, 15, 'G11', 0.7, 1, '2023-08-25'),
(689, 3, 'Andika Lubis', 23, 20, 4, 16, 'G12', 0, 1, '2023-08-25'),
(690, 3, 'Andika Lubis', 23, 21, 4, 17, 'G13', 0, 1, '2023-08-25'),
(691, 3, 'Andika Lubis', 23, 22, 4, 20, 'G14', 0.7, 1, '2023-08-25'),
(692, 3, 'Andika Lubis', 23, 23, 4, 21, 'G15', 0.4, 1, '2023-08-25'),
(693, 3, 'Andika Lubis', 23, 24, 5, 22, 'G16', 0, 1, '2023-08-25'),
(694, 3, 'Andika Lubis', 23, 25, 5, 23, 'G17', 0, 1, '2023-08-25'),
(695, 3, 'Andika Lubis', 23, 26, 5, 24, 'G18', 0.7, 1, '2023-08-25'),
(696, 3, 'Andika Lubis', 23, 27, 5, 25, 'G19', 0, 1, '2023-08-25'),
(697, 3, 'Andika Lubis', 23, 28, 6, 26, 'G20', 0, 1, '2023-08-25'),
(698, 3, 'Andika Lubis', 23, 29, 6, 27, 'G21', 0, 1, '2023-08-25'),
(699, 3, 'Andika Lubis', 23, 30, 6, 28, 'G22', 0.4, 1, '2023-08-25'),
(700, 3, 'Andika Lubis', 23, 31, 6, 29, 'G23', 0.7, 1, '2023-08-25'),
(701, 3, 'Andika Lubis', 23, 32, 7, 30, 'G24', 0.7, 1, '2023-08-25'),
(702, 3, 'Andika Lubis', 23, 33, 7, 31, 'G25', 0, 1, '2023-08-25'),
(703, 3, 'Andika Lubis', 23, 34, 7, 32, 'G26', 0, 1, '2023-08-25'),
(704, 3, 'Andika Lubis', 23, 35, 9, 33, 'G27', 0.7, 1, '2023-08-25'),
(705, 3, 'Andika Lubis', 23, 36, 9, 34, 'G28', 0.4, 1, '2023-08-25'),
(706, 3, 'Andika Lubis', 23, 37, 7, 35, 'G29', 0.7, 1, '2023-08-25'),
(707, 3, 'Andika Lubis', 23, 38, 9, 36, 'G30', 0.7, 1, '2023-08-25');

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
  `tlp` int(20) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `email`, `tlp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'cirebon', 'perempuan', 'admin@gmail.com', 34592839, 'admin'),
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
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  ADD PRIMARY KEY (`id_hasil_nb`),
  ADD KEY `id_hasil` (`id_hasil`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_cf`
--
ALTER TABLE `hasil_cf`
  MODIFY `id_hasil_cf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  MODIFY `id_hasil_nb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `hasil_cf_ibfk_1` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`),
  ADD CONSTRAINT `hasil_cf_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `hasil_nb`
--
ALTER TABLE `hasil_nb`
  ADD CONSTRAINT `hasil_nb_ibfk_1` FOREIGN KEY (`id_hasil`) REFERENCES `hasil` (`id_hasil`),
  ADD CONSTRAINT `hasil_nb_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

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
