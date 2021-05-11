CREATE DATABASE ALFAROFIA DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE ALFAROFIA;


-- Tabla para Usuarios del Lago.


CREATE TABLE usuarios (
  Id_usuario int UNSIGNED not null AUTO_INCREMENT,
  nombre varchar(60) not null,
  correo varchar(100) not null UNIQUE,
  password varchar(20) not null,
  telefono char(9) not null,
  direccion varchar(100) not null,
  tipo char(1) not null CHECK (tipo = "a" || "c"),
  
  PRIMARY KEY  (Id_usuario)
  
);


CREATE TABLE puestos (
  Id_puesto smallint UNSIGNED not null AUTO_INCREMENT,
  nombre varchar(60) not null,
  capacidad tinyint UNSIGNED not null CHECK (capacidad <= 3 ),
  precio_dia decimal(4,2) not null,
  
  PRIMARY KEY (Id_puesto) 
);


CREATE TABLE accesorios (
  Id_accesorio tinyint UNSIGNED not null AUTO_INCREMENT,
  Id_puesto smallint UNSIGNED not null,
  nombre varchar(60) not null,
  descripcion varchar(100) not null,
  precio_dia decimal(4,2) not null,
  
  PRIMARY KEY  (Id_accesorio, Id_puesto),
  
  FOREIGN KEY (Id_puesto) REFERENCES puestos(Id_puesto)
);


-- Tabla para Reserva de Puesto.


CREATE TABLE reservaPuesto (
  Id_usuario int UNSIGNED not null,
  Id_puesto smallint UNSIGNED not null,
  fecha_inicio date not null,
  fecha_fin date not null,
  precio decimal(5,2),
  
  PRIMARY KEY (Id_usuario, Id_puesto, fecha_inicio, fecha_fin),
  
  FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id_usuario),
  FOREIGN KEY (Id_puesto) REFERENCES puestos (Id_puesto)

);

-- Tabla para Reserva de Accesorio


CREATE TABLE reservaAccesorio (
  Id_usuario int UNSIGNED not null,
  Id_accesorio tinyint UNSIGNED not null,
  fecha_inicio date not null,
  fecha_fin date not null,
  precio decimal(5,2),
  
  PRIMARY KEY (Id_usuario, Id_accesorio, fecha_inicio, fecha_fin),
  
  FOREIGN KEY (Id_usuario) REFERENCES reservaPuesto (Id_usuario),
  FOREIGN KEY (Id_accesorio) REFERENCES accesorios (Id_accesorio)
  
);

-- Tabla para la Reserva Completa


CREATE TABLE reservaCompleta (
  Id_usuario int UNSIGNED not null,
  Id_puesto smallint UNSIGNED not null,
  Id_accesorio tinyint UNSIGNED not null,
  fecha_inicio date not null,
  fecha_fin date not null,
  precio decimal(5,2),
  
  PRIMARY KEY (Id_usuario, Id_accesorio, fecha_inicio, fecha_fin),
  
  FOREIGN KEY (Id_usuario) REFERENCES reservaPuesto (Id_usuario),
  FOREIGN KEY (Id_puesto) REFERENCES reservaPuesto (Id_puesto),
  FOREIGN KEY (Id_accesorio) REFERENCES reservaAccesorio (Id_accesorio)
  
);


-- Usuario Administrador

INSERT INTO usuarios (nombre,correo,password,telefono,direccion,tipo) VALUES 
("Administrador","administrador@alfarofia.com","12345","648053655","Redonda24, Badajoz","a");
