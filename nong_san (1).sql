-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2020 lúc 02:39 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nong_san`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `binhluan_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_trang_thai` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `binhluan_ten`, `binhluan_email`, `binhluan_noi_dung`, `binhluan_trang_thai`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, 'Trịnh Thị Ngọc Hân', 'hanb1204011@gmail.com', 'a', 1, 1, '2016-06-01 09:11:21', '2016-06-01 09:11:21'),
(2, 'AA', 'hanb1204011@gmail.com', 'Ngon', 1, 8, '2016-07-01 00:43:51', '2016-07-01 00:43:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) NOT NULL,
  `sanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `chitietdonhang_so_luong` int(11) NOT NULL,
  `chitietdonhang_thanh_tien` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `sanpham_id`, `shop_id`, `sanpham_anh`, `donhang_id`, `chitietdonhang_so_luong`, `chitietdonhang_thanh_tien`, `created_at`, `updated_at`) VALUES
(254, 2, 11, 'nam-mo.jpg', 216, 2, 21250, '2020-03-06 15:18:04', '2020-03-06 15:18:04'),
(256, 2, 11, 'nam-mo.jpg', 218, 1, 21250, '2020-03-07 02:43:33', '2020-03-07 02:43:33'),
(263, 5, 10, 'download (22).jpg', 226, 1, 24000, '2020-03-08 16:07:45', '2020-03-08 16:07:45'),
(265, 4, 11, 'product-2.jpg', 228, 1, 42500, '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(266, 11, 11, 'product-3.JPG', 229, 1, 18000, '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(267, 5, 10, 'download (22).jpg', 230, 1, 24000, '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(269, 7, 10, 'download (23).jpg', 232, 1, 22500, '2020-03-09 01:44:16', '2020-03-09 01:44:16'),
(270, 8, 10, 'category-2.jpg', 233, 1, 27000, '2020-03-09 02:04:44', '2020-03-09 02:04:44'),
(271, 5, 10, 'download (22).jpg', 234, 1, 24000, '2020-03-09 02:04:44', '2020-03-09 02:04:44'),
(272, 8, 10, 'category-2.jpg', 236, 1, 27000, '2020-03-09 02:12:43', '2020-03-09 02:12:43'),
(274, 5, 10, 'download (22).jpg', 239, 1, 24000, '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(275, 8, 10, 'category-2.jpg', 240, 1, 27000, '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(276, 4, 11, 'product-2.jpg', 241, 1, 42500, '2020-03-13 06:41:40', '2020-03-13 06:41:40'),
(277, 2, 11, 'nam-mo.jpg', 242, 1, 21250, '2020-03-13 06:41:40', '2020-03-13 06:41:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietluukho`
--

CREATE TABLE `chitietluukho` (
  `id` int(10) NOT NULL,
  `chitietmatruyxuat_id` int(10) NOT NULL,
  `kho_id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `chitietluukho_slbandau` int(11) NOT NULL,
  `chitietluukho_slnhap` int(11) NOT NULL,
  `chitietluukho_slxuat` int(11) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `chitietluukho_tgnhap` datetime NOT NULL,
  `chitietluukho_tgxuat` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmatruyxuat`
--

CREATE TABLE `chitietmatruyxuat` (
  `id` int(10) NOT NULL,
  `losanxuat_id` int(10) NOT NULL,
  `chitietmatruyxuat_khoiluong` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `mabimat` int(10) NOT NULL,
  `dovi_id` int(10) NOT NULL,
  `donvitinh_id` int(2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnguyenlieusudung`
--

CREATE TABLE `chitietnguyenlieusudung` (
  `id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `nguenlieusanxuat_id` int(10) NOT NULL,
  `losanxuat_id` int(10) NOT NULL,
  `chitietnguyenlieusudung_soluong` int(10) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnhapkho`
--

CREATE TABLE `chitietnhapkho` (
  `id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `chitietmatruyxuat_id` int(10) NOT NULL,
  `chitietnhapkho_khoiluong` int(10) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietnhapnguyenlieu`
--

CREATE TABLE `chitietnhapnguyenlieu` (
  `id` int(10) NOT NULL,
  `nguyenlieusanxuat_id` int(10) NOT NULL,
  `donvi_id` int(10) NOT NULL,
  `chitietnhapnguyenlieu_soluong` int(10) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `chitietnhapnguyenlieu_dongia` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquytrinhluukho`
--

CREATE TABLE `chitietquytrinhluukho` (
  `id` int(10) NOT NULL,
  `loaisanpham_id` int(10) NOT NULL,
  `chitietquytrinhluukho_noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `chitietquytrinhluukho_tdbtdau` datetime NOT NULL,
  `chitietquytrinhluukho_tgketthuc` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquytrinhsanxuat`
--

CREATE TABLE `chitietquytrinhsanxuat` (
  `id` int(10) NOT NULL,
  `chitietquytrinhsanxuat_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `losanxuat_id` int(10) NOT NULL,
  `chitietquytrinhsanxuat_noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `chitietquytrinhsanxuat_ngaybatdau` datetime NOT NULL,
  `chitietquytrinhsanxuat_ngayketthuc` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietthuhoach`
--

CREATE TABLE `chitietthuhoach` (
  `id` int(10) NOT NULL,
  `losanxuat_id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `chitietthuhoach_soluong` int(10) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `chitietthuhoach_dongia` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietxuatkho`
--

CREATE TABLE `chitietxuatkho` (
  `id` int(10) NOT NULL,
  `chitietmatruyxuat_id` int(10) NOT NULL,
  `chitietxuatkho_khoiluong` int(10) NOT NULL,
  `donvitinh_id` int(2) NOT NULL,
  `kho_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `dathangsp`
-- (See below for the actual view)
--
CREATE TABLE `dathangsp` (
`id` int(10) unsigned
,`shop_id` int(10)
,`donhang_nguoi_nhan` varchar(100)
,`donhang_nguoi_nhan_email` varchar(255)
,`donhang_nguoi_nhan_sdt` varchar(12)
,`donhang_nguoi_nhan_dia_chi` varchar(200)
,`chitietdonhang_thanh_tien` int(10)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiemsanxuat`
--

CREATE TABLE `diadiemsanxuat` (
  `id` int(10) NOT NULL,
  `diadiemsanxuat_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diadiemsanxuat_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diadiemsanxuat_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `diadiemsanxuat_v0` decimal(11,6) NOT NULL,
  `diadiemsanxuat_v1` decimal(11,6) NOT NULL,
  `donvi_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_ad` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) DEFAULT NULL,
  `donhang_nguoi_nhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_ghi_chu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `donhang_tong_tien` int(10) NOT NULL,
  `khachhang_id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_id` int(10) UNSIGNED NOT NULL,
  `hinhthucthanhtoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `shop_id`, `donhang_nguoi_nhan`, `donhang_nguoi_nhan_email`, `donhang_nguoi_nhan_sdt`, `donhang_nguoi_nhan_dia_chi`, `donhang_ghi_chu`, `donhang_tong_tien`, `khachhang_id`, `tinhtranghd_id`, `hinhthucthanhtoan`, `created_at`, `updated_at`) VALUES
(216, 11, 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', 'a1', 'a1', NULL, 57924, 175, 1, 'COD', '2020-03-05 17:00:00', '2020-03-06 15:18:04'),
(217, 10, 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', 'a1', 'a1', NULL, 57924, 175, 1, 'COD', '2020-01-31 17:00:00', '2020-03-06 15:18:04'),
(218, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'test012', 'test012', NULL, 84083, 176, 1, 'COD', '2020-04-06 17:00:00', '2020-03-07 02:43:33'),
(219, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'test012', 'test012', NULL, 84083, 176, 1, 'COD', '2020-03-06 17:00:00', '2020-03-07 02:43:33'),
(220, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'test012', 'test012', NULL, 84083, 176, 1, 'COD', '2020-03-06 17:00:00', '2020-03-07 02:43:33'),
(221, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', NULL, 65650, 178, 1, 'COD', '2020-03-08 14:13:17', '2020-03-08 14:13:17'),
(222, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', NULL, 65650, 178, 1, 'COD', '2020-03-08 14:13:17', '2020-03-08 14:13:17'),
(223, NULL, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tss1', 'tss1', NULL, 53379, 180, 1, 'COD', '2020-03-08 16:02:33', '2020-03-08 16:02:33'),
(224, NULL, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tss1', 'tss1', NULL, 53379, 180, 1, 'COD', '2020-03-08 16:02:33', '2020-03-08 16:02:33'),
(225, NULL, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tss1', 'tss1', NULL, 53379, 180, 1, 'COD', '2020-03-08 16:02:33', '2020-03-08 16:02:33'),
(226, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', NULL, 39239, 181, 2, 'COD', '2020-03-08 16:07:45', '2020-03-09 02:20:21'),
(227, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', NULL, 39239, 181, 2, 'COD', '2020-03-08 16:07:45', '2020-03-09 02:21:23'),
(228, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsts1', 'tsts1', '<p>tsts1</p>', 85345, 182, 1, 'COD', '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(229, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsts1', 'tsts1', '<p>tsts1</p>', 85345, 182, 1, 'COD', '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(230, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsts1', 'tsts1', '<p>tsts1</p>', 85345, 182, 2, 'COD', '2020-03-08 16:10:08', '2020-03-09 02:22:06'),
(231, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '0231000856', '225 le duan', '<p>test0.1</p>', 40905, 183, 1, 'COD', '2020-03-09 01:44:16', '2020-03-09 01:44:16'),
(232, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '0231000856', '225 le duan', '<p>test0.1</p>', 40905, 183, 2, 'COD', '2020-03-08 17:00:00', '2020-03-09 02:25:53'),
(233, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsss1', 'tsss1', '<p>tsss1</p>', 51510, 184, 2, 'COD', '2020-03-09 02:04:44', '2020-03-09 02:31:34'),
(234, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsss1', 'tsss1', '<p>tsss1</p>', 51510, 184, 1, 'COD', '2020-03-09 02:04:44', '2020-03-09 02:04:44'),
(235, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi', 'titi', '<p>yyiyi</p>', 42269, 185, 1, 'COD', '2020-03-09 02:12:43', '2020-03-09 02:12:43'),
(236, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi', 'titi', '<p>yyiyi</p>', 42269, 185, 1, 'COD', '2020-03-09 02:12:43', '2020-03-09 02:12:43'),
(237, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi', 'titi', '<p>yyiyi</p>', 42269, 185, 1, 'COD', '2020-03-09 02:12:43', '2020-03-09 02:12:43'),
(238, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi11111', 'titi11111', '<p>titi11111</p>', 51510, 186, 1, 'COD', '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(239, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi11111', 'titi11111', '<p>titi11111</p>', 51510, 186, 1, 'COD', '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(240, 10, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi11111', 'titi11111', '<p>titi11111</p>', 51510, 186, 1, 'COD', '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(241, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '1', '1', '<p>1</p>', 64388, 187, 1, 'COD', '2020-03-13 06:41:40', '2020-03-13 06:41:40'),
(242, 11, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '1', '1', '<p>1</p>', 64388, 187, 1, 'COD', '2020-03-13 06:41:40', '2020-03-13 06:41:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `id` int(10) NOT NULL,
  `donvi_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `donvi_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_masothue` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_nguoidaidien` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_id` int(10) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donvitinh_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1 COMMENT 'kích hoat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`id`, `donvitinh_ten`, `donvitinh_mo_ta`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Khay', '', 1, NULL, NULL),
(2, 'Kg', NULL, 1, NULL, NULL),
(3, 'Bịch', '<p>bịch</p>\r\n', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `email`
-- (See below for the actual view)
--
CREATE TABLE `email` (
`id` int(10) unsigned
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinhsanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id`, `hinhsanpham_ten`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(6, 'nam-mo-4.jpg', 2, NULL, NULL),
(7, 'nam-mo-2.jpg', 2, NULL, NULL),
(8, 'nam-mo-1.jpg', 2, NULL, NULL),
(10, 'nam_mo-3.jpg', 2, NULL, NULL),
(11, 'nam-kim-cham-3.jpg', 3, NULL, NULL),
(12, 'nam-kim-cham-2.jpg', 3, NULL, NULL),
(13, 'nam-kim-cham-1.jpg', 3, NULL, NULL),
(14, 'nam-kim-cham.jpg', 3, NULL, NULL),
(15, 'namkimcham_4.jpg', 3, NULL, NULL),
(16, 'nam-mo.jpg', 2, NULL, NULL),
(18, 'cherry2.jpg', 4, NULL, NULL),
(19, 'cherry3.jpg', 4, NULL, NULL),
(20, 'cherry4.jpg', 4, NULL, NULL),
(21, 'cherry7.jpg', 4, NULL, NULL),
(22, 'qua_cherry1.jpg', 4, NULL, NULL),
(23, 'nho1.jpg', 5, NULL, NULL),
(24, 'nho2.jpg', 5, NULL, NULL),
(25, 'nho4.jpg', 5, NULL, NULL),
(26, 'nho5.jpg', 5, NULL, NULL),
(27, 'nho6.jpg', 5, NULL, NULL),
(33, 'nambaongu.jpg', 7, NULL, NULL),
(34, 'nam-bao-ngu-ngan-ngua-ut.jpg', 7, NULL, NULL),
(35, 'nambaongu1.jpg', 7, NULL, NULL),
(36, 'nam-bao-ngu-1s.png', 7, NULL, NULL),
(37, 'bao_ngu_trang4.jpg', 7, NULL, NULL),
(38, 'dau_tay_3.jpg', 8, NULL, NULL),
(39, 'dau_tay_da_lat(1).jpg', 8, NULL, NULL),
(40, 'dau_tay_ngon.jpg', 8, NULL, NULL),
(41, 'dau_tay_da_lat_cay.jpg', 8, NULL, NULL),
(42, 'dau_tay_1.jpg', 8, NULL, NULL),
(43, 'gau-bo-my-2.jpg', 9, NULL, NULL),
(44, 'gaubo1.jpg', 9, NULL, NULL),
(45, 'img580_gầu_bò_mỹ.jpg', 9, NULL, NULL),
(46, 'img581_ba_chi_bo_my.jpg', 9, NULL, NULL),
(47, '202148_192cac864f094d236215b7ed36d70f99.jpg', 9, NULL, NULL),
(58, 'ng.JPG', 11, NULL, NULL),
(59, 'ngon su su 2.jpg', 11, NULL, NULL),
(60, 'ngon su su.jpg', 11, NULL, NULL),
(62, 'ngon_su_su (1).jpg', 11, NULL, NULL),
(63, 'ngon_su_su.JPG', 11, NULL, NULL),
(64, 'rau ngot rung1.jpg', 12, NULL, NULL),
(65, 'rau ngot rung2.jpg', 12, NULL, NULL),
(66, 'rau ngot rung3.jpg', 12, NULL, NULL),
(67, 'rau ngot rung4.jpg', 12, NULL, NULL),
(68, 'rau ngot rung5.jpg', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `khachhang_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `khachhang_ten`, `khachhang_email`, `khachhang_sdt`, `khachhang_dia_chi`, `user_id`, `created_at`, `updated_at`) VALUES
(175, 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', 'a1', 'a1', 52, '2020-03-06 15:18:04', '2020-03-06 15:18:04'),
(176, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'test012', 'test012', 54, '2020-03-07 02:43:33', '2020-03-07 02:43:33'),
(177, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', 54, '2020-03-08 14:11:48', '2020-03-08 14:11:48'),
(178, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', 54, '2020-03-08 14:13:17', '2020-03-08 14:13:17'),
(179, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tss1', 'tss1', 54, '2020-03-08 16:02:01', '2020-03-08 16:02:01'),
(180, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tss1', 'tss1', 54, '2020-03-08 16:02:33', '2020-03-08 16:02:33'),
(181, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'ts1', 'ts1', 54, '2020-03-08 16:07:45', '2020-03-08 16:07:45'),
(182, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsts1', 'tsts1', 54, '2020-03-08 16:10:08', '2020-03-08 16:10:08'),
(183, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '0231000856', '225 le duan', 54, '2020-03-09 01:44:16', '2020-03-09 01:44:16'),
(184, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'tsss1', 'tsss1', 54, '2020-03-09 02:04:44', '2020-03-09 02:04:44'),
(185, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi', 'titi', 54, '2020-03-09 02:12:43', '2020-03-09 02:12:43'),
(186, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', 'titi11111', 'titi11111', 54, '2020-03-13 02:29:03', '2020-03-13 02:29:03'),
(187, 'trần hoài dạ vũ', 'thienthanma521@gmail.com', '1', '1', 54, '2020-03-13 06:41:40', '2020-03-13 06:41:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(10) NOT NULL,
  `kho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kho_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kho_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `loaikho_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `khuyenmai_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_phan_tram` int(11) NOT NULL,
  `khuyenmai_thoi_gian` int(11) NOT NULL,
  `khuyenmai_tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `khuyenmai_tieu_de`, `khuyenmai_noi_dung`, `khuyenmai_anh`, `khuyenmai_phan_tram`, `khuyenmai_thoi_gian`, `khuyenmai_tinh_trang`, `created_at`, `updated_at`) VALUES
(2, 'mùa hè', '<p>Khuyến m&atilde;i m&ugrave;a h&egrave;</p>\r\n', 'download (24).jpg', 50, 3, 0, '2016-05-19 03:18:08', '2016-05-19 03:18:08'),
(3, 'cuối năm', '<p>khuyến m&atilde;i cuối năm</p>\r\n', 'download (25).jpg', 70, 2, 0, '2016-05-19 03:18:49', '2016-05-19 03:18:49'),
(4, 'Tựu trường', '<p>Khuyến m&atilde;i th&aacute;ng 6</p>\r\n', 'download (26).jpg', 80, 2, 0, '2016-05-19 03:19:37', '2016-05-19 03:19:37'),
(5, 'black friday', '<p>Khuyến m&atilde;i th&aacute;ng 7</p>\r\n', 'unnamed.png', 30, 10, 0, '2016-05-19 03:20:26', '2016-05-19 03:20:26'),
(6, 'mùa mưa', '<p>Khuyến m&atilde;i m&ugrave;a mưa</p>\r\n', 'download (27).jpg', 10, 10, 0, '2016-06-02 04:22:50', '2016-06-02 04:22:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikho`
--

CREATE TABLE `loaikho` (
  `id` int(10) NOT NULL,
  `loaikho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `loainguoidung_ten` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`id`, `loainguoidung_ten`, `mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, NULL),
(2, 'Admin', '', NULL, NULL),
(8, 'Quản lý', NULL, NULL, NULL),
(9, 'Quản lý kho', NULL, NULL, NULL),
(10, 'Quản lý sản phẩm', NULL, NULL, NULL),
(11, 'Quản lý lô sản xuất', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiquytrinhbaoquankhomau`
--

CREATE TABLE `loaiquytrinhbaoquankhomau` (
  `id` int(10) NOT NULL,
  `loaiquytrinhbaoquankhomau_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_id` int(10) NOT NULL,
  `loaikho_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiquytrinhmau`
--

CREATE TABLE `loaiquytrinhmau` (
  `id` int(10) NOT NULL,
  `loaisanpham_id` int(10) NOT NULL,
  `loaiquytrinhmau_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaisanpham_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaisanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1 COMMENT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `loaisanpham_ten`, `loaisanpham_mo_ta`, `loaisanpham_anh`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Thịt bò', '<p><em><strong>Thịt b&ograve;</strong></em>&nbsp;l&agrave; &nbsp;thực phẩm&nbsp;phổ biến tr&ecirc;n thế giới, c&ugrave;ng với thịt lợn,n&oacute;&nbsp;được chế biến v&agrave; sử dụng theo nhiều c&aacute;ch,ở&nbsp;nhiều nền văn ho&aacute; v&agrave; t&ocirc;n gi&aacute;o kh&aacute;c nhau,<em>thịt b&ograve;</em>&nbsp;l&agrave; một trong những loại thịt được con người sử dụng nhiều nhất.</p>\r\n\r\n<p><em>Thịt b&ograve;</em>&nbsp;kh&ocirc;ng chỉ c&oacute; hương vị&nbsp;ngon m&agrave; c&ograve;n chứa&nbsp;nhiều dưỡng chất bổ dưỡng :sắt,magie,kẽm,vitamin B6,B12&nbsp;c&oacute; lợi cho cơ bắp,đặc biệt&nbsp;<strong>thịt b&ograve;</strong>&nbsp;rất tốt cho đ&agrave;n &ocirc;ng.</p>', 'download.jpg', 1, NULL, '2020-02-20 15:17:22'),
(2, 'Nấm tươi', '<p><strong><em>NẤM SẠCH</em></strong>&nbsp;từ l&acirc;u đ&atilde; trờ th&agrave;nh m&oacute;n ăn quen thuộc trong mỗi bữa cơm gia đ&igrave;nh.Nấm l&agrave;&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\"><strong><em>thực phẩm sạch</em></strong></a>&nbsp;c&oacute; gi&aacute; trị dinh dưỡng cao, c&oacute; độ đạm cao v&agrave; &iacute;t chất b&eacute;o, chứa nhiều vitamin nh&oacute;m B v&agrave; C.Nấm cũng chứa trong m&igrave;nh&nbsp;nhiều nguy&ecirc;n tố vi lượng, như sắt, selen, natri, kali, magi&ecirc; v&agrave; phốt pho.</p>\r\n\r\n<p>Hơn thế trong y học,người ta d&ugrave;ng nhiều loại&nbsp;<strong><em>nấm sạch</em></strong>&nbsp;như:nấm m&uacute;a, nấm hương (đ&ocirc;ng c&ocirc;), nấm chaga, nấm linh chi...&nbsp;nhằm&nbsp;tăng cường hệ miễn dịch,ngăn ngừa ung thư,chống virus.Lo&agrave;i nấm Đ&ocirc;ng tr&ugrave;ng hạ thảo (Cordyceps sinensis) được coi l&agrave; một dược liệu qu&yacute; hiếm v&agrave; đ&atilde; được sử dụng ở Trung Quốc từ l&acirc;u. Lo&agrave;i nấm cổ linh chi (Ganoderma applanatum) cũng&nbsp;được coi l&agrave; một thần dược&nbsp;ở Việt Nam.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; những t&aacute;c dụng tuyệt vời của&nbsp;<strong><em>nấm sạch</em></strong>&nbsp;m&agrave; ng&agrave;y ngay những trang trại nu&ocirc;i trồng&nbsp;<em>nấm&nbsp;</em>&nbsp;mọc l&ecirc;n c&ograve;n nhanh hơn nấm,họ ồ ạt&nbsp;đưa ra những sản phẩm&nbsp;<strong><em>nấm tươi&nbsp;sạch</em></strong>&nbsp;của ri&ecirc;ng m&igrave;nh,trong khi chất lượng th&igrave; bỏ ngỏ.Người ti&ecirc;u d&ugrave;ng th&igrave;&nbsp;chơi vơi,băn khoan&nbsp;<em>nấm</em>&nbsp;m&igrave;nh mua về liệu c&oacute; đủ&nbsp;<em>&nbsp;sạch&nbsp;</em>hay chưa.</p>\r\n\r\n<p>Đồng cảm với những băn khoan của nhiều chị em.CleverFood bỏ c&ocirc;ng th&acirc;m nhập từng trang trại nấm để đem về những loại nấm kh&ocirc;ng chỉ tươi ngon,m&agrave; c&ograve;n sạch theo đ&uacute;ng ti&ecirc;u chuẩn của bộ n&ocirc;ng nghiệp,bộ y tế.</p>\r\n', 'nam-mo-2.jpg', 1, NULL, NULL),
(3, 'Rau sạch Đà Lạt', '<p>Đ&agrave; Lạt được thi&ecirc;n nhi&ecirc;n ưu đ&atilde;i cho kh&iacute; hậu &ocirc;n đới quanh năm , thời tiết m&aacute;t mẻ dễ chịu , th&iacute;ch hợp cho<strong>&nbsp;rau sạch Đ&agrave; Lạt</strong>&nbsp;ph&aacute;t triển mạnh mẽ.&nbsp;<strong>Rau Đ&agrave; Lạt</strong>&nbsp;đ&atilde; nổi tiếng từ rất l&acirc;u , người ta y&ecirc;u th&iacute;ch c&aacute;i vị tươi ngon độc đ&aacute;o m&agrave; chỉ c&oacute; rau sạch Đ&agrave; Lạt mới c&oacute;.&nbsp;</p>\r\n\r\n<p>Đặc biệt hiện nay thị trường&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\"><strong>rau sạch</strong></a>&nbsp;cả nước đang rối ren , lộn xộn&nbsp;<strong>rau củ Đ&agrave; Lạt</strong>&nbsp;ng&agrave;y c&agrave;ng chiếm được l&ograve;ng tin của người ti&ecirc;u d&ugrave;ng . Những phương ph&aacute;p , những giống rau mới được đưa v&agrave;o nghi&ecirc;n cứu canh t&aacute;c nhằm l&agrave;m đa dạng phong ph&uacute; hơn nguồn h&agrave;ng .&nbsp;</p>\r\n\r\n<p><strong>Rau sạch Đ&agrave; Lạt</strong>&nbsp;thực sự kh&ocirc;ng rẻ , gi&aacute; cao hơn kh&aacute; nhiều so với c&aacute;c cơ sở trồng rau kh&aacute;c ,tuy nhi&ecirc;n gi&aacute; th&agrave;nh sẽ đi đ&ocirc;i với chất lượng v&agrave; sự độc đ&aacute;o . C&agrave; chua cherry , c&agrave; rốt b&acirc;y bi , khoai t&acirc;y b&acirc;y bi... ở đ&acirc;u c&oacute; được ??? Rau Đ&agrave; Lạt chắc chắn sẽ c&ograve;n ph&aacute;t triển hơn nữa.</p>\r\n', 'product-6.jpg', 1, NULL, NULL),
(4, 'Rau hữu cơ', '<p>1.<strong>RAU HỮU CƠ&nbsp;</strong>l&agrave; loại rau&nbsp;canh t&aacute;c trong điều kiện ho&agrave;n to&agrave;n tự nhi&ecirc;n theo quy tắc&nbsp;5 kh&ocirc;ng:</p>\r\n\r\n<p>- Kh&ocirc;ng b&oacute;n ph&acirc;n ho&aacute; học</p>\r\n\r\n<p>- Kh&ocirc;ng phun thuốc bảo vệ thực vật</p>\r\n\r\n<p>- Kh&ocirc;ng phun thuốc k&iacute;ch th&iacute;ch sinh trưởng</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng thuốc diệt cỏ</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng sản phẩm biến đổi gen</p>\r\n\r\n<p>Người trồng&nbsp;<strong>rau hữu cơ</strong>&nbsp;được đ&agrave;o tạo chuy&ecirc;n s&acirc;u.Đất trồng v&agrave; nguồn nước tưới được lựa chọn kh&ocirc;ng bị &ocirc; nhiễm bởi c&aacute;c kim loại nặng (thủy ng&acirc;n, asen...), kh&ocirc;ng bị ảnh hưởng của nước thải c&ocirc;ng nghiệp.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i&nbsp;<strong><em>rau hữu cơ</em></strong>&nbsp;l&agrave; loại&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\">rau sạch</a>&nbsp;nhất,an to&agrave;n nhất hiện nay,người ti&ecirc;u d&ugrave;ng ho&agrave;n to&agrave;n c&oacute; thể an t&acirc;m sử dụng.</p>\r\n\r\n<p>2. Gi&aacute; trị dinh dưỡng của&nbsp;<em><strong>rau hữu cơ</strong></em></p>\r\n\r\n<p><a href=\"http://cleverfood.com.vn/\" target=\"_blank\"><strong><em>Thực phẩm&nbsp;hữu cơ&nbsp;</em></strong></a>c&oacute; chứa nhiều th&agrave;nh phần dinh dưỡng hơn c&aacute;c loại thực phẩm kh&aacute;c.</p>\r\n\r\n<p>- Tỷ lệ hợp chất chống oxi ho&aacute; trong &nbsp;rau quả hữu cơ &ge; 40% so với loại b&igrave;nh thường</p>\r\n\r\n<p>- Trong&nbsp;<strong><em>rau hữu cơ&nbsp;</em></strong>c&oacute; chứa nhiều kho&aacute;ng chất c&oacute; &iacute;ch cho cơ thể.</p>\r\n\r\n<p>3. Kh&aacute;c biệt về cảm quan</p>\r\n\r\n<p>-&nbsp;<em><strong>Rau hữu cơ&nbsp;</strong></em>nh&igrave;n bề ngo&agrave;i c&ograve;i hơn c&aacute;c loại rau&nbsp;kh&aacute;c. K&iacute;ch thước rau cũng kh&ocirc;ng&nbsp;đồng đều.</p>\r\n\r\n<p>-&nbsp;<strong><em>Rau hữu cơ</em></strong>&nbsp;khi ăn thấy ngọt, đậm, nhiều nhựa hơn. Thấy vị rau&nbsp;nhiều hơn hẳn, cảm gi&aacute;c như ăn rau rừng mọc tự nhi&ecirc;n.</p>\r\n', 'image_1.jpg', 1, NULL, NULL),
(5, 'Thịt heo', '<p><strong>Thịt lợn ( thịt heo )</strong>&nbsp;l&agrave; một loại thực phẩm đ&atilde;&nbsp;rất&nbsp;phổ biến tr&ecirc;n thế giới.Ch&uacute;ng ta ăn&nbsp;<em>thịt lợn</em>&nbsp;h&agrave;ng ng&agrave;y,thậm tr&iacute; l&agrave; từng bữa.Rất nhiều m&oacute;n ngon từ thịt lợn ra đời,người ta c&oacute; thể đem&nbsp;luộc,r&aacute;n,nướng hay x&agrave;o nấu...đều rất ngon v&agrave; dễ ăn.</p>\r\n\r\n<p>Cũng ch&iacute;nh v&igrave; qu&aacute; phổ biến v&agrave; quan trọng m&agrave; hiện nay&nbsp;<strong>thịt lợn</strong>&nbsp;đang l&agrave; một mặt h&agrave;ng kh&oacute; kiểm so&aacute;t về vệ sinh an to&agrave;n thực phẩm.Nhiều trang trại,c&aacute; nh&acirc;n v&igrave; ham lợi m&agrave; đ&aacute;nh rơi lương t&acirc;m,thịt họ xuất ra thị trường hết tăng trọng,lại đến thịt bẩn,thịt bệnh.Nhiều l&ograve; giết mổ kh&ocirc;ng giấy ph&eacute;p,kh&ocirc;ng đảm bảo vệ sinh vẫn hằng ng&agrave;y tuồn<em>thịt lợn</em>&nbsp;v&agrave;o thị trường.</p>\r\n\r\n<p>Nắm được cơn kh&aacute;t&nbsp;<strong>&quot;thịt lợn sạch&quot;</strong>&nbsp;của c&aacute;c bạn,Cleverfood tự h&agrave;o l&agrave; địa chỉ b&aacute;n&nbsp;<em>thịt lợn sạch</em>&nbsp;uy t&iacute;n nhất H&agrave; Nội.<em>Thịt lợn</em>&nbsp;của ch&uacute;ng t&ocirc;i nhập về ko chỉ tươi,ngon,sạch m&agrave; &nbsp;đều c&oacute; nguồn gốc xuất sứ r&otilde; r&agrave;ng.</p>\r\n\r\n<p>Ngo&agrave;i ra mỗi tuần Cleverfood đều c&oacute; những đợt h&agrave;ng đặc biệt&nbsp;đều l&agrave;&nbsp;<strong><em>thịt lợn sạch</em></strong>.Lợn ch&uacute;ng t&ocirc;i&nbsp;nhập về được nu&ocirc;i ở v&ugrave;ng đồi n&uacute;i,đất rộng,nước nguồn trong l&agrave;nh,kh&iacute; hậu tho&aacute;ng đ&atilde;ng,được thả r&ocirc;ng kiếm ăn.Mỗi con chỉ nặng tối đa&nbsp;15-20kg.</p>', 'images.jpg', 1, NULL, '2020-02-20 13:47:20'),
(6, 'Thịt gia cầm', '<p><strong>Thịt gia cầm</strong>&nbsp;l&agrave; m&oacute;n ăn phổ biến từ rất l&acirc;u tr&ecirc;n khắp thế giới.Nhờ đặc t&iacute;nh sinh trưởng nhanh,sớm thu hoạch m&agrave;&nbsp;<em>thịt gia cầm</em>&nbsp;lu&ocirc;n dồi d&agrave;o.Hơn nữa&nbsp;<em>gia cầm</em>&nbsp;l&agrave; loại thịt trắng chứa nhiều protein v&agrave; chất b&eacute;o dễ hấp thu,&iacute;t cholesterol hơn thịt đỏ do đ&oacute; rất tốt cho sức khỏe người ti&ecirc;u d&ugrave;ng.Thịt gia cầm ti&ecirc;u thụ ở Việt Nam chủ yếu l&agrave;&nbsp;<em><strong>thịt g&agrave;</strong></em>v&agrave;&nbsp;<strong><em>thịt vịt</em></strong></p>\r\n\r\n<p>Theo thống k&ecirc;<strong>&nbsp;<em>thịt gia cầm</em>&nbsp;</strong>chiếm khoảng 30% sản phẩm thịt tr&ecirc;n to&agrave;n thế giới chỉ sau thịt lợn&nbsp;38%.Ch&iacute;nh do nhu cầu qu&aacute; lớn của thị trường dẫn tới thiếu hụt nguồn nh&acirc;n lực kiểm so&aacute;t chất lượng sản phẩm.Gia cầm bẩn tr&agrave;n lan,người ti&ecirc;u d&ugrave;ng hoang mang.</p>\r\n\r\n<p>Cũng n&ecirc;n nhớ gia cầm l&agrave; lo&agrave;i dễ bị dịch bệnh,sức sống kh&ocirc;ng cao,n&ecirc;n việc mua phải&nbsp;<strong><em>thịt gia cầm</em></strong>&nbsp;chết cũng l&agrave; dễ hiểu.Để đảm bảo an to&agrave;n cho bản th&acirc;n v&agrave; gia đ&igrave;nh,hay tới với ch&uacute;ng t&ocirc;i - cửa h&agrave;ng&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\">thực phẩm sạch</a>&nbsp;uy tin nhất H&agrave; Nội.Ở Cleverfood kh&ocirc;ng c&oacute; g&agrave; chết,vịt &ocirc;i,chỉ c&oacute; c&aacute;c loại gia cầm đặc sản,hiếm c&oacute; tr&ecirc;n đời</p>\r\n', 'download (12).jpg', 1, NULL, NULL),
(7, 'Hoa quả nhập khẩu', '<p><strong>Hoa quả nhập khẩu</strong>&nbsp;đang rất được cộng đồng ch&uacute; &yacute; v&igrave; độ thơm ngon,độc lạ.Thật l&ograve;ng m&agrave; n&oacute;i khi ăn hoa quả ,<strong>tr&aacute;i c&acirc;y nhập khẩu</strong>&nbsp;thấy ngon.hấp dẫn hơn kh&aacute; nhiều so với sản phẩm c&ugrave;ng loại được trồng trong nước.Chất lượng của&nbsp;<em>hoa quả nhập khẩu</em>&nbsp;cũng v&ocirc; c&ugrave;ng&nbsp;đồng đều&nbsp;,cả trăm quả họa may lỗi 1.</p>\r\n\r\n<p>Tới từ&nbsp;những nước c&oacute; nền&nbsp;n&ocirc;ng nghiệp thịnh vương,hoa quả&nbsp;<em>,tr&aacute;i c&acirc;y nhập khẩu</em>&nbsp;l&agrave; th&agrave;nh quả của qu&aacute; tr&igrave;nh nghi&ecirc;n cứu,lai tạo hợp l&yacute; c&ugrave;ng điều kiện canh t&aacute;c l&yacute; tưởng,được chăm b&oacute;n chuy&ecirc;n nghiệp.Đặc biệt vấn đề vệ sinh ,an to&agrave;n lu&ocirc;n được đặt l&ecirc;n h&agrave;ng đầu.</p>\r\n\r\n<p>Vấn đề duy nhất với người ti&ecirc;u d&ugrave;ng l&agrave; t&igrave;m mua hoa quả,&nbsp;<strong><em>tr&aacute;i c&acirc;y nhập khẩu</em></strong>&nbsp;ở đ&acirc;u chất lượng,khi m&agrave; h&agrave;ng trăm cửa h&agrave;ng mọc l&ecirc;n như nấm,ri&ecirc;ng <strong>Cần Thơ</strong> t&iacute;nh sơ đ&atilde; ngo&agrave;i 50 cửa h&agrave;ng.Nhiều nơi cộp m&aacute;c&nbsp;<strong><em>&quot;hoa quả nhập khẩu &quot;</em></strong>&nbsp;v&agrave;o tr&aacute;i c&acirc;y Trung Quốc để kiếm lời bất ch&iacute;nh.Đỡ hơn th&igrave; người ta nhập h&agrave;ng loại 2,loại 3 rồi b&aacute;n gi&aacute; loại 1.</p>\r\n\r\n<p>Cleverfood&nbsp;kh&ocirc;ng vậy,hoa quả ,tr&aacute;i c&acirc;y nhập khẩu của ch&uacute;ng t&ocirc;i l&agrave; loại hảo hạng,chất lượng h&agrave;ng đầu.Tự h&agrave;o l&agrave;&nbsp;<strong>cửa h&agrave;ng hoa quả nhập khẩu Cần Thơ&nbsp;</strong>uy t&iacute;n nhất. Tới với Cleverfood l&agrave; tới với nguồn cung&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\">thực phẩm sạch</a>&nbsp;,&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-sach-b1566494.html\" target=\"_blank\">hoa quả sạch</a>&nbsp;v&ocirc; hạn.</p>\r\n', 'category-2.jpg', 1, NULL, NULL),
(8, 'Hoa quả Việt Nam', '<p><strong>Hoa quả Việt Nam</strong>&nbsp;ở Cleverfood đều l&agrave; những loại&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-sach-b1566494.html\" target=\"_blank\">hoa quả sạch</a>&nbsp;đặc sắc.Xuất xứ từ khắp c&aacute;c v&ugrave;ng miền tổ quốc,ở đ&acirc;u c&oacute; đặc sản l&agrave; ở đ&oacute; c&oacute; ch&uacute;ng t&ocirc;i,t&igrave;m hiểu,kiểm nghiệm,điều tra kĩ c&agrave;ng rồi mới nhập về kinh doanh.</p>\r\n\r\n<p>Sử dụng&nbsp;<strong><em>hoa quả Việt Nam</em></strong>&nbsp;l&agrave; g&oacute;p phần đưa nền n&ocirc;ng nghiệp của đất nước đi l&ecirc;n,chung tay chia sẻ kh&oacute; khăn,vất vả với những người n&ocirc;ng d&acirc;n hai sương một nắng.Tổ Quốc,đồng b&agrave;o ta m&agrave; kh&ocirc;ng y&ecirc;u th&igrave; c&ograve;n y&ecirc;u được ai!!</p>\r\n\r\n<p>Th&ecirc;m nữa&nbsp;<em><strong>hoa quả Việt</strong></em>&nbsp;cũng v&ocirc; c&ugrave;ng đa dạng v&agrave; đặc sắc,nhiều loại c&ograve;n g&acirc;y ấn tượng mạnh với người nước ngo&agrave;i v&agrave; đang l&agrave; mặt h&agrave;ng xuất khẩu chủ lực.Độc đ&aacute;o từ hương vị,đa dạng từng chủng loại - Đ&oacute; l&agrave;&nbsp;<strong><em>hoa quả Việt Nam</em></strong></p>\r\n', 'bg_1.jpg', 1, NULL, NULL),
(9, 'Trái cây sấy', '<p>abc</p>\r\n', 'download (17).jpg', 1, NULL, NULL),
(10, 'Gạo và các chế phẩm từ gạo', '<p>Gạo</p>\r\n', 'download (15).jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanphamshop`
--

CREATE TABLE `loaisanphamshop` (
  `id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `loaisanphamshop_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanphamshop_anh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanphamshop_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated__at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lohang`
--

CREATE TABLE `lohang` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) DEFAULT NULL,
  `lohang_ky_hieu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lohang_han_su_dung` int(11) NOT NULL,
  `lohang_gia_mua_vao` int(10) NOT NULL,
  `lohang_gia_ban_ra` int(10) NOT NULL,
  `lohang_so_luong_nhap` int(11) NOT NULL,
  `lohang_so_luong_da_ban` int(11) NOT NULL,
  `lohang_so_luong_doi_tra` int(11) NOT NULL,
  `lohang_so_luong_hien_tai` int(11) NOT NULL,
  `lohang_tinh_trang` int(11) DEFAULT NULL COMMENT '1',
  `nhacungcap_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lohang`
--

INSERT INTO `lohang` (`id`, `shop_id`, `lohang_ky_hieu`, `lohang_han_su_dung`, `lohang_gia_mua_vao`, `lohang_gia_ban_ra`, `lohang_so_luong_nhap`, `lohang_so_luong_da_ban`, `lohang_so_luong_doi_tra`, `lohang_so_luong_hien_tai`, `lohang_tinh_trang`, `nhacungcap_id`, `created_at`, `updated_at`) VALUES
(2, 10, 'G0001', 15, 95000, 120000, 100, 16, 0, 94, 1, 1, '2016-05-19 01:34:57', '2016-05-19 01:34:57'),
(3, 11, 'RS0002', 10, 35000, 40000, 50, 20, 0, 0, 1, 1, '2016-05-24 07:13:55', '2016-05-24 07:13:55'),
(4, 11, 'RH0003', 10, 25000, 30000, 50, 5, 0, 5, 1, 1, '2016-05-24 07:14:29', '2016-05-24 07:14:29'),
(5, 10, 'NT0004', 20, 500000, 700000, 50, 100, 0, 32, 1, 1, '2016-05-24 07:15:44', '2016-05-24 07:15:44'),
(6, 10, 'NK0005', 30, 230000, 280000, 50, 6, 0, 52, 1, 1, '2016-05-24 07:17:05', '2016-05-24 07:17:05'),
(7, 11, 'TH0006', 15, 35000, 40000, 50, 8, 0, 42, 1, 1, '2016-05-24 07:19:09', '2016-05-24 07:19:09'),
(8, 11, 'TB0007', 35, 350000, 420000, 50, 13, 0, 0, 1, 1, '2016-05-24 07:20:04', '2016-05-24 07:20:04'),
(11, 11, 'TG0010', 3, 25000, 32000, 20, 0, 0, 100, 1, 2, '2016-05-25 07:02:46', '2016-05-25 07:02:46'),
(12, 11, 'TC0011', 2, 15000, 21000, 20, 41, 0, 29, 1, 2, '2016-05-25 07:03:36', '2016-05-25 07:03:36'),
(14, 11, 'TCK0014', 10, 95000, 120000, 100, 4, 0, 100, 1, 1, '2016-06-08 08:18:38', '2016-06-08 08:18:38'),
(17, 10, 'CP0003', 100, 230000, 280000, 150, 1, 0, 50, NULL, 8, '2016-07-04 23:01:28', '2016-07-04 23:01:28'),
(22, 11, 'NT001', 7, 70000, 80000, 7, 16, 0, 92, 1, 2, '2020-02-29 14:39:57', '2020-02-29 14:39:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `losanxuat`
--

CREATE TABLE `losanxuat` (
  `id` int(10) NOT NULL,
  `losanxuat_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `losanxuat_ngaysanxuat` datetime NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `losanxuat_ngaythuhoachdukien` datetime NOT NULL,
  `losanxuat_khoiluongdukien` int(10) NOT NULL,
  `diadiemsanxuat_id` int(10) NOT NULL,
  `donvi_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_14_110951_create_nhacungcap_table', 1),
('2016_04_16_005616_create_nhom_table', 1),
('2016_04_18_030252_create_tuyendung_table', 1),
('2016_04_20_062118_create_khuyenmai_table', 1),
('2016_04_28_141651_create-donvitinh-table', 1),
('2016_04_16_011341_create_loaisanpham_table', 2),
('2016_04_20_031400_create_sanpham_table', 3),
('2016_04_20_032205_create_giabanra_table', 4),
('2016_04_20_133501_create_hinhsanpham_table', 4),
('2016_04_25_174513_create_giamuavao_table', 4),
('2016_05_01_023512_create_nhom_table', 5),
('2016_05_01_023719_create_loaisanpham_table', 6),
('2016_05_01_023846_create_sanpham_table', 7),
('2016_05_01_023949_create_giabanra_table', 8),
('2016_05_01_024111_create_giamuavao_table', 8),
('2016_05_01_024136_create_hinhsanpham_table', 8),
('2016_05_09_032019_create_monngon_table', 9),
('2016_05_10_165156_create_hinhmonngon_table', 10),
('2016_05_13_074300_create_lohang_table', 11),
('2016_05_13_102657_create_sanpham_table', 12),
('2016_05_13_103740_create_lohang_table', 13),
('2016_05_13_104520_create_hinhsanpham_table', 14),
('2016_05_13_105811_create_hinhsanpham_table', 15),
('2016_05_13_162644_create_monngon_table', 16),
('2016_05_14_073949_create_nguyenlieu_table', 17),
('2016_05_16_112417_create_khuyenmai_table', 18),
('2016_05_16_150907_create_tylegia_table', 19),
('2016_05_16_160708_create_tylegia_table', 20),
('2016_05_17_075014_create_tuyendung_table', 21),
('2016_05_19_093429_create_khuyenmai_table', 22),
('2016_05_19_093815_create_sanphamkhuyenmai_table', 23),
('2016_05_20_091554_craete_pages_table', 24),
('2016_05_23_092444_create_loainguoidung_table', 24),
('2014_10_12_000000_create_users_table', 25),
('2016_05_23_094448_create_nhanvien_table', 26),
('2016_06_01_081813_create_khachhang_table', 27),
('2016_06_01_085225_create_tinhtranghd_table', 28),
('2016_06_01_084422_create_donhang_table', 29),
('2016_06_01_090918_create_chitietdonhang_table', 30),
('2016_06_01_151838_create_binhluan_table', 31),
('2016_06_22_215955_create_quangcao_table', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monngon`
--

CREATE TABLE `monngon` (
  `id` int(10) UNSIGNED NOT NULL,
  `monngon_tieu_de` text COLLATE utf8_unicode_ci NOT NULL,
  `monngon_tom_tat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monngon`
--

INSERT INTO `monngon` (`id`, `monngon_tieu_de`, `monngon_tom_tat`, `monngon_noi_dung`, `monngon_anh`, `active`, `created_at`, `updated_at`) VALUES
(3, 'NẤM BÀO NGƯ XÀO XỐT MÈ', '<p><strong>Mới x&agrave;o th&ocirc;i m&agrave; m&ugrave;i m&egrave; lẫn m&ugrave;i xốt mayonnaise Aji-mayo đ&atilde; thơm lừng rồi. Khi được b&agrave;y ra dĩa, m&oacute;n ăn với nhiều m&agrave;u sắc của nấm b&agrave;o ngư, c&agrave; rốt, v&agrave; b&ocirc;ng cải trong thật hấp dẫn. Thịt nạc dăm thấm vị ăn v&agrave;o thơm thơm vị x&agrave;o, nấm b&agrave;o ngư vừa ch&iacute;n tới cũng ngon ngọt kh&ocirc;ng k&eacute;m.&nbsp;</strong></p>', '<h3>NGUY&Ecirc;N LIỆU</h3>\r\n\r\n<ul>\r\n	<li>Nấm b&agrave;o ngư: 200g</li>\r\n	<li>Ớt sừng băm: 1M</li>\r\n	<li>Thịt nạc dăm: 50g</li>\r\n	<li>C&agrave; rốt: 50g</li>\r\n	<li>H&agrave;nh l&aacute;: 3 nh&aacute;nh</li>\r\n	<li>H&agrave;nh t&iacute;m băm: 1M</li>\r\n	<li>B&ocirc;ng cải xanh: 100g</li>\r\n	<li>M&egrave; rang: 30g</li>\r\n	<li>Tỏi băm: 1M</li>\r\n	<li>Dầu ăn, dầu m&egrave;, đường, ti&ecirc;u</li>\r\n	<li>Hạt n&ecirc;m</li>\r\n	<li>Xốt Mayonaise</li>\r\n	<li>Nước tương</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<h3>1. SƠ CHẾ:</h3>\r\n\r\n<p>&ndash; Nấm b&agrave;o ngư x&eacute; đ&ocirc;i, ướp 1M h&agrave;nh, tỏi băm, 1M nước tương&nbsp;<em>&ldquo;Ph&uacute; Sĩ&rdquo;</em>&nbsp;v&agrave;&nbsp; 1/2M đường.</p>\r\n\r\n<p>&ndash; Thịt nạc dăm cắt miếng, ướp 1M h&agrave;nh, tỏi băm, 1/2M hạt n&ecirc;m Aji-ngon&reg;, 1/2M ti&ecirc;u.</p>\r\n\r\n<p>&ndash; B&ocirc;ng cải xanh t&aacute;ch nh&aacute;nh thật nhỏ. C&agrave; rốt cắt l&aacute;t mỏng, d&ugrave;ng dao răng cưa nhấn chiều ngang 1cm. H&agrave;nh l&aacute; cắt kh&uacute;c.</p>\r\n\r\n<p>&ndash; Pha gia vị x&agrave;o: 2M xốt mayonnaise&nbsp;<em>&ldquo;Aji-mayo&rdquo;,</em>&nbsp;1M nước tương&nbsp;<em>&ldquo;Ph&uacute; Sĩ&rdquo;,</em>&nbsp;1/3M ti&ecirc;u, 1M dầu m&egrave;, 1M m&egrave; rang, 1M ớt sừng băm.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. THỰC HIỆN:</h3>\r\n\r\n<p>Phi thơm h&agrave;nh tỏi, x&agrave;o săn thịt nạc dăm, cho nấm b&agrave;o ngư v&agrave;o x&agrave;o lửa lớn, th&ecirc;m một &iacute;t nước, tiếp tục cho b&ocirc;ng cải, c&agrave; rốt v&agrave;o x&agrave;o ch&iacute;n. Th&ecirc;m 1/2 ch&eacute;n nước, cuối c&ugrave;ng tắt lửa, th&ecirc;m xốt x&agrave;o v&agrave; h&agrave;nh l&aacute; v&agrave;o, đảo đều, rắc th&ecirc;m m&egrave; rang c&ograve;n lại.</p>\r\n\r\n<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<h3>&nbsp;</h3>', 'download (29).jpg', 1, '2016-05-14 01:01:29', '2020-02-29 09:15:39'),
(4, 'Nấm xào ngũ sắc bắt mắt người ăn', '<p><strong><span style=\"color:#000000\">Nấm l&agrave; 1 thực phẩm kh&ocirc;ng những ngon m&agrave; c&ograve;n rất c&oacute; lợi cho sức khỏe. Mỗi loại nấm lại đem đến cho ta 1 hương vị ri&ecirc;ng, l&agrave;m n&ecirc;n sự độc đ&aacute;o, ngon miệng của bữa cơm gia đ&igrave;nh. H&ocirc;m nay sổ tay nấu ăn sẽ hướng dẫn cả nh&agrave; m&oacute;n Nấm x&agrave;o ngũ sắc</span></strong></p>', '<h4>Nguy&ecirc;n liệu:</h4>\r\n\r\n<ul>\r\n	<li><a href=\"http://sotaynauan.com/tag/nam-mo/\">Nấm mỡ</a>&nbsp;-&nbsp;khoảng 400 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/tom-tuoi/\">T&ocirc;m tươi</a>&nbsp;-&nbsp;300 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/dau-ha-lan/\">Đậu H&agrave; lan</a>&nbsp;-&nbsp;150 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/ot-chuong-do-vang/\">Ớt chu&ocirc;ng đỏ, v&agrave;ng</a>&nbsp;-&nbsp;1 nửa quả mỗi loại</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/ngo-non/\">Ng&ocirc; non</a>&nbsp;-&nbsp;200 gr\r\n	<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<h4>Hướng dẫn:</h4>\r\n\r\n<p><strong>Bước 1:&nbsp;</strong>Nấm&nbsp;mỡ cắt bỏ ch&acirc;n, mũ nấm n&agrave;o to th&igrave; bổ l&agrave;m đ&ocirc;i, ng&ocirc; non&nbsp;cũng vậy, bắp n&agrave;o to c&aacute;c bạn bổ đ&ocirc;i ra cho vừa ăn nh&eacute;. Đậu H&agrave; Lan tước bỏ xơ, ớt chu&ocirc;ng&nbsp;đỏ v&agrave;ng th&aacute;i miếng d&agrave;i.</p>\r\n\r\n<p><strong>Bước 2:&nbsp;</strong>Đun s&ocirc;i 1 nồi nước, thả 1 d&uacute;m muối rồi cho ng&ocirc; non&nbsp;v&agrave; đậu H&agrave; Lan&nbsp;v&agrave;o trần sơ, vớt ra ng&acirc;m ngay v&agrave;o b&aacute;t nước lạnh để ng&ocirc; v&agrave; đậu giữ được m&agrave;u sắc đẹp.</p>\r\n\r\n<p><strong>Bước 3:&nbsp;</strong><em>T&ocirc;m</em>&nbsp;tươi b&oacute;c bỏ đầu v&agrave; vỏ, đem x&agrave;o săn với h&agrave;nh kh&ocirc; v&agrave; nước mắm, tr&uacute;t ra 1 đĩa ri&ecirc;ng.</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Tiếp tục cho dầu ăn v&agrave;o chảo, ch&uacute;ng ta x&agrave;o đến phần nấm, &oacute;t chu&ocirc;ng&nbsp;đỏ v&agrave; v&agrave;ng. N&ecirc;m nếm gia vị vừa miệng.</p>\r\n\r\n<p><strong>Bước 5:</strong>&nbsp;Khi nấm gần ch&iacute;n v&agrave; đ&atilde; ngấm gia vị, c&aacute;c bạn cho đến phần ng&ocirc; non v&agrave; &nbsp;đậu H&agrave; Lanv&agrave;o x&agrave;o c&ugrave;ng. Ở bước n&agrave;y c&oacute; thể th&ecirc;m 1 ch&uacute;t dầu h&agrave;o v&agrave;o để tăng hương vị v&agrave; sắc b&oacute;ng đẹp cho &nbsp;m&oacute;n x&agrave;o&nbsp;của ch&uacute;ng ta.</p>\r\n\r\n<p><strong>Bước 6:</strong>&nbsp;Cuối c&ugrave;ng l&agrave; đến t&ocirc;m, c&aacute;c bạn đảo nhanh tay v&agrave; tắt bếp. Cho m&oacute;n&nbsp;nấm x&agrave;o ngũ sắc&nbsp;ra đĩa v&agrave; c&ugrave;ng cả nh&agrave; thưởng thức nh&eacute;!</p>\r\n\r\n<p>&nbsp;</p>', 'thom-ngon-dep-mat-voi-thit-bo-xao-ngu-sac-5400_450.jpg', 1, '2016-05-14 01:03:13', '2020-02-29 09:16:06'),
(19, 'Khô mực chiên nước mắm', '<p>M&ugrave;a Euro đ&atilde; bắt đầu, h&atilde;y học ngay c&ocirc;ng thức kh&ocirc; mực chi&ecirc;n nước mắm tuyệt ngon n&agrave;y để cho c&aacute;c buổi xem b&oacute;ng đ&aacute; th&ecirc;m x&ocirc;m n&agrave;o!</p>\r\n', '<p><strong><u>Nguy&ecirc;n liệu l&agrave;m kh&ocirc; mực:</u></strong></p>\r\n\r\n<p><strong><em>- 2 con mực kh&ocirc; cỡ vừa</em></strong></p>\r\n\r\n<p><strong><em>- 1 củ tỏi</em></strong></p>\r\n\r\n<p><strong><em>- 15g đường (2 th&igrave;a)</em></strong></p>\r\n\r\n<p><strong><em>- 10ml nước mắm (1 th&igrave;a)</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Khô mực chiên nước mắm: Món nhắm tuyệt vời cho mùa bóng - Ảnh 1.\" id=\"img_ca89dd60-323f-11e6-aa10-f7306ed585e3\" src=\"https://k14.vcmedia.vn/thumb_w/650/2016/muc-0-1465915869087.png\" title=\"Khô mực chiên nước mắm: Món nhắm tuyệt vời cho mùa bóng - Ảnh 1.\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><u>Nguy&ecirc;n liệu l&agrave;m kh&ocirc; mực:</u></strong></p>\r\n\r\n<p><strong><em>- 2 con mực kh&ocirc; cỡ vừa</em></strong></p>\r\n\r\n<p><strong><em>- 1 củ tỏi</em></strong></p>\r\n\r\n<p><strong><em>- 15g đường (2 th&igrave;a)</em></strong></p>\r\n\r\n<p><strong><em>- 10ml nước mắm (1 th&igrave;a)</em></strong></p>\r\n\r\n<p><strong><u>C&aacute;ch l&agrave;m kh&ocirc; mực như sau:</u></strong></p>\r\n\r\n<p>Bước 1:</p>\r\n\r\n<p>- Đầu ti&ecirc;n, bạn nướng ch&iacute;n mực.</p>\r\n\r\n<p>Bước 2:</p>\r\n\r\n<p>- Đập cho con mực b&ocirc;ng tơi.</p>\r\n\r\n<p>Bước 3:</p>\r\n\r\n<p>- Sau đ&oacute;, ta x&eacute; mực th&agrave;nh sợi nhỏ.</p>\r\n\r\n<p>Bước 4:</p>\r\n\r\n<p>- Phi cho tỏi thơm gi&ograve;n rồi vớt ra b&aacute;t.</p>\r\n\r\n<p>Bước 5:</p>\r\n\r\n<p>- Cho mực, tỏi phi, đường, nước mắm v&agrave;o chảo rồi đảo đến khi đường keo lại.</p>\r\n\r\n<p><strong>Chỉ c&oacute; vậy th&ocirc;i l&agrave; xong xu&ocirc;i rồi!</strong></p>\r\n\r\n<p>Kh&ocirc; mực chi&ecirc;n nước mắm ch&aacute;y tỏi c&oacute; m&ugrave;i vị rất hấp dẫn nh&eacute;!</p>\r\n\r\n<p>Sợi mực vừa dai vừa gi&ograve;n ăn th&iacute;ch cực lu&ocirc;n!</p>\r\n\r\n<p>Nếu th&iacute;ch th&igrave; c&aacute;c bạn c&oacute; thể vắt th&ecirc;m một &iacute;t chanh hoặc quất nữa...</p>\r\n', 'download (30).jpg', 0, '2016-06-15 01:42:11', '2016-06-15 01:42:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `monngon_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`monngon_id`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(4, 2, NULL, NULL),
(3, 7, NULL, NULL),
(19, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieusanxuat`
--

CREATE TABLE `nguyenlieusanxuat` (
  `id` int(10) NOT NULL,
  `nguyenlieusanxuat_ten` int(11) NOT NULL,
  `nguyenlieusanxuat_mota` int(11) NOT NULL,
  `nguyenlieusanxuat_tenhinh` int(11) NOT NULL,
  `nguyenlieusanxuat_soluong` int(11) NOT NULL,
  `donvi_id` int(11) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieusanxuat`
--

INSERT INTO `nguyenlieusanxuat` (`id`, `nguyenlieusanxuat_ten`, `nguyenlieusanxuat_mota`, `nguyenlieusanxuat_tenhinh`, `nguyenlieusanxuat_soluong`, `donvi_id`, `sanpham_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, '2020-03-06 08:38:35', '2020-03-06 08:38:35'),
(2, 0, 0, 0, 0, 0, 0, 0, '2020-03-06 08:48:11', '2020-03-06 08:48:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhacungcap_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `nhacungcap_ten`, `nhacungcap_dia_chi`, `nhacungcap_sdt`, `created_at`, `updated_at`) VALUES
(1, 'Vườn đà lạt', '<p>a</p>', '01678991282', NULL, NULL),
(2, 'Rau sạch vườn nhà', '<p>104/1A Xu&acirc;n Thới 5 - H&oacute;c M&ocirc;n - tp. Hồ Ch&iacute; Minh</p>\r\n', ' 0917116441', NULL, NULL),
(3, 'Công Ty TNHH Thương Mại Và Sản Xuất Nông Sản SAPO DakLak', '<p>Cao ốc B, Ng&ocirc; Gia Tự, P.3, Q.10,&nbsp;<strong><em>Tp. Hồ Ch&iacute; Minh (TPHCM)</em></strong></p>\r\n', '0938031013', NULL, NULL),
(4, 'Doanh Phú - Công Ty TNHH Doanh Phú', '<p>75N/15 Đường Số 2, P. Hiệp B&igrave;nh Phước, Q. Thủ Đức&nbsp;<strong><em>Tp. Hồ Ch&iacute; Minh (TPHCM)</em></strong></p>\r\n', '0862833102', NULL, NULL),
(5, 'Công Ty TNHH Sản Xuất Thực Phẩm BaSao Food', '<p>Nguyễn Văn Thực, Khu 3, P. Đại Ph&uacute;c, Tp. Bắc Ninh,&nbsp;<strong><em>Bắc Ninh</em></strong></p>\r\n', '0933581989', NULL, NULL),
(6, 'Công Ty TNHH Chân Thành', '<p>141/10 đường số 11, P. B&igrave;nh Hưng H&ograve;a, Q. B&igrave;nh T&acirc;n, Tp. Hồ Ch&iacute; Minh (TPHCM)</p>\r\n', '0854084059', NULL, NULL),
(7, 'Công Ty Cổ Phần 36 An Bình Thái', '<p>Th&ocirc;n Lộng Kh&ecirc; 1, X&atilde; An Kh&ecirc;, H. Quỳnh Phụ,<strong><em>Th&aacute;i B&igrave;nh</em></strong></p>\r\n', '0363696398', NULL, NULL),
(8, 'Công Ty TNHH Hải Mạnh Bắc Ninh', '<p>Th&ocirc;n Đa Cầu, X. Nam Sơn, TP. Bắc Ninh,&nbsp;<strong><em>Bắc Ninh</em></strong></p>\r\n', '0912436220', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhanvien_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_cmnd` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `nhanvien_ten`, `nhanvien_cmnd`, `nhanvien_sdt`, `nhanvien_dia_chi`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'da vu', '241673303', '0947934041', 'hoa phu', 52, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `nhanvienshop`
-- (See below for the actual view)
--
CREATE TABLE `nhanvienshop` (
`id` int(10) unsigned
,`image_name` varchar(255)
,`tenshop` varchar(255)
,`user_id` int(10) unsigned
,`name` varchar(100)
,`dia_chi` varchar(255)
,`sdt` varchar(12)
,`email` varchar(255)
,`shop_mo_ta` text
,`active` int(1)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapkho`
--

CREATE TABLE `nhapkho` (
  `id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `nhapkho_khoiluong` int(10) NOT NULL,
  `nhapkho_dongia` int(10) NOT NULL,
  `donvi_id` int(10) NOT NULL,
  `kho_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `donvixuat_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhom_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_mo_ta` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhom_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`id`, `nhom_ten`, `nhom_url`, `nhom_mo_ta`, `nhom_anh`, `created_at`, `updated_at`) VALUES
(1, 'Thịt sạch', 'thit-sach', '<p>Thịt sạch</p>\r\n', 'thitsach.jpg', NULL, NULL),
(2, 'Rau sạch', 'rau-sach', '', 'rausach.jpg', NULL, NULL),
(3, 'Hoa quả sạch', 'hoa-qua-sach', '<p>Hoa quả sạch</p>\r\n', 'hoaquasach.jpg', NULL, NULL),
(4, 'Thực phẩm khô', 'thuc-pham-kho', '<p>Thực phẩm kh&ocirc;</p>\r\n', 'tpkho.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuatkho`
--

CREATE TABLE `phieuxuatkho` (
  `id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `phieuxuatkho_khoiluong` int(10) NOT NULL,
  `donvitinh_id` int(10) NOT NULL,
  `phieuxuatkho_dongia` int(10) NOT NULL,
  `donvi_id` int(10) NOT NULL,
  `donvixuat_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `quangcao_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quangcao_trang_thai` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`id`, `quangcao_anh`, `quangcao_trang_thai`, `title`, `created_at`, `updated_at`) VALUES
(11, 'rausach2.jpg', 1, '<p><u><strong><span style=\"font-size:16px\">RAU SẠCH 100%</span></strong></u></p>', NULL, '2020-02-21 01:50:48'),
(14, 'kinh-nghiem-buon-ban-gao-le-online.jpg', 0, '<p><u><strong><span style=\"font-size:16px\">LẤY CHẤT LƯỢNG L&Agrave; PHƯƠNG CH&Acirc;M</span></strong></u></p>', NULL, '2020-03-16 16:02:40'),
(15, 'maxresdefault (1).jpg', 1, '<p><u><strong><span style=\"font-size:16px\">AN TO&Agrave;N CHO SỨC KHỎE</span></strong></u></p>', NULL, '2020-02-21 01:51:11'),
(16, 'maxresdefault.jpg', 1, '<p><u><strong><span style=\"font-size:16px\">THỊT G&Agrave; THẢ VƯỜN</span></strong></u></p>', NULL, '2020-02-21 01:51:22'),
(20, 'cach-lam-thit-bo-bit-tet-sieu-ngon-tu-gio-chang-phai-ra-hang-thuong-thuc-1446800888-beef-steak-988x675-1533118335-2-width988height675.jpg', 1, '<p><u><strong><span style=\"font-size:16px\">THỊT B&Ograve; ĐẢM BẢO AN TO&Agrave;N THỰC PHẨM</span></strong></u></p>', '2020-02-23 14:37:00', '2020-02-23 14:37:00'),
(21, 'banner-thit-heo-huu-co-2.jpg', 1, '<p><u><span style=\"font-size:16px\"><strong>CHẤT LƯỢNG THỊT LU&Ocirc;N ĐƯỢC ĐẢM BẢO</strong></span></u></p>', '2020-02-23 14:41:37', '2020-02-25 14:32:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyennhuoidung`
--

CREATE TABLE `quyennhuoidung` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quyennhuoidung_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyennhuoidung_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quytrinhbaoquankhomau`
--

CREATE TABLE `quytrinhbaoquankhomau` (
  `id` int(11) NOT NULL,
  `loaisanpham_id` int(10) NOT NULL,
  `quytrinhbaoquankhomau_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quytrinhbaoquankhomau_noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `loaikho_id` int(10) NOT NULL,
  `loaiquytrinhbaoquankhomau_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quytrinhsanxuatmau`
--

CREATE TABLE `quytrinhsanxuatmau` (
  `id` int(10) NOT NULL,
  `sanpham_id` int(10) NOT NULL,
  `quytrinhsanxuatmau_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `quytrinhsanxuatmau_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaiquytrinhsanxuatmau_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quytrinhsanxuatmau_tgbatdau` datetime DEFAULT NULL,
  `quytrinhsanxuatmau_tg_ketthuc` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(10) NOT NULL,
  `lohang_id` int(10) UNSIGNED NOT NULL,
  `sanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `gia_tien` int(10) UNSIGNED NOT NULL,
  `phan_tram_km` int(10) UNSIGNED DEFAULT NULL,
  `donvi_id` int(10) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `new` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `shop_id`, `lohang_id`, `sanpham_ten`, `sanpham_anh`, `sanpham_mo_ta`, `loaisanpham_id`, `donvitinh_id`, `gia_tien`, `phan_tram_km`, `donvi_id`, `active`, `new`, `created_at`, `updated_at`) VALUES
(2, 11, 22, 'Nấm mỡ', 'nam-mo.jpg', '<p><strong><em>Nấm mỡ</em>&nbsp; thường&nbsp;được sử dụng l&agrave;m &nbsp;thực phẩm trong bữa ăn h&agrave;ng ng&agrave;y,ngo&agrave;i ra&nbsp;<em>nấm mỡ</em>&nbsp;c&ograve;n l&agrave; vị thuốc gi&agrave;u c&ocirc;ng dụng trong y học.</strong></p>\r\n\r\n<p>Theo c&aacute;c t&agrave;i liệu y học cổ truyền,&nbsp;<em>nấm mỡ</em>&nbsp;vị ngọt, t&iacute;nh m&aacute;t, c&oacute; c&ocirc;ng dụng bổ tỳ &iacute;ch kh&iacute;, nhuận phế ho&aacute; đ&agrave;m, ti&ecirc;u thực l&yacute; kh&iacute;, rất th&iacute;ch hợp cho những người ch&aacute;n ăn mệt mỏi do tỳ vị hư yếu, sản phụ thiếu sữa, vi&ecirc;m phế quản mạn t&iacute;nh, vi&ecirc;m gan mạn t&iacute;nh, hội chứng suy giảm bạch cầu&hellip; S&aacute;ch Bản thảo cương mục viết&nbsp;<em>nấm mỡ</em>&nbsp;c&oacute; t&aacute;c dụng &ldquo;&iacute;ch tr&agrave;ng vị, ho&aacute; đ&agrave;m l&yacute; kh&iacute;&rdquo;.</p>\r\n\r\n<p>C&aacute;c nghi&ecirc;n cứu dinh dưỡng hiện đại th&igrave; khẳng định:&nbsp;<strong>nấm mỡ</strong>&nbsp;c&oacute; khả năng ức chế tụ cầu v&agrave;ng, trực khuẩn thương h&agrave;n v&agrave; trực khuẩn coli. Nhiều năm trở lại đ&acirc;y, người ta cũng đ&atilde; nhận thấy việc d&ugrave;ng nấm mỡ l&agrave;m thức ăn h&agrave;ng ng&agrave;y hoặc thường xuy&ecirc;n uống nước sắc loại nấm n&agrave;y khả năng trị liệu vi&ecirc;m gan mạn t&iacute;nh v&agrave; chứng giảm thiểu bạch cầu.&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra,&nbsp;<strong>nấm mỡ</strong>&nbsp;c&ograve;n c&oacute; c&ocirc;ng dụng l&agrave;m giảm đường m&aacute;u, hạ nồng độ cholesterol trong huyết thanh v&agrave; cải thiện chức năng tuyến tuỵ. Bởi vậy, nấm mỡ được đ&aacute;nh gi&aacute; l&agrave; một trong những thực phẩm th&iacute;ch hợp d&agrave;nh cho người bị bệnh tim mạch, đ&aacute;i đường, ung thư hay mắc c&aacute;c bệnh l&yacute; về tuyến tuỵ.</p>\r\n', 2, 1, 25000, 15, 0, 1, 1, '2020-05-13 04:24:36', '2020-05-20 03:15:05'),
(3, 11, 5, 'Nấm kim châm', 'mon-ngon-tu-nam-kim-cham.jpg', '<p>Nấm kim ch&acirc;m</p>\r\n', 2, 1, 35000, 10, 0, 1, 1, '2020-05-13 04:25:31', '2020-05-20 03:15:11'),
(4, 11, 12, 'Quả Cherry Mỹ', 'product-2.jpg', '<p>1.Xuất sứ :</p>\r\n\r\n<p>-<strong>Quả Cherry Mỹ</strong>&nbsp;được canh t&aacute;c chủ yếu ở v&ugrave;ng&nbsp;Bakerfield, Arvin, Lodi, Stockton v&agrave; Linden nơi kh&iacute; hậu ấm &aacute;p,kh&ocirc; n&oacute;ng , th&iacute;ch hợp để c&acirc;y cherry ph&aacute;t triển ,quả cherry ở đ&acirc;y được tắm no nắng n&ecirc;n ngọt đậm đ&agrave;,hương quyến rũ.</p>\r\n\r\n<p>-<strong>Tr&aacute;i Cherry</strong>&nbsp;căng mọng đẹp mắt l&agrave; loại&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-nhap-khau-b1566500.html\" target=\"_blank\"><strong>hoa quả nhập khẩu</strong></a>&nbsp;đắt tiền n&ecirc;n&nbsp;thường được sử dụng l&agrave;m qu&agrave; biếu.</p>\r\n\r\n<p>2.Đặc điểm :</p>\r\n\r\n<p>-<strong>Cherry</strong>&nbsp;l&agrave; một chủng lo&agrave;i c&acirc;y rụng l&aacute;,th&acirc;n gỗ ,c&acirc;y l&ugrave;n ,t&aacute;n rậm.N&oacute; được trồng chủ yếu ở v&ugrave;ng &ocirc;n đới,cần khoảng 200-1500 giờ ngủ đ&ocirc;ng,tuy nhi&ecirc;n quả cherry lại rất cần tắm no nắng để đạt được m&agrave;u sắc ,cũng như hương vị ho&agrave;n hảo.</p>\r\n\r\n<p>-<strong>Tr&aacute;i&nbsp;cherry</strong>&nbsp;được đ&aacute;nh gi&aacute; l&agrave; kh&oacute; trồng,gi&aacute; cũng v&igrave; thế m&agrave; chẳng hề dễ chịu.Theo&nbsp;nhiều chuy&ecirc;n gia th&igrave; quả&nbsp;cherry Mỹ cho chất lượng tốt nhất từ m&agrave;u sắc,hương vị tới gi&aacute; trị dinh dưỡng.</p>\r\n\r\n<p>-Th&ocirc;ng thường m&ugrave;a thu hoạch cherry l&agrave; từ th&aacute;ng 5-&gt; 8 .Do th&acirc;n c&acirc;y thấp&nbsp;n&ecirc;n nhiều nơi ở Mỹ mở dịch vụ cho trải nghiệm h&aacute;i v&agrave; ăn cherry tại vườn.Những quả cherry Mỹ tươi ngon,an to&agrave;n quả thực qu&aacute; hấp dẫn.</p>\r\n\r\n<p>-<strong>Quả cherry Mỹ</strong>&nbsp;da l&aacute;ng b&oacute;ng,thịt chắc,m&agrave;u v&agrave;ng đỏ tươi,khi ch&iacute;n ngả m&agrave;u t&iacute;m t&iacute;a rất đẹp.Thịt cherry&nbsp;mọng,&oacute;ng ả như ngọc b&iacute;ch&nbsp;,ăn gi&ograve;n ngọt, đậm đ&agrave;,hương thơm dịu nhẹ thư th&aacute;i,hạt r&oacute;c kh&ocirc;ng d&iacute;nh.</p>\r\n\r\n<p>3.C&ocirc;ng Dụng:</p>\r\n\r\n<p>-<strong>Quả cherry</strong>&nbsp;rất nhiều năng lượng lấy từ calo tự nhi&ecirc;n gi&uacute;p t&acirc;m trạng vui vẻ,hưng phấn.</p>\r\n\r\n<p>-Ăn cherry thường xuy&ecirc;n cải thiện t&igrave;nh trạng mất ngủ.Quả cherry chứa melatonin l&agrave;m cho giấc ngủ s&acirc;u v&agrave; ngon hơn lại kh&ocirc;ng hại sức khỏe như nhiều loại thuốc.</p>\r\n\r\n<p>-H&agrave;m lượng vitamin A c&oacute; trong tr&aacute;i cherry được t&iacute;nh to&aacute;n l&agrave; cao gấp 20 lần so với d&acirc;u t&acirc;y hay việt quất.Kh&ocirc;ng chỉ tốt cho mắt ăn quả&nbsp;cherry Mỹ&nbsp;h&agrave;ng ng&agrave;y c&ograve;n l&agrave;m l&agrave;n da s&aacute;ng mịn,căng tr&agrave;n nhựa sống</p>\r\n\r\n<p>-Quả cherry rất gi&agrave;u chất chống oxi h&oacute;a mạnh anthocyanins&nbsp;kh&ocirc;ng cải thiện t&igrave;nh trạng mất tr&iacute; nhớ,c&ograve;n ngăn ngừa ung thư , l&agrave;m chậm l&atilde;o h&oacute;a,nếp nhăn v&igrave; thế m&agrave; l&acirc;u xuất hiện</p>\r\n\r\n<p>-<strong>Tr&aacute;i cherry</strong>&nbsp;c&ograve;n v&ocirc; c&ugrave;ng tốt cho tim mạch, giảm vi&ecirc;m nhiễm xương khớp, đau nhức cơ n&ecirc;n được nhiều vận động vi&ecirc;n ưa chuộng.Lượng chất sơ dồi d&agrave;o trong quả cherry hỗ trợ tốt cho ti&ecirc;u h&oacute;a.</p>\r\n\r\n<p>-Kali c&oacute; trong cherry tuy kh&ocirc;ng nhiều như chuối hay việt quất tuy nhi&ecirc;n cũng hạn chế tối đa hiện tượng chuột r&uacute;t,v&agrave; tất nhi&ecirc;n nhiều người vẫn th&iacute;ch ăn quả cherry Mỹ thay v&igrave; chuối.</p>\r\n', 7, 2, 50000, 15, 0, 1, 1, '2020-05-16 02:54:48', '2020-05-20 03:15:18'),
(5, 10, 2, 'Nho xanh Nam Phi', 'download (22).jpg', '<p>nho nhập khẩu đản bảo ngu&ocirc;n gốc sản phẩm</p>', 8, 1, 30000, 20, 0, 1, 1, '2020-05-16 03:23:00', '2020-03-14 02:39:53'),
(7, 10, 2, 'Nấm bào ngư trắng', 'download (23).jpg', '<p>Theo c&aacute;c nh&agrave; khoa học trong nấm&nbsp;<a href=\"http://toiyeunamviet.com/\">B&agrave;o ngư trắng</a>&nbsp;n&oacute;i chung cũng như c&aacute;c loại nấm S&ograve; tươi n&oacute;i ri&ecirc;ng c&oacute; chất plutorin c&oacute; c&ocirc;ng hiệu kh&aacute;ng khuẩn gram dương v&agrave; kh&aacute;ng cả tế b&agrave;o ung thư&hellip;C&aacute;c nghi&ecirc;n cứu kh&aacute;c về nấm c&oacute; t&aacute;c dụng l&agrave;m giảm thiểu đối với cholesterol v&agrave; đường m&aacute;u</p>\r\n\r\n<p>Đối với Đ&ocirc;ng y, Nấm c&oacute; vị ngọt, t&iacute;nh ấm, c&ocirc;ng năng t&aacute;n h&agrave;n v&agrave; thư c&acirc;n, c&oacute; khả năng ph&ograve;ng v&agrave; chữa c&aacute;c bệnh như l&agrave;m hạ huyết &aacute;p, chống b&eacute;o ph&igrave;, chữa bệnh đường ruột, tẩy m&aacute;u xấu, l&agrave;m giảm cholesterol trong m&aacute;u, hỗ trợ người bị bệnh g&uacute;t trong chế độ dinh dưỡng.</p>\r\n\r\n<p>Đặc biệt l&agrave; đ&atilde; c&oacute; một số c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu c&ograve;n cho rằng&nbsp;<a href=\"http://toiyeunamviet.com/index.php/nam-va-suc-khoe/item/2-chiet-xuat-tu-nam-bao-ngu-tri-ung-thu-dai-trang\">Nấm S&ograve; c&oacute; khả năng chống bệnh ung thư.</a></p>\r\n\r\n<p><strong>Gi&aacute; trị dinh dưỡng:</strong></p>\r\n\r\n<p>Nấm B&agrave;o ngư trắng c&oacute; rất nhiều gi&aacute; trị dinh dưỡng, chứa nhiều protein, vi-ta-min v&agrave; c&aacute;c a-x&iacute;t a-min c&oacute; nguồn gốc thực vật, dễ hấp thụ bởi cơ thể con người. Đặc biệt với h&agrave;m lượng protein chiếm tới 33 &ndash; 43%, nấm B&agrave;o ngư trắng ho&agrave;n to&agrave;n c&oacute; thể thay thế lượng đạm từ thịt, c&aacute;&hellip; Do đ&oacute;, nấm B&agrave;o ngư trắng c&ograve;n được gọi l&agrave; &ldquo;thịt chay&rdquo;, &ldquo;thịt sạch&rdquo; khi được sử dụng như nguồn cung cấp protein chủ yếu qua c&aacute;c bữa ăn.</p>\r\n\r\n<p>Đối với người suy nhược cơ thể, c&aacute;c m&oacute;n ăn chế biến từ nấm gi&uacute;p phục hồi sinh lực nhanh ch&oacute;ng.</p>', 2, 1, 25000, 10, 0, 1, 1, '2020-05-17 02:57:07', '2020-03-11 07:07:38'),
(8, 10, 12, 'Dâu tây Đà Lạt', 'category-2.jpg', '<p>1.Xuất xứ :</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y</strong>&nbsp;(t&ecirc;n&nbsp;khoa học: Fragaria) l&agrave;&nbsp;lo&agrave;i thực vật&nbsp;thuộc họ Hoa hồng (Rosaceae) cho quả được nhiều người ưa chuộng. D&acirc;u t&acirc;y c&oacute; nguồn g&oacute;c ở&nbsp;ch&acirc;u Mỹ v&agrave; được c&aacute;c nh&agrave; l&agrave;m vườn ch&acirc;u &Acirc;u cho lai tạo v&agrave;o thế kỷ 18 để tạo n&ecirc;n giống d&acirc;u t&acirc;y được trồng rộng r&atilde;i hiện nay.&nbsp;</p>\r\n\r\n<p>-Ở Việt Nam m&ocirc;i trường trồng được d&acirc;u t&acirc;y chỉ c&oacute; Sapa v&agrave; Đ&agrave; Lạt,trong đ&oacute; sản phẩm d&acirc;u t&acirc;y Đ&agrave; Lạt nổi bật hơn hẳn,chiếm lĩnh thị trường từ Nam ra Bắc.</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp;được trồng theo c&ocirc;ng nghệ thủy canh:</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng thuốc diệt cỏ.</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng chất k&iacute;ch th&iacute;ch.</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng chất bảo quản</p>\r\n\r\n<p>2.Đặc điểm:</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y</strong>&nbsp;c&oacute; hơn 20 lo&agrave;i,nhưng chủ yếu l&agrave; d&acirc;u t&acirc;y đỏ,khi ch&iacute;n c&oacute; m&agrave;u phớt hồng đẹp mắt,vỏ mỏng ( gần như kh&ocirc;ng đ&aacute;ng kể ) c&ugrave;i thịt d&agrave;y,mọng nước,hạt nhỏ như hạt vừng c&oacute; thể ăn được.M&ugrave;i hương thơm m&aacute;t,dịu nhẹ nhưng cuốn h&uacute;t.</p>\r\n\r\n<p>-D&acirc;u t&acirc;y Đ&agrave; Lạt&nbsp;th&iacute;ch hợp với loại đất thịt nhẹ, h&agrave;m lượng chất hữu cơ cao, đất giữ ẩm nhưng tho&aacute;t nước tốt&nbsp;&nbsp;độ pH từ 6-7.</p>\r\n\r\n<p>-Kh&iacute; hậu &ocirc;n đới&nbsp;th&iacute;ch hợp cho c&acirc;y&nbsp;<strong>d&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp; sinh trưởng v&agrave; ph&aacute;t triển với nhiệt độ&nbsp;từ 18 - 25&deg;C v&agrave;&nbsp;tốt nhất n&ecirc;n&nbsp;trồng ở nơi n&agrave;o chỉ c&oacute; nắng trực tiếp&nbsp;nửa ng&agrave;y. V&igrave; thế d&acirc;u t&acirc;y rất được ưa chuộng trồng trong trậu treo để ban c&ocirc;ng.</p>\r\n\r\n<p>3.C&ocirc;ng dụng:D&ugrave; sử dụng dưới bất k&igrave; h&igrave;nh thức n&agrave;o th&igrave;&nbsp;<strong>d&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp;vẫn mang lại những lợi &iacute;ch kh&ocirc;ng ngờ cho sức khỏe:</p>\r\n\r\n<p>-D&acirc;u t&acirc;y l&agrave; nguồn cung cấp vitamin C cực k&igrave; dồi d&agrave;o 3 quả d&acirc;u tay chứa 52mg Vitamin C đ&aacute;p ứng 1/2 nhu cầu cơ thể trong ng&agrave;y vừa chống oxi h&oacute;a tốt lại tăng cường hệ miễn dịch,ngăn ngừa bệnh đục thủy tinh thể,bảo vệ mắt ,ngăn ngừa nếp nhăn , l&agrave;n da tươi trẻ</p>\r\n\r\n<p>-Trong d&acirc;u t&acirc;y Đ&agrave; Lạt c&ograve;n chứa nhiều&nbsp;Axit ellagic - một chất h&oacute;a học thi&ecirc;n nhi&ecirc;n&nbsp;đ&atilde; được chứng minh l&agrave; c&oacute; c&ocirc;ng dụng chống ung thư bằng c&aacute;ch chế ngự sự ph&aacute;t triển c&aacute;c tế b&agrave;o ung thư.</p>\r\n\r\n<p>-Theo nghi&ecirc;n cứu&nbsp;Axit ellagic v&agrave; c&aacute;c flavonoid c&oacute; trong d&acirc;u t&acirc;y l&agrave;m giảm lượng&nbsp;cholesterol c&oacute; hại,ngăn ngừa nguy cơ đột quỵ.Ngo&agrave;i ra kali c&oacute; trong d&acirc;u t&acirc;y gi&uacute;p điều h&ograve;a huyết &aacute;p,ổn định nhịp tim.</p>\r\n\r\n<p>-Lượng chất sơ c&oacute; trong d&acirc;u t&acirc;y Đ&agrave; Lạt vừa hỗ trợ ti&ecirc;u h&oacute;a lại c&oacute; t&aacute;c dụng giảm c&acirc;n r&otilde; rệt.3 quả d&acirc;u chỉ chứa 28kcal,kh&ocirc;ng chất b&eacute;o,lượng đường thấp,natri kh&ocirc;ng đ&aacute;ng kể.</p>\r\n', 8, 2, 30000, 10, 0, 1, 1, '2020-05-17 03:16:54', '2020-05-20 09:55:04'),
(9, 10, 8, 'Gầu Bò Mỹ1', 'download (4).jpg', '<p><em><strong>G&acirc;̀u bò Mỹ</strong></em>&nbsp;là ph&acirc;̀n thịt từ ngực đ&ecirc;́n c&ocirc;̉ dưới, có nhi&ecirc;̀u ph&acirc;̀n mỡ nhưng nạc hơn ph&acirc;̀n thịt ba chỉ ở ph&acirc;̀n bụng dưới.&nbsp;<em>G&acirc;̀u bò</em>&nbsp;là ph&acirc;̀n cơ hoạt đ&ocirc;̣ng chính của con bò, n&ecirc;n có nhi&ecirc;̀u g&acirc;n và dai hơn các ph&acirc;̀n thịt khác. đ&acirc;y l&agrave; phần thịt chủ yếu c&oacute; ở yếm của con b&ograve; v&agrave; 1 phần ở u vai b&ograve;, c&ograve;n ở những chỗ kh&aacute;c th&igrave; kh&ocirc;ng đ&aacute;ng kể, &nbsp;1 con b&ograve; chỉ c&oacute; khoảng 3 - 4kg thịt gầu. Gầu b&ograve; Mỹ c&oacute; xen mỡ nhưng ăn gi&ograve;n v&agrave; kh&ocirc;ng ngấy. Đặc biệt khi nh&uacute;ng lẩu hoặc l&agrave;m phở&nbsp;<strong><em>gầu b&ograve;</em></strong>&nbsp;hơi rộp như b&aacute;nh đa nướng.</p>\r\n\r\n<p><em><strong>Gầu B&ograve; mỹ</strong></em>&nbsp;th&aacute;i l&aacute;t, th&iacute;ch hợp sử dụng cho c&aacute;c m&oacute;n lẩu, m&oacute;n x&agrave;o, m&oacute;n phở v&agrave; nướng.</p>\r\n', 1, 2, 40000, 5, 0, 1, 1, '2020-05-17 03:21:21', '2020-05-17 04:27:12'),
(11, 11, 3, 'Ngọn su su', 'product-3.JPG', '<p><strong><em>Ngọn su su</em></strong>&nbsp;ban đầu chỉ l&agrave; thức&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\"><strong><em>rau sạch</em></strong>&nbsp;</a>ăn hằng ng&agrave;y của người d&acirc;n Tam Đảo,sau trở th&agrave;nh đặc sản đại diện cho v&ugrave;ng đất tươi đẹp n&agrave;y.Lần n&agrave;o l&ecirc;n Tam Đảo (Vĩnh Ph&uacute;c) m&agrave; kh&ocirc;ng mang v&agrave;i c&acirc;n&nbsp;<em>ngọn su su&nbsp;</em>về l&agrave; t&ocirc;i thấy tiếc nuối.Một đĩa&nbsp;<em>ngọn su su</em>&nbsp;x&agrave;o tỏi&nbsp;n&oacute;ng hổi ăn trong&nbsp;tiết trời se lạnh của Tam Đảo qu&aacute; l&agrave; m&ecirc; ly.Với những người th&iacute;ch sự đơn giản,<strong><em>ngọn su su</em></strong>&nbsp;luộc chấm nước mắm ngon cũng đ&atilde; rất tuyệt vời.</p>\r\n\r\n<p>Người ta bảo, ẩm thực Tam Đảo nổi tiếng với m&oacute;n thịt b&ograve; x&agrave;o tỏi thơm lừng hay thịt g&agrave; đồi luộc nhưng bản th&acirc;n&nbsp;t&ocirc;i lại thấy&nbsp;<strong><em>ngọn&nbsp;su su</em></strong>&nbsp;mới thực l&agrave; đặc sản của đất n&agrave;y</p>\r\n\r\n<p><strong><em>Ngọn&nbsp;su su</em></strong>&nbsp;Tam Đảo giờ đ&atilde; c&oacute; mặt tại H&agrave; Nội, trong c&aacute;c phi&ecirc;n chợ, si&ecirc;u thị. Nhưng tươi ngon nhất vẫn l&agrave; mua ngay tại chợ Tam Đảo buổi s&aacute;ng v&agrave; mang về những t&uacute;i to t&uacute;i nhỏ cho cả nh&agrave;. Đến Tam Đảo, vừa được đi chơi vừa c&oacute; qu&agrave; ngon mang về</p>\r\n\r\n<p>Vị gi&ograve;n ngọt của&nbsp;<em><strong>ngọn su su</strong></em>&nbsp;sẽ khiến bữa cơm gia đ&igrave;nh th&ecirc;m hấp dẫn. C&aacute;c m&oacute;n hấp dẫn l&agrave;m từ ngọn su su như ngọn su su x&agrave;o t&ocirc;m lột vỏ, ngọn su su x&agrave;o l&ograve;ng g&agrave;, ngọn su su x&agrave;o thịt b&ograve;, ngọn su su x&agrave;o tỏi.</p>\r\n\r\n<p><strong>Ngọn su su</strong>&nbsp;hợp nhất l&agrave; x&agrave;o tỏi chứ kh&ocirc;ng mấy khi luộc hoặc nấu canh. Chỉ đơn giản ra gi&agrave;n su su v&agrave; chọn cắt v&agrave;i đọt su su ở nh&aacute;nh l&aacute; thứ hai kể từ ngọn v&igrave; đ&oacute; l&agrave; phần mềm v&agrave; ngọt nhất. Sau đ&oacute;, tước bỏ lớp xơ b&ecirc;n ngo&agrave;i v&agrave; bẻ th&agrave;nh những đoạn ngắn rồi rửa sạch v&agrave; để r&aacute;o nước. Khi chế biến, trước ti&ecirc;n cho một &iacute;t dầu ăn v&agrave;o chảo, sau đ&oacute; đập một t&eacute;p tỏi thả v&agrave;o dầu cho ch&iacute;n v&agrave;ng v&agrave; bắt đầu thả&nbsp;<em><strong>ngọn su su</strong></em>đ&atilde; cắt ngắn v&agrave;o, đổ th&ecirc;m một &iacute;t nước v&agrave; n&ecirc;m cho vừa ăn. Khi rau vừa ch&iacute;n tới, gi&atilde; th&ecirc;m một &iacute;t tỏi trộn v&agrave;o rồi cho ra đĩa, d&ugrave;ng n&oacute;ng.<strong>Ngọn su su</strong>&nbsp;x&agrave;o tỏi thơm ngon nhờ sự h&ograve;a quyện đậm đ&agrave; giữa c&aacute;i gi&ograve;n gi&ograve;n, b&ugrave;i b&ugrave;i của phần đọt v&agrave; c&aacute;i mềm mềm, ngọt thanh của phần l&aacute; c&ograve;n s&oacute;t lại. C&oacute; lẽ v&igrave; thế m&agrave; lần đầu nếm thử m&oacute;n ăn d&acirc;n d&atilde; nơi v&ugrave;ng đất rẻo cao T&acirc;y Bắc n&agrave;y, những du kh&aacute;ch&nbsp;chỉ c&ograve;n biết tấm tắc, h&iacute;t h&agrave;&hellip;</p>\r\n\r\n<p>Nếu anh chị kh&ocirc;ng c&oacute; thời gian,h&atilde;y đến với CleverFood để mua được&nbsp;<strong>ngọn su su</strong>&nbsp;tươi ngon nhất H&agrave; Nội n&agrave;y.</p>\r\n', 4, 2, 20000, 10, 0, 1, 1, '2020-05-24 08:03:26', '2016-05-24 08:03:26'),
(12, 10, 3, 'Rau ngót rừng', 'bg_3.jpg', '<p>Đầu ti&ecirc;n xin đ&iacute;nh ch&iacute;nh với c&aacute;c chị lu&ocirc;n,rau ng&oacute;t nh&agrave; em kh&ocirc;ng phải loại rau sắng nổi tiếng của ch&ugrave;a Hương.Rau của nh&agrave; em l&agrave; rau ng&oacute;t giống thường được trồng tr&ecirc;n v&ugrave;ng n&uacute;i nơi kh&iacute; hậu trong l&agrave;nh sạch sẽ.Rau sạch 100% đấy&nbsp;ạ.</p>\r\n\r\n<p><strong><em>Rau ng&oacute;t rừng</em></strong>&nbsp;vốn được đồng b&agrave;o miền n&uacute;i d&ugrave;ng như một loại&nbsp;thực phẩm sạch&nbsp;trong bữa ăn hằng ng&agrave;y.Nhờ thời tiết kh&iacute; hậu &ocirc;n h&ograve;a,rau ng&oacute;t rừng ph&aacute;t triển rất mạnh.C&acirc;y to,l&aacute; d&agrave;y hơn rau&nbsp;<em>ng&oacute;t hữu cơ</em>,nước canh s&aacute;nh hơn,vị đậm đ&agrave; hơn.</p>\r\n\r\n<p>Bản th&acirc;n thức rau n&agrave;y rất sạch,&iacute;t s&acirc;u bọ,&iacute;t cần chăm b&oacute;n, rau an to&agrave;n&nbsp;cho mẹ,cho b&eacute;.</p>\r\n\r\n<p>Nếu&nbsp;muốn sử dụng loại rau&nbsp;n&agrave;y c&aacute;c bạn n&ecirc;n tới những cửa hạng rau sạch&nbsp;uy t&iacute;n ở Cần Thơ.H&atilde;y bảo vệ sự an to&agrave;n của bản th&acirc;n v&agrave; gia đ&igrave;nh bằng c&aacute;ch sử dụng c&aacute;c loại&nbsp;<strong><em>thực phẩm sạch.</em></strong></p>\r\n', 4, 2, 10000, 0, 0, 1, 1, '2020-05-24 08:22:55', '2020-05-24 08:26:07'),
(26, 10, 2, 'Nho xanh Nam Phi', 'download (22).jpg', '<p>nho nhập khẩu đản bảo ngu&ocirc;n gốc sản phẩm</p>', 8, 1, 30000, 20, 0, 1, 1, '2020-02-26 15:02:04', '2020-03-14 02:39:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenshop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shop_mo_ta` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1 COMMENT 'active',
  `created_ad` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`id`, `image_name`, `tenshop`, `dia_chi`, `sdt`, `email`, `shop_mo_ta`, `user_id`, `active`, `created_ad`, `updated_at`) VALUES
(10, '01', 'davu store', '159 thon 2', '0941934041', 'thienthanma521@gmail.com', '<p>chuyen rau cu</p>', 54, 1, NULL, NULL),
(11, '02', 'tiny shop', '567 le duan', '0978256681', 'thienthanma520@gmail.com', '<p>trai cay nhiet doi</p>', 52, 1, NULL, NULL),
(12, '03', 'rau store', '225 le duan', '0947954041', 'thienthanma5211@gmail.com', '<p>rau sach</p>', 55, 1, NULL, NULL),
(14, '04', 'dv strore', '159 thon2', '0379185688', 'davu20121996@gmail.com', '<p>rau</p>', 56, 1, NULL, NULL),
(15, '2', 'vu nhom', '159', 'aaaaaaa', 'thienthanma521@gmail.com', '<p>aaaaaa</p>', 59, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `shop_bienlai`
-- (See below for the actual view)
--
CREATE TABLE `shop_bienlai` (
`ctdhid` int(10) unsigned
,`dhid` int(10) unsigned
,`khachhang_id` int(10) unsigned
,`sanpham_id` int(10) unsigned
,`shop_id` int(10)
,`donhang_ghi_chu` longtext
,`sanpham_ten` varchar(255)
,`sanpham_anh` varchar(255)
,`chitietdonhang_so_luong` int(11)
,`chitietdonhang_thanh_tien` int(10)
,`khachhang_ten` varchar(100)
,`khachhang_email` varchar(255)
,`khachhang_sdt` varchar(12)
,`khachhang_dia_chi` varchar(200)
,`user_id` int(10) unsigned
,`donhang_tong_tien` int(10)
,`tinhtranghd_id` int(10) unsigned
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `shop_hoadon`
-- (See below for the actual view)
--
CREATE TABLE `shop_hoadon` (
`id` int(10) unsigned
,`user_id` int(10)
,`shop_id` int(10)
,`tenshop` varchar(255)
,`donhang_id` int(10) unsigned
,`khachhang_id` int(10) unsigned
,`donhang_nguoi_nhan` varchar(100)
,`donhang_nguoi_nhan_email` varchar(255)
,`donhang_nguoi_nhan_sdt` varchar(12)
,`donhang_nguoi_nhan_dia_chi` varchar(200)
,`chitietdonhang_so_luong` int(11)
,`chitietdonhang_thanh_tien` int(10)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `shop_khachhang`
-- (See below for the actual view)
--
CREATE TABLE `shop_khachhang` (
`id` int(10) unsigned
,`shop_id` int(10) unsigned
,`khachhang_ten` varchar(100)
,`khachhang_email` varchar(255)
,`khachhang_sdt` varchar(12)
,`khachhang_dia_chi` varchar(200)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `shop_sl`
-- (See below for the actual view)
--
CREATE TABLE `shop_sl` (
`id` int(10) unsigned
,`shop_id` int(10)
,`lohang_id` int(10) unsigned
,`sanpham_ten` varchar(255)
,`sanpham_anh` varchar(255)
,`sanpham_mo_ta` longtext
,`loaisanpham_id` int(10) unsigned
,`donvitinh_id` int(10) unsigned
,`gia_tien` int(10) unsigned
,`phan_tram_km` int(10) unsigned
,`active` int(1)
,`new` int(1)
,`lohang_so_luong_da_ban` int(11)
,`lohang_so_luong_hien_tai` int(11)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhlapweb`
--

CREATE TABLE `thanhlapweb` (
  `id` int(10) NOT NULL,
  `thanhlapweb_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thanhlapweb_anh` text COLLATE utf8_unicode_ci NOT NULL,
  `thanhlapweb_chucvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thanhlapweb_thongtin` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhlapweb`
--

INSERT INTO `thanhlapweb` (`id`, `thanhlapweb_ten`, `thanhlapweb_anh`, `thanhlapweb_chucvu`, `thanhlapweb_thongtin`) VALUES
(1, 'TRẦN HOÀI DẠ VŨ', '59963186_1253466131498904_4744722819399548928_n.jpg', 'LẬP TRÌNH VIÊN', 'Đang fa và thất nghiệp dài hạn nên không có gì đáng nói,cảm ơn mọi người đã ghé thăm trang web.'),
(2, 'Laravel', 'download (28).jpg', 'Ngôn ngữ làm web', 'Tất cả thông tin mong bạn vào trang web https://techmaster.vn/posts/34646/lap-trinh-laravel-cho-nguoi-moi-bat-dau chứ mình cũng không biết gì');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_chung_shop`
--

CREATE TABLE `thong_tin_chung_shop` (
  `shop_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `donhang_id` int(10) UNSIGNED DEFAULT NULL,
  `khachhang_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_chung_shop`
--

INSERT INTO `thong_tin_chung_shop` (`shop_id`, `user_id`, `donhang_id`, `khachhang_id`) VALUES
(11, 52, 216, 175),
(10, 52, 217, 175),
(11, 54, 218, 176),
(10, 54, 219, 176),
(10, 54, 220, 176),
(10, 54, 221, 178),
(10, 54, 222, 178),
(10, 54, 224, 180),
(10, 54, 225, 180),
(10, 54, 226, 181),
(10, 54, 227, 181),
(11, 54, 228, 182),
(11, 54, 229, 182),
(10, 54, 230, 182),
(11, 54, 231, 183),
(10, 54, 232, 183),
(10, 54, 233, 184),
(10, 54, 234, 184),
(10, 54, 236, 185),
(10, 54, 237, 185),
(10, 54, 239, 186),
(10, 54, 240, 186),
(11, 54, 241, 187),
(11, 54, 242, 187);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtranghd`
--

CREATE TABLE `tinhtranghd` (
  `id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtranghd_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtranghd`
--

INSERT INTO `tinhtranghd` (`id`, `tinhtranghd_ten`, `tinhtranghd_mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'Chưa xác nhận', NULL, NULL, NULL),
(2, 'Giao hàng', NULL, NULL, NULL),
(3, 'Đã hủy', NULL, NULL, NULL),
(4, 'Đã thanh toán', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(10) UNSIGNED NOT NULL,
  `tuyendung_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_lien_he` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_thoi_gian` int(11) NOT NULL,
  `tuyendung_tinh_trang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyendung`
--

INSERT INTO `tuyendung` (`id`, `tuyendung_tieu_de`, `tuyendung_url`, `tuyendung_anh`, `tuyendung_mo_ta`, `tuyendung_lien_he`, `tuyendung_thoi_gian`, `tuyendung_tinh_trang`, `created_at`, `updated_at`) VALUES
(2, 'tuyen dung', 'tuyen-dung', 'img20160511232640735.jpg', '<p>a</p>\r\n', '<p>c</p>\r\n', 12, 0, '2016-05-17 01:46:12', '2016-05-17 01:46:12'),
(3, 'Tuyền nhân viên giao hàng', 'tuyen-nhan-vien-giao-hang', 'img20160511232640735.jpg', 'Tuyền nhân viên giao hàng', 'Tuyền nhân viên giao hàng', 15, 0, '2016-05-31 17:00:00', '2016-05-31 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mo_shop` int(1) NOT NULL DEFAULT 0 COMMENT 'no shop',
  `sodienthoai` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loainguoidung_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `diachi`, `mo_shop`, `sodienthoai`, `password`, `provider`, `google_id`, `provider_id`, `loainguoidung_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(49, NULL, 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', NULL, 0, NULL, '25f9e794323b453885f5181f1b624d0b', 'github', NULL, '103099ac86ba062a6dd257f60440b4bf', 1, NULL, '2020-02-20 13:50:17', '2020-02-20 13:50:17'),
(51, 'image_3.jpg', 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', '225 ngo duc ke bmt', 0, '0941949559', NULL, 'github', NULL, '52185531', 1, NULL, '2020-02-22 02:30:56', '2020-03-16 15:41:47'),
(52, NULL, 'Trần Hoài Dạ Vũ', 'thienthanma521@gmail.com', NULL, 1, NULL, '25f9e794323b453885f5181f1b624d0b', 'facebook', NULL, '1486325684879613', 1, NULL, '2020-02-23 01:30:01', '2020-02-23 01:30:01'),
(54, 'bg_3.jpg', 'trần hoài dạ vũ', 'admin@gmail.com', '159 thôn 2', 1, '0947934041', '$2y$10$JA4epEo0XQe.0364LvrpIeYHXiT7PXwKTPegxwK5JK6pdvCAh5WoO', NULL, NULL, NULL, 2, 'nzc5Y6gUQBIZZnyQMxSkLznZIViMYRG72Fzgp2pwvKMRzlRjCTwvk7YMSU3G', '2020-02-24 07:38:45', '2020-03-17 01:12:02'),
(55, NULL, 'davu', 'min@gmail.com', '1', 1, '1', '$2y$10$1Tiy.S0NZvfdWc0laynIs.Nd6OpXzGCACNeeM0xndZFfhyzHJBzQm', NULL, NULL, NULL, 1, 'GIRtGW16kgm1dAZqCXJPA6E7JdeiNHgWmNl4nKx4MRIbCQryiWGRyKVh38Hr', '2020-02-25 14:45:07', '2020-02-25 14:45:07'),
(56, NULL, 'da vu', 'davu20121996@gmail.com', '159 thon 2', 1, '0379185688', '$2y$10$t.hZuDn/h2q1hQjixR3AyOgqx7LZJkv1q30wJaumc78P6FeiLJuoq', NULL, NULL, NULL, 1, '6dQ7EH0XmJCI8nh2kGrvjpylnXXd68ifwZjtU0dpErGmrtrtM4THLIWDAxJ6', '2020-02-27 00:23:30', '2020-02-27 00:23:30'),
(57, NULL, 'Dai Hanh Le', NULL, NULL, 0, NULL, '25f9e794323b453885f5181f1b624d0b', 'facebook', NULL, '276430149993854', 1, NULL, '2020-02-27 07:15:10', '2020-02-27 07:15:10'),
(58, NULL, 'the son', 'thienthanma520@gmail.com', '225 le duan', 0, '0941424344', '$2y$10$..5igtmj6XiawZB3jqHeIesyjZbCuYnt9P3LbZYRm7nR9wzWxEq/e', NULL, NULL, NULL, 1, 'oXcnljrYRaz9dgv8UFjm7BcI8dTDN76YSmXA2hEc01eRr2Pu9Me0fRgc239K', '2020-03-05 00:40:12', '2020-03-05 00:40:12'),
(59, 'bg_3jpg', 'Dạ Vũ Hoài Trần', 'thienthanma55@gmail.com', '159 thon 12', 1, '0379185688', NULL, 'facebook', NULL, '633038537261147', 1, NULL, '2020-03-14 04:05:22', '2020-03-16 09:49:09'),
(71, NULL, 'k16 Englishclup - TNU', 'thienthanma521@gmail.com', NULL, 0, NULL, NULL, NULL, '110112411308554761650', NULL, 1, NULL, '2020-03-24 14:10:10', '2020-03-24 14:10:10'),
(72, NULL, 'Dạ Vũ Hoài Trần', NULL, NULL, 0, NULL, NULL, 'facebook', NULL, '640016366563364', 1, NULL, '2020-03-24 14:28:52', '2020-03-24 14:28:52'),
(73, NULL, 'vu tran', 'thienthanma520@gmail.com', NULL, 0, NULL, NULL, NULL, '102618099674763750209', NULL, 1, NULL, '2020-03-27 07:39:14', '2020-03-27 07:39:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_activations`
--

CREATE TABLE `user_activations` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `dathangsp`
--
DROP TABLE IF EXISTS `dathangsp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dathangsp`  AS  select `b`.`id` AS `id`,`b`.`shop_id` AS `shop_id`,`b`.`donhang_nguoi_nhan` AS `donhang_nguoi_nhan`,`b`.`donhang_nguoi_nhan_email` AS `donhang_nguoi_nhan_email`,`b`.`donhang_nguoi_nhan_sdt` AS `donhang_nguoi_nhan_sdt`,`b`.`donhang_nguoi_nhan_dia_chi` AS `donhang_nguoi_nhan_dia_chi`,`c`.`chitietdonhang_thanh_tien` AS `chitietdonhang_thanh_tien`,`b`.`created_at` AS `created_at` from ((`thong_tin_chung_shop` `a` join `donhang` `b` on(`a`.`donhang_id` = `b`.`id`)) join `chitietdonhang` `c` on(`c`.`donhang_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `email`
--
DROP TABLE IF EXISTS `email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `email`  AS  select `a`.`id` AS `id`,`a`.`email` AS `email` from `users` `a` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `nhanvienshop`
--
DROP TABLE IF EXISTS `nhanvienshop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nhanvienshop`  AS  select `a`.`id` AS `id`,`a`.`image_name` AS `image_name`,`a`.`tenshop` AS `tenshop`,`a`.`user_id` AS `user_id`,`b`.`name` AS `name`,`a`.`dia_chi` AS `dia_chi`,`a`.`sdt` AS `sdt`,`a`.`email` AS `email`,`a`.`shop_mo_ta` AS `shop_mo_ta`,`a`.`active` AS `active` from (`shop` `a` join `users` `b` on(`a`.`user_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `shop_bienlai`
--
DROP TABLE IF EXISTS `shop_bienlai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_bienlai`  AS  select `d`.`id` AS `ctdhid`,`b`.`id` AS `dhid`,`c`.`id` AS `khachhang_id`,`d`.`sanpham_id` AS `sanpham_id`,`d`.`shop_id` AS `shop_id`,`b`.`donhang_ghi_chu` AS `donhang_ghi_chu`,`e`.`sanpham_ten` AS `sanpham_ten`,`d`.`sanpham_anh` AS `sanpham_anh`,`d`.`chitietdonhang_so_luong` AS `chitietdonhang_so_luong`,`d`.`chitietdonhang_thanh_tien` AS `chitietdonhang_thanh_tien`,`c`.`khachhang_ten` AS `khachhang_ten`,`c`.`khachhang_email` AS `khachhang_email`,`c`.`khachhang_sdt` AS `khachhang_sdt`,`c`.`khachhang_dia_chi` AS `khachhang_dia_chi`,`c`.`user_id` AS `user_id`,`b`.`donhang_tong_tien` AS `donhang_tong_tien`,`b`.`tinhtranghd_id` AS `tinhtranghd_id`,`b`.`created_at` AS `created_at` from ((((`thong_tin_chung_shop` `a` join `donhang` `b` on(`a`.`donhang_id` = `b`.`id`)) join `khachhang` `c` on(`c`.`id` = `a`.`khachhang_id`)) join `chitietdonhang` `d` on(`d`.`donhang_id` = `b`.`id`)) join `sanpham` `e` on(`d`.`sanpham_id` = `e`.`id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `shop_hoadon`
--
DROP TABLE IF EXISTS `shop_hoadon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_hoadon`  AS  select `e`.`id` AS `id`,`a`.`user_id` AS `user_id`,`b`.`shop_id` AS `shop_id`,`d`.`tenshop` AS `tenshop`,`a`.`donhang_id` AS `donhang_id`,`a`.`khachhang_id` AS `khachhang_id`,`b`.`donhang_nguoi_nhan` AS `donhang_nguoi_nhan`,`b`.`donhang_nguoi_nhan_email` AS `donhang_nguoi_nhan_email`,`b`.`donhang_nguoi_nhan_sdt` AS `donhang_nguoi_nhan_sdt`,`b`.`donhang_nguoi_nhan_dia_chi` AS `donhang_nguoi_nhan_dia_chi`,`e`.`chitietdonhang_so_luong` AS `chitietdonhang_so_luong`,`e`.`chitietdonhang_thanh_tien` AS `chitietdonhang_thanh_tien`,`b`.`created_at` AS `created_at` from ((((`thong_tin_chung_shop` `a` join `donhang` `b` on(`a`.`donhang_id` = `b`.`id`)) join `khachhang` `c` on(`a`.`khachhang_id` = `c`.`id`)) join `shop` `d` on(`a`.`shop_id` = `d`.`id`)) join `chitietdonhang` `e` on(`a`.`donhang_id` = `e`.`donhang_id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `shop_khachhang`
--
DROP TABLE IF EXISTS `shop_khachhang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_khachhang`  AS  select `b`.`id` AS `id`,`a`.`shop_id` AS `shop_id`,`b`.`khachhang_ten` AS `khachhang_ten`,`b`.`khachhang_email` AS `khachhang_email`,`b`.`khachhang_sdt` AS `khachhang_sdt`,`b`.`khachhang_dia_chi` AS `khachhang_dia_chi`,`b`.`created_at` AS `created_at` from (`thong_tin_chung_shop` `a` join `khachhang` `b` on(`a`.`khachhang_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `shop_sl`
--
DROP TABLE IF EXISTS `shop_sl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_sl`  AS  select `a`.`id` AS `id`,`a`.`shop_id` AS `shop_id`,`a`.`lohang_id` AS `lohang_id`,`a`.`sanpham_ten` AS `sanpham_ten`,`a`.`sanpham_anh` AS `sanpham_anh`,`a`.`sanpham_mo_ta` AS `sanpham_mo_ta`,`a`.`loaisanpham_id` AS `loaisanpham_id`,`a`.`donvitinh_id` AS `donvitinh_id`,`a`.`gia_tien` AS `gia_tien`,`a`.`phan_tram_km` AS `phan_tram_km`,`a`.`active` AS `active`,`a`.`new` AS `new`,`b`.`lohang_so_luong_da_ban` AS `lohang_so_luong_da_ban`,`b`.`lohang_so_luong_hien_tai` AS `lohang_so_luong_hien_tai`,`a`.`created_at` AS `created_at` from (`sanpham` `a` join `lohang` `b` on(`a`.`lohang_id` = `b`.`id`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sanpham_id_2` (`sanpham_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `chitietdonhang_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `chitietluukho`
--
ALTER TABLE `chitietluukho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kho_id` (`kho_id`),
  ADD KEY `chitietmatruyxuat_id` (`chitietmatruyxuat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietmatruyxuat`
--
ALTER TABLE `chitietmatruyxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `losanxuat_id` (`losanxuat_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `dovi_id` (`dovi_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `chitietnguyenlieusudung`
--
ALTER TABLE `chitietnguyenlieusudung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguenlieusanxuat_id` (`nguenlieusanxuat_id`),
  ADD KEY `losanxuat_id` (`losanxuat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietnhapkho`
--
ALTER TABLE `chitietnhapkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietmatruyxuat_id` (`chitietmatruyxuat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietnhapnguyenlieu`
--
ALTER TABLE `chitietnhapnguyenlieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguyenlieusanxuat_id` (`nguyenlieusanxuat_id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`);

--
-- Chỉ mục cho bảng `chitietquytrinhluukho`
--
ALTER TABLE `chitietquytrinhluukho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loaisanpham_id` (`loaisanpham_id`);

--
-- Chỉ mục cho bảng `chitietquytrinhsanxuat`
--
ALTER TABLE `chitietquytrinhsanxuat`
  ADD KEY `losanxuat_id` (`losanxuat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `chitietthuhoach`
--
ALTER TABLE `chitietthuhoach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `losanxuat_id` (`losanxuat_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`);

--
-- Chỉ mục cho bảng `chitietxuatkho`
--
ALTER TABLE `chitietxuatkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `kho_id` (`kho_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `diadiemsanxuat`
--
ALTER TABLE `diadiemsanxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_khachhang_id_foreign` (`khachhang_id`),
  ADD KEY `donhang_tinhtranghd_id_foreign` (`tinhtranghd_id`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvi_ten` (`donvi_ten`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhsanpham_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaikho_id` (`loaikho_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaikho`
--
ALTER TABLE `loaikho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaiquytrinhbaoquankhomau`
--
ALTER TABLE `loaiquytrinhbaoquankhomau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaikho_id` (`loaikho_id`),
  ADD KEY `loaisanpham_id` (`loaisanpham_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `loaiquytrinhmau`
--
ALTER TABLE `loaiquytrinhmau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loaisanpham_id` (`loaisanpham_id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lohang_nhacungcap_id_foreign` (`nhacungcap_id`);

--
-- Chỉ mục cho bảng `losanxuat`
--
ALTER TABLE `losanxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `monngon`
--
ALTER TABLE `monngon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD KEY `nguyenlieu_monngon_id_foreign` (`monngon_id`),
  ADD KEY `nguyenlieu_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `nguyenlieusanxuat`
--
ALTER TABLE `nguyenlieusanxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `kho_id` (`kho_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `donvixuat_id` (`donvixuat_id`);

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `donvitinh_id` (`donvitinh_id`),
  ADD KEY `donvi_id` (`donvi_id`),
  ADD KEY `donvixuat_id` (`donvixuat_id`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyennhuoidung`
--
ALTER TABLE `quyennhuoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `quytrinhbaoquankhomau`
--
ALTER TABLE `quytrinhbaoquankhomau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaikho_id` (`loaikho_id`),
  ADD KEY `loaiquytrinhbaoquankhomau_id` (`loaiquytrinhbaoquankhomau_id`),
  ADD KEY `loaisanpham_id` (`loaisanpham_id`);

--
-- Chỉ mục cho bảng `quytrinhsanxuatmau`
--
ALTER TABLE `quytrinhsanxuatmau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `loaiquytrinhsanxuatmau_id` (`loaiquytrinhsanxuatmau_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_loaisanpham_id_foreign` (`loaisanpham_id`),
  ADD KEY `sanpham_donvitinh_id_foreign` (`donvitinh_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `lohang_id` (`lohang_id`) USING BTREE,
  ADD KEY `donvi_id` (`donvi_id`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `thanhlapweb`
--
ALTER TABLE `thanhlapweb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_tin_chung_shop`
--
ALTER TABLE `thong_tin_chung_shop`
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_loainguoidung_id_foreign` (`loainguoidung_id`);

--
-- Chỉ mục cho bảng `user_activations`
--
ALTER TABLE `user_activations`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activation_code` (`activation_code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT cho bảng `chitietluukho`
--
ALTER TABLE `chitietluukho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietmatruyxuat`
--
ALTER TABLE `chitietmatruyxuat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietnguyenlieusudung`
--
ALTER TABLE `chitietnguyenlieusudung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietnhapkho`
--
ALTER TABLE `chitietnhapkho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietnhapnguyenlieu`
--
ALTER TABLE `chitietnhapnguyenlieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietquytrinhluukho`
--
ALTER TABLE `chitietquytrinhluukho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietthuhoach`
--
ALTER TABLE `chitietthuhoach`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietxuatkho`
--
ALTER TABLE `chitietxuatkho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diadiemsanxuat`
--
ALTER TABLE `diadiemsanxuat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loaikho`
--
ALTER TABLE `loaikho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaiquytrinhbaoquankhomau`
--
ALTER TABLE `loaiquytrinhbaoquankhomau`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaiquytrinhmau`
--
ALTER TABLE `loaiquytrinhmau`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `lohang`
--
ALTER TABLE `lohang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `losanxuat`
--
ALTER TABLE `losanxuat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `monngon`
--
ALTER TABLE `monngon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nguyenlieusanxuat`
--
ALTER TABLE `nguyenlieusanxuat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhom`
--
ALTER TABLE `nhom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieuxuatkho`
--
ALTER TABLE `phieuxuatkho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `quyennhuoidung`
--
ALTER TABLE `quyennhuoidung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quytrinhbaoquankhomau`
--
ALTER TABLE `quytrinhbaoquankhomau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quytrinhsanxuatmau`
--
ALTER TABLE `quytrinhsanxuatmau`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `thanhlapweb`
--
ALTER TABLE `thanhlapweb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_khachhang_id_foreign` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_tinhtranghd_id_foreign` FOREIGN KEY (`tinhtranghd_id`) REFERENCES `tinhtranghd` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `hinhsanpham_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD CONSTRAINT `lohang_nhacungcap_id_foreign` FOREIGN KEY (`nhacungcap_id`) REFERENCES `nhacungcap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD CONSTRAINT `nguyenlieu_monngon_id_foreign` FOREIGN KEY (`monngon_id`) REFERENCES `monngon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nguyenlieu_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_donvitinh_id_foreign` FOREIGN KEY (`donvitinh_id`) REFERENCES `donvitinh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_loaisanpham_id_foreign` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thong_tin_chung_shop`
--
ALTER TABLE `thong_tin_chung_shop`
  ADD CONSTRAINT `thong_tin_chung_shop_ibfk_5` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `thong_tin_chung_shop_ibfk_6` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_loainguoidung_id_foreign` FOREIGN KEY (`loainguoidung_id`) REFERENCES `loainguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_activations`
--
ALTER TABLE `user_activations`
  ADD CONSTRAINT `user_activations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
