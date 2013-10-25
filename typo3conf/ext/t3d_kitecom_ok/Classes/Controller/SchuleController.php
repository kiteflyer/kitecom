<?php
namespace kitecom\T3dKitecom\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Ramon <rm@t3-design.ch>, www.t3-design.ch
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
 * @package t3d_kitecom
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SchuleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * schuleRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\SchuleRepository
	 * @inject
	 */
	protected $schuleRepository;



	/**
	 * initialize create action
	 * allow creation of submodel company
	 */
	public function initializeAction() {
/*
		$requestArguments = $this->request->getArguments();
		
		$requestArguments['newSchule']['sprachen'] = serialize($requestArguments['newSchule']['sprachen']);
		$requestArguments['newSchule']['zeiten'] = serialize($requestArguments['newSchule']['sprachen']);
				
		$this->request->setArguments($requestArguments);
*/
	}


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$schules = $this->schuleRepository->findAll();
		$this->view->assign('schules', $schules);
	}

	/**
	 * action show
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $schule
	 * @return void
	 */
	public function showAction(\kitecom\T3dKitecom\Domain\Model\Schule $schule) {
		$this->view->assign('schule', $schule);
	}

	/**
	 * action new
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $newSchule
	 * @dontvalidate $newSchule
	 * @return void
	 */
	public function newAction(\kitecom\T3dKitecom\Domain\Model\Schule $newSchule = NULL) {
		if ($newSchule == NULL) { // workaround for fluid bug ##5636
			//$newSchule = t3lib_div::makeInstance('');
		}
		
		$sprachenArray = array(
			(object) array("name" => "Deutsch", "value" => "de"),
			(object) array("name" => "Franz", "value" => "fr"),					
			(object) array("name" => "Englisch", "value" => "en"),
			(object) array("name" => "Russisch", "value" => "ru")			 
		);

		$zeitenArray = array(
			(object) array("name" => "Januar", "value" => "01"),
			(object) array("name" => "Februar", "value" => "02"),					
			(object) array("name" => "März", "value" => "03"),
			(object) array("name" => "April", "value" => "04")			 
		);

		$this->view->assign('newSchule', $newSchule);
		$this->view->assign('sprachen', $sprachenArray);		
		$this->view->assign('zeiten', $zeitenArray);
	}

	/**
	 * action create
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $newSchule
	 * @return void
	 */
	public function createAction(\kitecom\T3dKitecom\Domain\Model\Schule $newSchule) {
		

				$this->schuleRepository->add($newSchule);
				$this->flashMessageContainer->add('Your new School '.$newSchule->getName().' was created.');
		
				$this->objectManager->get('Tx_Extbase_Persistence_ManagerInterface')->persistAll(); 
				$this->redirect('edit','Schule',Null,array('schule' => $newSchule));
	}

	/**
	 * action edit
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $schule
	 * @ignorevalidation $schule
	 * @return void
	 */
	public function editAction(\kitecom\T3dKitecom\Domain\Model\Schule $schule) {
		
				$sprachenArray = array(
					(object) array("name" => "Deutsch", "value" => "de"),
					(object) array("name" => "Franz", "value" => "fr"),					
					(object) array("name" => "Englisch", "value" => "en"),
					(object) array("name" => "Russisch", "value" => "ru")			 
				);
		
				$zeitenArray = array(
					(object) array("name" => "Januar", "value" => "01"),
					(object) array("name" => "Februar", "value" => "02"),					
					(object) array("name" => "März", "value" => "03"),
					(object) array("name" => "April", "value" => "04")			 
				);
		
				$this->view->assign('schule', $schule);
				$this->view->assign('sprachen', $sprachenArray);		
				$this->view->assign('zeiten', $zeitenArray);
	}

	/**
	 * action update
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $schule
	 * @ignorevalidation $schule
	 * @return void
	 */
	public function updateAction(\kitecom\T3dKitecom\Domain\Model\Schule $schule) {
		//$schulenew = $_POST['tx_t3dkitecom_schule']["editschule"];
		//var_dump($schulenew);
		//var_dump($editschule);

		//$result = array_merge($schulenew, $editschule);

		$this->schuleRepository->update($schule);
		$this->flashMessageContainer->add('Your Schule was updated.');
		$this->redirect('edit','Schule',Null,array('schule' => $schule));
	}

	/**
	 * action delete
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $schule
	 * @return void
	 */
	public function deleteAction(\kitecom\T3dKitecom\Domain\Model\Schule $schule) {
		$this->schuleRepository->remove($schule);
		$this->flashMessageContainer->add('Your Schule was removed.');
		$this->redirect('list');
	}

}
?>