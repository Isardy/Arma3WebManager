CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user` varchar(32) COLLATE 'utf8_general_ci' NOT NULL,
  `password` varchar(64) COLLATE 'utf8_general_ci' NOT NULL,
  `role` varchar(16) COLLATE 'utf8_general_ci' NOT NULL DEFAULT 'moderator'
) COLLATE 'utf8_general_ci';

CREATE TABLE `steam_creds` (
  `username` varchar(32) COLLATE 'utf8_general_ci' NOT NULL,
  `password` varchar(64) COLLATE 'utf8_general_ci' NOT NULL
) COLLATE 'utf8_general_ci';

CREATE TABLE `paths` (
  `steamcmd` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `arma` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `mods` varchar(255) COLLATE 'utf8_general_ci' NOT NULL
) COLLATE 'utf8_general_ci';

ATE TABLE `mods` (
  `id` varchar(16) COLLATE 'utf8_general_ci' NOT NULL,
  `title` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `last_update` datetime NOT NULL,
  `latest_update` datetime NULL
) COLLATE 'utf8_general_ci';