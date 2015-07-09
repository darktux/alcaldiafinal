create table co_impuesto(
	codigo varchar(5)  primary key,
	nom_cue text,
	des_cue text,
	tip_cob varchar(10),
	cob_por float,
	cob_fij float,
	cob_min float,
	condonado boolean
);

create table co_notificacion(
	id_not serial primary key,
	mensaje text,
	fec_hor timestamp,
	status boolean,
	cod_fac integer
);

create table co_factura(
	cod_fac serial primary key,
	fec timestamp,
	nom_con varchar(50),
	cod_con integer,
	mon float,
	est boolean,
	des varchar(100)
);

create table co_factura_detalle(
	cod_det serial primary key,
	det text,
	mon float,
	can integer,
	cod_fac integer references co_factura(cod_fac),
	cod_rub varchar(5) references co_impuesto(codigo)
);
