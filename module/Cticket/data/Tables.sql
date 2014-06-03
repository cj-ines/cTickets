CREATE TABLE `cticket_category` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(150) DEFAULT NULL,
   `description` varchar(255) DEFAULT NULL,
   `status` tinyint(4) DEFAULT NULL,
   `created_at` datetime DEFAULT NULL,
   `updated_at` datetime DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `cticket_ticket` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `subject` varchar(255) NOT NULL,
   `body` varchar(500) DEFAULT NULL,
   `status` tinyint(4) DEFAULT NULL,
   `email` varchar(50) DEFAULT NULL,
   `contact` varchar(50) DEFAULT NULL,
   `priority` int(11) DEFAULT NULL,
   `created_at` datetime DEFAULT NULL,
   `updated_at` datetime DEFAULT NULL,
   `category` tinyint(4) DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;