<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_t3dkitecom_domain_model_schule'] = array(
	'ctrl' => $TCA['tx_t3dkitecom_domain_model_schule']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, beschreibung, ort, lat, lng, rettungsdienst, strandhelfer, prokiter, kitesafari, flachwasser, fotoservice, lager, materialmiete, stehrevier, shop, schulungsmaterial, verleihmaterial, media, team, tel, email, hauptmarke, hauptbild, webcam, stadt, land, url, adresse, crfeuser, zeiten, sprachen',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, beschreibung, ort, lat, lng, rettungsdienst, strandhelfer, prokiter, kitesafari, flachwasser, fotoservice, lager, materialmiete, stehrevier, shop, schulungsmaterial, verleihmaterial, media, team, tel, email, hauptmarke, hauptbild, webcam, stadt, land, url, adresse, crfeuser, zeiten, sprachen,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_t3dkitecom_domain_model_schule',
				'foreign_table_where' => 'AND tx_t3dkitecom_domain_model_schule.pid=###CURRENT_PID### AND tx_t3dkitecom_domain_model_schule.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'beschreibung' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.beschreibung',
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
		'ort' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.ort',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'lat' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.lat',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lng' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.lng',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'rettungsdienst' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.rettungsdienst',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'strandhelfer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.strandhelfer',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'prokiter' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.prokiter',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'kitesafari' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.kitesafari',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'flachwasser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.flachwasser',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'fotoservice' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.fotoservice',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'lager' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.lager',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'materialmiete' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.materialmiete',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'stehrevier' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.stehrevier',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'shop' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.shop',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'schulungsmaterial' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.schulungsmaterial',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'verleihmaterial' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.verleihmaterial',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'media' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.media',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file_reference',
				'uploadfolder' => 'uploads/tx_t3dkitecom',
				'allowed' => '*',
				'disallowed' => 'php',
				'size' => 5,
			),
		),
		'team' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.team',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'tel' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.tel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'hauptmarke' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.hauptmarke',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'hauptbild' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.hauptbild',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file_reference',
				'uploadfolder' => 'uploads/tx_t3dkitecom',
				'allowed' => '*',
				'disallowed' => 'php',
				'size' => 5,
			),
		),
		'webcam' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.webcam',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'stadt' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.stadt',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'land' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.land',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'url' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'adresse' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.adresse',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'crfeuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.crfeuser',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'zeiten' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.zeiten',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_t3dkitecom_domain_model_zeiten',
				'MM' => 'tx_t3dkitecom_schule_zeiten_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_t3dkitecom_domain_model_zeiten',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'sprachen' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule.sprachen',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_t3dkitecom_domain_model_sprachen',
				'MM' => 'tx_t3dkitecom_schule_sprachen_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_t3dkitecom_domain_model_sprachen',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
	),
);

?>