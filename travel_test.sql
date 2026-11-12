-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 12, 2026 lúc 12:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travel_test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_cho`
--

CREATE TABLE `dat_cho` (
  `id` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `ten_KH` varchar(100) NOT NULL,
  `sdt_KH` int(11) NOT NULL,
  `so_nguoi` int(100) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tong_tien` decimal(15,0) NOT NULL,
  `trang_thai` enum('Đang xử lý/Chưa thanh toán','Đã xác nhận/Đã thanh toán','Đã huỷ') DEFAULT 'Đang xử lý/Chưa thanh toán',
  `thoi_gian_dat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dat_cho`
--

INSERT INTO `dat_cho` (`id`, `id_tour`, `ten_KH`, `sdt_KH`, `so_nguoi`, `ghi_chu`, `tong_tien`, `trang_thai`, `thoi_gian_dat`) VALUES
(84, 10, 'v', 123, 1, '', 80, 'Đã huỷ', '2026-07-02 03:10:46'),
(85, 1, 'kien', 123, 1, 'tets', 7780000, 'Đang xử lý/Chưa thanh toán', '2026-07-17 01:46:49'),
(87, 11, 'kien', 123456, 1, 'd', 600000, 'Đang xử lý/Chưa thanh toán', '2026-10-03 02:09:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int(11) NOT NULL,
  `ten_KH` varchar(100) DEFAULT NULL,
  `sdt_KH` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `noi_dung_tu_van` text DEFAULT NULL,
  `trang_thai` enum('Chờ gọi','Đã gọi') DEFAULT 'Chờ gọi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_he`
--

INSERT INTO `lien_he` (`id`, `ten_KH`, `sdt_KH`, `email`, `noi_dung_tu_van`, `trang_thai`) VALUES
(14, NULL, NULL, '671586@sv.vnua.edu.vn', NULL, 'Chờ gọi'),
(15, NULL, NULL, 'famicanxi@fm.com', NULL, 'Chờ gọi'),
(16, NULL, NULL, 'djf@gmail', NULL, 'Chờ gọi'),
(17, NULL, NULL, 'doquocvuong1113@gmail.com', NULL, 'Chờ gọi'),
(18, 'abc', 54322, NULL, 'xin thôngntin', 'Chờ gọi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `ten_tour` varchar(255) NOT NULL,
  `ngay_khoi_hanh` varchar(100) DEFAULT NULL,
  `thoi_gian_tour` varchar(100) DEFAULT NULL,
  `diem_xuat_phat` varchar(100) DEFAULT NULL,
  `lich_trinh` varchar(100) DEFAULT NULL,
  `phuong_tien` varchar(100) DEFAULT NULL,
  `gia_tien` decimal(15,0) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `gia_tien_moi` decimal(15,0) DEFAULT NULL,
  `tour_hot` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tours`
--

INSERT INTO `tours` (`id`, `ten_tour`, `ngay_khoi_hanh`, `thoi_gian_tour`, `diem_xuat_phat`, `lich_trinh`, `phuong_tien`, `gia_tien`, `hinh_anh`, `gia_tien_moi`, `tour_hot`) VALUES
(1, 'Tour Hà Nội', '2025-01-01', '5 ngày 4 đêm', 'Hà Nội', 'Hà Nội – Hà Giang – Sapa', 'Xe Du Lịch', 7990000, 'tour1.jpg', 7780000, 0),
(2, 'Tour TP.Hồ Chí Minh', '2025-01-01', '2 ngày 1 đêm', 'TP.Hồ Chí Minh', 'TP.Hồ Chí Minh - Phú Quốc', 'Máy Bay, Xe Du Lịch', 3580000, 'tour2.jpg', 3580000, 0),
(3, 'Tour Nha Trang', '2025-01-01', '3 ngày 2 đêm', 'Nha Trang', 'Nha Trang – Đà Nẵng – Huế', 'Xe Du Lịch', 5749000, 'tour3.jpg', 5749000, 0),
(4, 'Tour Tây Nguyên', '2025-01-01', '2 ngày 1 đêm', 'Lâm Đồng', 'Đà Lạt - Đắk Lắk', 'Xe Du Lịch', 2990000, 'tour4.jpg', 2990000, 0),
(6, 'Biển bạc', 'Thứ 4', '2 ngày 1 đêm', 'Khánh Hoà', 'Nha Trang', 'Xe du lịch', 3500000, 'bienbac.jpg', 3500000, 1),
(7, 'Rừng xanh', 'Thứ 6', '1 ngày 1 đêm', 'Ninh Bình', 'Rừng Cúc Phương', 'Xe du lịch', 2990000, 'rungxanh.jpg', 2990000, 1),
(8, 'Đảo ngọc', '9', '3 ngày 2 đêm', 'HCM', 'i', 'c', 1000000, 'daongoc.jpg', 2990000, 1),
(10, 'Nhà Thờ', NULL, '1 ngày', 'HN', 'ok', NULL, 900000, 'IMG_4536.jpeg', 800000, 0),
(11, 'Tu Viện', 'every day', '24/7', 'Hà Nội', 'ok', 'no', 500000, 'IMG_4460.jpeg', 600000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sdt_KH` int(11) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `sdt_KH`, `role`) VALUES
(15, 'kien', '123456', 123456, 'user'),
(17, 'vuong', '123', 123, 'admin'),
(18, 'kien2', '123456', 1234, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeu_cau_goi_lai`
--

CREATE TABLE `yeu_cau_goi_lai` (
  `id` int(11) NOT NULL,
  `sdt_KH` int(11) NOT NULL,
  `trang_thai` enum('Chờ gọi','Đã gọi') DEFAULT 'Chờ gọi',
  `thoi_gian_yeu_cau` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dat_cho`
--
ALTER TABLE `dat_cho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tour_dat_cho` (`id_tour`),
  ADD KEY `fk_sdt_KH_dat_cho` (`sdt_KH`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `sdt_KH` (`sdt_KH`);

--
-- Chỉ mục cho bảng `yeu_cau_goi_lai`
--
ALTER TABLE `yeu_cau_goi_lai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dat_cho`
--
ALTER TABLE `dat_cho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `yeu_cau_goi_lai`
--
ALTER TABLE `yeu_cau_goi_lai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dat_cho`
--
ALTER TABLE `dat_cho`
  ADD CONSTRAINT `fk_sdt_KH_dat_cho` FOREIGN KEY (`sdt_KH`) REFERENCES `users` (`sdt_KH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tour_dat_cho` FOREIGN KEY (`id_tour`) REFERENCES `tours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
