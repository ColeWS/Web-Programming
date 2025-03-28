CREATE DATABASE lake_php;

CREATE TABLE a2_accounts (
    id INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(200) NOT NULL,
    email VARCHAR(255) NOT NULL,
    userPass VARCHAR(200) NOT NULL,
    PRIMARY KEY(id)
);