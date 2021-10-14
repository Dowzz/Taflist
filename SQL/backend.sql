DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `appid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `jobid` int NOT NULL,
  `cv` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `isvalid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appid`),
  KEY `userid` (`userid`),
  KEY `jobid` (`jobid`)
)

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `catname` varchar(550) NOT NULL,
  PRIMARY KEY (`catid`)
)


INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Nettoyage'),
(2, 'Electricien'),
(3, 'test'),
(4, 'Ecriture'),
(5, 'Comptable'),
(6, 'Batiment'),
(7, 'Informatique'),
(8, 'dodo');


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `jobid` int NOT NULL AUTO_INCREMENT,
  `jobname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `catid` int NOT NULL,
  `date` date NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`jobid`),
  KEY `catid` (`catid`)
)



DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `h_password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
)


INSERT INTO `user` (`userid`, `name`, `surname`, `company_name`, `adress`, `email`, `h_password`, `role`) VALUES
(54, NULL, NULL, NULL, NULL, 'admin@test.com', '$2y$10$wIvbIkJg161SN1w3/fMdz.YRxeqN5oVxty4A1yGHIQdeQBPpBSr7C', 'admin'),
(55, 'Recruteur1', NULL, 'DOM2A', '45 avenue du professeur horatio smith', 'recruteur@test.fr', '$2y$10$pi7KkDmKj83mLvcAW5CQk.U.LOmZBSN/2A4CckIRl5pf36RMMeO.G', 'Recruteur'),
(56, 'Barny', 'Michel', NULL, NULL, 'candidat@test.fr', '$2y$10$xDoVMvSPan1O0E4lJAdXs.1clHivXrQS2XoK/w66/UqGMJB3VNX/.', 'Candidat'),
(57, NULL, NULL, NULL, NULL, 'consultant@test.fr', '$2y$10$qI4i8tqyjYuGVqFaJSApsuBKp.rFp4npJamZ9fl5A4P58lgGhYsKq', 'Consultant');


ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobid`);


ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);
COMMIT;

