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
		'searchFields' => 'name,beschreibung,ort,lat,lng,rettungsdienst,strandhelfer,prokiter,kitesafari,flachwasser,fotoservice,lager,materialmiete,stehrevier,shop,schulungsmaterial,verleihmaterial,media,team,tel,email,hauptmarke,hauptbild,webcam,stadt,land,url,adresse,sprachen,zeiten,',
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
		'searchFields' => 'name,ort,stadt,land,anfaenger,fortgeschrittene,profis,hauptbild,flachwasser,rettungsdienst,wellen,schule,parkplatz,startlandehilfe,grossereinstieg,sandplatz,wc,stehrevier,beschreibung,regeln,lat,lng,webcam,',
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

?>