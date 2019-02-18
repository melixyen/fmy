-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2019 年 02 月 18 日 05:42
-- 伺服器版本: 10.3.12-MariaDB
-- PHP 版本： 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- 資料表結構 `tbpeople`
--

CREATE TABLE `tbpeople` (
  `ID` int(32) NOT NULL,
  `Username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Userid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Userpwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `tbsell`
--

CREATE TABLE `tbsell` (
  `Od` int(32) NOT NULL,
  `Userid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Shopid` int(32) NOT NULL,
  `Prdname` text COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Prdsmany` int(32) NOT NULL,
  `Username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Do` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `tbshop`
--

CREATE TABLE `tbshop` (
  `Shopid` int(32) NOT NULL,
  `Prdname` text COLLATE utf8_unicode_ci NOT NULL,
  `Prdprice` int(32) NOT NULL,
  `Prdmany` int(11) NOT NULL,
  `Prdtype` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prdtext` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prdpic` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `tbpeople`
--
ALTER TABLE `tbpeople`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Userid` (`Userid`);

--
-- 資料表索引 `tbsell`
--
ALTER TABLE `tbsell`
  ADD PRIMARY KEY (`Od`);

--
-- 資料表索引 `tbshop`
--
ALTER TABLE `tbshop`
  ADD PRIMARY KEY (`Shopid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `tbpeople`
--
ALTER TABLE `tbpeople`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `tbsell`
--
ALTER TABLE `tbsell`
  MODIFY `Od` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `tbshop`
--
ALTER TABLE `tbshop`
  MODIFY `Shopid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
