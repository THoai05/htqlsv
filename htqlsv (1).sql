-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 04:19 PM
-- Server version: 11.7.2-MariaDB
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htqlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giang_viens`
--

CREATE TABLE `giang_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `ma_giang_vien` varchar(255) NOT NULL,
  `khoa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giang_viens`
--

INSERT INTO `giang_viens` (`id`, `ho_ten`, `ma_giang_vien`, `khoa`, `email`, `so_dien_thoai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nguyễn Văn A', 'GV001', 'Công nghệ thông tin', 'nguyenvana@university.edu', '0987654321', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(2, 'Trần Thị B', 'GV002', 'Khoa học máy tính', 'tranthib@university.edu', '0976543210', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(3, 'Lê Văn C', 'GV003', 'Kỹ thuật phần mềm', 'levanc@university.edu', '0965432109', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(4, 'Phạm Văn D', 'GV004', 'Hệ thống thông tin', 'phamvand@university.edu', '0954321098', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(5, 'Hoàng Thị E', 'GV005', 'Mạng máy tính', 'hoangthie@university.edu', '0943210987', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(6, 'Đỗ Minh F', 'GV006', 'An toàn thông tin', 'dof@university.edu', '0932109876', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(7, 'Bùi Thị G', 'GV007', 'Trí tuệ nhân tạo', 'bui_thig@university.edu', '0921098765', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(8, 'Vũ Văn H', 'GV008', 'Công nghệ phần mềm', 'vuvanh@university.edu', '0910987654', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(9, 'Ngô Thị I', 'GV009', 'Khoa học dữ liệu', 'ngothii@university.edu', '0909876543', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(10, 'Dương Văn J', 'GV010', 'Hệ thống nhúng', 'duongvanj@university.edu', '0898765432', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(11, 'Trịnh Thị K', 'GV011', 'Điện tử viễn thông', 'trinhthik@university.edu', '0887654321', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(12, 'Lương Văn L', 'GV012', 'Cơ điện tử', 'luongvanl@university.edu', '0876543210', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(13, 'Tô Thị M', 'GV013', 'Kỹ thuật y sinh', 'tothim@university.edu', '0865432109', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(14, 'Đinh Văn N', 'GV014', 'Vật lý kỹ thuật', 'dinhvann@university.edu', '0854321098', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL),
(15, 'Cao Thị O', 'GV015', 'Kỹ thuật xây dựng', 'caothio@university.edu', '0843210987', '2025-03-28 16:33:02', '2025-03-28 16:33:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lophocphan`
--

CREATE TABLE `lophocphan` (
  `lophoc_ID` bigint(20) UNSIGNED NOT NULL,
  `tenlop` varchar(100) NOT NULL,
  `mamonhoc` bigint(20) UNSIGNED NOT NULL,
  `phonghoc_ID` bigint(20) UNSIGNED NOT NULL,
  `giangvien_ID` bigint(20) UNSIGNED NOT NULL,
  `soluongsv` int(11) NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `ngayhoc` varchar(50) NOT NULL,
  `tietbatdau` int(11) NOT NULL,
  `tietketthuc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lophocphan`
--

INSERT INTO `lophocphan` (`lophoc_ID`, `tenlop`, `mamonhoc`, `phonghoc_ID`, `giangvien_ID`, `soluongsv`, `thoigianbatdau`, `thoigianketthuc`, `ngayhoc`, `tietbatdau`, `tietketthuc`, `created_at`, `updated_at`) VALUES
(31, 'Lớp C++ K1', 1, 101, 1, 30, '2025-04-01', '2025-07-01', 'Thứ 2, Thứ 4', 1, 3, '2025-03-28 16:54:02', '2025-03-28 16:54:02'),
(32, 'Lớp C++ K2', 1, 102, 2, 25, '2025-04-02', '2025-07-02', 'Thứ 3, Thứ 5', 2, 4, '2025-03-28 16:54:02', '2025-03-28 16:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(10, '2025_03_26_152035_create_phonghoc_table', 3),
(12, '2025_03_26_155754_modify_phonghoc_id_column_in_phonghocs_table', 5),
(13, '2025_03_26_160726_create_phonghocs_table', 6),
(20, '0001_01_01_000001_create_cache_table', 7),
(21, '0001_01_01_000002_create_jobs_table', 7),
(22, '2025_03_22_054603_create_giang_viens_table', 7),
(23, '2025_03_22_081306_add_deleted_at_to_giang_viens_table', 7),
(24, '2025_03_22_082431_create_mon_hocs_table', 7),
(25, '2025_03_26_135757_create_sinhvien_table', 7),
(27, '2025_03_26_150000_create_phonghocs_table', 8),
(28, '2025_03_26_152959_create_lophocphan_table', 8),
(29, '2025_03_28_010225_create_users_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `mon_hocs`
--

CREATE TABLE `mon_hocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_mon_hoc` varchar(255) NOT NULL,
  `ma_mon_hoc` varchar(255) NOT NULL,
  `so_tin_chi` int(11) NOT NULL,
  `giang_vien_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mon_hocs`
--

INSERT INTO `mon_hocs` (`id`, `ten_mon_hoc`, `ma_mon_hoc`, `so_tin_chi`, `giang_vien_id`, `mo_ta`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lập trình C++', 'CS101', 3, 1, 'Môn học về lập trình C++ cơ bản và nâng cao.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(2, 'Cấu trúc dữ liệu & Giải thuật', 'CS102', 4, 2, 'Học về các cấu trúc dữ liệu cơ bản và thuật toán.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(3, 'Hệ quản trị cơ sở dữ liệu', 'CS103', 3, 3, 'Giới thiệu về SQL và các hệ quản trị CSDL.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(4, 'Lập trình Web với PHP & Laravel', 'CS104', 3, 4, 'Phát triển ứng dụng web với Laravel.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(5, 'Trí tuệ nhân tạo', 'CS105', 3, 5, 'Nhập môn về AI và các thuật toán Machine Learning.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(6, 'Khoa học dữ liệu', 'CS106', 4, 6, 'Xử lý và phân tích dữ liệu lớn.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(7, 'Mạng máy tính', 'CS107', 3, 7, 'Giới thiệu về giao thức mạng và bảo mật mạng.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(8, 'Lập trình Java', 'CS108', 3, 8, 'Lập trình hướng đối tượng với Java.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(9, 'An toàn thông tin', 'CS109', 3, 9, 'Các kỹ thuật bảo mật hệ thống và dữ liệu.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(10, 'Hệ điều hành', 'CS110', 3, 10, 'Cấu trúc và quản lý hệ điều hành.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(11, 'Điện toán đám mây', 'CS111', 3, 11, 'Tìm hiểu về các dịch vụ và nền tảng cloud.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(12, 'Phân tích và thiết kế hệ thống', 'CS112', 3, 12, 'Quy trình phát triển phần mềm.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(13, 'Lập trình Python', 'CS113', 3, 13, 'Lập trình với ngôn ngữ Python từ cơ bản đến nâng cao.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL),
(14, 'Xử lý ảnh và thị giác máy tính', 'CS114', 3, 14, 'Các thuật toán xử lý ảnh trong AI.', '2025-03-28 16:38:06', '2025-03-28 16:38:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonghoc`
--

CREATE TABLE `phonghoc` (
  `phonghoc_ID` bigint(20) UNSIGNED NOT NULL,
  `tenphonghoc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonghoc`
--

INSERT INTO `phonghoc` (`phonghoc_ID`, `tenphonghoc`, `created_at`, `updated_at`) VALUES
(101, 'Phòng A1', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(102, 'Phòng A2', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(103, 'Phòng B1', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(104, 'Phòng B2', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(105, 'Phòng C1', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(106, 'Phòng C2', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(107, 'Phòng D1', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(108, 'Phòng D2', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(109, 'Phòng E1', '2025-03-28 16:52:30', '2025-03-28 16:52:30'),
(110, 'Phòng E2', '2025-03-28 16:52:30', '2025-03-28 16:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NSbquurvMoCRiM6YlgcEiNRLsvT8YgBi4o3WRPe4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU29pcGN1MExoZUJGa01FR0JlZXJmNktFZnRQbDREZVNsZkw3ZWlwNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744906740);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sinhvien_ID` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `mssv` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sinhvien_ID`, `hoten`, `mssv`, `email`, `sdt`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn A', 'SV001', 'nguyenvana@example.com', '0987654321', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(2, 'Trần Thị B', 'SV002', 'tranthib@example.com', '0976543210', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(3, 'Lê Văn C', 'SV003', 'levanc@example.com', '0965432109', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(4, 'Phạm Văn D', 'SV004', 'phamvand@example.com', '0954321098', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(5, 'Hoàng Thị E', 'SV005', 'hoangthie@example.com', '0943210987', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(6, 'Đỗ Minh F', 'SV006', 'dof@example.com', '0932109876', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(7, 'Bùi Thị G', 'SV007', 'bui_thig@example.com', '0921098765', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(8, 'Vũ Văn H', 'SV008', 'vuvanh@example.com', '0910987654', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(9, 'Ngô Thị I', 'SV009', 'ngothii@example.com', '0909876543', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(10, 'Dương Văn J', 'SV010', 'duongvanj@example.com', '0898765432', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(11, 'Trịnh Thị K', 'SV011', 'trinhthik@example.com', '0887654321', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(12, 'Lương Văn L', 'SV012', 'luongvanl@example.com', '0876543210', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(13, 'Tô Thị M', 'SV013', 'tothim@example.com', '0865432109', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(14, 'Đinh Văn N', 'SV014', 'dinhvann@example.com', '0854321098', '2025-03-28 16:30:42', '2025-03-28 16:30:42'),
(15, 'Cao Thị O', 'SV015', 'caothio@example.com', '0843210987', '2025-03-28 16:30:42', '2025-03-28 16:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sinhvien','giangvien') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin01', '$2y$12$7Rn16YClfnKLlnR5BQETbu6FgXdZcsKk0IspHyKViTHMhU/l2LE0y', 'admin', '2025-04-17 01:00:00', '2025-04-17 09:16:53'),
(2, 'giangvien01', '$2y$12$rM9Sd5DhcRe0UE1D8d6yUeTL5lF9m/cN4Lf7L/toRe/FCI5sdAepC', 'giangvien', '2025-04-17 01:05:00', '2025-04-17 09:16:57'),
(3, 'giangvien02', '$2y$12$gRprYgzpo3CXaCS6hKngduDwIMsW2wmbnJDCZ2Hm5GGflboD1LmNK', 'giangvien', '2025-04-17 01:10:00', '2025-04-17 09:17:10'),
(4, 'sinhvien01', '$2y$12$Ad1MKn0CB5aqKEN5aqyWh.BsTqZTRhf3/1nHhMG2a2s1h8srsEtWO', 'sinhvien', '2025-04-17 01:15:00', '2025-04-17 09:18:33'),
(5, 'sinhvien02', '$2y$12$GYI.KVGXJPrXaN4vNf7FiOg.0NztKwx8L.cHtRPPlL8/qaGFgeEzm', 'sinhvien', '2025-04-17 01:20:00', '2025-04-17 09:18:38'),
(6, 'sinhvien03', '$2y$12$P0ypjvLPPAAB7g/4cf40gem2xMhu9KMH1WjUG5oKSIoX3IlDbzdAa', 'sinhvien', '2025-04-17 01:25:00', '2025-04-17 09:18:43'),
(7, 'sinhvien04', '$2y$12$9UX3RDk7VCL3Rgqzzy1Wze9zPfhpeZtN57610WRZ3ZnHAeJKHIjiC', 'sinhvien', '2025-04-17 01:30:00', '2025-04-17 09:18:47'),
(8, 'sinhvien05', '$2y$12$9Q566r7hihr.Z9u6E/R4HuqUMbXprockIRNR72PGfdDIjdVuQjTHO', 'sinhvien', '2025-04-17 01:35:00', '2025-04-17 09:18:52'),
(9, 'giangvien03', '$2y$12$IMFZmyBK4TMlOOauKhTJP.XKXcUPTa6uraYj5GBn9Ie6Wy1bmVP0O', 'giangvien', '2025-04-17 01:40:00', '2025-04-17 09:18:56'),
(10, 'giangvien04', '$2y$12$K6tVSvAthr03hba2J7GKz.2qPRoEFJsySzJnPbHGfXb9Bf1llrBPO', 'giangvien', '2025-04-17 01:45:00', '2025-04-17 09:19:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giang_viens`
--
ALTER TABLE `giang_viens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giang_viens_ma_giang_vien_unique` (`ma_giang_vien`),
  ADD UNIQUE KEY `giang_viens_email_unique` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`lophoc_ID`),
  ADD KEY `lophocphan_mamonhoc_foreign` (`mamonhoc`),
  ADD KEY `lophocphan_phonghoc_id_foreign` (`phonghoc_ID`),
  ADD KEY `lophocphan_giangvien_id_foreign` (`giangvien_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mon_hocs_ma_mon_hoc_unique` (`ma_mon_hoc`),
  ADD KEY `mon_hocs_giang_vien_id_foreign` (`giang_vien_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`phonghoc_ID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sinhvien_ID`),
  ADD UNIQUE KEY `sinhvien_mssv_unique` (`mssv`),
  ADD UNIQUE KEY `sinhvien_email_unique` (`email`),
  ADD UNIQUE KEY `sinhvien_sdt_unique` (`sdt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giang_viens`
--
ALTER TABLE `giang_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `lophoc_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mon_hocs`
--
ALTER TABLE `mon_hocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `phonghoc_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `sinhvien_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_giangvien_id_foreign` FOREIGN KEY (`giangvien_ID`) REFERENCES `giang_viens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lophocphan_mamonhoc_foreign` FOREIGN KEY (`mamonhoc`) REFERENCES `mon_hocs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lophocphan_phonghoc_id_foreign` FOREIGN KEY (`phonghoc_ID`) REFERENCES `phonghoc` (`phonghoc_ID`) ON DELETE CASCADE;

--
-- Constraints for table `mon_hocs`
--
ALTER TABLE `mon_hocs`
  ADD CONSTRAINT `mon_hocs_giang_vien_id_foreign` FOREIGN KEY (`giang_vien_id`) REFERENCES `giang_viens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
