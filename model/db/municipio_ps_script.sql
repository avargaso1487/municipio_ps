drop database if exists municipio_ps;

create database municipio_ps;
use municipio_ps;


create table if not exists persona(
	personaID					int not null AUTO_INCREMENT,
	personaDNI					char(8) not null unique,
	personaNombres				varchar(50) not null,
	personaApellidos			varchar(100) not null,
	personaDireccion			varchar(100) not null,
	personaFechaNacimiento		date not null,
	personaTelefono				char(9) not null,	
	primary key (personaID)
);

/*--------------SEGURIDAD----------------*/
create table if not exists grupo(
	grupoID				int not null AUTO_INCREMENT,
	grupoNombre			varchar(50) not null,
	grupoDescripcion	varchar(50) not null,
	grupoIcono			varchar(20) not null,
	grupoOrden			int not null,
	grupoEstado			boolean not null,
	primary key (grupoID)
);


create table if not exists modulo(
	moduloID				int not null AUTO_INCREMENT,
	moduloDescripcion		varchar(50) not null,
	moduloEstado			boolean not null,
	primary key (moduloID)
);


create table if not exists tarea(
	tareaID					int not null AUTO_INCREMENT,
	grupoID 				int not null,
	moduloID 				int not null,
	tareaNombre				varchar(50) not null,
	tareaDescripcion 		varchar(50) not null,
	tareaIcono 				varchar(20) not null,
	tareaOrden				int not null,
	tareaURL 				varchar(50) not null,
	tareaEstado				boolean not null,
	foreign key (moduloID) references modulo (moduloID),
	foreign key (grupoID) references grupo (grupoID),
	primary key (tareaID)
);


create table if not exists rol(
	rolID				int not null AUTO_INCREMENT,
	rolDescripcion		varchar(50) not null,
	rolNombre			varchar(50) not null,
	rolEstado			boolean not null,
	primary key (rolID)
);


create table if not exists permiso(
	permisoID			int not null AUTO_INCREMENT,
	permisoEstado 		boolean not null,
	tareaID 			int not null,
	rolID 				int not null,
	foreign key (tareaID) references tarea (tareaID),
	foreign key (rolID) references rol (rolID),
	primary key (permisoID)
);

create table if not exists usuario(
	personaID 			int not null primary key,
	usuarioLogin		varchar(50) not null,
	usuarioPassword		char(32) not null,
	usuarioEstado 		boolean not null,
	foreign key (personaID) references persona(personaID)	
);


create table if not exists rol_usuario(
	rolusuarioID 		int not null AUTO_INCREMENT,
	rolusuarioEstado 	boolean not null,
	personaID 			int not null,
	rolID 				int not null,
	extraordinario		boolean not null,
	foreign key (rolId) references rol (rolID),
	foreign key (personaID) references persona (personaID),
	primary key (rolusuarioID)
);