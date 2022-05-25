-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2022 alle 12:44
-- Versione del server: 5.7.17
-- Versione PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbevento`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tbchat`
--

CREATE TABLE `tbchat` (
  `id` int(11) NOT NULL,
  `fkutente` int(11) NOT NULL,
  `fkevento` int(11) NOT NULL,
  `scritto` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tbchat`
--

INSERT INTO `tbchat` (`id`, `fkutente`, `fkevento`, `scritto`) VALUES
(1, 2, 1, 'prima conversazione'),
(2, 3, 1, 'risposta'),
(3, 3, 1, 'prova testo lungo eovneronavwwnvlwqeavjeivenvnskflvve'),
(4, 4, 3, 'prova carattere strano \"'),
(5, 4, 1, 'funziona !!!'),
(6, 2, 1, 'ciao'),
(7, 3, 3, 'prova'),
(8, 4, 3, 'abcde \''),
(9, 3, 3, 'altra prova con \''),
(10, 2, 3, 'dcsvd \' \"');

-- --------------------------------------------------------

--
-- Struttura della tabella `tbeventi`
--

CREATE TABLE `tbeventi` (
  `idevento` int(11) NOT NULL,
  `titolo` varchar(40) NOT NULL,
  `descrizione` varchar(40) NOT NULL,
  `data` date NOT NULL,
  `fklike` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tbeventi`
--

INSERT INTO `tbeventi` (`idevento`, `titolo`, `descrizione`, `data`, `fklike`, `img`) VALUES
(1, 'prima', 'prova', '2022-09-15', 1, 'fotodata15-05-22ora10-57-40.png'),
(2, 'seconda ', 'prova', '2022-05-13', 2, 'fotodata15-05-22ora10-58-43.png'),
(3, 'terza', 'prova', '2022-08-24', 3, 'fotodata15-05-22ora11-03-32.png'),
(4, 'prova4', 'prova4', '2022-05-27', 4, 'fotodata25-05-22ora12-42-42.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `tblike`
--

CREATE TABLE `tblike` (
  `id` int(11) NOT NULL,
  `numvoti` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tblike`
--

INSERT INTO `tblike` (`id`, `numvoti`) VALUES
(1, 1),
(2, 0),
(3, 2),
(4, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tbpreferit`
--

CREATE TABLE `tbpreferit` (
  `id` int(11) NOT NULL,
  `fklike` int(11) NOT NULL,
  `fkuser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tbpreferit`
--

INSERT INTO `tbpreferit` (`id`, `fklike`, `fkuser`) VALUES
(2, 1, 3),
(3, 3, 4),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(52) NOT NULL,
  `livello` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `Nome`, `Cognome`, `email`, `password`, `livello`) VALUES
(1, 'amministratore', 'amministratore', 'amministratore', 'e792cd9665119b1244e8afcf36fb5f48', 1),
(2, 'Nicola', 'ali', 'nico.ali00@gmail.com', '189bbbb00c5f1fb7fba9ad9285f193d1', 0),
(3, 'mario', 'rossi', 'mariorossi@gmail.com', '189bbbb00c5f1fb7fba9ad9285f193d1', 0),
(4, 'laura', 'verdi', 'lauraverdi@gmail.com', '189bbbb00c5f1fb7fba9ad9285f193d1', 0),
(5, 'gino', 'giallo', 'gino.giallo@gmail.com', '189bbbb00c5f1fb7fba9ad9285f193d1', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbchat`
--
ALTER TABLE `tbchat`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbeventi`
--
ALTER TABLE `tbeventi`
  ADD PRIMARY KEY (`idevento`);

--
-- Indici per le tabelle `tblike`
--
ALTER TABLE `tblike`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tbpreferit`
--
ALTER TABLE `tbpreferit`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbchat`
--
ALTER TABLE `tbchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `tbeventi`
--
ALTER TABLE `tbeventi`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `tblike`
--
ALTER TABLE `tblike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `tbpreferit`
--
ALTER TABLE `tbpreferit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
