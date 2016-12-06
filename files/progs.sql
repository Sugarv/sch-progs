-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- �����������: 127.0.0.1
-- ������ �����������: 05 ��� 2016 ���� 14:23:56
-- ������ ����������: 5.6.26
-- ������ PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES greek */;

--
-- ���� ���������: `temp`
--

-- --------------------------------------------------------

--
-- ���� ������ ��� ��� ������ `progs`
--

CREATE TABLE IF NOT EXISTS `progs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `schnip` enum('��������','�����������','������ ��������','������ �����������') DEFAULT NULL,
  `dimo` enum('������� - �����������','�������','��������','���������','����������','����� ��������','�������','����������') NOT NULL,
  `sch1` int(11) NOT NULL,
  `princ1` varchar(100) NOT NULL,
  `emails1` text NOT NULL,
  `sch2` int(11) NOT NULL,
  `princ2` varchar(100) NOT NULL,
  `emails2` text NOT NULL,
  `praxi` text NOT NULL,
  `titel` text NOT NULL,
  `subti` text NOT NULL,
  `categ` enum('����� ������','�������������� ����������','������������ �������') NOT NULL,
  `theme` text NOT NULL,
  `goal` text NOT NULL,
  `meth` text NOT NULL,
  `pedia` text NOT NULL,
  `dura` enum('2 �����','3 �����','4 �����','5 �����') NOT NULL,
  `m1` text NOT NULL,
  `m2` text NOT NULL,
  `m3` text NOT NULL,
  `m4` text NOT NULL,
  `m5` text NOT NULL,
  `visit` text NOT NULL,
  `for1` text NOT NULL,
  `for2` text NOT NULL,
  `synant` text NOT NULL,
  `arxeio` enum('���','���') NOT NULL,
  `act` text NOT NULL,
  `prsnt` enum('���','����','���') NOT NULL,
  `nam1` text NOT NULL,
  `email1` text NOT NULL,
  `mob1` text NOT NULL,
  `eid1` text NOT NULL,
  `his1` enum('���','���') NOT NULL,
  `qua1` enum('���','���') NOT NULL,
  `nam2` text NOT NULL,
  `email2` text NOT NULL,
  `mob2` text NOT NULL,
  `eid2` text NOT NULL,
  `his2` enum('���','���') NOT NULL,
  `qua2` enum('���','���') NOT NULL,
  `nam3` text NOT NULL,
  `email3` text NOT NULL,
  `mob3` text NOT NULL,
  `eid3` text NOT NULL,
  `his3` enum('���','���') NOT NULL,
  `qua3` enum('���','���') NOT NULL,
  `Nr` int(11) NOT NULL,
  `cha` enum('����� �����','������ �����') NOT NULL,
  `grade` text NOT NULL,
  `notes` text NOT NULL,
  `chk` enum('���','���') NOT NULL,
  `vev` enum('���','���') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=greek;

--
-- ��������� ��� ��������� �������
--

--
-- ��������� ��� ������ `progs`
--
ALTER TABLE `progs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT ��� ��������� �������
--

--
-- AUTO_INCREMENT ��� ������ `progs`
--
ALTER TABLE `progs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
