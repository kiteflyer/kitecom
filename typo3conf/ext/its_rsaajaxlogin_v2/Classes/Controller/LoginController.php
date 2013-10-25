<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Christoph Hofmann <typo3<at>its-hofmann.de>, ITS Hofmann
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 * @package its_rsaajaxlogin_v2
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_ItsRsaajaxloginV2_Controller_LoginController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * loginRepository
	 *
	 * @var Tx_ItsRsaajaxloginV2_Domain_Repository_LoginRepository
	 */
	protected $loginRepository;

	/**
	 * contentid
	 *
	 * id of the content
	 */
	protected $contentid;

	/**
	 * injectLoginRepository
	 *
	 * @param Tx_ItsRsaajaxloginV2_Domain_Repository_LoginRepository $loginRepository
	 * @return void
	 */
	public function injectLoginRepository(Tx_ItsRsaajaxloginV2_Domain_Repository_LoginRepository $loginRepository) {
		$this->loginRepository = $loginRepository;
	}

	/**
	 * initializeAction
	 *
	 * @return
	 */
	protected function initializeAction() {
		$configuration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

		$cObj= $this->configurationManager->getContentObject();
		$this->contentid=$cObj->data[uid];
		if (intval($this->contentid)==0) {
			$this->contentid = 14857+rand(10,99);
		}
		$this->cObj = $cObj;
	}


	/**
	 * action login
	 *
	 * @return void
	 */
	public function loginAction() {
		//$logins = $this->loginRepository->findAll();
		//$this->view->assign('logins', $logins);
		$imagedir = t3lib_extMgm::siteRelPath ('its_rsaajaxlogin_v2'). 'Resources/Public/Images/'	;
		if ($this->settings['imagepath']) {
			$imagedir = $this->settings['imagepath'];
		}
		$this->view->assign('contentId', $this->contentid);
		$this->view->assign('javascript',intval($this->settings['javascriptlib']));
		$this->view->assign('redirectonlogoutlinkid',intval($this->settings['redirectonlogout']));
		$this->view->assign('register',intval($this->settings['registerpage']));
		$this->view->assign('userpid',intval($this->settings['feuserstore']));
		$this->view->assign('fe_loginpage',intval($this->settings['feloginpage']));
		$this->view->assign('imagedir',$imagedir );
		$langid = $GLOBALS['TSFE']->sys_language_uid;
		if (intval($this->settings['lostpasswordlink'])>0) {
			//$lostlink= $this->cObj->pi_getPageLink($this->settings['lostpasswordlink']);
			$typolinkConfiguration = array(
				// Link to current page
				'parameter' => intval($this->settings['lostpasswordlink']),
				// Set additional parameters
				'additionalParams' => $this->settings['lostpasswordlinkparams'] ,
				// We must add cHash because we use parameters
				'useCashHash' => false,
				// We want link only

			);
			$lostlink= $this->cObj->typoLink_URL($typolinkConfiguration);
			$linktxt = Tx_Extbase_Utility_Localization::translate('lostpassword','its_rsaajaxlogin_v2');
			$lostlink= $this->cObj->typoLink($linktxt,$typolinkConfiguration);


		}

		$this->view->assign('lostlink',$lostlink);

		$this->view->assign('langid',$langid);
		$realurl = 0;
		if (t3lib_extMgm::isLoaded('realurl'))  {
					if ($GLOBALS['TSFE']->config['config']['tx_realurl_enable'] == 0) {

					} else {
						$realurl = 1;
					}
		}
		$this->view->assign('realurl',$realurl );
		$this->view->assign('logoutlink',intval($this->settings['redirectonlogout']));
	}

	/**
	 * initializeView
	 *
	 * @param $view
	 * @return
	 */
	public function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {

		$javascriptPath = t3lib_extMgm::siteRelPath('rsaauth') . 'resources/';
		$files = array(
						'jsbn/jsbn.js',
						'jsbn/prng4.js',
						'jsbn/rng.js',
						'jsbn/rsa.js',
						'jsbn/base64.js',
						'rsaauth_min.js'
				);
				$count=0;
		foreach ($files as $file) {
			$GLOBALS['TSFE']->additionalHeaderData['rsalibs'.$count] = '<script type="text/javascript" src="'.t3lib_div::getIndpEnv('TYPO3_SITE_URL').$javascriptPath.$file.'"></script>';
			$count++;
				}
				if (intval($this->settings['javascriptlib'])==2) {
			$jspath= t3lib_extMgm::siteRelPath('its_rsaajaxlogin_v2').'Resources/Public/js/';
			$file=$jspath.'its_login_jq.js';
			$GLOBALS['TSFE']->additionalHeaderData['its_login_js'] = '<script type="text/javascript" src="'.$file.'"></script>';
				}
		if (intval($this->settings['javascriptlib'])==1) {
			$GLOBALS['TSFE']->pSetup['javascriptLibs.']['Prototype']=1;
			$jspath= t3lib_extMgm::siteRelPath('its_rsaajaxlogin_v2').'Resources/Public/js/';
			$file=$jspath.'its_login_proto.js';
			$GLOBALS['TSFE']->additionalHeaderData['its_login_proto'] = '<script type="text/javascript" src="'.$file.'"></script>';
				}
				$configuration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

				if (!isset($configuration['_CSS_DEFAULT_STYLE'])) {
					$csspath= t3lib_extMgm::siteRelPath('its_rsaajaxlogin_v2').'Resources/Public/css/';
					$file=$csspath.'default.css';
					$GLOBALS['TSFE']->additionalHeaderData['its_login_css'] = '<link rel="stylesheet" type="text/css" href="'.$file.'" />';
				}
	}
}
?>