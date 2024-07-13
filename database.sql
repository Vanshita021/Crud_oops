-- SQL script to create the 'users' table
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(15) COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(50) COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
