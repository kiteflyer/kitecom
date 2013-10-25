<?php
namespace kitecom\T3dKitecom\Domain\Model;

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
class Media extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * User UID
	 *
	 * @var \string
	 */
	protected $userid;

	/**
	 * Kategorie UID
	 *
	 * @var \string
	 */
	protected $katid;

	/**
	 * Element UID
	 *
	 * @var \string
	 */
	protected $elid;

	/**
	 * Filename
	 *
	 * @var \string
	 */
	protected $name;

	/**
	 * Returns the userid
	 *
	 * @return \string $userid
	 */
	public function getUserid() {
		return $this->userid;
	}

	/**
	 * Sets the userid
	 *
	 * @param \string $userid
	 * @return void
	 */
	public function setUserid($userid) {
		$this->userid = $userid;
	}

	/**
	 * Returns the katid
	 *
	 * @return \string $katid
	 */
	public function getKatid() {
		return $this->katid;
	}

	/**
	 * Sets the katid
	 *
	 * @param \string $katid
	 * @return void
	 */
	public function setKatid($katid) {
		$this->katid = $katid;
	}

	/**
	 * Returns the elid
	 *
	 * @return \string $elid
	 */
	public function getElid() {
		return $this->elid;
	}

	/**
	 * Sets the elid
	 *
	 * @param \string $elid
	 * @return void
	 */
	public function setElid($elid) {
		$this->elid = $elid;
	}

	/**
	 * Returns the name
	 *
	 * @return \string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param \string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>