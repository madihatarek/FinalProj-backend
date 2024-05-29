-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 06:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `license` text NOT NULL,
  `dimension` varchar(60) NOT NULL,
  `format` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT '0 not active not display\r\n1 active photo to display',
  `photo` varchar(75) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `photo_date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `title`, `license`, `dimension`, `format`, `active`, `photo`, `tag_id`, `photo_date`, `views`) VALUES
(5, 'Clock', 'This  clock is more than a timepiece; and a symbol of the artistry and craftsmanship of ages past. It stands as a silent witness to the passage of time, its presence a comforting reminder of the constancy amidst the changing tides of life.', '20x30', 'jpg', 0, '690c27abed0654eff3c79a7460ca793e.jpeg', 2, '2024-02-06', 1),
(7, 'Green', 'License', '20x30', 'jpg', 1, '16ccb2d0a395da0c6215f77e00c9cd81.jpeg', 1, '2024-03-05', 2),
(8, 'Old-clock', 'This old clock is more than a timepiece; it is a relic of history, a keeper of memories, and a symbol of the artistry and craftsmanship of ages past. It stands as a silent witness to the passage of time, its presence a comforting reminder of the constancy amidst the changing tides of life.', '20x30', 'png', 1, '3f001c70968016ccae935e341de9a3d5.jpeg', 2, '2024-03-20', 2),
(9, 'Shrubs', 'License', '1024x1032', 'jpg', 1, '8072a8b5cdb97773007398d666e536fd.jpeg', 1, '2024-05-22', 1),
(10, 'Colorful-fish', 'License', '20x30', 'jpg', 1, '79dcb9e2e536e70f577967e9208308cc.jpeg', 4, '2024-03-08', 2),
(11, 'Woman', 'A fragrance, a memory in every drop, lingering like a soft whisper. Notes of jasmine and vanilla, an elegant embrace on the skin. Bottled essence of romance and allure, a subtle seduction. A symphony of scents, each spray a journey to a different world.', '20x30', 'jpg', 0, 'eba1b439c232696f5dbe919daa6316a3.jpeg', 7, '2024-05-16', 3),
(12, 'Male Perfume', 'A fragrance, a memory in every drop, lingering like a soft whisper. Notes of jasmine and vanilla, an elegant embrace on the skin. Bottled essence of romance and allure, a subtle seduction. A symphony of scents, each spray a journey to a different world.', '1024x1032', 'jpg', 1, 'ce3b9233e8a13b3729a2ca3537821d75.jpeg', 7, '2024-06-19', 2),
(13, 'Blue-sea', 'License', '1024x1032', 'jpg', 1, 'fd41608cbc2a15168698407943f7394d.jpeg', 6, '2024-04-10', 2),
(14, 'Black-sea', 'License', '20x30', 'jpg', 0, 'fe40e579043f570561048efbdf2c10ac.jpeg', 6, '2024-07-17', 1),
(15, 'Peace', 'Peace in international relations means the absence of hostility and conflict (such as war) and freedom from fear of violence between individuals or groups.', '1024x1032', 'png', 1, 'c6f766140a7822fc56d5758f11cb129f.jpeg', 8, '2024-06-24', 4),
(16, 'JagaurH45', 'Jaguar is the luxury vehicle brand of Jaguar Land Rover, a British multinational car manufacturer with its headquarters in Whitley, Coventry, England.', '1024x1032', 'png', 0, '857fdb5442c07868c2fff886314d638c.png', 9, '2024-02-20', 3),
(17, 'BMW K55', 'Most modern BMWs are truly rear swingarm, single sided at the back (compare with the regular swinging fork usually, and wrongly, called swinging arm).', '20x30', 'png', 1, 'ada9a07db813b15161376ec7b13e8935.png', 9, '2024-03-20', 1),
(18, 'Red Flowers', 'A delicate bloom, petals soft as a whisper. Colors dance in the gentlest breeze. Fragrance fills the air, a sweet embrace. Nature\'s artistry, a fleeting beauty to behold.', '20x30', 'jpg', 1, 'e97453103ce4db7d186f6ff717f2f1b3.jpeg', 5, '2024-08-06', 3),
(19, 'Flower', 'A delicate bloom, petals soft as a whisper. Colors dance in the gentlest breeze. Fragrance fills the air, a sweet embrace. Nature\'s artistry, a fleeting beauty to behold.', '1024x1032', 'jpg', 1, '72b6c8596bed3808f793739451825a4d.jpeg', 5, '2024-04-26', 2),
(20, 'Sand-Clock', 'This old clock is more than a timepiece; it is a relic of history, a keeper of memories, and a symbol of the artistry and craftsmanship of ages past. It stands as a silent witness to the passage of time, its presence a comforting reminder of the constancy amidst the changing tides of life.', '12x24', 'png', 1, '5e0b71808774ffa4239870ef205c290d.jpeg', 2, '2024-04-24', 4),
(21, 'Iphone14', 'A sleek, modern smartphone, a pocket-sized marvel. Its vibrant display and powerful camera capture life\'s moments. With seamless connectivity and endless apps, it\'s a versatile companion. In hand, a gateway to information, entertainment, and creativity.', '20x30', 'jpg', 1, '565e54fa3656870e708a46b442fa7102.jpeg', 15, '2024-09-10', 4),
(22, 'Iphone15', 'A sleek, modern smartphone, a pocket-sized marvel. Its vibrant display and powerful camera capture life\'s moments. With seamless connectivity and endless apps, it\'s a versatile companion. In hand, a gateway to information, entertainment, and creativity.', '20x30', 'png', 0, 'd9dca4ebae30d0b2757f1abc20032119.jpeg', 15, '2024-05-16', 1),
(23, 'Iphone13', 'A sleek, modern smartphone, a pocket-sized marvel. Its vibrant display and powerful camera capture life\'s moments. With seamless connectivity and endless apps, it\'s a versatile companion. In hand, a gateway to information, entertainment, and creativity.', '12x24', 'jpg', 0, '4e717d66df364eea48970f40fe392efc.jpeg', 15, '2024-03-07', 1),
(24, 'Sun-Flower', 'A delicate bloom, petals soft as a whisper. Colors dance in the gentlest breeze. Fragrance fills the air, a sweet embrace. Nature\'s artistry, a fleeting beauty to behold.', '12x24', 'jpg', 0, '4f11a021a97ac09fb232f0e0a758edf4.jpeg', 5, '2024-04-26', 1),
(25, 'Dry-Flowers', 'A delicate bloom, petals soft as a whisper. Colors dance in the gentlest breeze. Fragrance fills the air, a sweet embrace. Nature\'s artistry, a fleeting beauty to behold.', '12x24', 'png', 0, '959a4000edbc63d4f6d10f006db329f7.jpeg', 5, '2023-11-23', 1),
(26, 'Dolphine', 'Graceful swimmer in the shimmering blue, scales catching light. Fins flutter like delicate silk in the water\'s embrace. Silent world of mystery, beneath the surface they glide. A splash of color, a dance of life in the depths.', '1024x1032', 'jpg', 0, '8a8f4625908074d1c434db5f53504d12.jpeg', 4, '2023-09-13', 3),
(27, 'Classic-Perfume', 'A fragrance, a memory in every drop, lingering like a soft whisper. Notes of jasmine and vanilla, an elegant embrace on the skin. Bottled essence of romance and allure, a subtle seduction. A symphony of scents, each spray a journey to a different world.', '20x30', 'jpg', 0, '4713bd010acdf7188055fa04daee879f.jpeg', 7, '2023-10-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`) VALUES
(9, 'Car'),
(2, 'Clocks'),
(4, 'Fish'),
(5, 'Flowers'),
(8, 'Peace'),
(7, 'Perfumes'),
(15, 'Phone'),
(1, 'Plants'),
(6, 'Sea');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 not active user\r\n1 active user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `password`, `active`, `created_at`) VALUES
(1, 'Madiha Tarek Ahmed', 'madiha2024', 'madiha@gmail.com', '$2y$10$od/nmJGk9C8zKjlo0pd2Ju4xS95qvPs/FK4eTRwj1fah0yvrNHLzK', 1, '2024-02-18 23:27:15'),
(2, 'Nada Mohamed', 'nadamohamed', 'nada@gmail.com', '$2y$10$RKxg7g7oEIk1x74UOQYtTuwyZey41eNGCoIj.mynJfl0ZASPhGczO', 0, '2024-02-19 21:27:22'),
(3, 'Nasr  Ahmed', 'nasr2023', 'nasr@gmail.com', '$2y$10$7jL/.EaOPnbiChAhOSPtV.gwQWmwpGwlPFsT7tCyODUnEdoEIfkJi', 0, '2024-02-19 23:57:11'),
(4, 'Ahmed Hossam', 'hossam2024', 'hossam@gmail.com', '$2y$10$GWKUOnp7fF6.087ooPp0yuGAkhVGpPkeKtd9BFvpFMc62BYu9CfZu', 1, '2024-02-20 00:07:01'),
(5, 'Mai Mostafa', 'mai2022', 'mai@gmail.com', '$2y$10$BHc9zaRs9ooyfpk.LtF3cuF9wwuepcdvAvQFeQZ2fPRf8cx8VXqX.', 0, '2024-02-20 02:11:42'),
(7, 'Manal Mostafa', 'mony2012', 'mony@gmail.com', '$2y$10$5rpEiPGlEvlh8SlYibpFe.VwmXkEuSGo27L7VT0fR6pQZsOgtKpvG', 1, '2024-02-20 02:14:24'),
(8, 'Ali elgazar', 'ali2012', 'ali@gmail.com', '$2y$10$eqE3DCVojKHBsB2noloUrOPdrXsAp65DGvqDkaqkbBd3UFNgEWec6', 1, '2024-02-24 18:27:40'),
(9, 'Dina Mustafa', 'dina2022', 'dina@gmail.com', '$2y$10$ELArG58WJsd2o//Icnh3m.4JnOq26xhfVLueRJaFuhalV6kLHmjAy', 1, '2024-02-27 19:14:45'),
(13, 'Omnia El-Gazar', 'omnia2025', 'omnia@gmail.com', '$2y$10$3N34HuTn/IG92d5GNmUDnuLI8oiEvcvI0B9yDpZnFmbL3JSMrGoX.', 0, '2024-02-29 16:22:15'),
(14, 'Ghada Mohamed', 'ghada12', 'ghada@gmail.com', '$2y$10$K3m/d8Hj.QgiuTw0eFT3B.sErr/8oI0atllgKzWXT6zQ2P6YW0Vqi', 1, '2024-02-29 16:23:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
