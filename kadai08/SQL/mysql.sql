-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 7 月 03 日 01:01
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `b_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `b_table`
--

CREATE TABLE `b_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `industry` varchar(20) NOT NULL,
  `pref` varchar(6) NOT NULL,
  `telNumber` varchar(20) NOT NULL,
  `naiyou` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `b_table`
--

INSERT INTO `b_table` (`id`, `name`, `industry`, `pref`, `telNumber`, `naiyou`, `indate`) VALUES
(1, '中の', '飲食', '東京都', '080-6557-5680', '中野区のお店です。\r\n営業時間\r\n11:00~23:00\r\n※緊急事態宣言中\r\n10:00~20:00', '2021-07-01 03:54:52'),
(3, 'ゆたか', '飲食', '東京都', '080-6557-5680', '名古屋市のお店です。', '2021-07-02 04:47:02'),
(5, '庄司', '建築・設備・工事業', '東京都', '03-1111-1111', '渋谷区の会社です。', '2021-07-03 09:21:04'),
(6, '佐藤', '化学・製薬', '千葉県', '04-1111-1111', '千葉県の会社です。\r\n住所\r\n〇〇', '2021-07-03 09:30:32');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `b_table`
--
ALTER TABLE `b_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `b_table`
--
ALTER TABLE `b_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
