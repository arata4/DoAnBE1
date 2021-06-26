-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3309
-- Thời gian đã tạo: Th1 14, 2021 lúc 05:49 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `Manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `Manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`Manu_id`, `Manu_name`) VALUES
(2, 'Oppo'),
(3, 'Samsung'),
(4, 'Nokia'),
(5, 'Xiaomi'),
(6, 'Huawei'),
(8, 'Apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `name`, `email`, `phone`, `message`) VALUES
(1, '', '', 0, ''),
(2, '', '', 0, ''),
(3, '', '', 0, ''),
(4, '', '', 0, ''),
(5, '', '', 0, ''),
(6, '', '', 0, ''),
(7, '', '', 0, ''),
(8, '', '', 0, ''),
(9, '', '', 0, ''),
(10, '', '', 0, ''),
(11, '', '', 0, ''),
(12, '', '', 0, ''),
(13, '1', '1@sd', 1, '1'),
(14, '1', '1@sd', 1, '1'),
(15, '1', '1@sd', 1, '1'),
(16, '1', '1@sd', 1, '1'),
(17, '1', '1@sd', 1, '1'),
(18, '1', '1@sd', 1, '1'),
(19, '1', '1@sd', 1, '1'),
(20, '1', '1@sd', 1, '1'),
(21, '1', '1@sd', 1, '1'),
(22, '1', '1@sd', 1, '1'),
(23, '1', '1@sd', 1, '1'),
(24, '1', '1@sd', 1, '1'),
(25, '1', '1@sd', 1, '1'),
(26, '1', '1@sd', 1, '1'),
(27, '1', '1@sd', 1, '1'),
(28, '1', '1@sd', 1, '1'),
(29, '1', '1@sd', 1, '1'),
(30, '1', '1@sd', 1, '1'),
(31, '1', '1@sd', 1, '1'),
(32, '1', '1@sd', 1, '1'),
(33, 'SamSum J6', '213@23', 1, '123'),
(34, 'SamSum J6', '213@23', 1, '123'),
(35, 'SamSum J6', '213@23', 1, '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Manu_id` int(11) NOT NULL,
  `Type_id` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Feature` tinyint(4) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `Name`, `Manu_id`, `Type_id`, `Price`, `Pro_image`, `Description`, `Feature`, `Created_at`) VALUES
(50, 'Iphone 11', 8, 1, 35990000, 'iphone11.png', 'iPhone 11 được trang bị vi xử lý Apple A13 Bionic cùng với máy ảnh kép với tính năng chụp góc siêu rộng.[4] Tuy nhiên iPhone 11 chỉ được trang bị sẵn sạc phổ thông 5W trong hộp giống với các thế hệ iPhone tiền nhiệm. Trong khi iPhone 11 Pro và 11 Pro Max được trang bị sạc nhanh 18W, mặc dù 3 phiên bản này đều sỡ hữu công nghệ sạc nhanh', 1, '2021-01-08 01:39:57'),
(51, 'Iphone 12', 8, 1, 30990000, '1609613549Iphone12.png', 'Chip A14 Bionic\r\nRAM: 4GB\r\nBộ nhớ 64GB/128GB/256GB\r\nMàn hình 6.1 inch Super Retina XDR OLED (2532 x 1170 ở mật độ điểm ảnh 476ppi), tỉ lệ tương phản 2,000,000:1, độ sáng 625/1,200 nit, True Tone.\r\nCụm 2 camera sau 12MP (góc siêu rộng f/2.4 và rộng f/1.6), đèn flash, zoom quang học 2x, OIS, chế độ chân dung, Smart HDR 4, quay video 4K ở tốc độ 24/30/60fps.\r\nCamera trước 12MP (f/2.2), Retina Flash, chế độ chân dung, Smart HDR 3.\r\nWi‑Fi 6 (802.11ax) với MIMO\r\nBluetooth 5.0\r\nKháng nước và bụi IP68 (độ sâu 6m trong 30 phút), chất liệu mặt kính Ceramic Shield\r\nThời lượng pin được thông báo lên đến 17 tiếng\r\nKích thước: 146.7 x 71.5 x 7.4mm\r\nKhối lượng: 162g', 1, '2021-01-08 01:42:03'),
(5, 'Điện thoại Xiaomi Redmi 9', 5, 1, 3790000, 'xiaomi.png', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-11-25 17:01:41'),
(6, 'Điện thoại Huawei Nova 7i', 6, 1, 5990000, 'huawei.png', 'Thu cũ đổi mới - Lên đời Huawei Xem chi tiết\r\nTặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-11-25 17:02:06'),
(8, 'Điện thoại Huawei Y6p\r\n', 6, 1, 3340000, 'huawei-y6p.png', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-11-17 17:00:00'),
(9, 'Laptop Apple MacBook Air 2017', 1, 2, 20990000, 'apple-macbook-air.png', 'Balo Laptop 15\" Tucano LOOP BKLOOP15\r\nMua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 1, '2020-11-16 17:00:00'),
(21, 'Iphone 12 Pro Max 256GB', 1, 1, 63000000, 'Iphone12.png', 'iPhone 12 VN/A phiên bản bộ nhớ trong 128GB sẽ khiến bạn có thể vô tư với hàng tá ứng dụng, chứa rất nhiều ảnh, video và không cần lo lắng việc không đủ dung lượng sử dụng', 1, '2020-11-08 08:55:25'),
(11, 'Đồng hồ thông minh Samsung Galaxy Watch Active R500', 3, 4, 899000, 'samsung-galaxy-watch-active.png', 'Giao ngay từ cửa hàng gần bạn nhất\r\nHướng dẫn sử dụng, giải đáp thắc mắc sản phẩm\r\nMang nhiều màu để bạn lựa chọn\r\nMang thêm đồng hồ thông minh khác để bạn xem', 0, '2020-11-25 17:01:22'),
(12, 'Máy tính bảng Samsung Galaxy Tab A7', 3, 6, 7990000, 'samsung-galaxy-tab-a7.png', 'Bao da Tab A7\r\nGiảm giá 500,000đ qua quà tặng Galaxy Xem chi tiết\r\nMua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nTặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-11-25 18:16:44'),
(13, 'Điện thoại Samsung Galaxy A21s ', 3, 1, 4690000, 'samsung-galaxy-a21s', 'Giao ngay từ cửa hàng gần bạn nhất\r\nChuyển danh bạ, dữ liệu qua máy mới\r\nMang nhiều màu để bạn lựa chọn\r\nMang thêm điện thoại khác để bạn xem', 1, '2020-11-16 17:00:00'),
(14, 'Điện thoại Samsung Galaxy A01', 3, 1, 2790000, 'samsung-galaxy-a01.png', 'Giao ngay từ cửa hàng gần bạn nhất\r\nChuyển danh bạ, dữ liệu qua máy mới\r\nMang nhiều màu để bạn lựa chọn\r\nMang thêm điện thoại khác để bạn xem', 0, '2020-10-22 17:00:00'),
(15, 'Điện thoại iPhone SE', 1, 1, 12990000, 'iphone-se.png', 'Giảm giá 1,500,000đ *\r\nPhụ kiện Apple mua kèm giảm đến 20% (không áp dụng đồng thời KM khác) Xem chi tiết\r\nTặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 1, '2020-11-09 17:00:00'),
(16, 'Oppo Watch', 1, 4, 5990000, 'oppo-watch.png', 'Giao ngay từ cửa hàng gần bạn nhất\r\nHướng dẫn sử dụng, giải đáp thắc mắc sản phẩm\r\nMang thêm đồng hồ thông minh khác để bạn xem', 0, '2020-08-25 17:00:00'),
(17, 'Máy tính bảng Samsung Galaxy Tab S6 Lite\r\n', 3, 6, 9990000, 'samsung-galaxy-tab-s6-lite-xanh.png', 'Mua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nTặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-11-01 17:00:00'),
(18, 'Laptop Apple MacBook Air 2020', 1, 2, 28990000, 'apple-macbook-air-2020.png', 'Balo Laptop 13.3\" Tucano WOV-MB133\r\nMua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 0, '2020-10-06 17:00:00'),
(19, 'Laptop Asus Gaming Rog Strix G512', 3, 2, 28990000, 'asus-gaming-rog-strix-g512.png', 'Tai nghe chụp tai Gaming MozardX DS902 7.1 *\r\nChuột Gaming Zadez G-152M *\r\nMua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 1, '2021-01-19 17:00:00'),
(20, 'Laptop Lenovo Legion 5', 2, 2, 28990000, 'lenovo-legion-5-15imh05.png', 'Chuột Gaming Rapoo VT200 *\r\nBalo Lenovo Legion Gaming\r\nMua kèm Microsoft 365 Personal giá chỉ 690.000đ Xem chi tiết\r\nPin sạc dự phòng giảm 30% khi mua kèm. (click xem chi tiết)', 1, '2020-08-03 17:00:00'),
(24, 'Chuột Bluetooth Apple Magic Mouse 2 MLA02', 1, 5, 2490000, 'chuot-bluetooth-apple-mla02.png', 'Thiết kế độc đáo và cao cấp đến từ Apple.\r\nToàn bộ thân chuột sử dụng cảm ứng hoàn toàn.\r\nCông nghệ nhận biết cử chỉ lướt ngang dọc để nhận lệnh.\r\nSạc pin 2 tiếng là có thể sử dụng lên đến 2 tháng.\r\nĐộ phân giải 1500 DPI, cho hoạt động mượt mà.\r\nSử dụng cho hệ điều hành MacOS (MacBook), không hỗ trợ hệ điều hành Windows.\r\nSản phẩm chính hãng Apple, nguyên seal 100%.\r\nLưu ý: Thanh toán trước khi mở seal.', 1, '2021-01-01 08:44:20'),
(23, 'Loa bluetooth Sony Extra Bass SRS-XB43', 3, 3, 4990000, 'loa-bluetooth-sony-srs-xb43.png', 'Thiết kế cá tính, 2 màu lựa chọn, dễ di chuyển.\r\nÂm thanh rõ nét với 2 driver woofer và 2 driver tweeter.\r\nÂm trầm mạnh mẽ với Extra Bass và màng loa kiểu mới lạ.\r\nKiểm soát đèn LED trên điện thoại với ứng dụng Sony | Music Center và Fiestable.\r\nDùng trong suốt 24 giờ, sạc trong 5 tiếng, sạc ngược qua cổng USB cho thiết bị khác.\r\nKhả năng chống va đập, chống nước và chống bụi chuẩn IP67, tăng độ bền, an toàn khi dùng.\r\nĐồng bộ 100 loa qua tính năng Party Connect.', 0, '2021-01-01 08:42:42'),
(52, 'Iphone 6', 8, 1, 5000000, 'iphone6splus.png', 'iPhone 6 và iPhone 6 Plus là bộ đôi điện thoại thông minh được thiết kế, phát triển và kinh doanh trên thị trường bởi Apple Inc. Nó là thế hệ thứ tám của dòng iPhone, tiếp nối iPhone 5S, được công bố vào ngày 9 tháng 9 năm 2014 và được phát hành trên thị trường vào ngày 19 tháng 9 năm 2014[15]. Bộ đôi tiếp tục được thay thế bởi hai mẫu hàng đầu kế tiếp của dòng iPhone là iPhone 6S và 6S Plus vào ngày 9 tháng 9 năm 2015. Thế hệ iPhone này được trang bị màn hình hiển thị lớn hơn, bộ xử lý nhanh hơn, camera được nâng cấp, mọi thứ được cải thiện và hỗ trợ dịch vụ thanh toán di động', 0, '2021-01-08 01:44:46'),
(53, 'Iphone 5', 8, 1, 2000000, 'iphone5s.png', 'Kết quả hình ảnh cho description ve iphone 5\r\niPhone 5 là điện thoại thông minh màn hình cảm ứng thế hệ thứ sáu của Apple Inc, chính thức ra mắt ngày 12/9/2012. So với những phiên bản tiền nhiệm của nó, nó có màn hình 4 inch (lớn hơn so với 3,5 inch của các bản trước), và một cổng kết nối 8-pin nhỏ hơn, nhẹ hơn, mỏng hơn, và nhanh hơn.', 0, '2021-01-08 01:46:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `Type_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`Type_id`, `Type_name`) VALUES
(1, 'điện thoại'),
(2, 'laptop'),
(3, 'loa'),
(4, 'đồng hồ'),
(5, 'phụ kiện'),
(6, 'Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
