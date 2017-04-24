SET FOREIGN_KEY_CHECKS=0;
-- --------------------------------------------------------
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__fgbusupport_issue` (
	`id`				int(11)			NOT NULL 	AUTO_INCREMENT					COMMENT 'ID',
	`user_id`			int(11)														COMMENT 'Системный пользователь',
	`caption`			VARCHAR(200)	NOT NULL									COMMENT 'Заголовок обращения',
	`topic`				TEXT			NOT NULL									COMMENT 'Тест обращения',
	`supp_id`			tinyint			NOT NULL									COMMENT 'ID на Supporte',
	`supp_num`			VARCHAR(10)		NOT NULL									COMMENT 'Номер на Supporte',
	`supp_date_create`	VARCHAR(20)													COMMENT 'Дата создания на Supporte',
	`supp_date_end`		VARCHAR(20)													COMMENT 'Дата создания на Supporte',
	`supp_status_id`	VARCHAR(30)													COMMENT 'Статус на Supporte',
	`supp_module_id`	int(11)														COMMENT 'Модуль на Supporte',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Вопросы';

CREATE TABLE IF NOT EXISTS #__fgbusupport_status (
	`id`				int(11)			NOT NULL 	AUTO_INCREMENT					COMMENT 'ID',
	`code`				VARCHAR(30)		NOT NULL,
	`name`				VARCHAR(50)		NOT NULL,
	`color`				VARCHAR(10),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статусы';

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
	`id`				int(11)			NOT NULL,
	`changed_name`		VARCHAR(100),
	`state`				tinyint(3),
	`supp_modul_id`		int(11)			NOT NULL,
	`supp_modul_name`	VARCHAR(100)	NOT NULL,
	`supp_version_name`	VARCHAR(100)	NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Модули';
-- --------------------------------------------------------
-- --------------------------------------------------------
SET FOREIGN_KEY_CHECKS=1;