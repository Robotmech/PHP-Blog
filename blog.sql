SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = 'Europe/Zurich'




CREATE TABLE `blog` (
  `blogid` int(255) NOT NULL,
  `blogtitle` varchar(80) NOT NULL,
  `blogtext` mediumtext NOT NULL,
  `user` varchar(255) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4_bin;



INSERT INTO `blog` (`blogid`, `blogtitle`, `blogtext`, `user`, `time`) 
VALUES (35, 'Tested', 'Tested', 'admin', '2025-11-25 05:37:26.000000');

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerdate` date NOT NULL,
  `authority` varchar(255) NOT NULL DEFAULT 'User'
) DEFAULT CHARSET=utf8mb4_bin;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registerdate`, `authority`) 
VALUES (8, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2025-11-25', 'Admin');

ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `blog`
  MODIFY `blogid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

