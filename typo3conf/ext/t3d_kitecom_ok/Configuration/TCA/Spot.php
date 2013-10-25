<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_t3dkitecom_domain_model_spot'] = array(
	'ctrl' => $TCA['tx_t3dkitecom_domain_model_spot']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, ort, stadt, land, anfaenger, fortgeschrittene, profis, hauptbild, flachwasser, rettungsdienst, wellen, schule, parkplatz, startlandehilfe, grossereinstieg, sandplatz, wc, stehrevier, beschreibung, regeln, lat, lng, webcam',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, ort, stadt, land, anfaenger, fortgeschrittene, profis, hauptbild, flachwasser, rettungsdienst, wellen, schule, parkplatz, startlandehilfe, grossereinstieg, sandplatz, wc, stehrevier, beschreibung, regeln, lat, lng, webcam,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_t3dkitecom_domain_model_spot',
				'foreign_table_where' => 'AND tx_t3dkitecom_domain_model_spot.pid=###CURRENT_PID### AND tx_t3dkitecom_domain_model_spot.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'ort' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.ort',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'stadt' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.stadt',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'land' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.land',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'anfaenger' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.anfaenger',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'fortgeschrittene' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.fortgeschrittene',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'profis' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.profis',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'hauptbild' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.hauptbild',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_t3dkitecom',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
		'flachwasser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.flachwasser',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'rettungsdienst' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.rettungsdienst',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'wellen' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.wellen',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'schule' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.schule',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'parkplatz' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.parkplatz',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'startlandehilfe' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.startlandehilfe',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'grossereinstieg' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.grossereinstieg',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'sandplatz' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.sandplatz',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'wc' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.wc',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'stehrevier' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.stehrevier',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'beschreibung' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.beschreibung',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'regeln' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.regeln',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'lat' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.lat',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lng' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.lng',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'webcam' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot.webcam',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
	),
);

?>