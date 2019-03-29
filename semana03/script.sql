/*
decimal(15,6): 9 enteros y 6 decimales

10000 => 1000.000000

*/

CREATE TABLE empleado(

id int auto_increment PRIMARY KEY,
nombres varchar(100),
apellidos varchar(100),
id_cargo int,
id_sede int,
fecha_nacimiento date,
fecha_ingreso date,
salario decimal(15,6),
dateCreate timestamp DEFAULT current_timestamp

)ENGINE=INNODB;


CREATE TABLE cargo
(

id int auto_increment PRIMARY KEY,
nombre      varchar(100),
descripcion varchar(100)

)ENGINE=INNODB;


CREATE TABLE sede
(

id int auto_increment PRIMARY KEY,
nombre      varchar(100),
descripcion varchar(100)

)ENGINE=INNODB;