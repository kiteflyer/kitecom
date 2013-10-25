<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Schule',
	'Kiteschule'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_schule';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_schule.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Spot',
	'Kitespot'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_spot';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_spot.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Newintrys',
	'Neue Einträge'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Search',
	'Search'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_search';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_search.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Userinteraction',
	'UserInteraction'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_userinteraction';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_userinteraction.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Feuser',
	'User FE'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_feuser';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_feuser.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Stats',
	'Statistiken'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_stats';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_stats.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Kitecom');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_schule', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_schule.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_schule');
$TCA['tx_t3dkitecom_domain_model_schule'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_schule',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,beschreibung,ort,lat,lng,rettungsdienst,strandhelfer,prokiter,kitesafari,flachwasser,fotoservice,lager,materialmiete,stehrevier,shop,schulungsmaterial,verleihmaterial,media,team,tel,email,hauptmarke,hauptbild,webcam,stadt,land,url,adresse,crfeuser,zeiten,sprachen,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Schule.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_schule.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_spot', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_spot.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_spot');
$TCA['tx_t3dkitecom_domain_model_spot'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_spot',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,ort,stadt,land,anfaenger,fortgeschrittene,profis,hauptbild,flachwasser,rettungsdienst,wellen,schule,parkplatz,startlandehilfe,grossereinstieg,sandplatz,wc,stehrevier,beschreibung,regeln,lat,lng,webcam,crfeuser,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Spot.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_spot.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_neuereintrag', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_neuereintrag.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_neuereintrag');
$TCA['tx_t3dkitecom_domain_model_neuereintrag'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_neuereintrag',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/NeuerEintrag.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_neuereintrag.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_search', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_search.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_search');
$TCA['tx_t3dkitecom_domain_model_search'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_search',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Search.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_search.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_media', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_media.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_media');
$TCA['tx_t3dkitecom_domain_model_media'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_media',
		'label' => 'userid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'userid,katid,elid,name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Media.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_media.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_userinteraction', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_userinteraction.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_userinteraction');
$TCA['tx_t3dkitecom_domain_model_userinteraction'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_userinteraction',
		'label' => 'userid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'userid,elementid,kategorieid,interactionid,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/UserInteraction.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_userinteraction.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_zeiten', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_zeiten.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_zeiten');
$TCA['tx_t3dkitecom_domain_model_zeiten'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_zeiten',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Zeiten.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_zeiten.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_sprachen', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_sprachen.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_sprachen');
$TCA['tx_t3dkitecom_domain_model_sprachen'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_sprachen',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Sprachen.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_sprachen.gif'
	),
);

$tmp_t3d_kitecom_columns = array(

	'lat' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lat',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'lng' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lng',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'suche' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.suche',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'ort' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.ort',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'stadt' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.stadt',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'land' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.land',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'newsletter' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.newsletter',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'schlafmoeglichkeit' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.schlafmoeglichkeit',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'lieblingsmakre' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lieblingsmakre',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'lieblingsspot' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lieblingsspot',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'hausspot' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.hausspot',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'jobsearch' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.jobsearch',
		'config' => array(
			'type' => 'check',
			'default' => 0
		),
	),
	'company' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.company',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'lastcompany' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lastcompany',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'lieblinkskite' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.lieblinkskite',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim'
		),
	),
	'geburtsdatum' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.geburtsdatum',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'hauptbild' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user.hauptbild',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
);

t3lib_extMgm::addTCAcolumns('fe_users',$tmp_t3d_kitecom_columns);

$TCA['fe_users']['columns'][$TCA['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_T3dKitecom_User','Tx_T3dKitecom_User');

$TCA['fe_users']['types']['Tx_T3dKitecom_User']['showitem'] = $TCA['fe_users']['types']['1']['showitem'];
$TCA['fe_users']['types']['Tx_T3dKitecom_User']['showitem'] .= ',--div--;LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_user,';
$TCA['fe_users']['types']['Tx_T3dKitecom_User']['showitem'] .= 'lat, lng, suche, ort, stadt, land, newsletter, schlafmoeglichkeit, lieblingsmakre, lieblingsspot, hausspot, jobsearch, company, lastcompany, lieblinkskite, geburtsdatum, hauptbild';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_stats', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_stats.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_stats');
$TCA['tx_t3dkitecom_domain_model_stats'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_stats',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Stats.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_stats.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_t3dkitecom_domain_model_wetter', 'EXT:t3d_kitecom/Resources/Private/Language/locallang_csh_tx_t3dkitecom_domain_model_wetter.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3dkitecom_domain_model_wetter');
$TCA['tx_t3dkitecom_domain_model_wetter'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:t3d_kitecom/Resources/Private/Language/locallang_db.xlf:tx_t3dkitecom_domain_model_wetter',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Wetter.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_t3dkitecom_domain_model_wetter.gif'
	),
);

?>