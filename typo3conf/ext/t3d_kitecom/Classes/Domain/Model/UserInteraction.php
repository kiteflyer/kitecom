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
class UserInteraction extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * User UID (Feuser)
	 *
	 * @var \integer
	 */
	protected $userid;

	/**
	 * Element UID (Spotid / Schoolid ...)
	 *
	 * @var \integer
	 */
	protected $elementid;

	/**
	 * Kategorie UID (User / School / Spot...)
	 *
	 * @var \integer
	 */
	protected $kategorieid;

	/**
	 * (Like, Dislike, Favorite, Student, Washere...)
	 *
	 * @var \integer
	 */
	protected $interactionid;

	/**
	 * Returns the userid
	 *
	 * @return \integer $userid
	 */
	public function getUserid() {
		return $this->userid;
	}

	/**
	 * Sets the userid
	 *
	 * @param \integer $userid
	 * @return void
	 */
	public function setUserid($userid) {
		$this->userid = $userid;
	}

	/**
	 * Returns the elementid
	 *
	 * @return \integer $elementid
	 */
	public function getElementid() {
		return $this->elementid;
	}

	/**
	 * Sets the elementid
	 *
	 * @param \integer $elementid
	 * @return void
	 */
	public function setElementid($elementid) {
		$this->elementid = $elementid;
	}

	/**
	 * Returns the kategorieid
	 *
	 * @return \integer $kategorieid
	 */
	public function getKategorieid() {
		return $this->kategorieid;
	}

	/**
	 * Sets the kategorieid
	 *
	 * @param \integer $kategorieid
	 * @return void
	 */
	public function setKategorieid($kategorieid) {
		$this->kategorieid = $kategorieid;
	}

	/**
	 * Returns the interactionid
	 *
	 * @return \integer $interactionid
	 */
	public function getInteractionid() {
		return $this->interactionid;
	}

	/**
	 * Sets the interactionid
	 *
	 * @param \integer $interactionid
	 * @return void
	 */
	public function setInteractionid($interactionid) {
		$this->interactionid = $interactionid;
	}

}
?>