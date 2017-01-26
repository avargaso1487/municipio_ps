use municipio_ps;

drop table if exists actividad;
drop table if exists ambito;
create table ambito(
	ambitoID int not null auto_increment,
	ambito 	varchar(50) not null ,
	primary key(ambitoID)
);
insert into ambito(ambitoID,ambito) values
	(1,'INSTITUCIONAL'),
	(2,'LOCAL'),
	(3,'REGIONAL'),
	(4,'NACIONAL'),
	(5,'INTERNACIONAL');

create table actividad(
	actividadID 	int not null auto_increment,
	ambitoID 		int not null,
	actividad 		varchar(50) not null,
	descripcion		varchar(50) not null,
	lugar	 		varchar(50) not null,
	fecha 			date not null,
	prioridad 		int not null,
	fechaRegistro 	date null,
	fechaModificacion date null,
	start varchar(50) null,
	end varchar(50) null,
	primary key(actividadID),
	foreign key(ambitoID) references ambito(ambitoID)	
);