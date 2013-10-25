<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns(
	'tt_content',
	array (
		'tx_imagecrop_crop' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_crop',
			'config'  => array(
				'type'  => 'check',
				'items' => array (
					'1' => array(
						'0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
					),
				),
			),
		),
		'tx_imagecrop_gravity' => array (
			'exclude' => 0,
			'label'   => 'LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity',
			'config'  => array (
				'type'  => 'select',
				'items' => array (
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_northwest', 'northwest', t3lib_extMgm::extRelPath('image_crop') . 'res/northwest.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_north',     'north',     t3lib_extMgm::extRelPath('image_crop') . 'res/north.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_northeast', 'northeast', t3lib_extMgm::extRelPath('image_crop') . 'res/northeast.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_west',      'west',      t3lib_extMgm::extRelPath('image_crop') . 'res/west.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_center',    'center',    t3lib_extMgm::extRelPath('image_crop') . 'res/center.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_east',      'east',      t3lib_extMgm::extRelPath('image_crop') . 'res/east.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_southwest', 'southwest', t3lib_extMgm::extRelPath('image_crop') . 'res/southwest.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_south',     'south',     t3lib_extMgm::extRelPath('image_crop') . 'res/south.gif'),
					array('LLL:EXT:image_crop/locallang_db.xml:tt_content.tx_imagecrop_gravity_southeast', 'southeast', t3lib_extMgm::extRelPath('image_crop') . 'res/southeast.gif'),
				),
				'size'         => 1,
				'selicon_cols' => 3,
				'maxitems'     => 1,
				'default'      => 'center'
			)
		)
	),
	1
);

// Palettes layout, TYPO3 <= 4.4
$GLOBALS['TCA']['tt_content']['palettes']['13']['showitem'] .= ',tx_imagecrop_crop,tx_imagecrop_gravity';

// Palettes layout, TYPO3 4.5
$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem'] = str_replace(
	', --linebreak--',
	', tx_imagecrop_crop, tx_imagecrop_gravity, --linebreak--',
	$GLOBALS['TCA']['tt_content']['palettes']['image_settings']['showitem']
);
?>