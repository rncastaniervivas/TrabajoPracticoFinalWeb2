drop database if exists revista;
create database revista;
use revista;

create table rol(
	idRol int primary key auto_increment,
    descRol varchar(20)
);

create table estado(
	idEstado int primary key auto_increment,
    descEstado varchar(10)
);

create table usuario(
	idUsuario int primary key auto_increment,
    nombre varchar(10),
    apellido varchar(10),
    telefono varchar(10),
    user varchar(10) unique,
    pass varchar(10),
    mail varchar(15),
    codEstado int,
    codRol int
);

create table pais(
	codPais int primary key auto_increment,
    descPais varchar(20)
);

create table provincia(
	codProv int primary key auto_increment,
    descProv varchar(20),
    codPais int
);

create table tipoPublicacion(
	tipoPublic int primary key auto_increment,
    descPublic varchar (20)
);

create table publicacion(
	idPublic int primary key auto_increment,
    nombrePublic varchar(20),
    tipoPublic int
);

create table suscripcion(
	idPublic int primary key auto_increment,
    inicio varchar(10),
    fin varchar (10)
);

create table cliente(
	idCliente int primary key auto_increment,
    nombre varchar(10),
    apellido varchar(10),
    calle varchar(10),
    nro int,
    localidad varchar(10),
    cp int,
    telefono varchar(10),
    codProv int,
    codPais int,
    login varchar(10) unique,
    clave varchar(10),
    mail varchar(15),
    codEstado int,
    idSusc int
);

create table seccion(
	idSeccion int primary key auto_increment,
    idPublic int, 
    nombreSeccion varchar(10)
);

create table bitacora(
	idBitacora int primary key auto_increment,
    fecha varchar(10),
    tipoDeCAmbio varchar(10),
    idPublicacion int,
    descripcionCambio varchar(10),
    queUsuario int
);

create table edicion(
	idEdicion int primary key auto_increment,
    identificacion int, 
    precioUnidad float,
    precioSuscripcion float,
    idPublic int,
    idSeccion int
);

create table compra(
	idCliente int,
    idEdicion int,
    primary key(idCliente, idEdicion)
);


create table articulo(
	idArt int primary key auto_increment,
    titulo varchar(20),
    subtitulo varchar(20),
    texto varchar(100),
    ciudad varchar(10),
    enlace varchar(20),
    idSeccion int
);

create table imagen(
	idImg int primary key auto_increment,
    idArt int,
    path varchar(20)
);
