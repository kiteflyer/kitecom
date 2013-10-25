#
# Table structure for table 'tx_t3dkitecom_domain_model_schule'
#
CREATE TABLE tx_t3dkitecom_domain_model_schule (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	beschreibung text NOT NULL,
	ort varchar(255) DEFAULT '' NOT NULL,
	lat varchar(255) DEFAULT '' NOT NULL,
	lng varchar(255) DEFAULT '' NOT NULL,
	rettungsdienst tinyint(1) unsigned DEFAULT '0' NOT NULL,
	strandhelfer tinyint(1) unsigned DEFAULT '0' NOT NULL,
	prokiter tinyint(1) unsigned DEFAULT '0' NOT NULL,
	kitesafari tinyint(1) unsigned DEFAULT '0' NOT NULL,
	flachwasser tinyint(1) unsigned DEFAULT '0' NOT NULL,
	fotoservice tinyint(1) unsigned DEFAULT '0' NOT NULL,
	lager tinyint(1) unsigned DEFAULT '0' NOT NULL,
	materialmiete tinyint(1) unsigned DEFAULT '0' NOT NULL,
	stehrevier tinyint(1) unsigned DEFAULT '0' NOT NULL,
	shop tinyint(1) unsigned DEFAULT '0' NOT NULL,
	schulungsmaterial varchar(255) DEFAULT '' NOT NULL,
	verleihmaterial varchar(255) DEFAULT '' NOT NULL,
	media text NOT NULL,
	team int(11) DEFAULT '0' NOT NULL,
	tel varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	hauptmarke varchar(255) DEFAULT '' NOT NULL,
	hauptbild text NOT NULL,
	webcam varchar(255) DEFAULT '' NOT NULL,
	stadt varchar(255) DEFAULT '' NOT NULL,
	land varchar(255) DEFAULT '' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	adresse text NOT NULL,
	sprachen int(11) DEFAULT '0' NOT NULL,
	zeiten int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_t3dkitecom_domain_model_spot'
#
CREATE TABLE tx_t3dkitecom_domain_model_spot (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	ort varchar(255) DEFAULT '' NOT NULL,
	stadt varchar(255) DEFAULT '' NOT NULL,
	land varchar(255) DEFAULT '' NOT NULL,
	anfaenger tinyint(1) unsigned DEFAULT '0' NOT NULL,
	fortgeschrittene tinyint(1) unsigned DEFAULT '0' NOT NULL,
	profis tinyint(1) unsigned DEFAULT '0' NOT NULL,
	hauptbild text NOT NULL,
	flachwasser tinyint(1) unsigned DEFAULT '0' NOT NULL,
	rettungsdienst tinyint(1) unsigned DEFAULT '0' NOT NULL,
	wellen tinyint(1) unsigned DEFAULT '0' NOT NULL,
	schule tinyint(1) unsigned DEFAULT '0' NOT NULL,
	parkplatz tinyint(1) unsigned DEFAULT '0' NOT NULL,
	startlandehilfe tinyint(1) unsigned DEFAULT '0' NOT NULL,
	grossereinstieg tinyint(1) unsigned DEFAULT '0' NOT NULL,
	sandplatz tinyint(1) unsigned DEFAULT '0' NOT NULL,
	wc tinyint(1) unsigned DEFAULT '0' NOT NULL,
	stehrevier tinyint(1) unsigned DEFAULT '0' NOT NULL,
	beschreibung text NOT NULL,
	regeln text NOT NULL,
	lat varchar(255) DEFAULT '' NOT NULL,
	lng varchar(255) DEFAULT '' NOT NULL,
	webcam int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_t3dkitecom_domain_model_neuereintrag'
#
CREATE TABLE tx_t3dkitecom_domain_model_neuereintrag (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_t3dkitecom_domain_model_search'
#
CREATE TABLE tx_t3dkitecom_domain_model_search (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_t3dkitecom_domain_model_media'
#
CREATE TABLE tx_t3dkitecom_domain_model_media (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	userid varchar(255) DEFAULT '' NOT NULL,
	katid varchar(255) DEFAULT '' NOT NULL,
	elid varchar(255) DEFAULT '' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_t3dkitecom_domain_model_userinteraction'
#
CREATE TABLE tx_t3dkitecom_domain_model_userinteraction (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	userid int(11) DEFAULT '0' NOT NULL,
	elementid int(11) DEFAULT '0' NOT NULL,
	kategorieid int(11) DEFAULT '0' NOT NULL,
	interactionid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);