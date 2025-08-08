-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `about_title`, `about_content`, `created_at`) VALUES
(1, 'Top 10 Offbeat Travel Destinations Across India That Deserve A Spot On Your Bucket List', 'India is filled with breathtaking places that most tourists overlook. While the usual destinations offer comfort and popularity, some truly unique experiences lie in quieter corners of the country. These offbeat travel spots give you a chance to connect with nature, discover diverse cultures, and experience India in ways that feel fresh and personal. From Himalayan valleys to hidden beaches and ancient ruins, here are ten underrated yet unforgettable destinations in India you must consider for your next journey.', '2025-07-31 07:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `admin_password`, `created_at`) VALUES
(1, 'Shakti_barnwal', 'adminshakti@gmail.com', '$2y$10$jP7Xf.7ZMkermDKd5v6qw.A2.s9czNbOihCuD3oN7hA/uA0yjMQ3q', '2025-08-07 19:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `blog_services`
--

CREATE TABLE `blog_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_services`
--

INSERT INTO `blog_services` (`id`, `title`, `description`, `icon_class`) VALUES
(15, 'Dashboard', 'Track your blog\'s performance with real-time statistics and insights.', 'fa-solid fa-chart-line'),
(16, 'Easy Blog Editor', 'Create and format posts with our intuitive, distraction-free editor.', 'fa-solid fa-pen-to-square'),
(23, 'Social Sharing', 'Share your posts instantly on this platform', 'fa-solid fa-bullhorn');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` int(11) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `username`, `email`, `contactno`, `message`, `submitted_at`) VALUES
(1, 'Shakti', 'ss@gmail.com', 2147483647, 'axsdcfvgbnhmj', 2147483647),
(2, 'Shakti', 'ss@gmail.com', 2147483647, 'hi', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `blog`, `image_url`, `author_name`, `created_at`) VALUES
(16, 'Voyager 1 has sent a message from a strange location in space 20,000 lakh km away that\'s as hot as 50,000°C, but without fire', 'NASA’s Voyager 1 and Voyager 2 spacecraft, launched in 1977, have identified a high-temperature region beyond the edge of the solar system. Scientists are now studying this area, nicknamed the \"firewall\", which may lead to a new understanding of the solar system’s boundary and the magnetic connections between interstellar and solar space. The Voyager probes were launched over four decades ago to explore planets and move beyond the solar system into interstellar space. Despite being launched at a time when the internet was in its infancy and cassette-based Walkmans were popular, the spacecraft continue to send data back to Earth.  NASA sent Voyager 1 and Voyager 2 with the goal of reaching the farthest regions of space. Over the years, they have provided important information about the outer planets, and now, about the space that lies beyond our solar system.', 'uploads/1754416391_nasa.jpg', 'Sophia', '2025-08-04 05:46:11'),
(19, 'The Idea That The World Is An Illusion May Not Be Fictional', 'Wait, who started this crazy thought? It might surprise you, but the idea doesn’t come from conspiracy theorists. It comes from serious scientists. In 2003, Swedish philosopher Nick Bostrom proposed a now-famous argument: If civilisations become advanced enough to run realistic simulations of the universe, and if they have the interest to do so, then chances are we are already inside one of those simulations. Why? Because once such simulations are possible, they could run millions of versions of “Earth” with virtual humans. Statistically speaking, we are more likely to be one of the simulations than the original. Think of it like Netflix. If you have one real event but a million shows based on it, which one are you most likely to be watching? Probably one of the shows. Now imagine we are inside that show.\r\n\r\nPhysics Is Acting Suspiciously Digital: At first, this sounds like pure fantasy. But here’s where it gets strange—physics itself is starting to look digital. We used to think the universe was continuous like a smooth canvas. But quantum mechanics suggests the opposite: everything comes in chunks. Matter is made of atoms. Light comes in photons. Even time and space might be quantised—made of tiny, indivisible units. Like pixels on a screen. Physicists have even found that the laws of nature—gravity, electromagnetism, and nuclear forces—are so neatly organised, they feel almost programmed. The equations are elegant, consistent, and strangely clean. Why should the universe behave so perfectly unless it’s following a script?', 'uploads/1754416654_earth.webp', 'Evansh', '2025-08-05 17:57:34'),
(22, 'Astronomers Confirm a Vast Interstellar Tunnel Linking Our Solar System to Far-Off Constellations', 'A sweeping new analysis published in Astronomy & Astrophysics has revealed a striking feature in the fabric of our galaxy: a tunnel-like structure of hot plasma connecting our solar system’s Local Hot Bubble to distant interstellar regions. The discovery, based on data from the eROSITA X-ray telescope aboard the Spectrum-Roentgen-Gamma (SRG) observatory, offers the clearest view yet of the complex, dynamic environment in which our solar system is embedded.', 'uploads/1754553097_universe.jpg', 'Tom', '2025-08-07 07:51:37'),
(23, 'Vibrant mountain getaways for your next trip', 'This mountain stands at a height of 5,036 m, is located near Cusco, and has stripes of pink, red, green, yellow, brown, lavender, and white, which are caused by oxidized minerals like iron-rich clays, calcareous sandstones, ferromagnesian clays, marlstone, and sulphide-rich layers. The best time to visit this mountain is during the dry season, like August, for vibrant colors and minimal rain. Adventure enthusiasts can trek to this mountain as well from nearby villages. This colourful phenomenon has happened in recent years as a result of glacial melting. This mountain is also considered a sacred site by local communities.', 'uploads/1754553347_rainbow.jpg', 'Kshitij', '2025-08-07 07:55:47'),
(24, 'Plan Your Next Escape: A Short Guide to Himachal Tour', 'Looking for a peaceful getaway in the lap of the Himalayas? Himachal Pradesh offers the perfect blend of natural beauty, adventure, and serenity. Whether you\'re a nature lover, thrill-seeker, or just need a break from city life, Himachal has something for everyone.\r\n\r\nTop Destinations to Explore:\r\n\r\nShimla – The charming capital with colonial architecture and scenic mountain views.\r\n\r\nManali – Ideal for snow adventures, river rafting, and vibrant cafés.\r\n\r\nDharamshala & McLeod Ganj – A spiritual retreat and home to Tibetan culture.\r\n\r\nSpiti Valley – A remote, high-altitude desert with surreal landscapes.\r\n\r\nKasol & Parvati Valley – A backpacker\'s paradise known for its chill vibe.\r\n\r\nThings to Do:\r\n\r\nTrekking, camping, paragliding, and river rafting.\r\n\r\nExplore monasteries, temples, and hidden villages.\r\n\r\nEnjoy local Himachali cuisine and markets.\r\n\r\nBest Time to Visit:\r\n\r\nMarch to June for pleasant weather and sightseeing.\r\n\r\nOctober to February for snowfall and winter sports.\r\n\r\nWhether it’s a romantic trip, a family vacation, or a solo adventure—Himachal is a destination that refreshes your soul.', 'uploads/1754553876_himanchal.jpg', 'Varsha', '2025-08-07 08:04:36'),
(25, 'Indian Share Market Today: Tariff Tensions Rattle Markets', 'The Indian stock market saw a sharp dip today after the U.S. unexpectedly doubled tariffs on Indian exports, shaking investor confidence. The Sensex dropped below 80,200, and Nifty50 slipped under 24,500, marking a three-month low.\r\n\r\nKey Highlights:\r\n\r\nExport sectors like metals, textiles, and oil & gas took a hit.\r\n\r\nStocks like BHEL, NTPC, and Jindal Stainless fell sharply.\r\n\r\nBright spots included PVR Inox and Hero MotoCorp, showing gains despite the downturn.\r\n\r\nFIIs continued pulling funds amid global trade concerns.\r\n\r\nAlthough short-term sentiment is weak, experts suggest long-term investors can watch for buying opportunities in domestic-focused and consumption-led sectors.', 'uploads/1754554417_share.jpg', 'Shakti\r\n', '2025-08-07 08:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(6, 'Shakti', 'ss@gmail.com', 'Ss@12345', '2025-07-31 18:13:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog_services`
--
ALTER TABLE `blog_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_services`
--
ALTER TABLE `blog_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
