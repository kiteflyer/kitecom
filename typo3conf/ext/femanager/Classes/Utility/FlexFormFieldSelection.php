<?php
namespace In2\Femanager\Utility;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class FlexFormFieldSelection {

	/**
	 * Add options to FlexForm Selection - Options can be defined in TSConfig
	 *
	 * @param $params
	 * @param $pObj
	 * @return void
	 */
	public function addOptions(&$params, &$pObj) {
		$TSConfig = BackendUtility::getPagesTSconfig($this->getPid());

		if (!empty($TSConfig['tx_femanager.']['flexForm.'][$params['config']['itemsProcFuncTab'] . '.']['addFieldOptions.'])) {
			$options = $TSConfig['tx_femanager.']['flexForm.'][$params['config']['itemsProcFuncTab'] . '.']['addFieldOptions.'];
			foreach ((array) $options as $value => $label) {
				$params['items'][] = array(
					$label,
					$value
				);
			}
		}
	}

	/**
	 * Read pid from current URL
	 * 		URL example: http://powermailt361.in2code.de/typo3/alt_doc.php?&returnUrl=%2Ftypo3%2Fsysext%2Fcms%2Flayout%2Fdb_layout.php%3Fid%3D17%23element-tt_content-14&edit[tt_content][14]=edit
	 *
	 * @return int
	 */
	protected function getPid() {
		$pid = 0;
		$backUrl = str_replace('?', '&', GeneralUtility::_GP('returnUrl'));
		$urlParts = GeneralUtility::trimExplode('&', $backUrl, 1);
		foreach ($urlParts as $part) {
			if (stristr($part, 'id=')) {
				$pid = str_replace('id=', '', $part);
			}
		}

		return intval($pid);
	}

}
?>