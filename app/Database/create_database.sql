CREATE DATABASE IF NOT EXISTS php_mvc;
USE php_mvc;

CREATE OR REPLACE TABLE users (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(60) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE OR REPLACE TABLE advertisements (
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(60) NOT NULL,
	user_id INT(11) UNSIGNED,
	CONSTRAINT `fk_advertisement_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`name`) VALUES ('Mike');
INSERT INTO `users` (`name`) VALUES ('Rob');
INSERT INTO `users` (`name`) VALUES ('Alfred');
INSERT INTO `users` (`name`) VALUES ('Bob');
INSERT INTO `users` (`name`) VALUES ('Marie');

INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 1', '1');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 2', '1');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 3', '2');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 4', '2');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 5', '2');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 6', '3');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 7', '3');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 8', '4');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 9', '4');
INSERT INTO `advertisements` (`title`, `user_id`) VALUES ('Test Advertisement 10', '5');
