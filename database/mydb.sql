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

INSERT INTO contactform (FirstName, SurName, Email, Subject, Message)
VALUES
("John", "Doe", "johndoe@example.com", "All restaurants", "I was wondering if your sushi restaurant has any vegetarian options on the menu?"),
("Jane", "Coolio", "janecoolio@example.com", "Sakura Sushi", "I recently dined at your sushi restaurant and wanted to let you know that the service was excellent and the food was delicious! Keep up the good work."),
("Bob", "Smith", "bobsmith@example.com", "Mikado Sushi Bar", "I would like to make a reservation for 2 people at your sushi restaurant for next Saturday at 7 PM."),
("Mike", "Dubois", "mikedubois@idfk.scu", "Wasabi Fusion", "Do you have any specialty rolls that I should try on my next visit to your sushi restaurant?"),
("koekoe", "koekoe", "koekoe@idfk.scu", "Wasabi Fusion", "injected with mydb.sql script");