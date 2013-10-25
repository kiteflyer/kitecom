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
	 * searchRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\SearchRepository
	 * @inject
	 */
	protected $searchRepository;

	/**
	 * userInteractionRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\UserInteractionRepository
	 * @inject
	 */
	protected $userInteractionRepository;

	/**
	 * zeitenRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\ZeitenRepository
	 * @inject
	 */
	protected $zeitenRepository;

	/**
	 * sprachenRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\SprachenRepository
	 * @inject
	 */
	protected $sprachenRepository;

	/**
	 * initialize create action
	 *
	 * @return
	 */
	public function initializeAction() {

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
		
		$user = $GLOBALS['TSFE']->fe_user->user['uid'];

		$id = $this->request->getArgument('schule');
		$show = 'schule';
								
		if($id && $show) {

			$detail = $this->searchRepository->getMyDetail($id,$show);	
			
			$this->view->setTemplatePathAndFilename('typo3conf/ext/'.$this->request->getControllerExtensionKey().'/Resources/Private/Templates/'.ucfirst($show).'/Show.html');
		}

		if ($user) {		
			$id=$detail['uid'];
			$kat=$_REQUEST['show'];
			if($user) {
				$myInteractions = $this->userInteractionRepository->getAllByElement($id, $kat, $user);
				$detail['myRating'] = $myInteractions;
			}
		}
		
		$besucher = $this->userInteractionRepository->getAllUser($id,$show);
		
		$this->view->assign($show, $detail);
		$this->view->assign('besucher', $besucher);
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

		$sprachenArray = $this->sprachenRepository->showDropdown();
		$zeitenArray = $this->zeitenRepository->showDropdown();
		
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
		
								$feuserId = $GLOBALS['TSFE']->fe_user->user['uid'];		
								$newSchule->setCrfeuser($feuserId);		
								$this->schuleRepository->add($newSchule);
				
								$this->flashMessageContainer->add('Your new School '.$newSchule->getName().' was created.');
						
								$this->objectManager->get('Tx_Extbase_Persistence_ManagerInterface')->persistAll(); 
								$feuserId = $GLOBALS['TSFE']->fe_user->user['uid'];		
								
								$this->redirect('edit','Schule',Null,array('schule' => $newSchule,'user' => $feuserId));
	}

	/**
	 * action edit
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\Schule $schule
	 * @ignorevalidation $schule
	 * @return void
	 */
	public function editAction(\kitecom\T3dKitecom\Domain\Model\Schule $schule) {
		
		$sprachenArray = $this->sprachenRepository->showDropdown();
		$zeitenArray = $this->zeitenRepository->showDropdown();
		$feuserId = $GLOBALS['TSFE']->fe_user->user['uid'];		
		
		//var_dump($schule->->reflectionService->objectManager->objectContainer->singletonInstances->TYPO3\CMS\Extbase\Configuration\ConfigurationManager->concreteConfigurationManager->contentObject->data);
		//var_dump($schule->getCruserId());
		
		//if ($feuserId == $schule['owner']) {
		$this->view->assign('schule', $schule);
		$this->view->assign('sprachen', $sprachenArray);		
		$this->view->assign('zeiten', $zeitenArray);
		$this->view->assign('user', $feuserId);			
		//}
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