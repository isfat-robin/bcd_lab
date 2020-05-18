DROP DATABASE IF EXISTS bcd_lab;
CREATE database bcd_lab;
USE bcd_lab;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `challenge` (
  `id` int(5) NOT NULL,
  `labs` text NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `challenge` (`id`, `labs`, `result`) VALUES
(1, 'indexpage', 0),
(2, 'notfound', 0);


CREATE TABLE `cookies` (
  `id` int(5) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `name`, `location`, `email`, `password`, `pass`) VALUES
(1, 'Admin', 'BD', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Jhon', 'USA', 'jhon@mail.com', '4d2ff2f945883e090ac4de4fb9e23fab', 'jhon123'),
(3, 'Root', 'AUS', 'root@mail.com', 'ff9830c42660c1dd1942844f8069b74a', 'root123'),
(4, 'Micle', 'UK', 'micle@mail.com', '132bc1a6916e11e35f4d115c6a5972b9', 'micle123'),
(5, 'David', 'London', 'david@mail.com', '55fc5b709962876903785fd64a6961e5', 'david123');


CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `usr` (`id`, `name`, `username`, `password`) VALUES
(1, 'Offensive Root', 'admin', 'root'),
(2, 'Isfat Robin', 'isfat', 'admin123'),
(3, 'Jhon Davis', 'jhon', 'pass123');


ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cookies`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `challenge`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `cookies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

