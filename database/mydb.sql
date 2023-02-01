CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

CREATE TABLE contactform (
	ID int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FirstName varchar(255),
	SurName varchar(255),
	Email varchar(255),
	Subject varchar(255),
	Message varchar(255),
	Date timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE menu (
	ID int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	MenuType varchar(255),
	Course varchar(255),
	CourseDescription varchar(255),
	CoursePrice int
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

CREATE TABLE images (
	ID int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ImageName varchar(255),
	ImagePath varchar(255),
	ImageType varchar(255),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;