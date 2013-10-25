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
class UserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * userRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository;

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
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$users = $this->userRepository->findAll();
		$this->view->assign('users', $users);
	}

	/**
	 * action show
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $user
	 * @return void
	 */
	public function showAction(\kitecom\T3dKitecom\Domain\Model\User $user) {
		
		$user = $GLOBALS['TSFE']->fe_user->user['uid'];
		$id = $this->request->getArgument('user');
		$show = 'user';
								
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

		//$user = $this->userRepository->findByUid(intval($GLOBALS['TSFE']->fe_user->user['uid']));
		//$this->view->assign('user', $user);
	}

	/**
	 * action new
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $newUser
	 * @dontvalidate $newUser
	 * @return void
	 */
	public function newAction(\kitecom\T3dKitecom\Domain\Model\User $newUser = NULL) {
		$this->view->assign('newUser', $newUser);
	}

	/**
	 * action create
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $newUser
	 * @return void
	 */
	public function createAction(\kitecom\T3dKitecom\Domain\Model\User $newUser) {
		$this->userRepository->add($newUser);
		$this->flashMessageContainer->add('Your new User was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $user
	 * @return void
	 */
	public function editAction(\kitecom\T3dKitecom\Domain\Model\User $user) {
		//$user = $this->userRepository->findByUid(intval($GLOBALS['TSFE']->fe_user->user['uid']));
		$this->view->assign('user', $user);
	}

	/**
	 * action update
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $user
	 * @return void
	 */
	public function updateAction(\kitecom\T3dKitecom\Domain\Model\User $user) {
		$this->userRepository->update($user);
		$this->flashMessageContainer->add('Your User was updated.');
		$this->redirect('edit',NULL,NULL,array('user' => $user));
	}

	/**
	 * action delete
	 *
	 * @param \kitecom\T3dKitecom\Domain\Model\User $user
	 * @return void
	 */
	public function deleteAction(\kitecom\T3dKitecom\Domain\Model\User $user) {
		$this->userRepository->remove($user);
		$this->flashMessageContainer->add('Your User was removed.');
		$this->redirect('list');
	}

	/**
	 * action miniprofile
	 *
	 * @return void
	 */
	public function miniprofileAction() {
		$user = $this->userRepository->findByUid(intval($GLOBALS['TSFE']->fe_user->user['uid']));
		$this->view->assign('user', $user);
	}

}
?>