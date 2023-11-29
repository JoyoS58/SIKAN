-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2022 pada 08.39
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `suhu` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_user`, `tanggal`, `waktu`, `lokasi`, `suhu`) VALUES
(9, 1, '2021-12-29', '15:45:00', 'Ponjuk', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `password`, `email`, `foto`) VALUES
(1, '3529011908030004', 'Muhammad Alief Putra Pratama', '$2y$10$BtFOYOcc3dhtwZG1esIb5uY97nrlFJrqYAlOx7NP4Q0Vox4ZSjyrC', 'aliefmuhammad1908@gmail.com', 'alief.jpg'),
(2, '3529010403950008', 'tolak ivandi yudistiawan', '$2y$10$NoRT5khiYG52bT/Rsu56veJEVNilE0EMLmyzVoUUcc5OxE23N0KFq', 'ivan@gmail.com', 'ivan.jpeg'),
(3, '3529012009030005', 'mohammad septiabudi wicaksono', '$2y$10$aESb4.MyGawQsl7Qj0r3dehibtWQ2eok4qF/ki0zVPlI4TCixdv1C', 'septareiga99@gmail.com', 'septa.jpg'),
(4, '3529011212030005', 'Mohammad Fendi', '$2y$10$BcdjTcgLzMFkVWQ2wMG.XOiyO0b9lEiqCsnqqKt/VYm5Gdyqqyd7y', 'fendi@gmail.com', 'fendi.jpg'),
(5, '3529012012030009', 'Rully', '$2y$10$RA7wDVynpJ/hk6B/yn.Bt.7mPdoVYLCDnRjW7UoXKj0fMExxejwCy', 'rully@gmail.com', 'smk1sumenep.jpeg'),
(6, '3529011212030007', 'Mohammad Roni Syafarianto', '$2y$10$WvQRU25Ua11Ekh/XN92nVuVmk5wqSqkpqnOjUfKJqIwBfP3t5XKd2', 'roni@gmail.com', 'roni.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
