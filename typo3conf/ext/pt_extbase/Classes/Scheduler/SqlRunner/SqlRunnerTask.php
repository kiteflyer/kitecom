<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 punkt.de GmbH
 *  Authors:
 *    Christian Herberger <herberger@punkt.de>,
 *    Ursula Klinger <klinger@punkt.de>,
 *    Daniel Lienert <lienert@punkt.de>,
 *    Joachim Mathes <mathes@punkt.de>
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
 * SQL Runner Task
 *
 * @package pt_extbase
 * @subpackage Scheduler
 */
class Tx_PtExtbase_Scheduler_SqlRunner_SqlRunnerTask extends tx_scheduler_Task {

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var Tx_PtExtbase_SqlGenerator_SqlGenerator
	 */
	protected $sqlGenerator;

	/**
	 * @var Tx_PtExtbase_SqlRunner_SqlRunnerInterface
	 */
	protected $sqlRunner;

	/**
	 * @return boolean Returns TRUE on successful execution, FALSE on error
	 */
	public function execute() {
		$this->initializeExtbase();
		$this->initializeObject();
		$sqls = $this->sqlGenerator->generate(t3lib_div::getFileAbsFileName($this->tx_ptextbase_sqlfile));
		$this->sqlRunner->runSqls($sqls);
		return TRUE;
	}

	/**
	 * Initialize Extbase
	 *
	 * This is necessary to resolve the TypoScript interface definitions
	 */
	protected function initializeExtbase() {
		$configuration['extensionName'] = 'PtExtbase';
		$configuration['pluginName'] = 'dummy';
		$extbaseBootstrap = t3lib_div::makeInstance('Tx_Extbase_Core_Bootstrap'); /** @var Tx_Extbase_Core_Bootstrap $extbaseBootstrap  */
		$extbaseBootstrap->initialize($configuration);
	}

	/**
	 * @return void
	 */
	public function initializeObject() {
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->sqlGenerator = $this->objectManager->get('Tx_PtExtbase_SqlGenerator_SqlGenerator');
		$this->sqlRunner = $this->objectManager->get('Tx_PtExtbase_SqlRunner_SqlRunnerInterface');
	}

	/**
	 * @return string
	 */
	public function getAdditionalInformation() {
		return "Run SQL file " . $this->tx_ptextbase_sqlfile;
	}

}
?>