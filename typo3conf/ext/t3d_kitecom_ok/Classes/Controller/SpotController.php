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
class SpotController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * spotRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\SpotRepository
	 * @inject
	 */
	protected $spotRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$spots = $this->spotRepository->findAll();
		$this->view->assign('spots', $spots);
	}

	/**
	 * action show
	 *
	 * @param mixed $spot
	 * @return void
	 * @dontvalidate $spot
	 * @dontverifyrequesthash 
	 */
	public function showAction($spot = NULL) {
		$this->view->assign('spot', $spot);
	}

	/**
	 * action new
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Spot $newSpot
	 * @return void
	 */
	public function newAction(\kitecom\T3dKitecom\Domain\Model\Spot $newSpot = NULL) {
		$this->view->assign('newSpot', $newSpot);
	}

	/**
	 * action create
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Spot $newSpot
	 * @return void
	 */
	public function createAction(\kitecom\T3dKitecom\Domain\Model\Spot $newSpot) {
		
				$this->spotRepository->add($newSpot);
				//$this->flashMessageContainer->add('Your new Spot '.$newSpot->getName().' was created.');
		
				$this->objectManager->get('Tx_Extbase_Persistence_ManagerInterface')->persistAll(); 
				$this->redirect('edit','Spot',Null,array('spot' => $newSpot));
				//$this->view->assign('spot', $newSpot);
		
				//$this->redirect('edit','Spot',Null,array('Spot' => $newSpot));
	}

	/**
	 * action edit
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Spot $spot
	 * @return void
	 */
	public function editAction(\kitecom\T3dKitecom\Domain\Model\Spot $spot) {
		$this->view->assign('spot', $spot);
	}

	/**
	 * action update
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Spot $spot
	 * @return void
	 */
	public function updateAction(\kitecom\T3dKitecom\Domain\Model\Spot $spot) {
		$this->spotRepository->update($spot);
		$this->flashMessageContainer->add('Your Spot was updated.');
		$this->redirect('edit','Spot',Null,array('spot' => $spot));
		//$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Spot $spot
	 * @return void
	 */
	public function deleteAction(\kitecom\T3dKitecom\Domain\Model\Spot $spot) {
		$this->spotRepository->remove($spot);
		$this->flashMessageContainer->add('Your Spot was removed.');
		$this->redirect('list');
	}

}
?>