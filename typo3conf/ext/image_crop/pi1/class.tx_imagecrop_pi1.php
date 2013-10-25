<?php
/***************************************************************
*  Copyright notice
*
*  © 2009 Daniel Rohr <office@alohalab.at>
*  © 2010 - 2012 Sigfried Arnold <s.arnold@rebell.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 *
 * @author	Sigfried Arnold <s.arnold@rebell.at>
 */

require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_imagecrop_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_imagecrop_pi1';
	var $scriptRelPath = 'pi1/class.tx_imagecrop_pi1.php';
	var $extKey        = 'image_crop';
	var $pi_checkCHash = TRUE;

	function main($content,$conf) {
		$this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['image_crop']);
		
		if (!$this->cObj->data['tx_imagecrop_crop']) {
			if ($this->extConf['enableDevLog'] == 1) {
				t3lib_div::devLog('cropping disabled (c' . $this->cObj->data['uid'] . '): return default $content', $this->extKey, 0);
			}
			return $content;
		} else {
			if ($this->extConf['enableDevLog'] == 1) {
				t3lib_div::devLog(
					'cropping enabled (c' . $this->cObj->data['uid'] . ')', $this->extKey, 0, array(
						'$this->cObj->data' => array(
							'image'                => $this->cObj->data['image'],
							'imagecols'            => $this->cObj->data['imagecols'],
							'image_noRows'         => $this->cObj->data['image_noRows'],
							'imageborder'          => $this->cObj->data['imageborder'],
							'imagewidth'           => $this->cObj->data['imagewidth'],
							'imageheight'          => $this->cObj->data['imageheight'],
							'tx_imagecrop_crop'    => $this->cObj->data['tx_imagecrop_crop'],
							'tx_imagecrop_gravity' => $this->cObj->data['tx_imagecrop_gravity'],
							'image_compression'    => $this->cObj->data['image_compression'],
							'image_effects'        => $this->cObj->data['image_effects'],
						)
					)
				);
			}
		
			if (!$this->cObj->data['imagewidth'] && !$this->cObj->data['imageheight']) {
				$this->cObj->data['imagewidth'] = $this->cObj->data['imageheight'] = $this->get_defaultColumnWidth();
			}
			if ($this->cObj->data['imageheight'] && !$this->cObj->data['imagewidth']) {
				$this->cObj->data['imagewidth'] = $this->get_defaultColumnWidth();
			}
			if ($this->cObj->data['imagewidth'] && !$this->cObj->data['imageheight']) {
				$this->cObj->data['imageheight'] = $this->cObj->data['imagewidth'];
			}
			
			$imgConf = array(
				'file'  => $GLOBALS['TSFE']->lastImageInfo['origFile'],
				'file.' => array(
					'params' => '-gravity ' . $this->cObj->data['tx_imagecrop_gravity'] . ' -crop ' . $this->cObj->data['imagewidth'] . 'x' . $this->cObj->data['imageheight'] . '+0+0 -colorspace rgb',
					'maxW' => $this->cObj->data['imagewidth'],
					'maxH' => $this->cObj->data['imageheight'],
					'minW' => $this->cObj->data['imagewidth'],
					'minH' => $this->cObj->data['imageheight'],
				)
			);
			
			// image_effects
			if ($this->cObj->image_effects[$this->cObj->data['image_effects']]) {
				$imgConf['file.']['params'] .= ' ' . $this->cObj->image_effects[$this->cObj->data['image_effects']]; 
			}
			
			// image_compression
			if ($this->cObj->image_compression[$this->cObj->data['image_compression']]) {
				$imgConf['file.']['params'] .= ' ' . $this->cObj->image_compression[$this->cObj->data['image_compression']]['params']; 
				$imgConf['file.']['ext']     =       $this->cObj->image_compression[$this->cObj->data['image_compression']]['ext'];
				unset($imgConf['file.']['ext.']);
			}
			
			$content = str_replace(
				array(
					$GLOBALS['TSFE']->lastImageInfo[3],
					'width="'  . $GLOBALS['TSFE']->lastImageInfo[0] . '"',
					'height="' . $GLOBALS['TSFE']->lastImageInfo[1] . '"'
				),
				array(
					$this->cObj->cObjGetSingle('IMG_RESOURCE', $imgConf),
					'width="'  . $this->cObj->data['imagewidth']  . '"',
					'height="' . $this->cObj->data['imageheight'] . '"'
				),
				$content
			);
			
			$GLOBALS['TSFE']->lastImageInfo[0] = $this->cObj->data['imagewidth'];
			$GLOBALS['TSFE']->lastImageInfo[1] = $this->cObj->data['imageheight']; 
			
			return $content;
		}
	}
	
	function get_defaultColumnWidth() {
		// uses components from tx_cssstyledcontent_pi1::render_textpic()
	
		$conf = $GLOBALS['TSFE']->tmpl->setup['tt_content.'][$this->cObj->data['CType'] . '.']['20.'];
	
		if ($conf['key.']['field']) {
			$keyPos = $this->cObj->data[$conf['key.']['field']];
			if (!$conf[$keyPos]) { $keyPos = 'default'; };

			$conf = $conf[$keyPos.'.'];
		}
		
		$imgs = t3lib_div::trimExplode(',',$this->cObj->data['image']); // filled with cObj->data
		$imgCount = count($imgs);
		
		// Positioning
		$position = $this->cObj->stdWrap($conf['textPos'], $conf['textPos.']);
		$contentPosition = $position&24; // 0,8,16,24 (above,below,intext,intext-wrap)

		$colspacing = intval($this->cObj->stdWrap($conf['colSpace'], $conf['colSpace.']));
		
		$border = intval($this->cObj->data['imageborder']) ? 1:0; // filled with cObj->data
		$borderThickness = intval($this->cObj->stdWrap($conf['borderThick'], $conf['borderThick.']));
		
		$borderThickness = $borderThickness?$borderThickness:1;
		$borderSpace = (($conf['borderSpace']&&$border) ? intval($conf['borderSpace']) : 0);
		
		// Generate cols
		$cols = $this->cObj->data['imagecols'];
		$colCount = ($cols > 1) ? $cols : 1;
		if ($colCount > $imgCount) { $colCount = $imgCount; }
		
		// Max Width
		$maxW = intval($this->cObj->stdWrap($conf['maxW'], $conf['maxW.']));

		if ($contentPosition>=16) { // in Text
			$maxWInText = intval($this->cObj->stdWrap($conf['maxWInText'],$conf['maxWInText.']));
			if (!$maxWInText) {
				// If maxWInText is not set, it's calculated to the 50% of the max
				$maxW = round($maxW/100*50);
			} else {
				$maxW = $maxWInText;
			}
		}
		
		// All columns have the same width:
		$defaultColumnWidth = floor(($maxW-$colspacing*($colCount-1)-$colCount*$border*($borderThickness+$borderSpace)*2)/$colCount); // floor instead of ceil

		if ($this->extConf['enableDevLog'] == 1) {
			t3lib_div::devLog('calculated colum width', $this->extKey, 0, array('$defaultColumnWidth' => $defaultColumnWidth));
		}
		return $defaultColumnWidth;
	}
}
?>