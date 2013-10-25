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
class UserInteractionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * userInteractionRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\UserInteractionRepository
	 * @inject
	 */
	protected $userInteractionRepository;

	/**
	 * getUserId
	 *
	 * @return
	 */
	public function getUserId() {
		 $feuserId = $GLOBALS['TSFE']->fe_user->user['uid'];
		 if ($feuserId)
		 return $feuserId;
	}

	/**
	 * action like
	 *
	 * @return void
	 */
	public function likeAction() {
		$db = 'tx_t3dkitecom_domain_model_userinteraction';

		$row=array();
		
		$row['userid']=$this->getUserId();
		$row['elementid']=$_REQUEST['elementid'];
		$row['kategorieid']=$_REQUEST['katid'];
		$row['interactionid']='1';
		$row['state']=$_REQUEST['state'];		
		
		if ($row['userid'])
		$this->userInteractionRepository->addremoveRow($db,$row);
		return;
	}

	/**
	 * action dislike
	 *
	 * @return void
	 */
	public function dislikeAction() {

	}

	/**
	 * action favorite
	 *
	 * @return void
	 */
	public function favoriteAction() {
		$db = 'tx_t3dkitecom_domain_model_userinteraction';

		$row=array();
		$row['userid']=$this->getUserId();
		$row['elementid']=$_REQUEST['elementid'];
		$row['kategorieid']=$_REQUEST['katid'];
		$row['interactionid']='2';
		$row['state']=$_REQUEST['state'];
		
		if ($row['userid'])
		$this->userInteractionRepository->addremoveRow($db,$row);
		return;
	}

	/**
	 * action student
	 *
	 * @return void
	 */
	public function studentAction() {
		$db = 'tx_t3dkitecom_domain_model_userinteraction';

		$row=array();
		$row['userid']=$this->getUserId();
		$row['elementid']=$_REQUEST['elementid'];
		$row['kategorieid']=$_REQUEST['katid'];
		$row['interactionid']='4';
		$row['state']=$_REQUEST['state'];		
		
		if ($row['userid'])
		$this->userInteractionRepository->addremoveRow($db,$row);
		return;
	}

	/**
	 * action wasthere
	 *
	 * @return void
	 */
	public function wasthereAction() {
		$db = 'tx_t3dkitecom_domain_model_userinteraction';

		$row=array();
		$row['userid']=$this->getUserId();
		$row['elementid']=$_REQUEST['elementid'];
		$row['kategorieid']=$_REQUEST['katid'];
		$row['interactionid']='3';
		$row['state']=$_REQUEST['state'];		
		
		if ($row['userid'])
		$this->userInteractionRepository->addremoveRow($db,$row);
		return;
	}

	/**
	 * action local
	 *
	 * @return void
	 */
	public function localAction() {
		$db = 'tx_t3dkitecom_domain_model_userinteraction';

		$row=array();
		$row['userid']=$this->getUserId();
		$row['elementid']=$_REQUEST['elementid'];
		$row['kategorieid']=$_REQUEST['katid'];
		$row['interactionid']='5';
		$row['state']=$_REQUEST['state'];
		
		if ($row['userid'])
		$this->userInteractionRepository->addremoveRow($db,$row);
		return;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
				$db = 'tx_t3dkitecom_domain_model_userinteraction';
		
				$row=array();
				$id=$_REQUEST['elementid'];
				$kat=$_REQUEST['katid'];

				$userInteractions = $this->userInteractionRepository->getAllByElement($id, $kat);
		
				$this->view->assign('result_'.$kat, $userInteractions);
	}

	/**
	 * action hover
	 *
	 * @return void
	 */
	public function hoverAction() {
				$db = 'tx_t3dkitecom_domain_model_userinteraction';
		
				$id=$_REQUEST['elementid'];
				$kat=$_REQUEST['katid'];
				$user = $this->getUserId();
				
				if($user)
				$userInteractions = $this->userInteractionRepository->getAllByElement($id, $kat, $user);
				
				$userInteractions['kat']=$kat;
				$userInteractions['uid']=$id;
				$this->view->assign('result_'.$kat, $userInteractions);
	}

}
?>