-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Agu 2021 pada 11.10
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
('3', 'Admin Testing', 'admin', '0192023a7bbd73250516f069df18b500', 'superadmin', '2021-08-11 10:54:25', '2021-07-28 19:13:26'),
('555ae10e-8ba9-459e-8917-156822a00dcb', 'Admin Pengguna', 'pengguna', '02373cefc37c13662929f6c659e475d7', 'admin', '2021-08-05 15:24:23', '2021-07-28 19:13:26'),
('673dd509-4696-4a65-8e4d-9624c593eabc', 'Humas POLINDRA', 'humas polindra', '02373cefc37c13662929f6c659e475d7', 'superadmin', '2021-08-06 11:27:55', '2021-07-28 19:13:26');

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

INSERT INTO `detail_grup` (`id_detail`, `id_detail_grup`, `id_detail_kontak`) VALUES
('573c9fa5-d919-4c90-a2e7-c7058b654d39', '8', '822861d2-44f2-43be-94bc-4780b665119a'),
('6abf6d85-73c2-4b4b-a435-a3836c90fb85', '8', '9f9d345c-f3c4-4da6-984a-6be673e8257d'),
('6c41fd81-f0d9-406b-a432-a419839ffb4c', '8', '9eae456f-5489-46ba-a08a-0509b713fb0c'),
('bc75609f-1ed1-45ea-8bff-f24e4325f216', '7', '28c036ec-ac26-4a3e-907c-9f5010a89563'),
('d7cea4aa-a805-452f-b655-58b54e4f916e', '7', '8c2dc558-6821-4234-b685-019e6642ff02');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` varchar(255) NOT NULL,
  `nama_file` varchar(900) NOT NULL,
  `tgl_download` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `nama_file`, `tgl_download`, `keterangan`) VALUES
('084d1ae5-e5b9-48af-8ce2-4517970976a4', 'BCWA__2021-07-16-10-53-15.ahk', '2021-07-16 03:53:15', 'KONTAK'),
('10129929-95c7-4a8c-86ec-c1958761f6ee', 'BCWA__24-07-2021 16:59:00.ahk', '2021-07-24 09:59:00', 'KONTAK'),
('23f4197b-3716-48f6-9562-3f82adb249e7', 'BCWA__21-07-2021 23:24:33.ahk', '2021-07-21 03:33:14', 'KONTAK'),
('276bcb5e-b685-4da7-83bc-fe26ff6cd73f', 'BCWA__27-07-2021 06:03:51.ahk', '2021-07-26 23:03:51', 'KONTAK'),
('27721752-7f33-4e56-9919-83bae459dc06', 'BCWA__26-07-2021 13:24:20.ahk', '2021-07-26 06:24:20', 'KONTAK'),
('2d6ba0a1-2cd1-4cea-94c8-b7c0dee881d0', 'BCWA__2021-07-16-10-52-32.ahk', '2021-07-16 03:52:32', 'KONTAK'),
('2d9d14d0-dbd9-428f-95a5-5d310bf5b938', 'BCWA__23-07-2021 11:18:42.ahk', '2021-07-23 04:18:42', 'KONTAK'),
('2f14a79f-d1e9-49f9-b3a5-2b7683d96e18', 'BCWA__2021-07-16-10-56-30.ahk', '2021-07-16 03:56:30', 'KONTAK'),
('327a446a-0c40-4250-a547-0e15227241b0', 'BCWA__22-07-2021 16:21:49.ahk', '2021-07-22 09:21:49', 'KONTAK'),
('384e7884-db22-4039-bf0c-997c5d334660', 'BCWA__06-08-2021 19:00:02.ahk', '2021-08-06 12:00:02', 'KONTAK'),
('3d202793-91d3-4b89-9e48-dc4d540cea46', 'BCWA__23-07-2021 11:19:35.ahk', '2021-07-23 04:19:35', 'KONTAK'),
('3f5698d4-243f-4d91-886a-d8365e72e476', 'BCWA__02-08-2021 11:36:12.ahk', '2021-08-02 04:36:12', 'KONTAK'),
('42150473-2fd6-4b0c-9702-dc63b4c6075b', 'BCWA__06-08-2021 21:36:51.ahk', '2021-08-06 14:36:51', 'KONTAK'),
('50acc683-0578-4c00-917c-fefe04c02206', 'BCWA_[GRUP] _2021-07-16-09-35-53.ahk', '2021-07-16 02:35:53', 'GRUP'),
('52b8f19d-455e-4051-8abe-3ff44652a43c', 'BCWA__26-07-2021 15:49:31.ahk', '2021-07-26 08:49:31', 'KONTAK'),
('5b43c24c-cab6-4ac9-afe3-0ff0b79de357', 'BCWA__23-07-2021 11:21:32.ahk', '2021-07-23 04:21:32', 'KONTAK'),
('5e3394b7-378b-4e0e-9372-6996941a1886', 'BCWA__24-07-2021 15:37:52.ahk', '2021-07-24 08:37:52', 'KONTAK'),
('63599a70-6bd4-48b2-8c77-a0a98f436c14', 'BCWA_C:\\Users\\user\\Downloads\\Mandiri 2021 gel 2_001.jpg_06-08-2021 19:27:42.ahk', '2021-08-06 12:27:42', 'KONTAK'),
('6d8b0349-5832-4de9-bdcf-02cd87e9112e', 'BCWA__21-07-2021 17:47:35.ahk', '2021-07-21 10:47:35', 'KONTAK'),
('7191e407-5952-41f8-ac88-f897396acc4a', 'BCWA__22-07-2021 18:35:28.ahk', '2021-07-22 11:35:28', 'KONTAK'),
('75aa53b1-b780-46f1-bf45-bf7712fd6669', 'BCWA__2021-07-16-10-49-49.ahk', '2021-07-16 03:49:49', 'KONTAK'),
('786ea339-3d2e-45ea-81c5-ec99896fa1ac', 'BCWA_[GRUP] _2021-07-16-10-21-47.ahk', '2021-07-16 03:21:47', 'GRUP'),
('8d7521c4-6c8f-462a-a0ec-ecd0eceab341', 'BCWA__21-07-2021 17:27:36.ahk', '2021-07-21 10:37:26', 'KONTAK'),
('93dc6050-f99d-43a0-8d99-728786f8befa', 'BCWA__22-07-2021 18:41:11.ahk', '2021-07-22 11:41:11', 'KONTAK'),
('95e2b8b5-6d55-43b4-ba87-06c5fad8a9f7', 'BCWA__22-07-2021 15:27:03.ahk', '2021-07-22 08:27:03', 'KONTAK'),
('9c79098c-9106-4f18-9dea-42ee59931c36', 'BCWA__2021-07-16-10-25-43.ahk', '2021-07-16 03:25:43', 'KONTAK'),
('9d7e7f0e-8e17-4675-b289-93b7d746d1ed', 'BCWA__06-08-2021 19:44:42.ahk', '2021-08-06 12:44:42', 'KONTAK'),
('a6a1d348-e635-466e-a658-5e2961fa6360', 'BCWA__2021-07-16-10-47-30.ahk', '2021-07-16 03:47:30', 'KONTAK'),
('acaf1372-c449-48ac-9b2e-95697b5b5afd', 'BCWA__21-07-2021 17:12:07.ahk', '2021-07-21 10:12:07', 'KONTAK'),
('b0f173ef-4a41-483a-ba29-074078e7b72f', 'BCWA__06-08-2021 19:18:09.ahk', '2021-08-06 12:18:09', 'KONTAK'),
('baa0a58b-63e7-4d38-bbf8-e98ce8c8bade', 'BCWA__06-08-2021 19:35:34.ahk', '2021-08-06 12:35:34', 'KONTAK'),
('bda5f20e-1bf2-4165-9ffa-e091be6c3b17', 'BCWA__24-07-2021 17:02:02.ahk', '2021-07-24 10:02:02', 'KONTAK'),
('ca1d3537-a12b-4eb0-982f-10d58e0bfec7', 'BCWA__22-07-2021 15:24:40.ahk', '2021-07-22 08:24:40', 'KONTAK'),
('cc35b1c6-7354-47e1-ae1f-9454012c7a6a', 'BCWA__2021-07-16-10-42-52.ahk', '2021-07-16 03:42:52', 'KONTAK'),
('d809d18c-5c89-4abd-97e2-eee6721d1c53', 'BCWA__21-07-2021 23:18:45.ahk', '2021-07-21 16:18:45', 'KONTAK'),
('d9ee6e48-ae15-4bc2-844a-49d5c54c4b5f', 'BCWA__22-07-2021 16:07:29.ahk', '2021-07-22 09:07:29', 'KONTAK'),
('e54da2e8-d630-47b8-a282-b0e57e9e2cd0', 'BCWA__26-07-2021 15:42:01.ahk', '2021-07-26 08:42:01', 'KONTAK'),
('eec9ed1c-ef0c-44da-9851-f8dfe57b8755', 'BCWA__02-08-2021 11:17:42.ahk', '2021-08-02 04:17:42', 'KONTAK'),
('fa3d640d-c9c0-496a-9858-c24083b2c2b1', 'BCWA__22-07-2021 15:28:51.ahk', '2021-07-22 08:28:51', 'KONTAK');

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

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `nomor_kontak`, `tahun_masuk`, `kelas`, `keterangan`, `jurusan`, `created_at`) VALUES
('004c2790-4ec1-44ca-80d3-576c800dbf4d', '', '6283148681369', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('0196523c-c384-42ad-9562-b46aef884396', '', '6282164698226', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('01ab4281-e9dd-46f3-a871-bc5fc1465890', '', '6289674223887', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('027f21c2-18e1-4d97-871d-bdd39f727c77', '', '6281310252988', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('038e427c-3dd5-4f9b-a628-4d8cbc98b065', '', '6283127933762', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('041e95f8-848e-4185-9b95-21d4ee731a88', '', '6281382753612', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('05062a3a-3021-453c-8cfb-e0945cd1ac92', '', '6285777757756', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('07dbd619-5eee-41aa-af0f-8ff9f23cf0d3', '', '6289604347158', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('0d4976a9-ad77-4265-b036-b85059f1bc8b', '', '6282111860897', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('0ef49b65-d6c6-4d0b-be63-0c018911df76', '', '6283840326053', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('151f957e-0864-4c4f-ab02-1c7f4f77b2e7', '', '6285943578268', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('17f0e915-bc7c-45da-8822-d751ca33876f', '', '6289637453406', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('209a981c-d218-4b1a-8ed0-c3810fab864f', '', '6285797313812', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('280b1921-c34e-4255-be52-14acd6342836', '', '6282119640182', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('2a37d7aa-8c6f-4c71-8524-10301826c418', '', '6282317388835', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('2cafa7f5-c41b-4ebc-9000-77ffc581082d', '', '6289501910193', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('31f6a150-9627-4802-b560-cd49fced82c6', '', '6282213133339', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('39818261-f33a-4fc7-9904-5435af1a75a4', '', '6281324178153', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('40acd1ba-45f6-45af-ae5c-72536d7f14e5', '', '6289664359478', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('45e25847-1c22-413e-836f-b9a3a1baa095', '', '6287729863435', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('469b634a-e3f7-458b-b17d-7661f983cc12', '', '6283807393111', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('46d1d824-91b2-497d-b1fa-382c42672153', '', '62877728997336', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('47dfb79d-d5ad-4642-b15c-77c5e1d11e8a', '', '6289529836163', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('4b5cb94d-53c8-42ee-bc44-a362bff6bd2d', '', '6289660211954', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('4c57d5e6-a38b-41cf-98d3-f34c34cca109', '', '6281249470202', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('4ce835ed-c719-48e1-aa74-08ba35cac577', '', '6283130566017', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('51379a44-433b-4f13-b486-a18ed03579cd', '', '6285559436674', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('578fd371-d98d-4443-aa25-3022a7e6761d', '', '6282119215844', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('5dafde05-0745-402e-9b85-3b5264a35601', '', '6283823047776', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('5e1809b4-20c1-43ef-b405-fb34f891d30c', '', '6289660708727', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('6598592d-a92e-42c7-9de7-ef7654b9d0f0', '', '628977729217', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('6643deea-f0b5-49b1-9e2d-9a94ddb7ad71', '', '6287828640299', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('6730a895-8549-41fa-80e4-b523f5a59812', '', '628815113108', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('68b59989-292e-46a5-b680-371f50e763fc', '', '6281312927894', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('690add61-62ab-4cf8-b7a3-1997a6a573f4', '', '6283824021360', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('6f97ff7f-7004-45d8-a03c-85c73f804dc4', '', '6281947394042', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7458592c-eda4-45de-adcc-a58312180a45', '', '6285156634912', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('76ecbb22-ca3f-4ea7-be95-bc14bc67fede', '', '6281282243729', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('790d2628-4d77-4a68-89c2-d1b39ab4dd28', '', '6283822781929', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7abeed6c-3929-4351-a65e-5b278fbd9fca', '', '6281294103388', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7c5399c0-5914-45dd-9927-d65a9e331a88', '', '6289657260377', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7c5f109f-a4d9-49d1-92de-b2d918ca607c', '', '62895373632716', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7cb0c801-0cc0-4fcb-a53a-dd1c636aa736', '', '6281224123502', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('7e5baaa1-016b-4290-aae9-13b783fbf508', '', '6287717982099', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('814f4fe7-aa0c-4336-a1b6-dbbe66acb4e8', '', '6282317816275', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('8314d0fe-9dd6-4cda-a9b8-e3b34cf67b96', '', '6281284076911', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('8b2ac24e-5195-4f68-a9fd-69bd5ba35a3a', '', '6287700013712', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('93f789f8-8a7c-418e-98dd-4bd0e84f7683', '', '62811883227', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9578a128-b855-42b3-bb83-74aaae9f4ec5', '', '6281294047402', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('97152dda-5fb6-4d4f-950c-f94587072c6a', '', '6283878331033', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('98bfdf9c-f522-4466-880f-8e093afdbbbf', '', '6282317086156', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9a3522aa-7457-471f-869a-2026950b686b', '', '6283148570805', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9bc99d0a-5867-4d5b-a27b-cc5e0b07e7b5', '', '6287724980358', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9bf078e8-6094-410d-8972-f94e58d7cf82', '', '6283823910414', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9ca88ee0-a33f-4677-9b2a-1c05023eabca', '', '6287764333480', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9ce26d79-79ce-47bf-83df-fad620d8b3c9', '', '6282321225985', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9dbfd9ac-f3fa-448d-a825-f8cf8910eb2a', '', '62895355257521', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('9f2070ea-39d8-49e7-9639-b098bae2520e', '', '6289612928868', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('a131ae19-7bc7-4887-8ed7-cd357c1c6eb5', '', '6281297832435', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('a22fc8bd-d04e-40c4-854d-b5901327b808', '', '6287726596368', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('a3bbdb3f-4ce3-498e-9efe-08ead0e9dbb5', '', '6283102906193', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('a6aee53f-f41a-4540-8123-97cdd7e96570', '', '6281222459005', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('a9c2e214-3474-40f0-845d-2eade2eff00a', '', '6283825121522', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('ac9277bb-6dfb-4aa1-9d1e-561d53c07e1c', '', '6289630392661', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('b08636ab-017b-4945-b601-940a6b8daee1', '', '6283148687460', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('b8bf4fcc-3c47-46e0-b20b-e7cbc9041cb3', '', '6288972054597', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('ba611e5a-8934-4ccf-a373-292f94ef99be', '', '6282219147982', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('ba87b955-1b3f-419f-8fe3-0f78e75824cd', '', '6287828865311', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('bad7976c-db03-46d8-accb-aeb8ede79bf8', '', '6281313643247', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('be126a1a-ed1d-486a-a913-3dddf7e3fd75', '', '6281382939814', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('bf25ed03-43ba-4dce-8898-2ebd0d2ba877', '', '6281318696916', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('c20b8ad1-f8f7-451b-a38a-66702c9b3bab', '', '6287876031890', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('c21e56e1-8580-49ad-9a28-87e04cf02154', '', '6285315489793', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('c34e1d69-189a-4395-90d4-c9eaad630eb8', '', '6285314013209', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('cb8a2ec2-17a7-41f9-a0a1-0b7e06d8c2eb', '', '6283195505787', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('ccee6832-a69e-443a-bea1-f91d7a8b03a4', '', '6285315357250', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('ce6d2c95-32a3-454d-8d73-3348a4d1a937', '', '6283148256064', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('d76d12bc-9017-4fe1-bebb-7cf48819198d', '', '6285156131237', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('da475734-3560-4a37-9e36-315ae74cb641', '', '6285936607508', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('dbc8e4cb-c705-4395-b7b0-03333bccd5c4', '', '6285722231099', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('e37c213b-4459-4c9e-a636-cf7b9aeca642', '', '6281284687128', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('eb04bb58-ba79-4e43-922c-b67e37ce5943', '', '62811883226', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('f2fc164e-4f25-4206-838d-0cab78dcfe61', '', '6287728480424', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('f48f4b59-8efe-4777-8fcd-b375d90bed76', '', '6283841978291', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('f57e756b-865d-4ed8-84a7-601c0e119a17', '', '6283890284238', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('fbafaa1e-8ddc-42e3-801c-af2f5330f657', '', '6281214942265', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('fbea50f1-22da-4a11-9ae5-616f3ccc7011', '', '62895400432299', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('fbeab7d8-7f49-4151-9b48-e6b2a32708d8', '', '6285295158871', '', '', 'Lainnya', '', '2021-08-06 21:19:17'),
('fe9350e9-cf3e-4623-bedc-3706a298d686', '', '6287838734188', '', '', 'Lainnya', '', '2021-08-06 21:19:17');

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
