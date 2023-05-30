CREATE DATABASE campusv2;

CREATE TABLE campers(
    id INT primary key auto_increment,
    imagen VARBINARY(50),
    nombre VARCHAR(50) not null,
    direccion VARCHAR(50),
    logros VARCHAR(60),
    ser SMALLINT(2),
    ingles SMALLINT(2),
    review SMALLINT(2),
    skllis SMALLINT(2),
    especialidad VARCHAR(50)
);

CREATE TABLE users(
    id PRIMARY KEY AUTO_INCREMENT,
    IDCamper INT NOT NULL,
    email VARCHAR (80)NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    FOREIGN KEY (IDCamper) REFERENCES campers (id)
    )
