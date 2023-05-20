SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `long_url` text NOT NULL,
  `short_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `links` (`id`, `long_url`, `short_url`) VALUES
(1, 'https://api.jquery.com/jquery.post/', 'nvt1'),
(2, 'https://api.jquery.com/jquery.post/', '2lwa'),
(3, 'https://getbootstrap.com/docs/5.0/forms/overview/', 'jmpy'),
(4, 'https://getbootstrap.com/docs/5.0/components/alerts/', 'nxwx'),
(5, 'https://getbootstrap.com/docs/5.0/components/alerts/', '224n'),
(6, 'https://getbootstrap.com/docs/5.0/components/alerts/', '13h3'),
(7, 'https://getbootstrap.com/docs/5.0/components/alerts/', 'rpyl'),
(8, 'https://www.youtube.com/channel/UCtpdZTndGnAyX-8uxUdTDnQ', '1uxx');
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
