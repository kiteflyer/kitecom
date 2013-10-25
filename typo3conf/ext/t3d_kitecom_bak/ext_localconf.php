<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'kitecom.' . $_EXTKEY,
	'Schule',
	array(
		'Schule' => 'list, show, edit, new, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Schule' => 'create, update, delete, edit, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'kitecom.' . $_EXTKEY,
	'Spot',
	array(
		'Spot' => 'list, show, edit, new, update, create, delete',
		
	),
	// non-cacheable actions
	array(
		'Spot' => 'create, update, delete',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'kitecom.' . $_EXTKEY,
	'Newintrys',
	array(
		'NeuerEintrag' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Schule' => 'create, update, delete, edit',
		'Spot' => 'create, update, delete, edit',
		'NeuerEintrag' => '',
		'Search' => '',
		'Media' => '',
		'UserInteraction' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'kitecom.' . $_EXTKEY,
	'Search',
	array(
		'Search' => 'spsearch, search, list, getdata, leftdata, headerdata, preview, show',
		
	),
	// non-cacheable actions
	array(
		'Search' => 'spsearch, search, list, getdata, preview',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'kitecom.' . $_EXTKEY,
	'Userinteraction',
	array(
		'UserInteraction' => 'like, dislike, favorite, student, wasthere, list, hover, local',
		
	),
	// non-cacheable actions
	array(
		'UserInteraction' => 'like, dislike, favorite, student, wasthere',
		
	)
);

?>