-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2023 lúc 04:36 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopsach1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idsach` int(100) NOT NULL,
  `iddonhang` int(100) NOT NULL,
  `giatien` int(225) NOT NULL,
  `diachigiaohang` varchar(100) NOT NULL,
  `sdt` int(100) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idsach`, `iddonhang`, `giatien`, `diachigiaohang`, `sdt`, `trangthai`, `thoigian`, `soluong`) VALUES
(2, 18, 4000, 'NĐ', 12343844, 'Chưa thanh toán', '2023-06-14 06:36:47', 2),
(2, 19, 20000, 'NĐ', 12345456, 'Chưa thanh toán', '2023-06-14 06:36:53', 1),
(2, 20, 20000, 'NĐ', 12345456, 'Chưa thanh toán', '2023-06-14 06:37:01', 1),
(7, 22, 40000, 'NĐ', 12343844, 'Chưa thanh toán', '2023-06-14 06:37:09', 3),
(14, 25, 30000, 'số 10,pk,ntl,HN', 383156100, 'Đã thanh toán', '2013-06-23 22:26:06', 2),
(14, 26, 70000, 'số 11,pk,ntl,HN', 1233254567, 'Đã thanh toán', '2023-06-13 22:33:26', 7),
(3, 27, 2000, 'số 1,pk,ntl,HN', 383156100, 'Đã thanh toán', '2023-06-14 03:36:50', 2),
(2, 28, 3, 'số 10,pk,ntl,HN', 123454567, 'Chưa thanh toán', '2023-06-14 06:23:10', 1),
(3, 38, 2, 'số 1,pk,ntl,HN', 123454567, 'Chưa thanh toán', '2023-06-14 05:15:26', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `idsach` int(10) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `gia` bigint(255) NOT NULL,
  `idtheloai` varchar(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`idsach`, `tensach`, `gia`, `idtheloai`, `soluong`) VALUES
(2, 'Hoa lâu nâu', 20000, '3', 16),
(3, 'cheems', 20000, '3', 37),
(7, 'chiến binh sm', 30000, '2', 17),
(11, '9', 0, '20000', 3),
(12, 'Hoa lâu nâu nâu', 30000, '3', 20),
(14, 'chiến binh a', 15000, '3', 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `idtheloai` int(11) NOT NULL,
  `tentheloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`idtheloai`, `tentheloai`) VALUES
(2, 'Tiểu thuyết 2'),
(3, 'dead2'),
(5, 'aâ'),
(8, 'dead3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `taikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `gioitinh` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`taikhoan`, `matkhau`, `ten`, `tuoi`, `gioitinh`, `email`, `diachi`, `sdt`) VALUES
('ab', 'ab', 'ab', 12, 'Nam', 'hung82200@gmail.com', 'Hà Nam', '0122454567'),
('admin', 'admin', 'admin', 0, 'nam', 'admin', 'admin', '0'),
('admin1', 'sa', 'một', 2, 'Nam', 'hung84200@gmail.com', '2rdfhsgh', '03831561002'),
('admisaaa', 'aaaa', 'admin11111', 10, 'Nam', 'hung84111200@gmail.com', 'dd', '12313'),
('b', 'adfa', 'bbb', 0, '0', 'hung842200@gmail.com', 'Hà Nội', '0123454567'),
('hanh', 'hanh  ', 'hanh', 21, '2', 'vuhanh121202@gmail.com', 'Hà Nam', '0383156100'),
('hung123', 'hung         ', 'hung1', 20, '1', 'hung8420011111@gmail.com', 'NĐ', '012345456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddonhang`) USING BTREE;

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`idsach`) USING BTREE;

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`idtheloai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddonhang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `idsach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `idtheloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
