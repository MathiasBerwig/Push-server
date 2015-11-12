CREATE DATABASE IF NOT EXISTS `push`;
USE `push`;

DROP TABLE IF EXISTS `gcm_users`;
CREATE TABLE `gcm_users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL
);


ALTER TABLE `gcm_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `token` (`token`);


ALTER TABLE `gcm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;