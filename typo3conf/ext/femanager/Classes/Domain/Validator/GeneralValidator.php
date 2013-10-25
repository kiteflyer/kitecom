<?php
namespace In2\Femanager\Domain\Validator;

class GeneralValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * userRepository
	 *
	 * @var \In2\Femanager\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository;

	/**
	 * configurationManager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 * @inject
	 */
	public $configurationManager;

	/**
	 * Former known as piVars
	 *
	 * @var array
	 */
	public $pluginVariables;

	/**
	 * Validationsettings
	 */
	public $validationSettings = array();

	/**
	 * Is Valid
	 */
	protected $isValid = TRUE;

	/**
	 * Must be there
	 */
	public function isValid($value) {
		return parent::isValid($value);
	}

	/**
	 * Validation for required
	 *
	 * @param \string $value
	 * @return \bool
	 */
	protected function validateRequired($value) {
		if (!is_object($value)) {
			return !empty($value);
		} elseif (count($value)) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Validation for email
	 *
	 * @param \string $value
	 * @return \bool
	 */
	protected function validateEmail($value) {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($value);
	}

	/**
	 * Validation for Minimum of characters
	 *
	 * @param \string $value
	 * @param \string $validationSetting
	 * @return \bool
	 */
	protected function validateMin($value, $validationSetting) {
		if (strlen($value) < $validationSetting) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Validation for Maximum of characters
	 *
	 * @param \string $value
	 * @param \string $validationSetting
	 * @return \bool
	 */
	protected function validateMax($value, $validationSetting) {
		if (strlen($value) > $validationSetting) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Validation for Numbers only
	 *
	 * @param \string $value
	 * @return \bool
	 */
	protected function validateInt($value) {
		return is_numeric($value);
	}

	/**
	 * Validation for Letters only
	 *
	 * @param \string $value
	 * @return \bool
	 */
	protected function validateLetters($value) {
		if (preg_replace('/[^a-zA-Z_-]/', '', $value) == $value) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Validation for Unique in sysfolder
	 *
	 * @param \string $value
	 * @param \string $field
	 * @param \In2\Femanager\Domain\Model\User $user Existing User (only relevant for edit form)
	 * @return \bool
	 */
	protected function validateUniquePage($value, $field, \In2\Femanager\Domain\Model\User $user = null) {
		$foundUser = $this->userRepository->checkUniquePage($field, $value, $user);
		return !is_object($foundUser);
	}

	/**
	 * Validation for Unique in the db
	 *
	 * @param \string $value
	 * @param \string $field			Fieldname like "username" or "email"
	 * @param \In2\Femanager\Domain\Model\User $user Existing User (only relevant for edit form)
	 * @return \bool
	 */
	protected function validateUniqueDb($value, $field, \In2\Femanager\Domain\Model\User $user = null) {
		$foundUser = $this->userRepository->checkUniqueDb($field, $value, $user);
		return !is_object($foundUser);
	}

	/**
	 * Validation for "Must include some characters)
	 *
	 * @param \string $value
	 * @param \string $validationSettingList
	 * @return \bool
	 */
	protected function validateMustInclude($value, $validationSettingList) {
		$isValid = TRUE;
		$validationSettings = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $validationSettingList, 1);

		foreach ($validationSettings as $validationSetting) {

			switch ($validationSetting) {

				// value must include numbers
				case 'number':
					if (strlen(preg_replace('/[^0-9]/', '', $value)) === 0) {
						$isValid = false;
					}
					break;

				// value must include letters
				case 'letter':
					if (strlen(preg_replace('/[^a-zA-Z_-]/', '', $value)) === 0) {
						$isValid = false;
					}
					break;

				// value must include special characters (like .:,&äö#*+)
				case 'special':
					if (strlen(preg_replace('/[^a-zA-Z0-9]/', '', $value)) === strlen($value)) {
						$isValid = false;
					}
					break;
			}
		}
		return $isValid;
	}

	/**
	 * Validation for checking if values are in a given list
	 *
	 * @param \string $value
	 * @param \string $validationSettingList
	 * @return \bool
	 */
	protected function validateInList($value, $validationSettingList) {
		$validationSettings = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $validationSettingList, 1);
		return in_array($value, $validationSettings);
	}

	/**
	 * Validation for checking if values is in date format
	 *
	 * @param \string $value
	 * @param \string $validationSetting
	 * @return \bool
	 */
	protected function validateDate($value, $validationSetting) {
		$dateParts = array();
		switch ($validationSetting) {
			case 'd.m.Y':
				if (preg_match('/^([0-9]{2})\.([0-9]{2})\.([0-9]{4})$/', $value, $dateParts)) {
					if (checkdate($dateParts[2], $dateParts[1], $dateParts[3])) {
						return true;
					}
				}
				break;
			case 'm/d/Y':
				if (preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/', $value, $dateParts)) {
					if (checkdate($dateParts[1], $dateParts[2], $dateParts[3])) {
						return true;
					}
				}
				break;
			default:
				return false;
		}
	}

	/**
	 * Init
	 */
	protected function init() {
		$config = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$this->pluginVariables = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_femanager_pi1');
		$action = 'new';
		if ($this->pluginVariables['__referrer']['@action'] == 'edit') {
			$action = 'edit';
		}
		$this->validationSettings = $config['settings'][$action]['validation'];
	}
}
?>