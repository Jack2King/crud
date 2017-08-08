create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `pass` int(3) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);
