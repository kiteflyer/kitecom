<?php
namespace In2\Femanager\Controller;

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \In2\Femanager\Domain\Model\User;
use \In2\Femanager\Utility\Div;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Alex Kellner <alexander.kellner@in2code.de>, in2code
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
 * Edit Controller
 *
 * @package femanager
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class EditController extends \In2\Femanager\Controller\GeneralController {

	/**
	 * action edit
	 *
	 * @return void
	 */
	public function editAction() {
		$this->view->assign('user', $this->user);
		$this->view->assign('allUserGroups', $this->allUserGroups);
		$this->assignForAll();
	}

	/**
	 * action update
	 *
	 * @param \In2\Femanager\Domain\Model\User $user
	 * @validate $user In2\Femanager\Domain\Validator\ServersideValidator
	 * @validate $user In2\Femanager\Domain\Validator\PasswordValidator
	 * @return void
	 */
	public function updateAction(User $user) {
		// check if there are no changes
		if (!Div::isDirtyObject($user)) {
			$this->flashMessageContainer->add(
				LocalizationUtility::translate('noChanges', 'femanager'),
				'',
				\TYPO3\CMS\Core\Messaging\FlashMessage::NOTICE
			);
			$this->redirect('edit');
		}

		$user = $this->div->forceValues($user, $this->config['edit.']['forceValues.']['beforeAnyConfirmation.'], $this->cObj); // overwrite values from TypoScript
		if ($this->settings['edit']['fillEmailWithUsername'] == 1) { // fill email with value from username
			$user->setEmail($user->getUsername());
		}

		// convert password to md5 or sha1 hash
		if (array_key_exists('password', Div::getDirtyPropertiesFromObject($user))) {
			Div::hashPassword($user, $this->settings['edit']['passwordSave']);
		}

		$this->signalSlotDispatcher->dispatch(__CLASS__, __FUNCTION__ . 'BeforePersist', array($user, $this)); // add signal

		if (!empty($this->settings['edit']['confirmByAdmin'])) {
			$this->updateRequest($user); // update request
		} else {
			$this->updateAllConfirmed($user); // save user object
		}

		$this->redirect('edit');
	}

	/**
	 * Update if hash is ok
	 *
	 * @param \In2\Femanager\Domain\Model\User $user		User object
	 * @param \string $hash									Given hash
	 * @param \string $status								"confirm", "refuse", "silentRefuse"
	 * @return void
	 */
	public function confirmUpdateRequestAction(User $user, $hash, $status = 'confirm') {
		$this->view->assign('user', $user);

		// if wrong hash or if no update xml
		if (Div::createHash($user->getUsername() . $user->getUid()) !== $hash || !$user->getTxFemanagerChangerequest()) {
			$this->flashMessageContainer->add(
				LocalizationUtility::translate('updateFailedProfile', 'femanager'),
				'',
				\TYPO3\CMS\Core\Messaging\FlashMessage::ERROR
			);

			return;
		}

		switch ($status) {
			case 'confirm':
				// overwrite properties
				$values = GeneralUtility::xml2array($user->getTxFemanagerChangerequest(), '', 0, 'changes');
				foreach ((array) $values as $field => $value) {
					if ($field != 'usergroup' && method_exists($user, 'set' . ucfirst($field))) {
						$user->{'set' . ucfirst($field)}($value['new']);
					} else {
						$user->removeAllUsergroups();
						$usergroupUids = GeneralUtility::trimExplode(',', $value['new'], 1);
						foreach ($usergroupUids as $usergroupUid) {
							$user->addUsergroup($this->userGroupRepository->findByUid($usergroupUid));
						}
					}
				}
				$user = $this->div->forceValues($user, $this->config['edit.']['forceValues.']['onAdminConfirmation.'], $this->cObj); // overwrite values from TypoScript

				$this->div->log(
					LocalizationUtility::translate('tx_femanager_domain_model_log.state.202', 'femanager'),
					202,
					$user
				);

				$this->flashMessageContainer->add(
					LocalizationUtility::translate('updateProfile', 'femanager')
				);
				break;

			case 'refuse':
				// send email to user
				$this->div->sendEmail(
					'updateRequestRefused',
					array($user->getEmail() => $user->getFirstName() . ' ' . $user->getLastName()),
					array('sender@femanager.org' => 'Sender Name'), // will be overwritten by TypoScript (if set)
					'You\'re change request was refused', // will be overwritten by TypoScript (if set)
					array(
						 'user' => $user,
						 'settings' => $this->settings
					),
					$this->config['edit.']['email.']['updateRequestRefused.']
				);

				$this->div->log(
					LocalizationUtility::translate('tx_femanager_domain_model_log.state.203', 'femanager'),
					203,
					$user
				);

				$this->flashMessageContainer->add(
					LocalizationUtility::translate('tx_femanager_domain_model_log.state.203', 'femanager')
				);
				break;

			case 'silentRefuse':
				$this->div->log(
					LocalizationUtility::translate('tx_femanager_domain_model_log.state.203', 'femanager'),
					203,
					$user
				);

				$this->flashMessageContainer->add(
					LocalizationUtility::translate('tx_femanager_domain_model_log.state.203', 'femanager')
				);
				break;

		}

		$user->setTxFemanagerChangerequest(''); // clean changerequest field
		$this->userRepository->update($user);
	}

	/**
	 * action delete
	 *
	 * @param \In2\Femanager\Domain\Model\User $user
	 * @return void
	 */
	public function deleteAction(User $user) {

		// write log
		$this->div->log(
			LocalizationUtility::translate('tx_femanager_domain_model_log.state.301', 'femanager'),
			300,
			$user
		);

		// add flashmessage
		$this->flashMessageContainer->add(
			LocalizationUtility::translate('tx_femanager_domain_model_log.state.301', 'femanager')
		);

		// delete user
		$this->userRepository->remove($user);

		$this->redirectByAction('delete'); // if redirect via TS was included
		$this->redirect('edit'); // redirect to edit
	}

}
?>