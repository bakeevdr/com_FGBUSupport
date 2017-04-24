
-- --------------------------------------------------------
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS #__fgbusupport_issue (
	id					serial			NOT NULL,
	user_id				integer,
	caption				VARCHAR(200) 	NOT NULL,
	topic 				TEXT 			NOT NULL,
	supp_id				integer,
	supp_num			VARCHAR(10),
	supp_date_create	VARCHAR(20),
	supp_date_end		VARCHAR(20),
	supp_status_id		VARCHAR(30),
	CONSTRAINT #__fgbusupport_issue_pkey PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS #__fgbusupport_status (
	id					serial			NOT NULL,
	code				VARCHAR(30)		NOT NULL,
	name				VARCHAR(50)		NOT NULL,
	color				VARCHAR(10),
	CONSTRAINT #__fgbusupport_status_pkey PRIMARY KEY(id)
);

insert into #__fgbusupport_status (code, name, color) values
	('issue_tbd','Требует уточнения','#d9534f'),
	('issue_post','Подано','#999'),
	('issue_appointed','Назначено','#f0ad4e'),
	('issue_rejected','Отвергнуто','#999'),
	('issue_closed','Закрыто','#5cb85c'),
	('issue_wait_appointment','Ожидает назначения','#999'),
	('issue_revision','В разработку','#999'),
	('issue_develop','Разработка','#999'),
	('issue_implemented','Реализовано','#999');
	
CREATE TABLE IF NOT EXISTS #__fgbusupport_module (
	id 					serial			NOT NULL,
	changed_name		VARCHAR(100),
	state				SMALLINT,
	supp_modul_id		integer			NOT NULL,
	supp_modul_name		VARCHAR(100)	NOT NULL,
	supp_version_name	VARCHAR(100)	NOT NULL,
	CONSTRAINT #__fgbusupport_module_pkey PRIMARY KEY(id)
);

-- --------------------------------------------------------
-- --------------------------------------------------------