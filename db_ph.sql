-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Nov 2021 pada 10.29
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_ph`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`) VALUES
(1, 'demo', 'demo123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_input`
--

CREATE TABLE `t_input` (
  `id_input` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_warna` varchar(20) DEFAULT NULL,
  `kode_ph` varchar(5) DEFAULT NULL,
  `kategori_ph` varchar(50) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_input`
--

INSERT INTO `t_input` (`id_input`, `id_user`, `kode_warna`, `kode_ph`, `kategori_ph`, `tgl_input`, `path`) VALUES
(2, 1, '#DA9F04', '5', 'Kategori pH Acid', '2021-11-03', ''),
(14, 1, '#010204', '0', 'Tidak ditemukan', '2021-11-08', ''),
(17, 1, '#02a801', '7', 'Netral', '2021-11-08', ''),
(20, 1, '#907f1a', '6', 'Acid', '2021-11-08', ''),
(21, 1, '#71342d', '7', 'Netral', '2021-11-08', ''),
(22, 1, '#162333', '9', 'Alkaline', '2021-11-08', ''),
(23, 1, '#394f2c', '7', 'Netral', '2021-11-10', ''),
(24, 1, '#b992ba', '5', 'Acid', '2021-11-11', ''),
(25, 1, '#c4a7a2', '5', 'Acid', '2021-11-11', ''),
(26, 1, '#c5bab2', '5', 'Acid', '2021-11-11', ''),
(27, 1, '#b2b695', '5', 'Acid', '2021-11-11', ''),
(28, 1, '#986809', '6', 'Acid', '2021-11-11', ''),
(29, 1, '#56521f', '7', 'Netral', '2021-11-11', ''),
(30, 1, '#af7c43', '6', 'Acid', '2021-11-11', ''),
(31, 1, '#b59832', '6', 'Acid', '2021-11-11', ''),
(32, 1, '#a3a049', '6', 'Acid', '2021-11-11', ''),
(33, 1, '#8c6f0b', '6', 'Acid', '2021-11-11', ''),
(34, 1, '#af6a00', '6', 'Acid', '2021-11-11', ''),
(35, 1, '#556220', '7', 'Netral', '2021-11-11', ''),
(36, 1, '#893611', '2', 'Acid', '2021-11-11', ''),
(37, 1, '#698c7a', '6', 'Acid', '2021-11-11', ''),
(38, 1, '#c9cbc4', '5', 'Acid', '2021-11-11', ''),
(39, 1, '#555a57', '7', 'Netral', '2021-11-11', ''),
(40, 1, '#d7ad99', '5', 'Acid', '2021-11-11', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `t_input`
--
ALTER TABLE `t_input`
  ADD PRIMARY KEY (`id_input`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_input`
--
ALTER TABLE `t_input`
  MODIFY `id_input` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
