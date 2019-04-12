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



-- CONSULTA

SELECT 

e.id,
e.nombres,
e.apellidos,
c.nombre  cargo ,
s.nombre sede,
DATE_FORMAT(e.fecha_nacimiento,'%d/%m/%Y') fecha_nacimiento,
DATE_FORMAT(e.fecha_ingreso,'%d/%m/%Y') fecha_ingreso,
CAST(e.salario AS decimal(8,2) ) salario,
DATE_FORMAT(e.dateCreate,'%d/%m/%Y %H:%i:%s') dateCreate

FROM empleado e

INNER JOIN cargo c  ON e.id_cargo=c.id

INNER JOIN sede s ON e.id_sede=s.id

--  Table Login

CREATE TABLE usuario 
(

id      int auto_increment PRIMARY KEY,
nombres  varchar(100),
apellidos varchar(100),
dni       char(8),
usuario varchar(50),
pass    varchar(200),
estado  enum('ACTIVO','CESADO'),
dateCreate timestamp DEFAULT current_timestamp

)ENGINE=INNODB;


INSERT INTO usuario
(nombres,apellidos,dni,usuario,pass,estado)
VALUES
('Luis','Claudio','46794282','luis.claudio',MD5('luis'),'ACTIVO');
