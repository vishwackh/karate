CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `login` (`id`, `userName`, `password`, `token`, `firstName`, `lastName`, `phone`, `email`, `type`, `active`, `createdDate`, `updatedDate`) 
VALUES (1, 'admin', 'karate', '2057564ac24451b55368bb170fe0b91d', 'admin', 'admin', '9986552521', 'admin@gmail.com', 1, 1, '2017-02-02 13:43:08', '2017-02-02 13:43:08');

-- event mangement admin
/*karateStudents */
CREATE TABLE karateTeachars(
  `id` int not null AUTO_INCREMENT,
  `name` varchar(256) not null,
  `presentrank` varchar(1500) not null,
  `details` varchar(1500) not null,
  `dojo` varchar(1500) not null,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);
/*karateStudents */
CREATE TABLE karateStudents(
  `id` int not null AUTO_INCREMENT,
  `usn` varchar(256) not null,
  `name` varchar(256) not null,
  `teacher` varchar(256) not null,
  `rank1` BOOLEAN default '0' NOT NULL,
  `rank2` BOOLEAN default '0' NOT NULL,
  `rank3` BOOLEAN default '0' NOT NULL,
  `rank4` BOOLEAN default '0' NOT NULL,
  `rank5` BOOLEAN default '0' NOT NULL,
  `rank6` BOOLEAN default '0' NOT NULL,
  `rank7` BOOLEAN default '0' NOT NULL,
  `rank8` BOOLEAN default '0' NOT NULL,
  `rank9` BOOLEAN default '0' NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);
