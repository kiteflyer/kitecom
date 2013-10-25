<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Loginbox',
	array(
		'Login' => 'login',
		
	),
	// non-cacheable actions
	array(
		'Login' => '',
		
	)
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
$TYPO3_CONF_VARS['FE']['eID_include']['its_rsa_login2'] = t3lib_extMgm::extPath($_EXTKEY).'Classes/eid.php';
?>