-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Sep 2021 pada 01.27
-- Versi server: 10.3.28-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webc_generate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) NOT NULL,
  `nama_admin` varchar(90) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(99) NOT NULL,
  `role` varchar(10) NOT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `role`, `last_login`, `created_at`) VALUES
('3', 'Admin Testing', 'TestingWABC', '02373cefc37c13662929f6c659e475d7', 'superadmin', '2021-09-06 23:24:12', '2021-07-28 19:13:26'),
('555ae10e-8ba9-459e-8917-156822a00dcb', 'Admin Pengguna', 'pengguna', '02373cefc37c13662929f6c659e475d7', 'admin', '2021-09-06 23:39:08', '2021-07-28 19:13:26'),
('673dd509-4696-4a65-8e4d-9624c593eabc', 'Humas POLINDRA', 'humas polindra', '02373cefc37c13662929f6c659e475d7', 'superadmin', '2021-09-06 11:28:07', '2021-07-28 19:13:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_grup`
--

CREATE TABLE `detail_grup` (
  `id_detail` varchar(255) NOT NULL,
  `id_detail_grup` varchar(255) DEFAULT NULL,
  `id_detail_kontak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_grup`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id` varchar(255) NOT NULL,
  `nama_grup` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id`, `nama_grup`, `keterangan`, `created_at`) VALUES
('6cd8a327-7892-4cf3-a84a-b661ea3a8ce0', 'Test', 'coba', '2021-08-31 01:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` varchar(255) NOT NULL,
  `nama_file` varchar(900) NOT NULL,
  `tgl_download` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(90) NOT NULL,
  `jumlah_kontak` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `nama_file`, `tgl_download`, `keterangan`, `jumlah_kontak`) VALUES
('084d1ae5-e5b9-48af-8ce2-4517970976a4', 'BCWA__2021-07-16-10-53-15.ahk', '2021-07-16 03:53:15', 'KONTAK', 0),
('10129929-95c7-4a8c-86ec-c1958761f6ee', 'BCWA__24-07-2021 16:59:00.ahk', '2021-07-24 09:59:00', 'KONTAK', 0),
('148c12f9-fe91-42d1-a840-d1e99f89c34f', 'BCWA__06-09-2021 18:59:11.ahk', '2021-09-06 11:59:11', 'KONTAK', 29),
('23f4197b-3716-48f6-9562-3f82adb249e7', 'BCWA__21-07-2021 23:24:33.ahk', '2021-07-21 03:33:14', 'KONTAK', 0),
('276bcb5e-b685-4da7-83bc-fe26ff6cd73f', 'BCWA__27-07-2021 06:03:51.ahk', '2021-07-26 23:03:51', 'KONTAK', 0),
('27721752-7f33-4e56-9919-83bae459dc06', 'BCWA__26-07-2021 13:24:20.ahk', '2021-07-26 06:24:20', 'KONTAK', 0),
('2d6ba0a1-2cd1-4cea-94c8-b7c0dee881d0', 'BCWA__2021-07-16-10-52-32.ahk', '2021-07-16 03:52:32', 'KONTAK', 0),
('2d9d14d0-dbd9-428f-95a5-5d310bf5b938', 'BCWA__23-07-2021 11:18:42.ahk', '2021-07-23 04:18:42', 'KONTAK', 0),
('2f14a79f-d1e9-49f9-b3a5-2b7683d96e18', 'BCWA__2021-07-16-10-56-30.ahk', '2021-07-16 03:56:30', 'KONTAK', 0),
('327a446a-0c40-4250-a547-0e15227241b0', 'BCWA__22-07-2021 16:21:49.ahk', '2021-07-22 09:21:49', 'KONTAK', 0),
('384e7884-db22-4039-bf0c-997c5d334660', 'BCWA__06-08-2021 19:00:02.ahk', '2021-08-06 12:00:02', 'KONTAK', 0),
('3d202793-91d3-4b89-9e48-dc4d540cea46', 'BCWA__23-07-2021 11:19:35.ahk', '2021-07-23 04:19:35', 'KONTAK', 0),
('3f5698d4-243f-4d91-886a-d8365e72e476', 'BCWA__02-08-2021 11:36:12.ahk', '2021-08-02 04:36:12', 'KONTAK', 0),
('42150473-2fd6-4b0c-9702-dc63b4c6075b', 'BCWA__06-08-2021 21:36:51.ahk', '2021-08-06 14:36:51', 'KONTAK', 0),
('4336ece0-8cd1-4df4-b344-990f8e3b963c', 'BCWA__21-08-2021 18:00:03.ahk', '2021-08-21 11:00:03', 'KONTAK', 0),
('50acc683-0578-4c00-917c-fefe04c02206', 'BCWA_[GRUP] _2021-07-16-09-35-53.ahk', '2021-07-16 02:35:53', 'GRUP', 0),
('52b8f19d-455e-4051-8abe-3ff44652a43c', 'BCWA__26-07-2021 15:49:31.ahk', '2021-07-26 08:49:31', 'KONTAK', 0),
('53e8a91a-0c1f-494e-bf29-a8771b4c43fa', 'BCWA__16-08-2021 05:54:22.ahk', '2021-08-15 22:54:22', 'KONTAK', 0),
('5671dbbf-c7e0-445e-abeb-87359005b613', 'BCWA__16-08-2021 09:48:48.ahk', '2021-08-16 02:48:48', 'KONTAK', 0),
('58b6a3be-29fa-4468-962a-36fd5aa56761', 'BCWA__06-09-2021 18:53:47.ahk', '2021-09-06 11:53:47', 'KONTAK', 2),
('5b43c24c-cab6-4ac9-afe3-0ff0b79de357', 'BCWA__23-07-2021 11:21:32.ahk', '2021-07-23 04:21:32', 'KONTAK', 0),
('5c847da5-41ab-47c2-8ceb-a4fd6ba1626b', 'BCWA__16-08-2021 11:37:28.ahk', '2021-08-16 04:37:28', 'KONTAK', 0),
('5e3394b7-378b-4e0e-9372-6996941a1886', 'BCWA__24-07-2021 15:37:52.ahk', '2021-07-24 08:37:52', 'KONTAK', 0),
('632bc938-7995-40b2-bbdf-b22206e04580', 'BCWA__29-08-2021 07:21:45.ahk', '2021-08-29 00:21:45', 'KONTAK', 141),
('63599a70-6bd4-48b2-8c77-a0a98f436c14', 'BCWA_C:\\Users\\user\\Downloads\\Mandiri 2021 gel 2_001.jpg_06-08-2021 19:27:42.ahk', '2021-08-06 12:27:42', 'KONTAK', 0),
('668431f1-90ce-44d2-bd7a-d565c881cbf8', 'BCWA__28-08-2021 23:36:24.ahk', '2021-08-28 16:36:24', 'KONTAK', 151),
('6bc9a3bd-3eb3-4b23-8632-f66597665ef8', 'BCWA__21-08-2021 17:52:20.ahk', '2021-08-21 10:52:20', 'KONTAK', 0),
('6d8b0349-5832-4de9-bdcf-02cd87e9112e', 'BCWA__21-07-2021 17:47:35.ahk', '2021-07-21 10:47:35', 'KONTAK', 0),
('7191e407-5952-41f8-ac88-f897396acc4a', 'BCWA__22-07-2021 18:35:28.ahk', '2021-07-22 11:35:28', 'KONTAK', 0),
('75aa53b1-b780-46f1-bf45-bf7712fd6669', 'BCWA__2021-07-16-10-49-49.ahk', '2021-07-16 03:49:49', 'KONTAK', 0),
('786ea339-3d2e-45ea-81c5-ec99896fa1ac', 'BCWA_[GRUP] _2021-07-16-10-21-47.ahk', '2021-07-16 03:21:47', 'GRUP', 0),
('861f96a8-3551-491f-ae2a-64618ef0438e', 'BCWA__17-08-2021 02:16:11.ahk', '2021-08-16 19:16:11', 'KONTAK', 0),
('8663e8f8-f576-4eb2-b3c5-f7838355c171', 'BCWA__28-08-2021 23:26:02.ahk', '2021-08-28 16:26:02', 'KONTAK', 1),
('8d7521c4-6c8f-462a-a0ec-ecd0eceab341', 'BCWA__21-07-2021 17:27:36.ahk', '2021-07-21 10:37:26', 'KONTAK', 0),
('93dc6050-f99d-43a0-8d99-728786f8befa', 'BCWA__22-07-2021 18:41:11.ahk', '2021-07-22 11:41:11', 'KONTAK', 0),
('95e2b8b5-6d55-43b4-ba87-06c5fad8a9f7', 'BCWA__22-07-2021 15:27:03.ahk', '2021-07-22 08:27:03', 'KONTAK', 0),
('9c79098c-9106-4f18-9dea-42ee59931c36', 'BCWA__2021-07-16-10-25-43.ahk', '2021-07-16 03:25:43', 'KONTAK', 0),
('9d7e7f0e-8e17-4675-b289-93b7d746d1ed', 'BCWA__06-08-2021 19:44:42.ahk', '2021-08-06 12:44:42', 'KONTAK', 0),
('a6a1d348-e635-466e-a658-5e2961fa6360', 'BCWA__2021-07-16-10-47-30.ahk', '2021-07-16 03:47:30', 'KONTAK', 0),
('a983d773-f4bd-457b-b924-d0b1147ffdcf', 'BCWA__28-08-2021 23:33:15.ahk', '2021-08-28 16:33:15', 'KONTAK', 1),
('acaf1372-c449-48ac-9b2e-95697b5b5afd', 'BCWA__21-07-2021 17:12:07.ahk', '2021-07-21 10:12:07', 'KONTAK', 0),
('af516081-c028-4bc5-b981-c40cf6ec8098', 'BCWA__15-08-2021 23:40:05.ahk', '2021-08-15 16:40:05', 'KONTAK', 0),
('b0f173ef-4a41-483a-ba29-074078e7b72f', 'BCWA__06-08-2021 19:18:09.ahk', '2021-08-06 12:18:09', 'KONTAK', 0),
('ba6ee845-55d9-44d4-a153-b170ee434f7e', 'BCWA__16-08-2021 08:35:57.ahk', '2021-08-16 01:35:57', 'KONTAK', 0),
('baa0a58b-63e7-4d38-bbf8-e98ce8c8bade', 'BCWA__06-08-2021 19:35:34.ahk', '2021-08-06 12:35:34', 'KONTAK', 0),
('bda5f20e-1bf2-4165-9ffa-e091be6c3b17', 'BCWA__24-07-2021 17:02:02.ahk', '2021-07-24 10:02:02', 'KONTAK', 0),
('c69af878-e460-4d86-b848-bff69cc35fdb', 'BCWA__28-08-2021 23:30:04.ahk', '2021-08-28 16:30:04', 'KONTAK', 1),
('ca1d3537-a12b-4eb0-982f-10d58e0bfec7', 'BCWA__22-07-2021 15:24:40.ahk', '2021-07-22 08:24:40', 'KONTAK', 0),
('cc35b1c6-7354-47e1-ae1f-9454012c7a6a', 'BCWA__2021-07-16-10-42-52.ahk', '2021-07-16 03:42:52', 'KONTAK', 0),
('d7414f20-12fb-4280-baf1-2d90302f5a5a', 'BCWA_Pesan coba_19-08-2021 11:21:21.ahk', '2021-08-19 04:21:21', 'KONTAK', 0),
('d809d18c-5c89-4abd-97e2-eee6721d1c53', 'BCWA__21-07-2021 23:18:45.ahk', '2021-07-21 16:18:45', 'KONTAK', 0),
('d9ee6e48-ae15-4bc2-844a-49d5c54c4b5f', 'BCWA__22-07-2021 16:07:29.ahk', '2021-07-22 09:07:29', 'KONTAK', 0),
('deab10f0-bc79-4404-a640-7989bc64390d', 'BCWA__15-08-2021 23:43:27.ahk', '2021-08-15 16:43:27', 'KONTAK', 0),
('e54da2e8-d630-47b8-a282-b0e57e9e2cd0', 'BCWA__26-07-2021 15:42:01.ahk', '2021-07-26 08:42:01', 'KONTAK', 0),
('e551a71a-465f-40d5-9ed2-823187be2d6b', 'BCWA__30-08-2021 13:44:25.ahk', '2021-08-30 06:44:25', 'KONTAK', 19),
('eec9ed1c-ef0c-44da-9851-f8dfe57b8755', 'BCWA__02-08-2021 11:17:42.ahk', '2021-08-02 04:17:42', 'KONTAK', 0),
('f3faebc8-7e4f-4d74-81d3-497ded045077', 'BCWA__29-08-2021 02:04:19.ahk', '2021-08-28 19:04:19', 'KONTAK', 201),
('fa3d640d-c9c0-496a-9858-c24083b2c2b1', 'BCWA__22-07-2021 15:28:51.ahk', '2021-07-22 08:28:51', 'KONTAK', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(255) NOT NULL,
  `nama_kontak` varchar(30) NOT NULL,
  `nomor_kontak` varchar(15) NOT NULL,
  `tahun_masuk` varchar(4) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--



--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_grup`
--
ALTER TABLE `detail_grup`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
