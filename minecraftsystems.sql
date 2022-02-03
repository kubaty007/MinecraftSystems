-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2021, 00:19
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `minecraftsystems`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `materialy`
--

CREATE TABLE `materialy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `stan_magazynowy` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `materialy`
--

INSERT INTO `materialy` (`id`, `nazwa`, `stan_magazynowy`, `cena`) VALUES
(0, 'Kamień', 41, 5),
(1, 'Żelazo', 158, 10),
(2, 'Diament', 712, 20),
(3, 'Patyk', 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `stan_magazynowy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `stan_magazynowy`) VALUES
(0, 'Kamienny miecz', 16.8, 7),
(1, 'Żelazny miecz', 28.8, 0),
(2, 'Diamentowy miecz', 48.8, 0),
(3, 'Kamienny kilof', 22.8, 0),
(4, 'Żelazny kilof', 40.8, 0),
(5, 'Diamentowy kilof', 76.8, 0),
(6, 'Kamienna siekiera', 22.8, 0),
(7, 'Żelazna siekiera', 40.8, 0),
(8, 'Diamentowa siekiera', 76.8, 0),
(9, 'Kamienna łopata', 10.8, 0),
(10, 'Żelazna łopata', 16.8, 0),
(11, 'Diamentowa łopata', 28.8, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `receptura_materialy`
--

CREATE TABLE `receptura_materialy` (
  `id_materialy` int(11) NOT NULL,
  `id_receptury` int(11) NOT NULL,
  `wymagana_ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Zrzut danych tabeli `receptura_materialy`
--

INSERT INTO `receptura_materialy` (`id_materialy`, `id_receptury`, `wymagana_ilosc`) VALUES
(0, 0, 2),
(3, 0, 1),
(1, 1, 2),
(3, 1, 1),
(2, 2, 2),
(3, 2, 1),
(0, 3, 3),
(3, 3, 2),
(1, 4, 3),
(3, 4, 2),
(2, 5, 3),
(3, 5, 2),
(0, 6, 3),
(3, 6, 2),
(1, 7, 3),
(3, 7, 2),
(2, 8, 3),
(3, 8, 2),
(0, 9, 1),
(3, 9, 2),
(1, 10, 1),
(3, 10, 2),
(2, 11, 1),
(3, 11, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `receptury`
--

CREATE TABLE `receptury` (
  `id` int(11) NOT NULL,
  `id_produkty` int(11) NOT NULL,
  `otrzymana_ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Zrzut danych tabeli `receptury`
--

INSERT INTO `receptury` (`id`, `id_produkty`, `otrzymana_ilosc`) VALUES
(0, 0, 1),
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcja_kupno_materialy`
--

CREATE TABLE `transakcja_kupno_materialy` (
  `id_transakcje_kupno` int(11) NOT NULL,
  `id_materialy` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transakcja_kupno_materialy`
--

INSERT INTO `transakcja_kupno_materialy` (`id_transakcje_kupno`, `id_materialy`, `ilosc`) VALUES
(51, 0, 20),
(51, 3, 10),
(52, 1, 3),
(52, 3, 2),
(53, 0, 1),
(53, 1, 1),
(53, 2, 1),
(53, 3, 1),
(54, 0, 3),
(55, 0, 64),
(55, 1, 64),
(55, 3, 19),
(56, 1, 64),
(57, 2, 1),
(58, 2, 1),
(59, 2, 1),
(60, 2, 1),
(61, 2, 1),
(62, 2, 1),
(63, 2, 1),
(64, 2, 1),
(65, 2, 1),
(66, 2, 1),
(67, 2, 1),
(68, 2, 1),
(69, 0, 9),
(69, 1, 7),
(69, 2, 11),
(69, 3, 9),
(70, 0, 3),
(70, 1, 1),
(70, 2, 6),
(70, 3, 9),
(71, 0, 52),
(71, 1, 19),
(71, 2, 63),
(71, 3, 21),
(72, 2, 64),
(73, 2, 64),
(74, 2, 64),
(75, 2, 64),
(76, 2, 64),
(77, 2, 64),
(78, 2, 64),
(79, 2, 64),
(80, 2, 64),
(81, 2, 64),
(82, 0, 1),
(82, 1, 1),
(82, 3, 1),
(83, 3, 10),
(84, 2, 3),
(84, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcja_sprzedaz_produkty`
--

CREATE TABLE `transakcja_sprzedaz_produkty` (
  `id_produkty` int(11) NOT NULL,
  `id_transakcje_sprzedaz` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transakcja_sprzedaz_produkty`
--

INSERT INTO `transakcja_sprzedaz_produkty` (`id_produkty`, `id_transakcje_sprzedaz`, `ilosc`) VALUES
(5, 1, 1),
(0, 2, 1),
(1, 3, 1),
(3, 3, 2),
(0, 4, 5),
(8, 4, 3),
(9, 4, 1),
(0, 5, 3),
(3, 5, 1),
(6, 5, 1),
(8, 5, 4),
(9, 5, 2),
(0, 6, 12),
(3, 6, 1),
(0, 7, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje_kupno`
--

CREATE TABLE `transakcje_kupno` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Zrzut danych tabeli `transakcje_kupno`
--

INSERT INTO `transakcje_kupno` (`id`, `data`) VALUES
(51, '2021-10-12 14:27:09'),
(52, '2021-10-12 14:27:22'),
(53, '2021-10-12 14:27:36'),
(54, '2021-10-12 14:27:41'),
(55, '2021-10-12 14:31:14'),
(56, '2021-10-12 14:31:39'),
(57, '2021-10-12 14:31:40'),
(58, '2021-10-12 14:31:41'),
(59, '2021-10-12 14:31:42'),
(60, '2021-10-12 14:31:44'),
(61, '2021-10-12 14:31:44'),
(62, '2021-10-12 14:31:45'),
(63, '2021-10-12 14:31:47'),
(64, '2021-10-12 14:31:48'),
(65, '2021-10-12 14:31:50'),
(66, '2021-10-12 14:31:51'),
(67, '2021-10-12 14:31:52'),
(68, '2021-10-12 14:31:53'),
(69, '2021-10-12 14:32:01'),
(70, '2021-10-12 19:24:35'),
(71, '2021-10-13 11:12:17'),
(72, '2021-10-13 11:13:00'),
(73, '2021-10-13 11:13:01'),
(74, '2021-10-13 11:13:01'),
(75, '2021-10-13 11:13:02'),
(76, '2021-10-13 11:13:03'),
(77, '2021-10-13 11:13:04'),
(78, '2021-10-13 11:13:04'),
(79, '2021-10-13 11:13:05'),
(80, '2021-10-13 11:13:06'),
(81, '2021-10-13 11:13:34'),
(82, '2021-10-13 23:56:06'),
(83, '2021-10-15 15:55:10'),
(84, '2021-10-18 15:01:01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje_sprzedaz`
--

CREATE TABLE `transakcje_sprzedaz` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

--
-- Zrzut danych tabeli `transakcje_sprzedaz`
--

INSERT INTO `transakcje_sprzedaz` (`id`, `data`) VALUES
(1, '2021-10-18 15:01:52'),
(2, '2021-10-18 22:50:19'),
(3, '2021-10-18 22:50:23'),
(4, '2021-10-18 22:50:27'),
(5, '2021-10-18 22:50:34'),
(6, '2021-10-18 22:50:38'),
(7, '2021-10-18 23:10:50');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `materialy`
--
ALTER TABLE `materialy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `receptura_materialy`
--
ALTER TABLE `receptura_materialy`
  ADD KEY `id_materialy` (`id_materialy`,`id_receptury`),
  ADD KEY `posrednia_ibfk_2` (`id_receptury`);

--
-- Indeksy dla tabeli `receptury`
--
ALTER TABLE `receptury`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produkty` (`id_produkty`);

--
-- Indeksy dla tabeli `transakcja_kupno_materialy`
--
ALTER TABLE `transakcja_kupno_materialy`
  ADD KEY `id_transakcje_kupno` (`id_transakcje_kupno`,`id_materialy`),
  ADD KEY `id_materialy` (`id_materialy`);

--
-- Indeksy dla tabeli `transakcja_sprzedaz_produkty`
--
ALTER TABLE `transakcja_sprzedaz_produkty`
  ADD KEY `id_produkty` (`id_produkty`,`id_transakcje_sprzedaz`),
  ADD KEY `id_transakcje_sprzedaz` (`id_transakcje_sprzedaz`);

--
-- Indeksy dla tabeli `transakcje_kupno`
--
ALTER TABLE `transakcje_kupno`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `transakcje_sprzedaz`
--
ALTER TABLE `transakcje_sprzedaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `materialy`
--
ALTER TABLE `materialy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `receptury`
--
ALTER TABLE `receptury`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `transakcje_kupno`
--
ALTER TABLE `transakcje_kupno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT dla tabeli `transakcje_sprzedaz`
--
ALTER TABLE `transakcje_sprzedaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `receptura_materialy`
--
ALTER TABLE `receptura_materialy`
  ADD CONSTRAINT `receptura_materialy_ibfk_1` FOREIGN KEY (`id_materialy`) REFERENCES `materialy` (`id`),
  ADD CONSTRAINT `receptura_materialy_ibfk_2` FOREIGN KEY (`id_receptury`) REFERENCES `receptury` (`id`);

--
-- Ograniczenia dla tabeli `receptury`
--
ALTER TABLE `receptury`
  ADD CONSTRAINT `receptury_ibfk_1` FOREIGN KEY (`id_produkty`) REFERENCES `produkty` (`id`);

--
-- Ograniczenia dla tabeli `transakcja_kupno_materialy`
--
ALTER TABLE `transakcja_kupno_materialy`
  ADD CONSTRAINT `transakcja_kupno_materialy_ibfk_1` FOREIGN KEY (`id_materialy`) REFERENCES `materialy` (`id`),
  ADD CONSTRAINT `transakcja_kupno_materialy_ibfk_2` FOREIGN KEY (`id_transakcje_kupno`) REFERENCES `transakcje_kupno` (`id`);

--
-- Ograniczenia dla tabeli `transakcja_sprzedaz_produkty`
--
ALTER TABLE `transakcja_sprzedaz_produkty`
  ADD CONSTRAINT `transakcja_sprzedaz_produkty_ibfk_1` FOREIGN KEY (`id_produkty`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `transakcja_sprzedaz_produkty_ibfk_2` FOREIGN KEY (`id_transakcje_sprzedaz`) REFERENCES `transakcje_sprzedaz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
