CREATE DATABASE Register;

USE Register;

CREATE TABLE Users 
(
    ID int NOT NULL AUTO_INCREMENT,

    First_Name varchar(50) NOT NULL,

    Last_Name varchar(50) NOT NULL,

    Email varchar(50) NOT NULL,

    Password varchar(50) NOT NULL,

    PRIMARY KEY (ID)
);
