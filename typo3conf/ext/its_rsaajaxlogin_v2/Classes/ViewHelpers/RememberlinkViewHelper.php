<?php
class Tx_ItsRsaajaxloginV2_ViewHelpers_RememberLinkViewHelper

	extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
		/**
		 * render
		 * Render the download link
		 *
		 * @param string $class
		 * @return string remberlink
		 */
		public function render($class="") {
			//$file = $this->arguments['file'];
			$classstring="";
			if (strlen($class)>0) {
				$classstring='class="'.$class.'"';
			}
			
			$link = 'test';
			$content.='<a '.$classstring.' href="'.$link.'">Download </a>';
			//$this->typoLink_URL($typolinkConfiguration);
			$local_cObj = t3lib_div::makeInstance('tslib_cObj');
			
			$settings = $this->templateVariableContainer->get('settings'); 
			
			$typolinkConfiguration = array(
			  // Link to current page
			  'parameter' => intval($settings['lostpasswordlink']),
			  // Set additional parameters
			  'additionalParams' => $settings['lostpasswordlinkparams'] ,
			  // We must add cHash because we use parameters
			  'useCashHash' => false,
			  // We want link only
			  
			);
			$link = $local_cObj->typoLink_URL($typolinkConfiguration); 
			$linktxt = Tx_Extbase_Utility_Localization::translate('lostpassword','its_rsaajaxlogin_v2');
			$lostlink= $local_cObj->typoLink($linktxt,$typolinkConfiguration);
			return $lostlink ;

		}
		
	}
?>
