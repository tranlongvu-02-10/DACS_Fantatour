-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2025 lúc 06:24 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs_fantatour`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_adminn`
--

CREATE TABLE `tbl_adminn` (
  `adminId` int(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_adminn`
--

INSERT INTO `tbl_adminn` (`adminId`, `fullName`, `userName`, `password`, `email`, `address`, `createdDate`) VALUES
(1, 'Trần Long Vũ', 'admin', '123456', 'tranlongvu02102004@gmail.com', 'Hồ Chí Minh', '2025-05-27 12:32:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bookingg`
--

CREATE TABLE `tbl_bookingg` (
  `bookingId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bookingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `numAdults` int(11) NOT NULL,
  `numChildren` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `bookingStatus` enum('y','b','c','f') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_bookingg`
--

INSERT INTO `tbl_bookingg` (`bookingId`, `tourId`, `userId`, `fullName`, `email`, `phoneNumber`, `address`, `bookingDate`, `numAdults`, `numChildren`, `totalPrice`, `bookingStatus`) VALUES
(7, 3, 43, 'vu tran', 'longvu02102004@gmail.com', '0348590785', 'ho chi minh', '2025-05-24 18:21:22', 3, 2, 400000, ''),
(8, 1, 43, 'long vỹ', 'hehe02102004@gmail.com', '0965264603', 'Lâm đồng', '2025-05-24 19:12:09', 3, 2, 400000, ''),
(9, 2, 43, 'phượng vy', 'phuongvy02102004@gmail.com', '0965264603', 'Lâm đồng', '2025-05-24 19:14:45', 4, 3, 550000, ''),
(10, 2, 43, 'phượng vy', 'phuongvy02102004@gmail.com', '0965264603', 'Lâm đồng', '2025-05-24 19:38:00', 4, 1, 450000, ''),
(11, 1, 43, 'phượng vy', 'phuongvy02102004@gmail.com', '0965264603', 'Lâm đồng', '2025-05-25 16:45:27', 3, 1, 350000, ''),
(12, 2, 43, 'phượng vy', 'phuongvy02102004@gmail.com', '0348590784', 'Lâm đồng', '2025-05-25 16:46:38', 1, 0, 100000, ''),
(13, 1, 43, 'Trần Long Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'ho chi minh', '2025-05-25 18:38:37', 2, 1, 250000, ''),
(14, 1, 43, 'Trần Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'ho chi minh', '2025-05-26 05:43:03', 2, 3, 350000, ''),
(15, 1, 43, 'Trần Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'ho chi minh', '2025-05-26 05:43:44', 2, 3, 350000, ''),
(16, 1, 43, 'Trần Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'ho chi minh', '2025-05-26 07:05:10', 3, 2, 400000, ''),
(17, 1, 43, 'Trần Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'Lâm đồng', '2025-05-26 07:26:29', 2, 0, 200000, ''),
(18, 1, 43, 'Trần Vũ', 'tranlongvu02102004@gmail.com', '0348590784', 'Hà Nội', '2025-05-27 09:02:46', 2, 2, 11070000, 'y'),
(19, 3, 43, 'yến nhi', 'ytennhi02102004@gmail.com', '0348590784', 'Hà Nội', '2025-05-27 19:36:03', 3, 1, 21268000, 'f');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chatt`
--

CREATE TABLE `tbl_chatt` (
  `chatId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `readStatus` enum('y','n') DEFAULT 'n' COMMENT 'y: yes\r\nn: no',
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ipAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_checkoutt`
--

CREATE TABLE `tbl_checkoutt` (
  `checkoutId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` double NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `transactionId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_checkoutt`
--

INSERT INTO `tbl_checkoutt` (`checkoutId`, `bookingId`, `paymentMethod`, `paymentDate`, `amount`, `paymentStatus`, `transactionId`) VALUES
(11, 18, 'office-payment', '2025-05-27 08:59:40', 11070000, 'y', NULL),
(12, 19, 'office-payment', '2025-05-27 18:34:02', 21268000, 'y', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contactt`
--

CREATE TABLE `tbl_contactt` (
  `contactId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `isReply` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_contactt`
--

INSERT INTO `tbl_contactt` (`contactId`, `fullName`, `email`, `phoneNumber`, `message`, `isReply`) VALUES
(1, 'hihi', 'tranlongvu02102004@gmail.com', 348590784, 'tôi muốn tìm 1 tour vào tháng 6', 'y');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_historyy`
--

CREATE TABLE `tbl_historyy` (
  `historyId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `actionType` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_imagess`
--

CREATE TABLE `tbl_imagess` (
  `imageId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_imagess`
--

INSERT INTO `tbl_imagess` (`imageId`, `tourId`, `imageURL`, `description`, `uploadDate`) VALUES
(6, 1, 'bai-sao-phu-quoc.jpg', 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '2025-05-08 21:00:17'),
(7, 1, 'thi-tran-hoang-hon-phu-quoc.jpg', 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '2025-05-08 21:00:41'),
(8, 1, 'hon-mong-tay-phu-quoc.jpg', 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '2025-05-08 21:01:34'),
(9, 1, 'grand-world-phu-quoc.jpg', 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '2025-05-08 21:02:43'),
(10, 1, 'hon-gam-ghi-phu-quoc.jpg', 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '2025-05-08 21:03:25'),
(22, 2, '-3n2d-da-nang-1.png', 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '2025-05-08 23:06:09'),
(23, 2, '-3n2d-da-nang-2.png', 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '2025-05-08 23:06:09'),
(24, 2, '-3n2d-da-nang-3.png', 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '2025-05-08 23:06:09'),
(25, 2, '-3n2d-da-nang-4.png', 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '2025-05-08 23:06:09'),
(26, 2, '-3n2d-da-nang-5.png', 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '2025-05-08 23:06:09'),
(27, 3, 'mien-bac-4n3d-ha-noi-lao-cai-sa-pa-1.jpeg', 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '2025-05-09 05:05:09'),
(28, 3, 'mien-bac-4n3d-ha-noi-lao-cai-sa-pa-2.png', 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '2025-05-22 07:32:38'),
(29, 3, 'mien-bac-4n3d-ha-noi-lao-cai-sa-pa-3.png', 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '2025-05-22 07:32:45'),
(30, 3, 'mien-bac-4n3d-ha-noi-lao-cai-sa-pa-4.jpg', 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '2025-05-22 07:32:24'),
(31, 3, 'mien-bac-4n3d-ha-noi-lao-cai-sa-pa-5.png', 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '2025-05-22 07:32:52'),
(33, 5, 'ba-na-hill-da-nang-1.png', 'MIỀN TRUNG 5N4Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '2025-05-27 08:17:10'),
(34, 5, 'cau-vang-da-nang.png', 'MIỀN TRUNG 4N3Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '2025-05-27 11:57:42'),
(35, 5, 'hoi-an-viet-nam.png', 'MIỀN TRUNG 4N3Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '2025-05-27 11:59:11'),
(36, 5, 'hang-dong-lon-nhat-the-gioi-son-doong.png', 'MIỀN TRUNG 4N3Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '2025-05-27 11:59:11'),
(53, 5, 'chua-long-son-nha-trang.jpg', 'MIỀN TRUNG 4N3Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '2025-05-28 08:04:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_invoicee`
--

CREATE TABLE `tbl_invoicee` (
  `invoiceId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `amount` double NOT NULL,
  `dateIssued` date NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_promotionn`
--

CREATE TABLE `tbl_promotionn` (
  `promotionId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_reviewss`
--

CREATE TABLE `tbl_reviewss` (
  `reviewId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_reviewss`
--

INSERT INTO `tbl_reviewss` (`reviewId`, `tourId`, `userId`, `rating`, `comment`, `timestamp`) VALUES
(1, 3, 43, 4, 'chuyến đi tuyệt vời', '2025-05-27 19:37:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_temp_imagess`
--

CREATE TABLE `tbl_temp_imagess` (
  `id` int(11) NOT NULL,
  `tourId` int(11) DEFAULT NULL,
  `imageTempURL` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_timelinee`
--

CREATE TABLE `tbl_timelinee` (
  `timeLineId` int(11) NOT NULL,
  `tourId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_timelinee`
--

INSERT INTO `tbl_timelinee` (`timeLineId`, `tourId`, `title`, `description`) VALUES
(1, 1, 'TP.HỒ CHÍ MINH - PHÚ QUỐC', 'Tập trung tại sân bay Tân Sơn Nhất, đáp chuyến bay TP. HCM – Phú Quốc. (Các chuyến bay dự kiến từ 09:45 – 11:00). Đến sân bay Phú Quốc, xe và hướng dẫn viên đón khách khởi hành tham quan: \r\n\r\n-Cơ sở sản xuất Rượu Sim (loại vang riêng của đảo): Khám phá đặc sản vang Sim với hương vị độc đáo và tìm hiểu quy trình sản xuất.\r\n-Vườn Tiêu Phú Quốc: Tiêu Phú Quốc nổi tiếng với hương vị tiêu cay nồng, nổi tiếng.\r\n-Ăn trưa với ẩm thực địa phương. Nhận phòng khách sạn và nghỉ ngơi (Nhận phòng từ 14h00, hỗ trợ sớm nếu có phòng trống). Chiều, tiếp tục tham quan:\r\n\r\n-Trại rắn Đồng Tâm 2 – xứ sở các loài rắn: Trải nghiệm thế giới rắn với hơn 100 loài, từ rắn hiền lành đến những loài cực độc.\r\n-Dinh Cậu, Dinh Bà – nơi gửi gắm đức tin của người dân xứ đảo.\r\n-Tượng Đài Bác Hồ: Với chủ đề “Miền Nam trong trái tim tôi” cao 20,7 mét, nặng hơn 93 tấn và là biểu tượng về văn hóa, góp phần khẳng định chủ quyền biển, đảo của Tổ quốc.\r\nĂn tối tại nhà hàng. Tiếp tục chương trình:\r\n\r\nTham quan Tơ Lụa Việt thương hiệu chuyên -cung cấp các sản phẩm: chăn, ga gối nệm…\r\n-Khám phá Grand World – Thành phố không ngủ. (Không tính phí vào cổng – Chi phí vui chơi tự túc) Tọa lạc tại vị trí trung tâm Phú Quốc United Center, diện tích lên đến 85ha với kiến trúc cảnh quan rực rỡ lấy cảm hứng từ châu Âu. Được xây dựng lộng lẫy tại 4 tiểu khu: Quảng trường, Shanghai, Indochine, Mallorca.\r\n-Show diễn “Tinh Hoa Việt Nam” – hàng ngày lúc 20:15 (chi phí vé tự túc).\r\nTận hưởng cảm hứng Châu Âu qua show diễn -Sắc màu Venice: Show diễn miễn phí, tái hiện câu chuyện tình yêu lãng mạn trong không gian Châu Âu.\r\nTrở về khách sạn, nghỉ đêm.'),
(2, 1, 'PHÚ QUỐC - KHÁM PHÁ ĐẢO NGỌC', '\r\n- 8h00: Đón khách tại khách sạn, bắt đầu hành trình với điểm đầu là **Cơ sở nuôi cấy Ngọc Trai**.\r\n-Hòn Mây Rút**: Check-in sống ảo giữa khung cảnh hoang sơ tuyệt đẹp.\r\n-Hòn Gầm Ghì**: Lặn ngắm san hô miễn phí.\r\n-Hòn Rõi**: Trải nghiệm độc đáo đi bộ dưới đáy biển (chi phí tự túc).\r\n-Hòn Móng Tay**: Tắm biển, nghỉ ngơi, chụp ảnh flycam (miễn phí).\r\n-Dùng **bữa trưa trên đảo**. Trở về khách sạn hoặc tiếp tục hành trình nếu có chọn **Cáp treo Hòn Thơm**.\r\n\r\n'),
(3, 1, 'PHÚ QUỐC - TP.HỒ CHÍ MINH', 'Ăn sáng. Làm thủ tục trả phòng. Ra sân bay làm thủ tục đáp chuyến bay trở lại TP. HCM.\r\n\r\n(Các chuyến bay dự kiến sau 12:00). Đến sân bay Tân Sơn Nhất, kết thúc chương trình tham quan!'),
(4, 3, 'TP. HCM – HÀ NỘI', 'Tập trung tại sân bay Tân Sơn Nhất đáp chuyến bay TP. HCM – HÀ NỘI. (Các chuyến bay dự kiến từ 06:00 – 09:00). Xe và HDV đón khách tại sân bay Nội Bài, đoàn di chuyển về trung tâm Hà Nội.\r\n \r\nĂn trưa. Nhận phòng khách sạn. Khởi hành tham quan:\r\n -Hồ Tây – Hồ lớn nhất Hà Nội, chùa Trấn Quốc, Hồ Gươm, đền Ngọc Sơn, cầu Thê Húc, chụp hình lưu niệm tại Nhà Thờ Lớn, Nhà Hát Lớn thành phố.\r\n -Thưởng thức bánh cốm Hàng Than, kem Tràng Tiền – Nét văn hóa ẩm thực đặc trưng rất riêng của Hà Nội.\r\n\r\nĂn tối. Tự do khám phá Hà Nội về đêm. Nghỉ đêm tại Hà Nội.'),
(5, 3, 'HÀ NỘI – LÀO CAI – SAPA', 'Ăn sáng. Trả phòng. Tham quan Lăng Bác, thăm Phủ Chủ Tịch, nhà sàn, ao cá Bác Hồ, Chùa Một Cột, Văn Miếu – Quốc Tử Giám – trường đại học đầu tiên của Việt Nam.\r\n\r\nĂn trưa. Khởi hành đi SaPa – nơi mà người Pháp xưa gọi là “Kinh đô mùa hè của xứ Bắc Kỳ” theo tuyến đường cao tốc dài nhất Việt Nam 250km. Đến Lào Cai, dừng chân chụp ảnh lưu niệm tại cột mốc biên giới 102 – cửa khẩu Quốc tế Lào Cai. Đến SaPa, nhận phòng khách sạn.\r\n\r\nĂn tối. Thư giãn với liệu trình massage chân, mỗi khách được tặng 01 vé foot massage.\r\n\r\nTự do khám phá phố núi về đêm, tự do thưởng thức: Thắng Cố, cơm lam, lợn cắp nách, khoai nướng, bắp nướng… Nghỉ đêm tại thị trấn SaPa. '),
(6, 3, 'SAPA – BẢN CÁT CÁT – FANSIPAN', 'Ăn sáng. Tham quan Bản Cát Cát – địa bàn cư trú của người H’Mông, ngắm cảnh hùng vĩ của núi rừng Tây Bắc, tham quan thác thuỷ điện Cát Cát do người Pháp xây dựng.\r\n\r\nĂn trưa. Di chuyển đến ga cáp treo Fansipan bắt đầu hành trình chinh phục Fansipan bằng hệ thống cáp treo 3 dây hiện đại nhất thế giới với cabin có sức chứa tới 35 khách. Vượt qua 639 bậc thang chinh phục đỉnh Fansipan trên độ cao 3.143m – nóc nhà của Đông Dương. (chi phí cáp treo tự túc)\r\n\r\nĂn tối. Tự do khám phá SaPa về đêm. Nghỉ đêm tại thị trấn SaPa.\r\n\r\n'),
(7, 3, 'SAPA – HÀ NỘI – TP. HCM', 'Ăn sáng. Trả phòng. Khởi hành về lại Hà Nội.\r\n\r\nĂn trưa. Di chuyển ra sân bay Nội Bài đáp chuyến bay Hà Nội – TP. HCM.\r\n\r\n(Các chuyến bay dự kiến từ 16:30 – 17:30). Kết thúc chương trình tham quan!'),
(8, 5, 'TP. HCM – ĐÀ NẴNG – SƠN TRÀ', '<p>Đ&oacute;n qu&yacute; kh&aacute;ch tại&nbsp;<strong>s&acirc;n bay T&acirc;n Sơn Nhất</strong>, đ&aacute;p chuyến bay khởi h&agrave;nh đi Đ&agrave; Nẵng&nbsp;<em>(c&aacute;c chuyến bay dự kiến từ 07:00 &ndash; 09:30)</em>. Đến Đ&agrave; Nẵng, xe v&agrave; HDV đ&oacute;n kh&aacute;ch.</p>\r\n\r\n<p>Ăn trưa đặc sản Đ&agrave; Nẵng&nbsp;<em>&ldquo;B&aacute;nh tr&aacute;ng thịt heo 2 đầu da &amp; m&igrave; Quảng&rdquo;</em>. Nhận ph&ograve;ng, nghỉ ngơi.</p>\r\n\r\n<p>Buổi chiều, khởi h&agrave;nh tham quan&nbsp;<strong>b&aacute;n đảo Sơn Tr&agrave;</strong>&nbsp;ngắm phố biển từ tr&ecirc;n cao.</p>\r\n\r\n<ul>\r\n	<li>Viếng<strong>&nbsp;Linh Ứng Tự</strong>&nbsp;&ndash; nơi c&oacute; tượng Phật B&agrave; cao 67 m&eacute;t cao nhất Việt Nam.</li>\r\n	<li><strong>C&ocirc;ng vi&ecirc;n kỳ quan thế giới Đ&agrave; Nẵng</strong>&nbsp;&ndash; c&ocirc;ng tr&igrave;nh thu nhỏ m&ocirc; phỏng 9 kỳ quan thế giới v&agrave; c&aacute;c địa danh nổi tiếng tại Việt Nam.</li>\r\n	<li>Tắm biển<strong>&nbsp;Mỹ Kh&ecirc;</strong>&nbsp;&ndash; từng được tạp ch&iacute; Forbes b&igrave;nh chọn l&agrave;&nbsp;b&atilde;i biển quyến rũ nhất h&agrave;nh tinh.</li>\r\n</ul>\r\n\r\n<p>Ăn tối. Tự do thưởng ngoạn du thuyền s&ocirc;ng H&agrave;n ngắm cảnh Đ&agrave; Th&agrave;nh về đ&ecirc;m.&nbsp;<em>(chi ph&iacute; tự t&uacute;c)</em></p>'),
(9, 5, 'ĐÀ NẴNG – PHỐ CỔ HỘI AN', '<p>Ăn s&aacute;ng buffet tại kh&aacute;ch sạn. Khởi h&agrave;nh tham quan:</p>\r\n\r\n<ul>\r\n	<li><strong>C&ocirc;ng vi&ecirc;n vườn tượng Apec Đ&agrave; Nẵng</strong>&nbsp;&ndash; c&ocirc;ng tr&igrave;nh thể hiện tinh thần hội nhập quốc tế v&agrave; kh&aacute;t vọng vươn xa của người d&acirc;n Đ&agrave; Nẵng.</li>\r\n	<li><strong>Cầu T&igrave;nh Y&ecirc;u</strong>&nbsp;v&agrave; check-in với biểu tượng&nbsp;<strong>C&aacute; Ch&eacute;p H&oacute;a Rồng, cầu Rồng Đ&agrave; Nẵng&hellip;</strong></li>\r\n	<li><strong>Ch&ugrave;a Quan Thế &Acirc;m</strong>&nbsp;&ndash; tọa lạc tại ch&acirc;n n&uacute;i Kim Sơn, một trong năm ngọn Ngũ H&agrave;nh Sơn.</li>\r\n	<li><strong>L&agrave;ng nghề đi&ecirc;u khắc đ&aacute;</strong>&nbsp;v&agrave; mua sắm tại cửa h&agrave;ng đặc sản Miền Trung.</li>\r\n</ul>\r\n\r\n<p>Ăn trưa. Khởi h&agrave;nh tham quan&nbsp;<strong>Phố cổ Hội An</strong>&nbsp;&ndash; du kh&aacute;ch tản bộ kh&aacute;m ph&aacute; c&aacute;c c&ocirc;ng tr&igrave;nh kiến tr&uacute;c nổi tiếng:&nbsp;<em>Ch&ugrave;a Cầu Nhật Bản, c&aacute;c ng&ocirc;i nh&agrave; cổ h&agrave;ng trăm tuổi, Hội Qu&aacute;n Phước Kiến, Xưởng thủ c&ocirc;ng mỹ nghệ.</em>&nbsp;Phố cổ Hội An l&agrave; qu&aacute; khứ v&agrave;ng son của một thương cảng sầm uất thời phong kiến.</p>\r\n\r\n<p>Ăn tối. Khởi h&agrave;nh về lại Đ&agrave; Nẵng. Tự do kh&aacute;m ph&aacute; Đ&agrave; Nẵng về đ&ecirc;m. Nghỉ đ&ecirc;m tại&nbsp;<strong>Đ&agrave; Nẵng</strong>.&nbsp;</p>'),
(10, 5, 'ĐÀ NẴNG – BÀ NÀ – HUẾ', '<p>Ăn s&aacute;ng buffet tại kh&aacute;ch sạn. Trả ph&ograve;ng. Khởi h&agrave;nh tham quan:</p>\r\n\r\n<ul>\r\n	<li><strong>Khu du lịch B&agrave; N&agrave; Hills</strong>&nbsp;&ndash; chinh phục B&agrave; N&agrave; bằng hệ thống c&aacute;p treo một d&acirc;y d&agrave;i nhất thế giới 5.801m v&agrave; l&agrave; một trong 10 tuyến c&aacute;p treo ấn tượng nhất thế giới. B&agrave; N&agrave; l&agrave; nơi c&oacute; những khoảnh khắc giao m&ugrave;a bất ngờ Xu&acirc;n &ndash; Hạ &ndash; Thu &ndash; Đ&ocirc;ng trong một ng&agrave;y.<br />\r\n	<em><strong>(chi ph&iacute; c&aacute;p treo B&agrave; N&agrave; tự t&uacute;c)</strong></em></li>\r\n	<li><strong>Ch&ugrave;a Linh Ứng</strong>&nbsp;với tượng Phật Th&iacute;ch Ca cao 27m, đền thờ&nbsp;<strong>B&agrave; Ch&uacute;a Mẫu Thượng Ng&agrave;n.</strong></li>\r\n	<li><strong>Cầu V&agrave;ng</strong>&nbsp;&ndash; c&acirc;y cầu độc đ&aacute;o nằm trong vườn Thi&ecirc;n Thai, được x&acirc;y dựng tr&ecirc;n độ cao 1.400m so với mặt nước biển, được n&acirc;ng đỡ bởi kiến tr&uacute;c h&igrave;nh đ&ocirc;i b&agrave;n tay khổng lồ độc đ&aacute;o.</li>\r\n	<li><strong>C&ocirc;ng vi&ecirc;n Fantasy Park</strong>&nbsp;với hơn 100 tr&ograve; chơi phi&ecirc;u lưu hấp dẫn, mang đến cho qu&yacute; kh&aacute;ch nhiều cung bậc cảm x&uacute;c bất ngờ v&agrave; th&uacute; vị.</li>\r\n</ul>\r\n\r\n<p><strong>Ăn trưa buffet tại B&agrave; N&agrave;<em>&nbsp;(chi ph&iacute; tự t&uacute;c).</em></strong></p>\r\n\r\n<p><em>*Gi&aacute; combo v&eacute; c&aacute;p treo B&agrave; N&agrave; Hills + v&eacute; buffet trưa tham khảo:&nbsp;<strong>1,250,000VNĐ</strong>/ người.</em></p>\r\n\r\n<p><em>(Nếu qu&yacute; kh&aacute;ch kh&ocirc;ng tham quan B&agrave; N&agrave; th&igrave; tự t&uacute;c ăn trưa v&agrave; tự t&uacute;c chi ph&iacute; nhập đo&agrave;n tại điểm hẹn)</em>.</p>\r\n\r\n<p>Khởi h&agrave;nh đi&nbsp;<strong>Huế</strong>&nbsp;đi xuy&ecirc;n&nbsp;<strong>hầm đường bộ đ&egrave;o Hải V&acirc;n</strong>. Tr&ecirc;n đường di chuyển, dừng ch&acirc;n chụp h&igrave;nh lưu niệm tại&nbsp;<strong>L&agrave;ng ch&agrave;i Lăng C&ocirc;</strong>. Đến Huế, nhận ph&ograve;ng kh&aacute;ch sạn.</p>\r\n\r\n<p>Ăn tối với đặc sản xứ Huế&nbsp;<em>(B&aacute;nh b&egrave;o, lọc, nậm, kho&aacute;i&hellip;)</em>. Xuống thuyền Rồng thưởng thức&nbsp;<strong>Ca Huế tr&ecirc;n s&ocirc;ng Hương</strong>&nbsp;&ndash; n&eacute;t văn h&oacute;a độc đ&aacute;o của xứ Huế. Nghỉ đ&ecirc;m tại Huế.</p>'),
(11, 5, 'THÁNH ĐỊA LA VANG – ĐỘNG PHONG NHA', '<p>Ăn s&aacute;ng buffet tại kh&aacute;ch sạn. Rời Huế khởi h&agrave;nh đi&nbsp;<strong>Phong Nha &ndash; Kẻ B&agrave;ng</strong>. Tr&ecirc;n đường tham quan:</p>\r\n\r\n<ul>\r\n	<li><strong>Th&aacute;nh Địa La Vang</strong>&nbsp;&ndash; Tiểu Vương Cung Th&aacute;nh Đường, nơi lưu dấu những vết t&iacute;ch của lịch sử v&agrave; l&agrave; trung t&acirc;m h&agrave;nh hương C&ocirc;ng Gi&aacute;o lớn nhất của nước ta.</li>\r\n	<li><strong>Vĩ tuyến 17</strong>&nbsp;với chứng t&iacute;ch&nbsp;<strong>s&ocirc;ng Bến Hải &ndash; cầu Hiền Lương</strong>&nbsp;huyền thoại.</li>\r\n	<li>Di chuyển ngang qua<strong>&nbsp;c&aacute;nh đồng điện gi&oacute; Quảng B&igrave;nh</strong>&nbsp;l&agrave; dự &aacute;n điện gi&oacute; tr&ecirc;n bờ c&oacute; quy m&ocirc; lớn nhất Việt Nam t&iacute;nh đến thời điểm hiện nay.</li>\r\n</ul>\r\n\r\n<p>Ăn trưa tại&nbsp;<strong>Phong Nha</strong>. Ngồi thuyền ngược&nbsp;<strong>s&ocirc;ng Son</strong>&nbsp;chinh phục&nbsp;<strong>Động Phong Nha</strong>: C&ocirc; Ti&ecirc;n &amp; Cung Đ&igrave;nh dưới s&acirc;u l&ograve;ng n&uacute;i nơi c&oacute; con s&ocirc;ng ngầm từ L&agrave;o chảy sang, chi&ecirc;m ngưỡng c&aacute;c khối thạch nhũ tuyệt đẹp được kiến tạo bởi thi&ecirc;n nhi&ecirc;n qua h&agrave;ng ngh&igrave;n năm.</p>\r\n\r\n<p>Khởi h&agrave;nh về Huế theo đường Trường Sơn &ndash; Hồ Ch&iacute; Minh.</p>\r\n\r\n<p>Ăn tối. Tự do kh&aacute;m ph&aacute; cố đ&ocirc; Huế về đ&ecirc;m với&nbsp;<strong>cầu Tr&agrave;ng Tiền</strong>&nbsp;rực rỡ soi m&igrave;nh xuống d&ograve;ng s&ocirc;ng Hương thơ mộng. Nghỉ đ&ecirc;m tại&nbsp;<strong>Huế</strong>.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tourss`
--

CREATE TABLE `tbl_tourss` (
  `tourId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceAdult` double NOT NULL,
  `priceChild` double NOT NULL,
  `destination` varchar(255) NOT NULL,
  `domain` enum('b','t','n') NOT NULL COMMENT '''b'' : MienBac,\r\n''t'' : MienTrung,\r\n''n'' : MienNam',
  `availability` tinyint(1) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reviews` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tourss`
--

INSERT INTO `tbl_tourss` (`tourId`, `title`, `time`, `description`, `quantity`, `priceAdult`, `priceChild`, `destination`, `domain`, `availability`, `startDate`, `endDate`, `reviews`) VALUES
(1, 'BIỂN ĐẢO 3N2Đ | PHÚ QUỐC', '3 ngày 2 đêm', '• Tham quan: Cơ sở sản xuất Rượu, Thị trấn Hoàng Hôn, Vườn Tiêu Phú Quốc, Dinh Cậu, Dinh Bà, Tượng đài Bác Hồ.<br> \r\n• Chương trình: Tàu câu cá – lặn ngắm san hô.<br> \r\n• Lưu trú: Resort 4 sao.<br> \r\n• Hoạt động khác: Tắm biển, lặn biển, ngắm san hô, câu cá và thử sức với các trò chơi biển.', 39, 3690000, 1845000, 'PHÚ QUỐC', 'n', 0, '2025-05-20', '2025-05-22', NULL),
(2, 'MIỀN TRUNG 3N2Đ | ĐÀ NẴNG', '3 ngày 2 đêm', '', 40, 4250000, 2845000, 'ĐÀ NẴNG', 't', 0, '2025-05-14', '2025-05-16', NULL),
(3, 'MIỀN BẮC 4N3Đ | HÀ NỘI – LÀO CAI – SA PA', '4 ngày 3 đêm', '', 50, 5990000, 3298000, 'HÀ NỘI - LÀO CAI – SA PA', 'b', 0, '2025-05-21', '2025-05-24', NULL),
(5, 'MIỀN TRUNG 5N4Đ | ĐÀ NẴNG – HỘI AN – BÀ NÀ – HUẾ – PHONG NHA', '4 ngày 3 đêm', '<p><strong>ĐIỂM NHẤN CHƯƠNG TR&Igrave;NH</strong></p>\n\n<ul>\n	<li><strong>Tham quan</strong>: Di sản thi&ecirc;n nhi&ecirc;n thế giới Động Phong Nha, khu du lịch B&agrave; N&agrave; Hills, Ch&ugrave;a Quan Thế &Acirc;m, ch&ugrave;a Thi&ecirc;n Mụ, Ch&ugrave;a Linh Ứng, Cầu T&igrave;nh Y&ecirc;u,&hellip;</li>\n	<li><strong>Lưu tr&uacute;</strong>: Kh&aacute;ch sạn chuẩn 4 sao.&nbsp;</li>\n	<li><strong>Ăn uống</strong>: B&aacute;nh tr&aacute;ng thịt heo 2 đầu da v&agrave; m&igrave; Quảng Đ&agrave; Nẵng, đặc sản xứ Huế: B&aacute;nh b&egrave;o, lọc, nậm, kho&aacute;i&hellip;</li>\n	<li><strong>Hoạt động kh&aacute;c</strong>: Tham quan v&agrave; mua sắm tại Phố Cổ, tự do kh&aacute;m ph&aacute; Đ&agrave; Nẵng về đ&ecirc;m,&hellip;</li>\n</ul>', 30, 4990000, 2100000, 'ĐÀ NẴNG', 't', 1, '2025-05-27', '2025-05-31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_userss`
--

CREATE TABLE `tbl_userss` (
  `userId` int(11) NOT NULL,
  `google_id` varchar(50) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `ipAddress` varchar(50) DEFAULT NULL,
  `isActive` enum('y','n') NOT NULL DEFAULT 'n' COMMENT 'y: yes\r\nn: no',
  `status` enum('d','b') DEFAULT NULL COMMENT 'd: delete\r\nb: baned',
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_userss`
--

INSERT INTO `tbl_userss` (`userId`, `google_id`, `fullName`, `username`, `password`, `email`, `avatar`, `phoneNumber`, `address`, `ipAddress`, `isActive`, `status`, `createdDate`, `updatedDate`, `activation_token`) VALUES
(35, '114827722942674541412', '3758_Trần Long vũ', 'user-google-1747770994', '25d55ad283aa400af464c76d713c07ad', 'tranlongvu02102004@gmail.com', '1747773331.jpg', '0348590784', 'Bình Thuận', NULL, 'y', NULL, '2025-05-20 19:56:34', '2025-05-20 19:56:34', NULL),
(43, NULL, 'Trần Long Vũ', 'longvu', 'fcea920f7412b5da7be0cf42b8c93759', 'longvu02102004@gmail.com', '1747950651.jpg', '0965264603', 'Hồ Chí Minh', NULL, 'y', NULL, '2025-05-22 03:51:14', '2025-05-22 03:51:14', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_adminn`
--
ALTER TABLE `tbl_adminn`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_bookingg`
--
ALTER TABLE `tbl_bookingg`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fk_booking_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_chatt`
--
ALTER TABLE `tbl_chatt`
  ADD PRIMARY KEY (`chatId`),
  ADD KEY `fk_chat_user` (`userId`),
  ADD KEY `fk_chat_admin` (`adminId`);

--
-- Chỉ mục cho bảng `tbl_checkoutt`
--
ALTER TABLE `tbl_checkoutt`
  ADD PRIMARY KEY (`checkoutId`),
  ADD KEY `fk_checkout_booking` (`bookingId`);

--
-- Chỉ mục cho bảng `tbl_contactt`
--
ALTER TABLE `tbl_contactt`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tbl_historyy`
--
ALTER TABLE `tbl_historyy`
  ADD PRIMARY KEY (`historyId`),
  ADD KEY `fk_history_user` (`userId`),
  ADD KEY `fk_history_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_imagess`
--
ALTER TABLE `tbl_imagess`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `fk_image_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_invoicee`
--
ALTER TABLE `tbl_invoicee`
  ADD PRIMARY KEY (`invoiceId`),
  ADD KEY `fk_invoice_booking` (`bookingId`);

--
-- Chỉ mục cho bảng `tbl_promotionn`
--
ALTER TABLE `tbl_promotionn`
  ADD PRIMARY KEY (`promotionId`);

--
-- Chỉ mục cho bảng `tbl_reviewss`
--
ALTER TABLE `tbl_reviewss`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `fk_riview_user` (`userId`),
  ADD KEY `fk_riview_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_temp_imagess`
--
ALTER TABLE `tbl_temp_imagess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tempimage_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_timelinee`
--
ALTER TABLE `tbl_timelinee`
  ADD PRIMARY KEY (`timeLineId`),
  ADD KEY `fk_tour` (`tourId`);

--
-- Chỉ mục cho bảng `tbl_tourss`
--
ALTER TABLE `tbl_tourss`
  ADD PRIMARY KEY (`tourId`);

--
-- Chỉ mục cho bảng `tbl_userss`
--
ALTER TABLE `tbl_userss`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_adminn`
--
ALTER TABLE `tbl_adminn`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_bookingg`
--
ALTER TABLE `tbl_bookingg`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_chatt`
--
ALTER TABLE `tbl_chatt`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_checkoutt`
--
ALTER TABLE `tbl_checkoutt`
  MODIFY `checkoutId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_contactt`
--
ALTER TABLE `tbl_contactt`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_historyy`
--
ALTER TABLE `tbl_historyy`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_imagess`
--
ALTER TABLE `tbl_imagess`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_invoicee`
--
ALTER TABLE `tbl_invoicee`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_promotionn`
--
ALTER TABLE `tbl_promotionn`
  MODIFY `promotionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_reviewss`
--
ALTER TABLE `tbl_reviewss`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_temp_imagess`
--
ALTER TABLE `tbl_temp_imagess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_timelinee`
--
ALTER TABLE `tbl_timelinee`
  MODIFY `timeLineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_tourss`
--
ALTER TABLE `tbl_tourss`
  MODIFY `tourId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_userss`
--
ALTER TABLE `tbl_userss`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_bookingg`
--
ALTER TABLE `tbl_bookingg`
  ADD CONSTRAINT `fk_booking_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`);

--
-- Các ràng buộc cho bảng `tbl_chatt`
--
ALTER TABLE `tbl_chatt`
  ADD CONSTRAINT `fk_chat_admin` FOREIGN KEY (`adminId`) REFERENCES `tbl_adminn` (`adminId`),
  ADD CONSTRAINT `fk_chat_user` FOREIGN KEY (`userId`) REFERENCES `tbl_userss` (`userId`);

--
-- Các ràng buộc cho bảng `tbl_checkoutt`
--
ALTER TABLE `tbl_checkoutt`
  ADD CONSTRAINT `fk_checkout_booking` FOREIGN KEY (`bookingId`) REFERENCES `tbl_bookingg` (`bookingId`);

--
-- Các ràng buộc cho bảng `tbl_historyy`
--
ALTER TABLE `tbl_historyy`
  ADD CONSTRAINT `fk_history_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`),
  ADD CONSTRAINT `fk_history_user` FOREIGN KEY (`userId`) REFERENCES `tbl_userss` (`userId`);

--
-- Các ràng buộc cho bảng `tbl_imagess`
--
ALTER TABLE `tbl_imagess`
  ADD CONSTRAINT `fk_image_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`);

--
-- Các ràng buộc cho bảng `tbl_invoicee`
--
ALTER TABLE `tbl_invoicee`
  ADD CONSTRAINT `fk_invoice_booking` FOREIGN KEY (`bookingId`) REFERENCES `tbl_bookingg` (`bookingId`);

--
-- Các ràng buộc cho bảng `tbl_reviewss`
--
ALTER TABLE `tbl_reviewss`
  ADD CONSTRAINT `fk_riview_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`),
  ADD CONSTRAINT `fk_riview_user` FOREIGN KEY (`userId`) REFERENCES `tbl_userss` (`userId`);

--
-- Các ràng buộc cho bảng `tbl_temp_imagess`
--
ALTER TABLE `tbl_temp_imagess`
  ADD CONSTRAINT `fk_tempimage_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`);

--
-- Các ràng buộc cho bảng `tbl_timelinee`
--
ALTER TABLE `tbl_timelinee`
  ADD CONSTRAINT `fk_tour` FOREIGN KEY (`tourId`) REFERENCES `tbl_tourss` (`tourId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
