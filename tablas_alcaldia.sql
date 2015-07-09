--db_alcaldia
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
	est_civ varchar(12),
	primary key(cod_per)
);

create table funcionario(
	cod_fun varchar(5),
	nom varchar(70),
	cargo varchar(40),
	per varchar(12),
	primary key (cod_fun)
);

create table um_proyecto(
	cod_pro varchar(25) primary key,
	nom_pro varchar(100),
	des text, 
	ubi text,
	fec_ini date,
	fec_fin date,
	tip_fon varchar(10),
	mon_pro float,
	mon_ext float,
	pat text,
	est varchar(15)
);

create table um_per_proy_temp(
	car varchar(12),
	sal float,
	cod_pro varchar(10),
	cod_per int
);

create table um_per_proy(
	car varchar(12),
	sal float,
	cod_pro varchar(10) references um_proyecto(cod_pro),
	cod_per int references rf_persona (cod_per)
);

create table um_gas_proy(
	cod_com serial,
	fec_com date,
	num_com varchar(10),
	con_com text,
	mon_com float,
	cod_pro varchar(10) references um_proyecto(cod_pro)
);

create table um_ben_proy(
	cod_per int references rf_persona(cod_per),
	cod_pro varchar(10) references um_proyecto(cod_pro)
);

create table um_expediente(
	cod_exp serial primary key,
	ano_res int,
	niv_edu varchar(25),

	oci_otr text,

	tra_rem char(2),
	baj_con char(2),
	jor_tra int,
	ing_med_men float,
	otr_tip_ing varchar(25),
	dep_eco_agr char(2),
	rec_ayu char(2),
	rec_ayu_ong varchar(30),

	med_cab char(2),
	acu_amb varchar(20),
	tra_con text,
	com varchar(10),
	con_agr varchar(25),
	dur_rel_sen Varchar(30),
	pri_con char(2),

	suf_mal char(2),
	mal_qui varchar(30),
	suf_abu_sex char(2),
	abu_qui_sex varchar(30),

	tra_sep char(2),
	med_cau text,
	rup_ant char(2),
	dur_mal varchar(25),

	ame_rup	char(2),

	mal_men char(2),
	tip_mal_men text,
	num_hij int,
	apo_eco_fam varchar(25),
	apo_afe_fam varchar(25),
	apo_cri varchar(25),
	con_sit char(2),
	con_apo char(2),
	man_rel_agr char(2),

	apo_efe_ami varchar(25),
	apo_afe_ami varchar(25),
	ent_con_agr char(2),
	ent_apo_agr char(2),

	niv_edu_agr varchar(25),
	ant_pen_agr text,

	cod_per int references rf_persona(cod_per),
	cod_agr int references rf_persona(cod_per)
);

create table um_exp_padres(
	cod_mad int references rf_persona(cod_per),
	cod_pad int references rf_persona(cod_per),
	cod_exp int references um_expediente(cod_exp)
);

create table um_obs_exp(
	cod_exp int references um_expediente(cod_exp),
	fec_obs date,
	obs text
);

create table um_checkbox(
	cod_chk int references um_expediente(cod_exp),
	cat_chk text,
	sel_chk text
);
 
create table ca_negocio(
	cod_neg serial,
	nom_neg text,
	rub_neg text,
	zon_neg varchar(6),
	dep varchar(12),
	mun varchar(30),
	dir_neg text,
	med_neg float,
	img_neg text,
	est_neg boolean,
	tip_con char,
	cod_con int,
	fec_ins date,
	puntos text,
	primary key (cod_neg)
);

create table ca_rubro(
	cod_rub serial primary key,
	rubro text
);

-- cod_pan codigo propietario anterior
-- cod_pnu codigo nuevo propietario
create table ca_traspaso(
	cod_neg int references ca_negocio(cod_neg),
	cod_pan int references rf_persona(cod_per),
	cod_pnu int references rf_persona(cod_per),
	fec_tra date
);

create table ca_cierre(
	cod_neg int references ca_negocio(cod_neg),
	fec_cie date,
	mot_cie text
);

create table ca_inmueble(
	cod_inm varchar(20) primary key,
	cod_pro int references rf_persona(cod_per),
	zon_inm varchar(6),
	dir_inm text,
	med_inm float,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	fec_ins date,
	puntos text
);

create table ca_cementerio(
	cod_cem serial primary key,
	nom_cem varchar(50),
	sit_en  text,
	zon_cem varchar(6),
	pre_nicpc float,
	pre_nic2pc float,
	pre_nicce float,
	pre_nic2ce float,
	pre_nicfc float,
	pre_nic2fc float
);

create table ca_perpetuidad(
	cod_tit serial primary key,
	ancho float,
	largo float,
	lim_nor text,
	lim_sur text,
	lim_est text,
	lim_oes text,
	nic_aut int,
	clase varchar(30),
	valor float,
	num_rec varchar(15),
	fec_rec date,
	cod_cem int references ca_cementerio(cod_cem),
	cod_pro int references rf_persona(cod_per)
);

create table ca_enterrado(
	cod_per int references rf_persona(cod_per),
	cod_tit int references ca_perpetuidad(cod_tit),
	cod_ent int,
	fec_ent date,
	nom_fall varchar(80)
);

create table ca_sociedad(
	idsoc serial primary key,
	nom_jur varchar(30),
	fec_cons date,
	gir_jur varchar(40),
	nit_jur varchar(20),
	tel_jur varchar(10),
	dir_jur text,
	rep_jur varchar(100)
);


create table ca_alumbrado(
	cod_alumbrado serial primary key,
	sit_en text,
	alum_mun varchar(20),
	puntos text
);

create table ca_calle(
	cod_call serial,
	est_call text,
	tip_call varchar(50),
	concepto text,
	puntos text
);

create table co_impuesto(
	codigo varchar(5)  primary key,
	nom_cue text,
	des_cue text,
	tip_cob varchar(10),
	cob_por float,
	cob_fij float,
	cob_min float,
	cob_met boolean
);

create table co_condonado(
	codigo varchar(5) references co_impuesto(codigo),
	fec_ini date,
	fec_fin date,
	num_acu varchar(25)
);
--impuesto asociado a negocio
create table co_neg_imp(
	cod_neg int references ca_negocio(cod_neg),
	cod_imp varchar(5) references co_impuesto(codigo),
	primary key(cod_neg,cod_imp)
);
--impuesto asociado a inmueble
create table co_inm_imp(
	cod_inm varchar(20) references ca_inmueble(cod_inm),
	cod_imp varchar(5) references co_impuesto(codigo),
	primary key(cod_inm,cod_imp)
);

create table co_notificacion(
	id_not serial primary key,
	mensaje text,
	fec_hor timestamp,
	status boolean,
	cod_fac integer
);

--cargo-> al codigo de impuesto, representa una deuda
--abono-> al codigo de la factura, representa un pago
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

create table co_estcta_neg(
	cod_estcta serial primary key,
	cod_neg int references ca_negocio(cod_neg),	
	fec_imp text,
	concepto text,
	monto float
);
create table co_estcta_inm(
	cod_estcta serial primary key,
	cod_inm varchar(20) references ca_inmueble(cod_inm),	
	fec_imp text,
	concepto text,
	monto float
);
create table co_fecpag_neg(
	cod_estcta int references co_estcta_neg(cod_estcta),
	fec_pag text
);
create table co_fecpag_inm(
	cod_estcta int references co_estcta_inm(cod_estcta),
	fec_pag text
);

create table af_depto(
	cod serial primary key,
	nom varchar(50)
);

create table af_tfondo(
	cod_tfondo serial primary key,
	nom varchar(50),
	des text
);

create table af_tactivo(
	cod serial primary key,
	nom varchar(25),
	anio integer,
	des varchar(150)
);


create table af_empresa(
	cod_emp serial primary key,
	nom varchar(50),
	dir varchar(150),
	tel varchar(10),
	nit varchar(20)
);

create table af_activo(
	cod_act varchar(25) primary key,
	nom varchar(50),
	mar varchar(50),
	mod varchar(50),
	ser varchar(50),
	cos_adq float,
	fec_adq date,
	act boolean,
	cod_tfondo int references af_tfondo(cod_tfondo),
	ori varchar(10),
	fec_gar date,
	don varchar(25),
	tact integer references af_tactivo(cod)
);

create table af_descargo(
	cod_des serial primary key,
	des varchar(150),
	cod_act varchar(25) references af_activo(cod_act),
	fec date
);

create table af_mantenimiento(
	cod_act varchar(25) references af_activo(cod_act),
	des varchar(100),
	cos float,
	emp integer references af_empresa(cod_emp),
	fec date,
	cod_man serial
);

create table af_traslados(
	cod_tra serial primary key,
	cod_act varchar(25) references af_activo(cod_act),
	fec date,
	des varchar(100),
	new_ubi integer references af_depto(cod)
);

create table se_preguntas(
	 cod serial primary key,
	 pre varchar(100)
);

create table se_usuario(
	id serial primary key unique,
	nom varchar(100),
	mail varchar(100),
	usu varchar(25) unique,
	contra varchar(40),
	niv varchar(13),
	act boolean,
	res varchar (100),
	cod_pre integer references se_preguntas(cod)
);

CREATE TABLE se_bitacora (
	cod bigserial primary key,
	accion character varying(200) NOT NULL,
	id_usuario integer NOT NULL references se_usuario(id),
	fecha date NOT NULL,
	hora time without time zone NOT NULL
);

--
-- Tablas del Registro del Estado Familiar
--

--
-- PERSONA
--

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
	eda_eso	Int,
	alf_eso	char,
	ocu_eso	Varchar(50),
	dep_res_eso	Varchar(12),
	mun_res_eso	Varchar(50),
	can_res_eso	Varchar(50),
	are_res_eso	Char,
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
--