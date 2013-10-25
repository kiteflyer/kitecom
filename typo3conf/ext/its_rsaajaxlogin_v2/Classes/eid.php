<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Christoph Hofmann
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

require_once(PATH_tslib.'class.tslib_content.php');
require_once(PATH_t3lib.'class.t3lib_page.php');
require_once(PATH_tslib.'class.tslib_pibase.php');
require_once(PATH_t3lib.'class.t3lib_stdgraphic.php');

require_once(t3lib_extMgm::extPath('rsaauth') . 'sv1/backends/class.tx_rsaauth_backendfactory.php');
require_once(t3lib_extMgm::extPath('rsaauth') . 'sv1/storage/class.tx_rsaauth_storagefactory.php');


class csConvObj {
	function parse_charset() {
		return 'utf-8';
	}

	function utf8_decode($l,$c) {
		return $l;
	}

function conv_case($charset,$string,$case)    {
	if ($GLOBALS['TYPO3_CONF_VARS']['SYS']['t3lib_cs_utils'] == 'mbstring' && (float)phpversion() >= 4.3)    {
		if ($case == 'toLower')    {
			$string = mb_strtolower($string,$charset);
		} else {
		$string = mb_strtoupper($string,$charset);
		}
	} else {
		if ($case == 'toLower') {
			$string = strtolower($string);
		} else {
			$string = strtoupper($string);
		}
	}

	return $string;
}
function sb_char_mapping($str,$charset,$mode,$opt='')    {
	return $str;
}

function specCharsToASCII($charset,$string){

	$string = $this->sb_char_mapping($string,$charset,'ascii');
	return $string;
}
}

class getLLobj {
		var $LOCAL_LANG;
		public function __construct()
		{
				$lang = t3lib_div::_GP('lang') ;
				$basePath = t3lib_extMgm::extPath('its_rsaajaxlogin_v2').'Resources/Private/Language/locallang.xml';
				$tempLOCAL_LANG = t3lib_div::readLLfile($basePath,$lang);


				$this->LOCAL_LANG = $tempLOCAL_LANG;
				$this->LLkey = $lang;
		}
		function pi_getLL ($index)
		{

				$ret = $this->LOCAL_LANG[$this->LLkey][$index];

				if (empty ($ret))
						$ret = $this->LOCAL_LANG['default'][$index];
				return $ret;

		}
}

class ajax_order extends tslib_pibase {

		public function __construct() {
				tslib_eidtools::connectDB(); //Connect to database
				$this->cObj = t3lib_div :: makeInstance("tslib_cObj");
				$this->feUserObj = tslib_eidtools::initFeUser();
				$GLOBALS['TSFE']->fe_user = $this->feUserObj;
				$GLOBALS['TSFE']->sys_page = t3lib_div::makeInstance('t3lib_pageSelect');
				$GLOBALS['TSFE']->tmpl = t3lib_div::makeInstance('t3lib_TStemplate');
				$this->myLang = new getLLobj;
				$this->rsakey= $this->getrsakeypair();
				$this->realurlenabled=0;

				if (t3lib_extMgm::isLoaded('realurl'))  {
					if (intval(t3lib_div::_GP('realurl')) == 0) {

					} else {
							require_once(t3lib_extMgm::extPath('realurl').'class.tx_realurl.php');
							$this->realurl = t3lib_div::makeInstance('tx_realurl');
							$GLOBALS['TSFE']->config['config']['tx_realurl_enable'] = 1;
							$this->realurlenabled=1;
							if (strlen($this->setup[absurl])==0) {
									$this->setup[absurl]='http://'.$_SERVER["HTTP_HOST"];
							}
					}
				}
		}

		function main(){
			$itsself_loaded = t3lib_extMgm::isLoaded('its_selfregister') ? 1 : 0;
			$this->logintype = t3lib_div::_GP('logintype');
			$this->userIsLoggedIn = (intval($GLOBALS['TSFE']->fe_user->user[uid])>0) ? 1:0;
			$username = t3lib_div::_GP('user');
			$loginerror=0;
			$welcome=0;
			$logout=0;
			$rsakey = '';
			$exponent = '';
			if (is_array($this->rsakey))
			{
					$rsakey = $this->rsakey[1];
					$exponent = $this->rsakey[2];
			}
			if ($this->logintype == 'logout') {
					$logout=1;
					$logoutlink=$this->geturl(intval(t3lib_div::_GP('rlid')),array('L'=>t3lib_div::_GP('L')));
			}
			if (!empty($username ) && ($this->userIsLoggedIn == 0) && ($this->logintype == 'login'))
					$loginerror=1;
			$NonValidatedAccount = 0;
			if (($loginerror==1) && ($itsself_loaded ==1 ))
			{
					if ($this->isNonValidatedAccount($username))
							$NonValidatedAccount = 1;
			}
				if (!empty($username ) && ($this->userIsLoggedIn == 1))
					$welcome=1;
				$redirectpid = intval($GLOBALS["TSFE"]->fe_user->user[felogin_redirectPid]);
				if ($redirectpid == 0 )     {
				$groupData = $GLOBALS['TSFE']->fe_user->user['usergroup'];
				if (strlen($groupData) > 0){
					$groups= t3lib_div::trimExplode(',',$groupData);
					foreach ($groups as $group) {
						if (intval($redirectpid)>0) {
							continue;
						}
						$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
							'felogin_redirectPid',
							$GLOBALS['TSFE']->fe_user->usergroup_table,
							'felogin_redirectPid!="" AND uid = '.$group
						);
						if ($row = $GLOBALS['TYPO3_DB']->sql_fetch_row($res))   {
							$redirectpid = intval($row[0]);
						}
						if (intval($redirectpid)>0) {
							continue;
						}
					}
				}
			}
			$redirektlink = '';
			if ((intval($redirectpid) > 0 ) && ($welcome==1)) {
				$lid = intval( t3lib_div::_GP('L'));
				$link = ( $this->geturl($redirectpid,array('L'=>$lid,no_cache=>1)));
				$redirektlink = $link;
			}
			$edi= array
			(
				'login' => $this->userIsLoggedIn,
				'loginerror' => $loginerror,
				'welcome' => $welcome,
				'rsakey' => $rsakey,
				'exponent' => $exponent,
				'redirect'=>$redirektlink,
				'name' =>  $GLOBALS["TSFE"]->fe_user->user[name],
				'registerlink' => $this->showRegisterLink(),
				'NonValidatedAccount' => $NonValidatedAccount,
				'NonValidatedAccountText' => $this->shownotValidatedError(),
				'logout' => $logout,
				'logoutlink' => $logoutlink
			);
			$content = json_encode($edi);
			return $content ;
		}
		protected function ajax_header($content) {
			header('Expires: Mon, 22 Jul 1998 04:00:00 GMT');
			header('Last-Modified: ' . gmdate( "D, d M Y H:i:s" ) . 'GMT');
			header('Cache-Control: no-cache, must-revalidate');
			header('Pragma: no-cache');
			header('Content-Length: '.strlen($content));
			header("content-type:text/html");
		}

		function doOutput($content)	{
			$this->ajax_header($content);
			echo $content;
		}


		function shownotValidatedError () {
			$errortext = 'notValidatederror';
			$content ='<p style="color: red;">'.$errortext.'</p>';
			if (intval( t3lib_div::_GP('evc')) > 0)	{
				$linklabel=  'EnterValidationCodeLabel';
				$urllink =htmlspecialchars( $this->pi_getPageLink(intval( t3lib_div::_GP('evc'))));
				$link = '<p><a name="EnterValidationCode" href="/index.php'.$urllink.'" >'.$linklabel.'</a></p>';
				$content .= $link;
			}
			if (intval( t3lib_div::_GP('rvm')) > 0) {
				$linklabel=  'RequestnewValidationmail';
				$urllink =htmlspecialchars( $this->pi_getPageLink(intval( t3lib_div::_GP('rvm'))));
				$link = '<p><a name="RequestnewValidationmail" href="index.php'.$urllink.'" >'.$linklabel.'</a></p>';
				$content .= $link;
			}
			return $content;
		}

		function showRegisterLink () {
			$content='';
			if (t3lib_div::_GP('L'))
				$lid = intval( t3lib_div::_GP('L'));
			else
				$lid = intval( t3lib_div::_GP('lid'));
			if (intval( t3lib_div::_GP('register')) > 0) {
				$registerlink =htmlspecialchars( $this->pi_getPageLink(intval( t3lib_div::_GP('register')),'',array('L'=>$lid)));
				$pageid= intval(t3lib_div::_GP('register'));
				$registerlink = $this->geturl( $pageid,array('L'=>$lid));
				$link = '<a href="'.$registerlink.'" name="registerlink">###registerlabel###</a> ';
				$content .= $link ;
			}
			return $content;
		}

		function isNonValidatedAccount($username)	{
			$username  = $GLOBALS['TYPO3_DB']->fullQuoteStr ($username ,'');
			$enablefields  = ' AND tx_its_selfregister.deleted=0 AND tx_its_selfregister.t3ver_state<=0 AND tx_its_selfregister.hidden=0 AND (tx_its_selfregister.starttime<='.time().') AND (tx_its_selfregister.endtime=0 OR tx_its_selfregister.endtime>'.time().')';
			$result = $GLOBALS["TYPO3_DB"]->exec_SELECTquery('*','tx_its_selfregister','    tx_itsselfregister_username='. $username   .$enablefields  ,'','',1);
			$sql = $GLOBALS["TYPO3_DB"]->SELECTquery('*','tx_its_selfregister','    tx_itsselfregister_username='. $username   .$enablefields  ,'','',1);
			if($result){
				$found = $GLOBALS['TYPO3_DB']->sql_num_rows ( $result);
				$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result) ;
				if ($found > 0 )
					return true;
			}
			return false;
		}

		function getrsakeypair () {
			if ($GLOBALS['TYPO3_CONF_VARS']['FE']['loginSecurityLevel'] == 'rsa') {
				$backend = tx_rsaauth_backendfactory::getBackend();
				if ($backend) {
					$result[0] = 'tx_rsaauth_feencrypt(this);';
					$keyPair = $backend->createNewKeyPair();
					$storage = tx_rsaauth_storagefactory::getStorage();
					$storage->put($keyPair->getPrivateKey());
					$result[1] = htmlspecialchars($keyPair->getPublicKeyModulus());
					$result[2] =  sprintf('%x', $keyPair->getExponent());
					return ($result);
				}
			}
		}

		function geturl ($pageid,$params =array()) {

				if ($this->realurlenabled=== 0) {
						$link = $this->setup[absurl].'/index.php'.$this->pi_getPageLink($pageid,'',$params);
						return $link;
				}
				$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'pages', 'uid = '.(int)$pageid);
				$pagerow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
				$conf['LD'] = $GLOBALS['TSFE']->tmpl->linkData($pagerow, '', 0, 'index.php', '', t3lib_div::implodeArrayForUrl('',$params));
				$this->realurl->encodeSpURL($conf, $this);
				$url = $conf['LD']['totalURL'];
				return  $this->setup[absurl].'/'. $url;
		}


}


$GLOBALS['TSFE']=new stdClass;
$GLOBALS['TSFE']->csConvObj=new csConvObj;

$output = t3lib_div::makeInstance('ajax_order');
$content = $output->main();
$output->doOutput($content);


?>
