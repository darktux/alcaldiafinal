
--
-- PERSONA
--

create table rf_persona(
	cod_per serial,
	nom varchar(30),
	ape1 varchar(20),
	ape2 varchar(20),
	sex char,
	fec_nac date,
	dui varchar(10),
	nit varchar(20),
	tel1 varchar(10),
	tel2 varchar(10),
	dep varchar(12),
	mun varchar(30),
	dir text,
	ocu varchar(40),
	est_civ varchar(30),
	primary key(cod_per)
);

--
-- PARTIDAS DE NACIMIENTO
--

create table rf_nacimiento_partida(
	ano_lib integer,
	num_lib integer,
	num_tom integer,
	num_pag integer,
	num_par integer,
	nom varchar(30),
	sex char,
	lug_nac varchar(100),
	dep_nac varchar(12),
	mun_nac varchar(30),
	fec_nac date,
	hor_min time,

	nom_mad varchar(30),
	ape1_mad varchar(20),
	ape2_mad varchar(20),
	eda_mad integer,
	ocu_mad varchar(40),
	dep_ori_mad varchar(12),
	mun_ori_mad varchar(30),
	dep_res_mad varchar(12),
	mun_res_mad varchar(30),
	nac_mad varchar(25),
	doc_mad varchar(25),
	num_doc_mad varchar(10),

	nom_pad varchar(30),
	ape1_pad varchar(20),
	ape2_pad varchar(20),
	eda_pad integer,
	ocu_pad varchar(40),
	dep_ori_pad varchar(12),
	mun_ori_pad varchar(30),
	dep_res_pad varchar(12),
	mun_res_pad varchar(30),
	nac_pad varchar(25),
	doc_pad varchar(25),
	num_doc_pad varchar(10),

	nom_inf varchar(30),
	ape1_inf varchar(20),
	ape2_inf varchar(20),
	doc_inf varchar(25),
	num_doc_inf varchar(10),
	par_inf varchar(25),
	fir varchar(5),
	ded varchar(7),
	man varchar(9),
	vir_ase varchar(10),
	fec_vir_ase date,

	dec_tes varchar(12),
	nom_tes1 varchar(30),
	ape1_tes1 varchar(20),
	ape2_tes1 varchar(20),
	doc_tes1 varchar(25),
	num_doc_tes1 varchar(10),
	nom_tes2 varchar(30),
	ape1_tes2 varchar(20),
	ape2_tes2 varchar(20),
	doc_tes2 varchar(25),
	num_doc_tes2 varchar(10),

	nom_reg varchar(30),
	fec date,
	cue text,
	esc_lib varchar(100),
	cod_per integer,
	cod_mad integer default null,
	cod_pad integer default null,
	cod_inf integer,
	cod_tes1 integer default null,
	cod_tes2 integer default null,
	unique(num_lib, num_par),
	foreign key(cod_per) references rf_persona(cod_per)
);

create table rf_nacimiento_digestyc(
	num_lib int,
	num_par int,
	loc_nac varchar(30),
	can_nac varchar(40),
	pes_nac int,
	tal int,
	cla_par varchar(15),
	tip_par varchar(7),
	nom_asi varchar(70),
	car_asi varchar(9),
	dur_emb int,
	est_fam varchar(15),
	alf_mad varchar(8),
	can_res varchar(40),
	are_res varchar(6),
	hij_nac_viv int,
	hij_mue int,
	hij_nac_mue int,
	alf_pad varchar(8),
	unique (num_lib, num_par),
	foreign key(num_lib, num_par) references rf_nacimiento_partida(num_lib, num_par)
);

--
-- PARTIDAS DE MATRIMONIO
--

create table rf_matrimonio_acta(
ano_lib int,
num_lib int,
num_tom int,
num_pag int,
num_act int,
cod_eso int,
cod_esa int,
nom_eso varchar(30),
ape1_eso varchar(20),
ape2_eso varchar(20),
nom_esa varchar(30),
ape1_esa varchar(20),
ape2_esa varchar(20),
fec_mat date,
cue text,
esc_lib varchar(100),
unique(num_lib, num_act),
foreign key(cod_eso) references rf_persona(cod_per),
foreign key(cod_esa) references rf_persona(cod_per)
);

create table rf_matrimonio_partida(
	ano_lib int,
	num_lib int,
	num_tom int,
	num_pag int,
	num_par int,
	cod_eso int,
	cod_esa int,
	nom_eso varchar(30),
	ape1_eso varchar(20),
	ape2_eso varchar(20),
	nom_esa varchar(30),
	ape1_esa varchar(20),
	ape2_esa varchar(20),
	fec_mat date,
	cue text,
	esc_lib varchar(100),
	unique(num_lib, num_par),
	foreign key(cod_eso) references rf_persona(cod_per),
	foreign key(cod_esa) references rf_persona(cod_per)
);

create table rf_matrimonio_digestyc(
	num_lib int,
	num_par int,
	dep_mat varchar(12),
	mun_mat varchar(50),
	eda_eso int,
	dep_eso varchar(12),
	mun_eso varchar(50),
	can_eso varchar(50),
	zon_eso varchar(6),
	est_civ_eso varchar(15),
	alf_eso varchar(30),
	ocu_eso varchar(50),
	eda_esa int,
	dep_esa varchar(12),
	mun_esa varchar(50),
	can_esa varchar(50),
	zon_esa varchar(6),
	est_civ_esa varchar(15),
	alf_esa varchar(30),
	ocu_esa varchar(50),
	fec_reg date,
	nom_reg varchar(70),
	obs text,
	unique (num_lib, num_par),
	foreign key(num_lib, num_par) references rf_matrimonio_partida(num_lib, num_par)
);

--
-- PARTIDAS DE DIVORCIO
--

create table rf_divorcio_partida(
	ano_lib int,
	num_lib int,
	num_tom int,
	num_pag int,
	num_par int,
	cod_eso int,
	cod_esa int,
	nom_eso varchar(30),
	ape1_eso varchar(20),
	ape2_eso varchar(20),
	nom_esa varchar(30),
	ape1_esa varchar(20),
	ape2_esa varchar(20),
	fec_div date,
	cue text,
	esc_lib varchar(100),
	unique(num_lib, num_par),
	foreign key(cod_eso) references rf_persona(cod_per),
	foreign key(cod_esa) references rf_persona(cod_per)
);

create table rf_divorcio_digestyc(
	num_lib	Int,
	num_par	Int,
	dep_div	Varchar(12),
	mun_div	Varchar(50),
	fec_fal	date,
	nom_eso	Varchar(70),
	eda_eso	Int,
	alf_eso	char,
	ocu_eso	Varchar(50),
	dep_res_eso	Varchar(12),
	mun_res_eso	Varchar(50),
	can_res_eso	Varchar(50),
	are_res_eso	Char,
	nom_esa	Varchar(70),
	eda_esa	Int,
	alf_esa	char,
	ocu_esa	Varchar(50),
	dep_res_esa	Varchar(12),
	mun_res_esa	Varchar(50),
	can_res_esa	Varchar(50),
	are_res_esa	char,
	cau_div	text,
	fec_mat	Date,
	num_hij	Int,
	fec_reg	Date,
	obs	Text,
	nom_reg	Text,
	unique (num_lib, num_par),
	foreign key(num_lib, num_par) references rf_divorcio_partida(num_lib, num_par)
);


--
-- PARTIDAS DE DEFUNCIÓN
--

create table rf_defuncion_partida(
	ano_lib int,
	num_lib int,
	num_tom int,
	num_pag int,
	num_par int,
	cod_per int,
	nom varchar(30),
	ape1 varchar(20),
	ape2 varchar(20),
	sex char,
	eda int,
	est_fam varchar(15),
	nom_con varchar(70),
	ocu varchar(50),
	dep_org varchar(12),
	mun_org varchar(50),
	dep_res varchar(12),
	mun_res varchar(50),
	canlug_res varchar(50),
	jur varchar(50),
	nac varchar(25),
	dui varchar(10),
	dep_def varchar(12),
	mun_def varchar(50),
	canlug_def varchar(50),
	loc_def varchar(50),
	fec_def date,
	hor_min time,
	asi_med boolean,
	cau_def text,
	nom_pro varchar(100),
	car_pro varchar(50),
	jvpm varchar(20),
	nom_mad varchar(70),
	nom_pad varchar(70),
	cem varchar(100),
	inf varchar(100),
	dui_inf varchar(10),
	par_inf varchar(50),
	nom_tes1 varchar(70),
	dui_tes1 varchar(10),
	nom_tes2 varchar(70),
	dui_tes2 varchar(10),
	fec_reg date,
	enm varchar(50),
	esc_lib varchar(70),
	unique(num_lib, num_par),
	foreign key(cod_per) references rf_persona(cod_per)
);


create table rf_defuncion_digestyc(
	num_lib int,
	num_par int,
	jub_pen	Varchar(10),
	are	Char,
	otr_est	Varchar(50),
	fal_emb	Varchar(50),
	mue_acc	Varchar(10),
	cer_med	Boolean,
	cer_for	Boolean,
	nom_reg	Text,
	unique(num_lib, num_par),
	foreign key (num_lib, num_par) references rf_defuncion_partida(num_lib, num_par)
);

create table rf_defuncion_digestyc2(
	num_lib int,
	num_par int,
	hor_min time,
	dia int,
	mes int,
	mad_cas varchar(7),
	tip_par	varchar(7),
	eda_mad	int,
	dur_emb	varchar(20),
	sem_ges	int,
	unique(num_lib, num_par),
	foreign key (num_lib, num_par) references rf_defuncion_digestyc (num_lib, num_par)
);

create table rf_defuncion_digestyc3(
	num_lib int,
	num_par int,
	pes	Int,
	tal	Int,
	lug_nac	varchar(20),
	num_emb	Int,
	num_abo	Int, 
	num_nac_mue	int,
	foreign key (num_lib, num_par) references rf_defuncion_digestyc2 (num_lib, num_par)
);

create table rf_marginacion(
	id serial,
	num_lib int,
	num_par int,
	tip varchar(10),
	fec date,
	cue text,
	unique(id)
);
