-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 06:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtakhunters`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idEvent` varchar(10) NOT NULL,
  `NamaEvent` varchar(50) DEFAULT NULL,
  `JenisEvent` varchar(15) DEFAULT NULL,
  `JumlahPanitia` int(3) DEFAULT NULL,
  `JumlahPeserta` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idEvent`, `NamaEvent`, `JenisEvent`, `JumlahPanitia`, `JumlahPeserta`) VALUES
('1', 'CCI Summit', 'Workshop', 40, 180);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `idEvent` int(11) NOT NULL,
  `NamaEvent` varchar(255) NOT NULL,
  `JenisEvent` varchar(255) NOT NULL,
  `JumlahPanitia` int(11) NOT NULL,
  `JumlahPeserta` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Dates` date NOT NULL,
  `IdPenyelenggara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `idOrganisasi` varchar(10) NOT NULL,
  `NamaOrganisasi` varchar(25) DEFAULT NULL,
  `JumlahAnggota` int(3) DEFAULT NULL,
  `JenisOrganisasi` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`idOrganisasi`, `NamaOrganisasi`, `JumlahAnggota`, `JenisOrganisasi`) VALUES
('1', 'Central Computer Improvem', 300, 'Penalaran'),
('2', 'Karate', 75, 'Olahraga'),
('3', 'Al Fath', 400, 'Rohani'),
('4', 'Search', 200, 'Penalaran'),
('5', 'Nippon Bunka Bu', 320, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `idPendaftaran` varchar(20) NOT NULL,
  `TotalPembayaran` int(10) DEFAULT NULL,
  `JumlahTiket` int(1) DEFAULT NULL,
  `NIM` varchar(10) DEFAULT NULL,
  `idPenyelenggara` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`idPendaftaran`, `TotalPembayaran`, `JumlahTiket`, `NIM`, `idPenyelenggara`) VALUES
('1', 90000, 3, '1301170001', '1'),
('2', 30000, 1, '1301170002', '1'),
('3', 60000, 2, '1301170003', '1'),
('4', 60000, 2, '1301170004', '1'),
('5', 30000, 1, '1301170005', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `NIM` varchar(10) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Fakultas` varchar(25) DEFAULT NULL,
  `Jurusan` varchar(25) DEFAULT NULL,
  `NoTelephone` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`NIM`, `Nama`, `Fakultas`, `Jurusan`, `NoTelephone`) VALUES
('1301170001', 'Kimo', 'Informatika', 'Informatika', '081222946001'),
('1301170002', 'Moci', 'Rekayasa Industri', 'Teknik Industri', '081222946002'),
('1301170003', 'Dame', 'Teknik Elektro', 'Teknik Fisika', '081222946003'),
('1301170004', 'Mede', 'Komunikasi Bisnis', 'Ilmu Komunikasi', '081222946004'),
('1301170005', 'Desu', 'Ekonomi Bisnis', 'MBTI', '081222946005');

-- --------------------------------------------------------

--
-- Table structure for table `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `idPenyelenggara` varchar(10) NOT NULL,
  `idEvent` varchar(10) DEFAULT NULL,
  `idOrganisasi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyelenggara`
--

INSERT INTO `penyelenggara` (`idPenyelenggara`, `idEvent`, `idOrganisasi`) VALUES
('1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `idSertifikat` varchar(10) NOT NULL,
  `NamaPartisipan` varchar(50) DEFAULT NULL,
  `jenisPartisipan` varchar(15) DEFAULT NULL,
  `idPenyelenggara` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`idSertifikat`, `NamaPartisipan`, `jenisPartisipan`, `idPenyelenggara`) VALUES
('1', 'Kimo', 'Ketua', '1'),
('2', 'Moci', 'Panitia', '1'),
('3', 'Dame', 'Peserta', '1'),
('4', 'Mede', 'Peserta', '1'),
('5', 'Desu', 'Peserta', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `NIM` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `NIM`, `Password`, `FullName`, `Email`, `CreatedAt`) VALUES
(1, '1301174695', '$2y$10$mIETEX8vtRdVfI0VU.iFseZMyrXoUeNG/SZviWhsb0FwentPBZVyq', 'Raihan Fijar', 'fijarraihan@gmail.com', '2019-12-11 21:50:16'),
(3, '1301170761', '$2y$10$mr3lALEBbXitTzIzvPQEtu6AibDv.EYiS99nUWH/.R7e8YgAXCe.i', 'Rochi Eko', 'rochieko@gmail.com', '2019-12-11 21:52:38'),
(7, '123', '$2y$10$hHsRypBYDSVKbP/GmhIhQe67BV53Dro8kbImla7VTkldZ5fc0uA/y', 'test', 'testy@test', '2019-12-11 22:19:53'),
(8, '12345', '$2y$10$wz.80CCqwR4THYvAYsOV1etYZTuIHmS3WwbJF0/2SuX8OblRcmKhS', 'Testys', 'testy123@test', '2019-12-11 23:41:40'),
(9, '1301170700', '$2y$10$1hMFI2EHDW7bNQICIK6R.OFefYdzFr7Q3UuTrZCv36ObfBaNyp5Ba', 'zaza', 'zaza@gmail.com', '2019-12-12 23:33:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`idOrganisasi`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`idPendaftaran`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `idPenyelenggara` (`idPenyelenggara`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`idPenyelenggara`),
  ADD KEY `fk_event` (`idEvent`),
  ADD KEY `fk_organisasi` (`idOrganisasi`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`idSertifikat`),
  ADD KEY `idPenyelenggara` (`idPenyelenggara`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `pengguna` (`NIM`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`idPenyelenggara`) REFERENCES `penyelenggara` (`idPenyelenggara`);

--
-- Constraints for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`idEvent`) REFERENCES `event` (`idEvent`),
  ADD CONSTRAINT `fk_organisasi` FOREIGN KEY (`idOrganisasi`) REFERENCES `organisasi` (`idOrganisasi`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`idPenyelenggara`) REFERENCES `penyelenggara` (`idPenyelenggara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
