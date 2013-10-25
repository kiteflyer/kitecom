<?php
if (!defined ('TYPO3_MODE')) {
die ('Access denied.');
}

switch ($_SERVER['HTTP_HOST']) {
	case 'kitecom.site':
		$GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = 't3_kitecom_2013';
		$GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = 'localhost';
		$GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = 'root';
		$GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = 'mysqlroot';	
		
		$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path'] = '/opt/ImageMagick/bin/';			
		$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path_lzw'] = '/opt/ImageMagick/bin/';							
		
		break;

}

?>