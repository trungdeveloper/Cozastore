-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 24, 2019 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` text,
  `href` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `description`, `href`) VALUES
(1, 'men', 'FD', 'Men', NULL),
(2, 'women', 'IT', 'Women', NULL),
(3, 'watch', 'FS', 'Watch', NULL),
(4, 'Bag', 'Bag', 'Bag', NULL),
(5, 'shoes', 'Sh', 'Shoes', NULL),
(6, 'wishlist', 'wishlist', 'Wishlist', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Phone` int(100) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `Phone`, `user_name`) VALUES
(29, 'phuc', '101B', NULL, 'phuc'),
(30, 'trung', '101H', NULL, 'trung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL DEFAULT '0',
  `detail1` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'https://via.placeholder.com/350x350/ffcf5b',
  `detail2` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'https://via.placeholder.com/350x350/ffcf5b',
  `detail3` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'https://via.placeholder.com/350x350/ffcf5b',
  `id_product` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filters`
--

CREATE TABLE `filters` (
  `id` int(255) NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `filters`
--

INSERT INTO `filters` (`id`, `value`, `description`, `detail`) VALUES
(1, '50', '$0.00 - $50.00', 'one'),
(2, '100', '$50.00 - $100.00', 'two'),
(3, '150', '$100.00 - $150.00', 'three'),
(4, '200', '$150.00 - $200.00', 'four'),
(5, '200+', '$200.00+', 'five');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ords_prods`
--

CREATE TABLE `ords_prods` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `old_price` int(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(500) DEFAULT NULL,
  `filter` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `quantity`, `description`, `category_id`, `img`, `date_added`, `status`, `filter`) VALUES
(0, 'Mini Silver Mesh Watch', 77, 0, 310, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-15.jpg', '2019-01-08 15:21:06', '2', 2),
(10, 'Esprit Ruffle Shirt', 65, 0, 10, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-01.jpg', '2019-01-08 15:11:43', '1', 2),
(11, 'Herschel supply', 34, 0, 45, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-02.jpg', '2019-01-08 15:12:41', '0', 1),
(12, 'Only Check Trouser', 23, 0, 53, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 1, 'product-03.jpg', '2019-01-08 15:13:17', '0', 1),
(13, 'Classic Trench Coat', 55, 0, 13, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-04.jpg', '2019-01-08 15:13:54', '0', 2),
(14, 'Front Pocket Jumper', 121, 0, 4, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-05.jpg', '2019-01-08 15:15:02', '1', 3),
(15, 'Vintage Inspired Classic', 200, 60, 5, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 3, 'product-06.jpg', '2019-01-08 15:15:41', '0', 4),
(16, 'Shirt in Stretch Cotton', 450, 60, 2, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-07.jpg', '2019-01-08 15:16:48', '1', 5),
(17, 'Pieces Metallic Printed', 55, 60, 100, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-08.jpg', '2019-01-08 15:17:17', '0', 2),
(18, 'Converse All Star Hi Plimsolls', 45, 60, 6, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 5, 'product-09.jpg', '2019-01-08 15:17:57', '1', 1),
(19, 'Femme T-Shirt In Stripe', 37, 0, 9, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-10.jpg', '2019-01-08 15:18:18', '0', 1),
(20, 'Herschel supply', 147, 70, 16, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 1, 'product-11.jpg', '2019-01-08 15:18:43', '1', 3),
(21, 'Herschel supply', 154, 0, 5, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 1, 'product-12.jpg', '2019-01-08 15:19:14', '1', 4),
(22, 'T-Shirt with Sleeve', 156, 0, 171, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-13.jpg', '2019-01-08 15:20:04', '1', 4),
(23, 'Pretty Little Thing', 59, 75, 30, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', 2, 'product-14.jpg', '2019-01-08 15:20:34', '1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active, 0 = not active',
  `des1` varchar(50) NOT NULL,
  `des2` varchar(50) NOT NULL,
  `appear1` text NOT NULL,
  `appear2` text NOT NULL,
  `appear3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `img`, `status`, `des1`, `des2`, `appear1`, `appear2`, `appear3`) VALUES
(1, 'slide-01.jpg', 1, 'Women Collection 2018', 'NEW SEASON', 'fadeInDown', 'fadeInUp', 'zoomIn'),
(2, 'slide-02.jpg', 1, 'Men New-Season', 'Jackets & Coats', 'rollIn', 'lightSpeedIn', 'slideInUp'),
(3, 'slide-03.jpg', 1, 'Men Collection 2018', 'New arrivals', 'rotateInDownLeft', 'rotateInUpRight', 'rotateIn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `u_role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `is_active`, `u_role`) VALUES
(1, 'admin', '123456789', 1, 'admin'),
(30, 'phuc', '123456789', 0, NULL),
(31, 'trung', '123456789', 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`emp_id`,`cus_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Chỉ mục cho bảng `ords_prods`
--
ALTER TABLE `ords_prods`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`category_id`),
  ADD KEY `category_id` (`category_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`,`description`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `ords_prods`
--
ALTER TABLE `ords_prods`
  ADD CONSTRAINT `ords_prods_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ords_prods_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
