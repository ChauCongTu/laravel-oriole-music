-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 04, 2023 lúc 08:00 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `summary`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Work Shop Online', 'Áp dụng tất cả kiến thức hòa âm phối khí để bài hát của bạn trở nên Hàn Quốc hơn', 'storage/banners/work-shop-han-xeng-hoa-am-nhac-1690721409.jpg', NULL, '2023-07-30 12:50:09', '2023-08-02 08:49:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Rosen', 'rosen-1691116637', '2023-08-04 01:22:35', '2023-08-04 02:37:17'),
(2, 'Yamaha', 'yamaha-1691125435', '2023-08-04 02:43:14', '2023-08-04 05:03:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogues`
--

CREATE TABLE `catalogues` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `catalogues`
--

INSERT INTO `catalogues` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Đàn Guitar', 'dan-guitar', '2023-08-04 01:23:35', '2023-08-04 03:22:03'),
(2, 'Đàn Piano', 'dan-piano-1691116928', '2023-08-04 02:42:08', '2023-08-04 02:42:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Nhạc lý cơ bản', 'Mô tả nhạc lý cơ bản', '2023-07-30 09:35:08', '2023-08-04 04:27:48', 'nhac-ly-co-ban-1691123268'),
(2, 'Kiến thức căn bản', 'Mô tả kiến thức căn bản', '2023-07-30 10:08:10', '2023-07-30 11:00:57', 'kien-thuc-can-ban-1690714857');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `content` varchar(512) NOT NULL,
  `post_id` int NOT NULL,
  `reply_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `status` enum('Đã xử lý','Chưa xử lý') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Chưa xử lý',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Châu Quế Nhơn', 'admin@chaucongtu.site', '0981234567', 'Nội dung contact 1', 'Đã xử lý', '2023-07-29 14:35:15', '2023-07-30 09:27:09'),
(2, 'Chau Que Nhon', 'Quenhon2002@gmail.com', '0848611127', 'Test  chức năng hỗ trợ', 'Chưa xử lý', '2023-08-02 06:54:07', '2023-08-02 06:54:07'),
(3, 'Chau Que Nhon', 'Quenhon2002@gmail.com', '0848611127', 'Test liên hệ', 'Đã xử lý', '2023-08-03 02:59:04', '2023-08-03 03:00:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text,
  `content` text,
  `image` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `discount` decimal(10,0) DEFAULT '0',
  `discount_to` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `price`, `description`, `content`, `image`, `teacher`, `discount`, `discount_to`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'Khóa học hòa thanh phối khí cho người mới bắt đầu', 2500000, '<ul>\r\n	<li>H&igrave;nh thức: Học trực tuyến qua MS Team</li>\r\n	<li>Số lượng: 05 học vi&ecirc;n</li>\r\n	<li>Lịch khai giảng dự kiến: 15/08/2023</li>\r\n</ul>', NULL, 'storage/banners/khoa-hoc-hoa-thanh-phoi-khi-cho-nguoi-moi-bat-dau-1690858949.jpg', 'Võ Khắc Mạnh', 210000, 1692588861, '2023-08-01 03:02:29', '2023-08-03 04:10:25', 'khoa-hoc-hoa-thanh-phoi-khi-cho-nguoi-moi-bat-dau-1691035825'),
(3, 'Khóa hợp Piano đệm hát cơ bản', 4800000, '<ul>\r\n	<li>H&igrave;nh thức: Video b&agrave;i giảng</li>\r\n	<li>Thời lượng: 25 giờ 12 ph&uacute;t</li>\r\n	<li>Số buổi: 18 buổi</li>\r\n</ul>', '<p>Kh&oacute;a hợp Piano đệm h&aacute;t cơ bản bla bla ch&egrave;n ảnh ch&egrave;n video</p>', 'storage/courses/khoa-hop-piano-dem-hat-co-ban-1691035724.jpg', 'Lê Đỗ Thanh Tuấn', 0, 0, '2023-08-03 03:52:27', '2023-08-03 04:08:44', 'khoa-hop-piano-dem-hat-co-ban-1691035724');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `instruments`
--

CREATE TABLE `instruments` (
  `id` int NOT NULL,
  `type_id` int DEFAULT NULL,
  `design_id` int DEFAULT NULL,
  `catalog_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `discount` decimal(10,0) DEFAULT '0',
  `discount_to` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `instruments`
--

INSERT INTO `instruments` (`id`, `type_id`, `design_id`, `catalog_id`, `brand_id`, `name`, `slug`, `price`, `description`, `image`, `discount`, `discount_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Guitar Rosen G15 Chính Hãng', 'guitar-rosen-g15-chinh-hang-1691028301', 2500000, '<p>TẶNG K&Egrave;M cả bộ combo<br />\r\n✔️Bao da 3 lớp<br />\r\n✔️Capo<br />\r\n✔️Ph&iacute;m<br />\r\n✔️Bộ d&acirc;y dự ph&ograve;ng<br />\r\n✔️hộp đựng ph&iacute;m<br />\r\n✔️lục gi&aacute;c chỉnh cần<br />\r\n✔️File s&aacute;ch hướng dẫn<br />\r\n<br />\r\n+ Ngo&agrave;i ra c&ograve;n được bảo h&agrave;nh đ&agrave;n 3 năm, 1 đổi 1 trong 15 ng&agrave;y. Ship tận nh&agrave;.&nbsp;</p>', 'storage/instrument/guitar-rosen-g15-chinh-hang-1691028301.jpg', 600000, 1696059751, '2023-08-01 07:23:49', '2023-08-04 01:26:00'),
(3, NULL, NULL, 2, NULL, 'Piano xịn xò tym tym', 'piano-xin-xo-tym-tym-1691123878', 18000000, '<p>Piano n&agrave;y xịn x&ograve; tim tim</p>\r\n\r\n<p><img alt=\"\" src=\"https://banpiano.vn/wp-content/uploads/2021/06/da%CC%80n-piano-die%CC%A3%CC%82n-Kawai-ca-15-5-scaled.jpg\" style=\"height:1920px; width:2560px\" /></p>', 'storage/instrument/piano-xin-xo-tym-tym-1691123878.jpg', 0, 0, '2023-08-04 04:37:58', '2023-08-04 04:38:43'),
(6, NULL, NULL, 2, 2, 'Châu Công Tử', 'chau-cong-tu-1691126185', 23000000, '<p>&agrave;inag</p>', 'storage/instrument/chau-cong-tu-1691126185.jpg', 2000000, 1691213029, '2023-08-04 05:16:25', '2023-08-04 05:23:49'),
(28271, 2, 1, 1, 2, 'Guitar Rosen G15', 'guitar-rosen-g15-1691128126', 2300000, '<p>Đan guitar bấm nhẹ&nbsp;</p>', 'storage/instrument/guitar-rosen-g15-1691126278.jpg', 0, 0, '2023-08-04 05:17:58', '2023-08-04 05:48:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `instrument_designs`
--

CREATE TABLE `instrument_designs` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `instrument_designs`
--

INSERT INTO `instrument_designs` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hình khuyết', 'hinh-khuyet-1691120219', '2023-08-04 01:25:10', '2023-08-04 03:36:59'),
(3, 'Hình tròn', 'hinh-tron-1691123089', '2023-08-04 04:24:49', '2023-08-04 04:24:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `instrument_types`
--

CREATE TABLE `instrument_types` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `instrument_types`
--

INSERT INTO `instrument_types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Classic', '', '2023-08-04 01:25:33', '2023-08-04 01:25:33'),
(2, 'Acoustic', 'acoustic-1691125419', '2023-08-04 05:03:39', '2023-08-04 05:03:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `image` varchar(191) NOT NULL,
  `cat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `video` varchar(191) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `image`, `cat_id`, `user_id`, `video`, `title`, `content`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'storage/posts/tieu-de-bai-viet-1-1690718235.jpg', 1, 1, 'u25xbCQjnma', 'Kiến thức nhạc lý cơ bản cho người mới bắt đầu', '<p>Nếu bạn đ&atilde; bắt đầu c&oacute; hứng th&uacute; với &acirc;m nhạc, h&atilde;y thử t&igrave;m hiểu một ch&uacute;t về nhạc l&yacute;. Điều đ&oacute; gi&uacute;p bạn hiểu hơn c&aacute;ch &acirc;m nhạc vận h&agrave;nh, v&agrave; c&aacute;ch ch&uacute;ng ta c&oacute; thể sử dụng &acirc;m nhạc để tạo n&ecirc;n những sản phẩm thật th&uacute; vị.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; những kiến thức cơ bản, nền tảng nhất về nhạc l&yacute; m&agrave; bạn cần nắm trước khi học chuy&ecirc;n s&acirc;u hơn hay chơi một nhạc cụ n&agrave;o đ&oacute;.</p>\r\n\r\n<h2><strong>Nhạc l&yacute; (Music theory) l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Nhạc l&yacute; &ndash; l&yacute; thuyết &acirc;m nhạc, hiểu đơn giản l&agrave; một ng&ocirc;n ngữ d&agrave;nh ri&ecirc;ng cho &acirc;m nhạc. Nhạc l&yacute; cung cấp cho bạn những c&ocirc;ng cụ gi&uacute;p bạn hiểu, diễn giải v&agrave; sử dụng &acirc;m nhạc một c&aacute;ch linh hoạt.</p>\r\n\r\n<p><img alt=\"Nhạc lý là ngôn ngữ dành riêng cho âm nhạc\" src=\"https://seami.vn/wp-content/uploads/2021/02/nh%E1%BA%A1c-l%C3%BD-1.jpg\" style=\"width:80%\" /></p>\r\n\r\n<p>Nhạc l&yacute; l&agrave; ng&ocirc;n ngữ d&agrave;nh ri&ecirc;ng cho &acirc;m nhạc</p>\r\n\r\n<p>Cũng giống như c&aacute;ch bạn n&oacute;i chuyện sử dụng tiếng mẹ đẻ. Bạn c&oacute; thể d&ugrave;ng tiếng n&oacute;i của m&igrave;nh để hiểu về thế giới xung quanh, giao tiếp với người kh&aacute;c hay thể hiện bản th&acirc;n. Nhạc l&yacute; cũng c&oacute; chức năng tương tự đối với &acirc;m nhạc, gi&uacute;p bạn c&oacute; thể hiểu c&aacute;ch c&aacute;c nốt nhạc, hợp &acirc;m, giai điệu, nhịp điệu phối hợp với nhau.</p>\r\n\r\n<p>Khi bạn c&agrave;ng nắm vững nhạc l&yacute;, bạn sẽ dễ d&agrave;ng sử dụng ch&uacute;ng một c&aacute;ch tự nhi&ecirc;n, theo phản xạ m&agrave; kh&ocirc;ng cần phải suy nghĩ qu&aacute; nhiều.</p>\r\n\r\n<p>Vậy đầu ti&ecirc;n, ch&uacute;ng ta sẽ t&igrave;m hiểu c&aacute;c yếu tố cốt l&otilde;i nhất của &acirc;m nhạc nh&eacute;!</p>\r\n\r\n<h2><strong>Nốt nhạc (Note) l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>&Acirc;m thanh được tạo ra từ c&aacute;c s&oacute;ng &acirc;m rung động trong kh&ocirc;ng kh&iacute;. Khi c&aacute;c rung động n&agrave;y nhanh hơn, ch&uacute;ng ta sẽ nghe được &acirc;m thanh cao hơn v&agrave; ngược lại, rung động chậm hơn th&igrave; &acirc;m thanh nghe trầm hơn.&nbsp;C&aacute;c rung động n&agrave;y thường sẽ ở một tần số, một cao độ nhất định, v&agrave; ta xem đ&oacute; l&agrave; một nốt nhạc.</p>\r\n\r\n<p><img alt=\"Các rung động quyết định cao độ, tần số âm thanh tạo ra nốt nhạc\" src=\"https://seami.vn/wp-content/uploads/2021/02/nh%E1%BA%A1c-l%C3%BD-2.jpg\" style=\"height:306px; width:396px\" /></p>\r\n\r\n<p>C&aacute;c rung động quyết định cao độ, tần số &acirc;m thanh tạo ra nốt nhạc</p>\r\n\r\n<p>Hiểu về nốt nhạc l&agrave; nền tảng cơ bản nhất của nhạc l&yacute;. Hầu hết tất cả những bản nhạc bạn từng nghe được tạo th&agrave;nh bởi chỉ 12 nốt nhạc (Từ Do tới Si, t&iacute;nh cả nốt trắng v&agrave; đen tr&ecirc;n piano).</p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 13\" src=\"https://seami.vn/wp-content/uploads/2021/02/hqdefault-e1613477278725.jpg\" style=\"height:266px; width:412px\" /></p>\r\n\r\n<p>C&aacute;c nốt nhạc được k&yacute; hiệu bởi những chữ c&aacute;i từ A-G như sau:</p>\r\n\r\n<ul>\r\n	<li>Do &ndash; C</li>\r\n	<li>Re &ndash; D</li>\r\n	<li>Mi &ndash; E</li>\r\n	<li>Fa &ndash; F</li>\r\n	<li>Sol &ndash; G</li>\r\n	<li>La &ndash; A</li>\r\n	<li>Si &ndash; B</li>\r\n</ul>\r\n\r\n<p>Tr&ecirc;n đ&agrave;n piano sẽ c&oacute; nhiều đoạn từ Do đến Si (mỗi đoạn được gọi l&agrave; 1 qu&atilde;ng t&aacute;m). Vậy để ph&acirc;n biệt ch&iacute;nh x&aacute;c vị tr&iacute; từng nốt, người ta sẽ đ&aacute;nh số thứ tự cho từng qu&atilde;ng như h&igrave;nh b&ecirc;n dưới, với ph&iacute;m C4 nằm giữa đ&agrave;n (c&ograve;n gọi l&agrave; Middle C).</p>\r\n\r\n<h2><strong>Trường độ nốt nhạc (Duration)</strong></h2>\r\n\r\n<p>Trường độ l&agrave; gi&aacute; trị thời gian của &acirc;m thanh. Về mặt vật l&yacute;, độ d&agrave;i đo thời gian ph&aacute;t ra giao động của nguồn &acirc;m thanh. Trong nhạc l&yacute;, độ d&agrave;i của &acirc;m thanh được quy định bằng c&aacute;c nốt nhạc với những h&igrave;nh dạng kh&aacute;c nhau.</p>\r\n\r\n<p><strong>Nốt nhạc c&oacute; 2 bộ phận:</strong></p>\r\n\r\n<ul>\r\n	<li>Th&acirc;n nốt nhạc: L&agrave; một h&igrave;nh tr&ograve;n rỗng hoặc đặc ruột. Phần n&agrave;y để x&aacute;c định vị tr&iacute; cao độ của &acirc;m thanh.</li>\r\n	<li>Đu&ocirc;i v&agrave; dấu m&oacute;c của nốt nhạc: Đu&ocirc;i nốt nhạc l&agrave; một vạch thẳng đứng, phần n&agrave;y để x&aacute;c định độ d&agrave;i kh&aacute;c nhau của &acirc;m thanh, đu&ocirc;i nốt nhạc c&oacute; thể quay l&ecirc;n hoặc quay xuống. Dấu m&oacute;c lu&ocirc;n nằm ở b&ecirc;n phải của đu&ocirc;i nốt.</li>\r\n</ul>\r\n\r\n<p>H&igrave;nh nốt v&agrave; gi&aacute; trị độ d&agrave;i tương đối giữa c&aacute;c h&igrave;nh nốt:</p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 14\" src=\"https://seami.vn/wp-content/uploads/2021/02/not.jpg\" style=\"height:96px; width:750px\" /></p>\r\n\r\n<p>Mối tương quan độ d&agrave;i giữa ch&uacute;ng l&agrave;: nốt đứng trước c&oacute; gi&aacute; trị&nbsp;<strong>gấp đ&ocirc;i</strong>&nbsp;nốt đứng sau.</p>\r\n\r\n<p><strong>Nếu: Nốt tr&ograve;n = 4 đơn vị đo độ d&agrave;i (đv/nhịp), th&igrave; c&aacute;c nốt c&ograve;n lại sẽ c&oacute; gi&aacute; trị như sau:</strong></p>\r\n\r\n<ul>\r\n	<li>Nốt trắng = 2 đv</li>\r\n	<li>Nốt đen = 1 đv</li>\r\n	<li>Nốt m&oacute;c đơn = 1/2 đv</li>\r\n	<li>Nốt m&oacute;c k&eacute;p = 1/4 đv</li>\r\n	<li>Nốt m&oacute;c ba = 1/8 đv</li>\r\n	<li>Nốt m&oacute;c bốn = 1/16 đv</li>\r\n</ul>\r\n\r\n<p>Độ d&agrave;i của c&aacute;c nốt kh&ocirc;ng c&oacute; gi&aacute; trị thời gian quy định sẵn. V&igrave; vậy, nốt nhạc chỉ biểu hiện mối tương quan về thời gian trong điều kiện c&ugrave;ng một tốc độ chuyển động (c&ugrave;ng tempo &ndash; nhịp b&agrave;i h&aacute;t).</p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 15\" src=\"https://seami.vn/wp-content/uploads/2021/02/rhythm_tree_1.jpg\" style=\"height:432px; width:462px\" /></p>\r\n\r\n<p>Nếu nốt nhạc c&oacute; dấu chấm ph&iacute;a sau, bạn cần cộng th&ecirc;m 1/2 trường độ của nốt đ&oacute;. V&iacute; dụ nốt trắng c&oacute; 1 chấm = 2+1 = 3 đv; nốt đen c&oacute; 1 chấm = 1+1,5 = 2,5 đv.</p>\r\n\r\n<p><img alt=\"Nguồn hình ảnh: https://boingocpiano.com/mot-so-kien-thuc-nhac-ly-co-ban-can-co-de-de-dang-trong-viec-tu-hoc-piano/\" src=\"https://seami.vn/wp-content/uploads/2021/02/image-1.jpg\" style=\"height:397px; width:640px\" /></p>\r\n\r\n<p>Nguồn h&igrave;nh ảnh:&nbsp;<a href=\"https://boingocpiano.com/mot-so-kien-thuc-nhac-ly-co-ban-can-co-de-de-dang-trong-viec-tu-hoc-piano/\" target=\"_blank\">https://boingocpiano.com/mot-so-kien-thuc-nhac-ly-co-ban-can-co-de-de-dang-trong-viec-tu-hoc-piano/</a></p>\r\n\r\n<h2><strong>Số chỉ nhịp&nbsp;</strong></h2>\r\n\r\n<p><strong>&Yacute; nghĩa c&aacute;c số chỉ nhịp phổ biến trong nhạc l&yacute;:</strong></p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 16\" src=\"https://seami.vn/wp-content/uploads/2021/02/Screenshot_10.jpg\" style=\"width:100%\" /></p>\r\n\r\n<h2><strong>Cung (Step/ Whole step/ Whole tone/ Tone)</strong></h2>\r\n\r\n<p>Về định nghĩa trong nhạc l&yacute;, cung (step/tone) c&oacute; thể xem l&agrave; đơn vị đếm&nbsp;<strong>cao độ</strong>&nbsp;trong &acirc;m nhạc.</p>\r\n\r\n<p>V&iacute; dụ khi bạn học to&aacute;n, &ldquo;một đơn vị đếm&rdquo; l&agrave; khoảng c&aacute;ch giữa từng số với nhau. Bạn hiểu rằng &ldquo;số 2&Prime; c&aacute;ch &ldquo;số 1&Prime; một đơn vị. &rdquo;Số 3&Prime; c&aacute;ch &ldquo;số 1&Prime; hai đơn vị. &Acirc;m thanh cũng vậy, bạn sẽ c&oacute; cảm gi&aacute;c nốt Re c&oacute; &acirc;m thanh cao hơn nốt Do. Nhưng l&agrave;m c&aacute;ch n&agrave;o để biết nốt Re cao hơn nốt Do cụ thể l&agrave; bao nhi&ecirc;u? Nốt Mi sẽ cao hơn nốt Do bao nhi&ecirc;u?</p>\r\n\r\n<p>Đ&oacute; ch&iacute;nh l&agrave; l&yacute; do kh&aacute;i niệm &ldquo;cung&rdquo; xuất hiện. Khoảng c&aacute;ch về cao độ m&agrave; ch&uacute;ng ta b&agrave;n ở tr&ecirc;n sẽ được đếm bằng &ldquo;cung&rdquo;. Nghĩa l&agrave; nốt Re sẽ cao hơn nốt Do 1 cung. Nốt Mi cao hơn nốt Do 2 cung.</p>\r\n\r\n<h2><strong>Nửa cung (Half-step/Semitone)</strong></h2>\r\n\r\n<p>Sau khi bạn đ&atilde; hiểu cung l&agrave; g&igrave;, h&atilde;y đi tiếp đến kh&aacute;i niệm &ldquo;nửa cung&rdquo;, đ&acirc;y được xem l&agrave;&nbsp;<strong>đơn vị đếm cao độ ở mức nhỏ nhất</strong>&nbsp;trong &acirc;m nhạc.</p>\r\n\r\n<p>Như bạn đ&atilde; biết, ch&uacute;ng ta kh&ocirc;ng chỉ c&oacute; 7 nốt nhạc tự nhi&ecirc;n l&agrave; Do, Re, Mi, Fa, Sol, La, Si. Nhưng c&oacute; tới 12 nốt nhạc, kể cả những nốt thăng gi&aacute;ng (đề cập ở mục sau). Bạn kh&ocirc;ng n&ecirc;n nhầm lẫn rằng 7 nốt nhạc tự nhi&ecirc;n, nốt n&agrave;o cũng đều c&aacute;ch nhau 1 cung. Thực ra, c&aacute;c nốt nhạc tự nhi&ecirc;n kh&ocirc;ng c&aacute;ch nhau đều đặn như vậy, nhưng c&oacute; 1 số nốt c&aacute;ch nhau 1 cung, v&agrave; một số nốt chỉ c&aacute;ch nhau nửa cung m&agrave; th&ocirc;i.</p>\r\n\r\n<p>Vậy th&igrave; khi n&agrave;o c&aacute;c nốt c&aacute;ch nhau một cung, khi n&agrave;o th&igrave; c&aacute;ch nhau &frac12; cung? Đơn giản l&agrave; 12 nốt nhạc&nbsp;<em>(Từ ph&iacute;m trắng l&ecirc;n ph&iacute;m đen tr&ecirc;n đ&agrave;n piano, hoặc ph&iacute;m tiếp theo nếu kh&ocirc;ng c&oacute; ph&iacute;m đen)</em>&nbsp;<strong>tất cả đều c&aacute;ch nhau &frac12; cung</strong>.</p>\r\n\r\n<p><img alt=\"Whole-step là 1 cung. Half-step là 1/2 cung\" src=\"https://seami.vn/wp-content/uploads/2021/02/nh%E1%BA%A1c-l%C3%BD-4.jpg\" style=\"height:200px; width:750px\" /></p>\r\n\r\n<p>Whole-step l&agrave; 1 cung. Half-step l&agrave; 1/2 cung &ndash; Nguồn:&nbsp;<a href=\"https://www.musicnotes.com/now/tips/how-to-read-sheet-music/\" target=\"_blank\">https://www.musicnotes.com/now/tips/how-to-read-sheet-music/</a></p>\r\n\r\n<p>C&aacute;c nốt nhạc tự nhi&ecirc;n (7 nốt từ Đ&ocirc; đến Si) , c&oacute; nốt sẽ c&aacute;ch nhau 1 cung hoặc nửa cung, theo nguy&ecirc;n tắc của nhạc l&yacute;.</p>\r\n\r\n<p>Như bạn c&oacute; thể thấy:</p>\r\n\r\n<ul>\r\n	<li>Do (C) v&agrave; Re (D) l&agrave; 2 ph&iacute;m trắng c&aacute;ch nhau 1 cung, giữa ch&uacute;ng sẽ c&oacute; 1 ph&iacute;m đen gọi l&agrave; Do thăng/Re gi&aacute;ng (Do thăng v&agrave; Re gi&aacute;ng l&agrave; t&ecirc;n gọi kh&aacute;c nhau cho c&ugrave;ng một nốt).</li>\r\n	<li>Mi (E) v&agrave; Fa (F) kh&ocirc;ng c&oacute; ph&iacute;m đen xen giữa n&ecirc;n c&aacute;ch nhau nửa cung. Tương tự, Si (B) v&agrave; Sol (G) cũng c&aacute;ch nhau nửa cung như h&igrave;nh. C&aacute;c nốt ph&iacute;m trắng c&ograve;n lại đều c&aacute;ch nhau 1 cung.</li>\r\n</ul>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, nhạc l&yacute; cũng c&oacute; kh&aacute;i niệm về&nbsp;<a href=\"https://seami.vn/quang-intervals/\"><strong>qu&atilde;ng (intervals)</strong></a>&nbsp;&ndash; t&ecirc;n gọi c&aacute;c khoảng c&aacute;ch về cao độ của c&aacute;c nốt nhạc.&nbsp;</p>\r\n\r\n<h2><a href=\"https://seami.vn/hoi-dap-giong-hat-tac-pham/\"><strong><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 17\" src=\"https://seami.vn/wp-content/uploads/2021/09/banner-anh-seaami-tang-tuong-tac.gif\" style=\"width:100%\" /></strong></a></h2>\r\n\r\n<h2><strong>Dấu h&oacute;a &ndash; H&oacute;a biểu (Accidentals &ndash; Key signature)</strong></h2>\r\n\r\n<h3><strong>Ph&acirc;n biệt dấu h&oacute;a, h&oacute;a biểu v&agrave; c&aacute;c k&yacute; hiệu</strong></h3>\r\n\r\n<p>C&oacute; 2 loại:&nbsp;<strong>H&oacute;a biểu</strong>&nbsp;ghi ở đầu khu&ocirc;ng nhạc, ảnh hưởng đến mọi nốt nhạc c&ugrave;ng t&ecirc;n trong c&ugrave;ng một đoạn nhạc.&nbsp;<strong>Dấu h&oacute;a bất thường</strong>&nbsp;chỉ ảnh hưởng đến c&aacute;c nốt nhạc c&ugrave;ng t&ecirc;n trong c&ugrave;ng<strong>&nbsp;một &ocirc; nhịp</strong>.</p>\r\n\r\n<p>Trong k&yacute; hiệu nhạc l&yacute;, dấu h&oacute;a (accidentals) d&ugrave;ng để chỉ nốt nhạc bị biến &acirc;m, ph&acirc;n biệt với h&oacute;a biểu (key signature). C&oacute; ba loại&nbsp;<strong>k&yacute; hiệu dấu h&oacute;a</strong>&nbsp;ch&iacute;nh: dấu thăng (♯), dấu gi&aacute;ng (♭) v&agrave; dấu b&igrave;nh (♮).</p>\r\n\r\n<p><strong>Dấu thăng c&oacute; h&igrave;nh dạng như sau:</strong></p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 18\" src=\"https://seami.vn/wp-content/uploads/2021/02/sharp-sign.jpg\" style=\"height:192px; width:192px\" /></p>\r\n\r\n<p>L&agrave;m nốt nhạc tăng l&ecirc;n &frac12; cung.</p>\r\n\r\n<p><strong>Dấu gi&aacute;ng c&oacute; h&igrave;nh dạng như sau:</strong></p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 19\" src=\"https://seami.vn/wp-content/uploads/2021/02/flat-sign-music.jpg\" style=\"height:187px; width:186px\" /></p>\r\n\r\n<p>L&agrave;m nốt nhạc giảm xuống &frac12; cung.</p>\r\n\r\n<p><strong>Dấu b&igrave;nh c&oacute; h&igrave;nh dạng như sau:</strong></p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 20\" src=\"https://seami.vn/wp-content/uploads/2021/02/natural-sign.jpg\" style=\"height:193px; width:192px\" /></p>\r\n\r\n<p>L&agrave;m nốt nhạc trở về cao độ b&igrave;nh thường (nếu trước đ&oacute; c&oacute; bị t&aacute;c động bởi dấu thăng hoặc gi&aacute;ng kh&aacute;c).</p>\r\n\r\n<h3><strong>H&oacute;a biểu v&agrave; thứ tự c&aacute;c dấu h&oacute;a</strong></h3>\r\n\r\n<p><strong>H&oacute;a biểu</strong>&nbsp;của b&agrave;i h&aacute;t chứa 1 loại dấu h&oacute;a (thăng hoặc gi&aacute;ng) ở đầu khu&ocirc;ng nhạc, kh&ocirc;ng bao giờ c&oacute; cả 2 loại dấu c&ugrave;ng l&uacute;c, v&agrave; nằm ngay cạnh kh&oacute;a nhạc (kh&oacute;a Sol như h&igrave;nh). Dấu h&oacute;a của h&oacute;a biểu nằm ở h&agrave;ng n&agrave;o th&igrave; sẽ ảnh hưởng tất cả c&aacute;c nốt c&oacute; c&ugrave;ng t&ecirc;n gọi.</p>\r\n\r\n<p>V&iacute; dụ như trong h&igrave;nh, 2 dấu thăng nằm ở nốt Fa (F) v&agrave; Do (C). Vậy c&aacute;c nốt Fa, Do trong bản nhạc sẽ trở th&agrave;nh F#, C#.</p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 21\" src=\"https://seami.vn/wp-content/uploads/2021/02/example-of-key-signature.jpg\" style=\"height:200px; width:600px\" /></p>\r\n\r\n<p>C&aacute;c dấu h&oacute;a ở đầu khu&ocirc;ng sẽ lu&ocirc;n được viết theo thứ tự nhất định trong nhạc l&yacute;:</p>\r\n\r\n<ul>\r\n	<li>Dấu thăng #: Fa &ndash; Do &ndash; Sol &ndash; Re &ndash; La &ndash; Mi &ndash; Si</li>\r\n	<li>Dấu gi&aacute;ng ♭ : Si &ndash; Mi &ndash; La &ndash; Re &ndash; Sol &ndash; Do &ndash; Fa</li>\r\n</ul>\r\n\r\n<p>Điều n&agrave;y c&oacute; nghĩa l&agrave;, nếu h&oacute;a biểu c&oacute; 1 dấu #, đ&oacute; sẽ l&agrave; nốt Do. 3 dấu # th&igrave; sẽ l&agrave; Fa, Do, Sol.</p>\r\n\r\n<h3><strong>H&oacute;a biểu ảnh hưởng thế n&agrave;o đến c&aacute;c giọng thứ, trưởng của b&agrave;i h&aacute;t?</strong></h3>\r\n\r\n<p>Trước ti&ecirc;n, bạn cần biết kh&aacute;i niệm giọng (hợp &acirc;m chủ đạo) của b&agrave;i h&aacute;t. Hợp &acirc;m chủ l&agrave;&nbsp;<strong>hợp &acirc;m ch&iacute;nh</strong>&nbsp;tạo n&ecirc;n m&agrave;u sắc h&agrave;i h&ograve;a cho bản nhạc, c&aacute;c hợp &acirc;m phụ kh&aacute;c phải xoay quanh n&oacute; v&agrave; tu&acirc;n theo một v&agrave;i nguy&ecirc;n tắc nhạc l&yacute;.</p>\r\n\r\n<p>Mỗi giọng sẽ c&oacute; một bộ 7 nốt (Do tới Si) đi k&egrave;m với n&oacute;, bộ nguy&ecirc;n tắc n&agrave;y l&agrave; cố định v&agrave; độc nhất cho giọng đ&oacute;. Đầu bản nhạc nếu kh&ocirc;ng c&oacute; dấu thăng hoặc dấu gi&aacute;ng n&agrave;o cả th&igrave; chỉ c&oacute; thể l&agrave; giọng&nbsp;<strong>Do trưởng (C major)</strong>&nbsp;hoặc&nbsp;<strong>La thứ (A minor)</strong>&nbsp;m&agrave; th&ocirc;i.</p>\r\n\r\n<p>C&aacute;c giọng của b&agrave;i h&aacute;t tương đương với số dấu h&oacute;a trong h&oacute;a biểu được thể hiện trong h&igrave;nh sau, với Major l&agrave; giọng trưởng, Minor l&agrave; giọng thứ.</p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 22\" src=\"https://seami.vn/wp-content/uploads/2021/02/19.jpg\" style=\"height:200px; width:750px\" /></p>\r\n\r\n<p><img alt=\"KIẾN THỨC NHẠC LÝ CƠ BẢN CHO NGƯỜI MỚI BẮT ĐẦU 23\" src=\"https://seami.vn/wp-content/uploads/2021/02/20.jpg\" style=\"height:200px; width:750px\" /></p>', '2023-07-30 11:57:15', '2023-08-04 07:24:22', 'kien-thuc-nhac-ly-co-ban-cho-nguoi-moi-bat-dau-1691133862');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Võ Khắc Mạnh', 'img/avata.jpg', 'Từ một người chơi nhạc theo bản năng. Sau khi đi gần hết chặng đường khóa học cùng thầy\r\n                                Tuấn thì kiến thức hòa thanh cũng như kĩ năng chơi đàn được cải thiện rất nhiều. Đúng\r\n                                với câu slogan của ORIOLE MEDIA \"Chơi nhạc bằng đam mê theo cách có hiểu biết\". Thầy rất\r\n                                thân thiện, nhiệt tình giải đáp các thắc mắc không chỉ trong chuyên môn mà các vấn đề\r\n                                liên quan đến âm nhạc nói riêng và cuộc sống nói chung. Rất hài lòng khi được học tại\r\n                                ORIOLE MEDIA. Cảm ơn người thầy người anh Thanh Tuấn Lê Đỗ ❤', '2023-08-02 05:07:00', '2023-08-02 05:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `discount` decimal(10,0) DEFAULT '0',
  `discount_to` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `description`, `image`, `discount`, `discount_to`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Ký - xướng âm', 250000, '<p>K&yacute; xướng &acirc;m cho lời nhạc v&agrave; giai điệu.</p>\r\n\r\n<p>Dịch vụ tư vấn tận t&igrave;nh</p>', 'storage/service/ky-am-1690869736.jpg', 30000, 1693462062, '2023-08-01 06:02:16', '2023-08-03 01:53:05', 'ky-xuong-am-1691027585');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sheet_musics`
--

CREATE TABLE `sheet_musics` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `discount` decimal(10,0) DEFAULT '0',
  `discount_to` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sheet_musics`
--

INSERT INTO `sheet_musics` (`id`, `name`, `price`, `description`, `image`, `discount`, `discount_to`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Sheet nhạc #1: Bản tình ca mùa thu', 784000, '<p>Bản t&igrave;nh ca m&ugrave;a đ&ocirc;ng</p>', 'storage/sheet/sheet-nhac-1-ban-tinh-ca-mua-dong-1690873329.jpg', 10000, 1691910149, '2023-08-01 07:02:09', '2023-08-01 07:06:20', 'sheet-nhac-1-ban-tinh-ca-mua-thu-1690873580');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `role` enum('Admin','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Châu Quế Nhơn', 'admin@chaucongtu.site', '0848611127', 'Admin', '$2y$10$yaZb11KyhDhKT4D06VpAyOTudMQzP6rIuXp1/DCHtQOjG1EGtjs5.', '2023-07-29 09:08:15', '2023-07-31 09:44:55'),
(3, 'Hoàng Vĩnh Phúc', 'quenhon2002@gmail.com', '0848611127', 'User', 'orioleMusic1', '2023-07-31 08:12:11', '2023-07-31 08:12:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalogues`
--
ALTER TABLE `catalogues`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_id` (`reply_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `catalog_id` (`catalog_id`),
  ADD KEY `design_id` (`design_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `instrument_designs`
--
ALTER TABLE `instrument_designs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `instrument_types`
--
ALTER TABLE `instrument_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sheet_musics`
--
ALTER TABLE `sheet_musics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `catalogues`
--
ALTER TABLE `catalogues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28272;

--
-- AUTO_INCREMENT cho bảng `instrument_designs`
--
ALTER TABLE `instrument_designs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `instrument_types`
--
ALTER TABLE `instrument_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sheet_musics`
--
ALTER TABLE `sheet_musics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`reply_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `instruments_ibfk_2` FOREIGN KEY (`catalog_id`) REFERENCES `catalogues` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `instruments_ibfk_3` FOREIGN KEY (`design_id`) REFERENCES `instrument_designs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `instruments_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `instrument_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
