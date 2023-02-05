CREATE TABLE users (
	ID int(10) unsigned NOT NULL AUTO_INCREMENT,
	UserName varchar(255) NOT NULL,
	Pw varchar(255) 	NOT NULL,
	PRIMARY KEY (ID),
	UNIQUE KEY UserName (UserName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

INSERT INTO users (UserName, Pw) 
VALUES ('admin', 'admin');
