CREATE DATABASE assignment_one;

CREATE TABLE employees (
    id int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(100) NOT NULL,
    email varchar(50) NOT NULL,
    hoursWorked int NOT NULL,
    primary key (id)
);