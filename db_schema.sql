-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Lip 2022, 16:28
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
(0, 'Kamień', 1, 5),
(1, 'Żelazo', 1, 10),
(2, 'Diament', 1, 20),
(3, 'Patyk', 1, 2);

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
(0, 'Kamienny miecz', 16.8, 1),
(1, 'Żelazny miecz', 28.8, 1),
(2, 'Diamentowy miecz', 48.8, 1),
(3, 'Kamienny kilof', 22.8, 1),
(4, 'Żelazny kilof', 40.8, 1),
(5, 'Diamentowy kilof', 76.8, 1),
(6, 'Kamienna siekiera', 22.8, 1),
(7, 'Żelazna siekiera', 40.8, 1),
(8, 'Diamentowa siekiera', 76.8, 1),
(9, 'Kamienna łopata', 10.8, 1),
(10, 'Żelazna łopata', 16.8, 1),
(11, 'Diamentowa łopata', 28.8, 1);

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
(1, 0, 10),
(1, 1, 10),
(1, 2, 10),
(1, 3, 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcja_sprzedaz_produkty`
--

CREATE TABLE `transakcja_sprzedaz_produkty` (
  `id_produkty` int(11) NOT NULL,
  `id_transakcje_sprzedaz` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
(1, '2022-07-08 16:22:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje_sprzedaz`
--

CREATE TABLE `transakcje_sprzedaz` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_polish_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `transakcje_sprzedaz`
--
ALTER TABLE `transakcje_sprzedaz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
