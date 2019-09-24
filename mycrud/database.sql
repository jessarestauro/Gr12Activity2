create database tbl_employees;

 
use tbl_employees;

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL auto_increment,
  `efirstname` varchar(100) NOT NULL,
  `elastname` varchar(100) NOT NULL,
  `egender` varchar(100) NOT NULL,
  `edepartment` varchar(100) NOT NULL,
  `edateemployed` varchar(100) NOT NULL,
  `esalary` float  NOT NULL,
  PRIMARY KEY  (`id`)
);