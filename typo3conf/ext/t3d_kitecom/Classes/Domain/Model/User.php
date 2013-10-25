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
class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {

	/**
	 * lat
	 *
	 * @var \string
	 */
	protected $lat;

	/**
	 * lng
	 *
	 * @var \string
	 */
	protected $lng;

	/**
	 * In der Suche anzeigen?
	 *
	 * @var \string
	 */
	protected $suche;

	/**
	 * Ort
	 *
	 * @var \string
	 */
	protected $ort;

	/**
	 * Stadt
	 *
	 * @var \string
	 */
	protected $stadt;

	/**
	 * Land
	 *
	 * @var \string
	 */
	protected $land;

	/**
	 * Newsletter aktivieren?
	 *
	 * @var boolean
	 */
	protected $newsletter = FALSE;

	/**
	 * Biete Schlafmöglichkeit
	 *
	 * @var boolean
	 */
	protected $schlafmoeglichkeit = FALSE;

	/**
	 * Meine Lieblingsmarke
	 *
	 * @var \string
	 */
	protected $lieblingsmakre;

	/**
	 * Mein Lieblingsspot
	 *
	 * @var \string
	 */
	protected $lieblingsspot;

	/**
	 * Mein Hausspot (Local)
	 *
	 * @var \string
	 */
	protected $hausspot;

	/**
	 * Suche Job
	 *
	 * @var boolean
	 */
	protected $jobsearch = FALSE;

	/**
	 * Aktueller Arbeitsgeber
	 *
	 * @var \string
	 */
	protected $company;

	/**
	 * Letzter Arbeitsgeber
	 *
	 * @var \string
	 */
	protected $lastcompany;

	/**
	 * Lieblingskite
	 *
	 * @var \string
	 */
	protected $lieblinkskite;

	/**
	 * Geburtsdatum
	 *
	 * @var \string
	 */
	protected $geburtsdatum;

	/**
	 * Hauptbild
	 *
	 * @var \string
	 */
	protected $hauptbild;

	/**
	 * Returns the dateOfBirth
	 *
	 * @return \string $dateOfBirth
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}

	/**
	 * Sets the dateOfBirth
	 *
	 * @param \string $dateOfBirth
	 * @return void
	 */
	public function setDateOfBirth($dateOfBirth) {
		$dateOfBirth = '1367359220';
		$this->dateOfBirth = $dateOfBirth;
	}

	/**
	 * Returns the lat
	 *
	 * @return \string $lat
	 */
	public function getLat() {
		return $this->lat;
	}

	/**
	 * Sets the lat
	 *
	 * @param \string $lat
	 * @return void
	 */
	public function setLat($lat) {
		$this->lat = $lat;
	}

	/**
	 * Returns the lng
	 *
	 * @return \string $lng
	 */
	public function getLng() {
		return $this->lng;
	}

	/**
	 * Sets the lng
	 *
	 * @param \string $lng
	 * @return void
	 */
	public function setLng($lng) {
		$this->lng = $lng;
	}

	/**
	 * Returns the suche
	 *
	 * @return \string $suche
	 */
	public function getSuche() {
		return $this->suche;
	}

	/**
	 * Sets the suche
	 *
	 * @param \string $suche
	 * @return void
	 */
	public function setSuche($suche) {
		$this->suche = $suche;
	}

	/**
	 * Returns the ort
	 *
	 * @return \string $ort
	 */
	public function getOrt() {
		return $this->ort;
	}

	/**
	 * Sets the ort
	 *
	 * @param \string $ort
	 * @return void
	 */
	public function setOrt($ort) {
		$this->ort = $ort;
	}

	/**
	 * Returns the stadt
	 *
	 * @return \string $stadt
	 */
	public function getStadt() {
		return $this->stadt;
	}

	/**
	 * Sets the stadt
	 *
	 * @param \string $stadt
	 * @return void
	 */
	public function setStadt($stadt) {
		$this->stadt = $stadt;
	}

	/**
	 * Returns the land
	 *
	 * @return \string $land
	 */
	public function getLand() {
		return $this->land;
	}

	/**
	 * Sets the land
	 *
	 * @param \string $land
	 * @return void
	 */
	public function setLand($land) {
		$this->land = $land;
	}

	/**
	 * Returns the lieblingsmakre
	 *
	 * @return \string $lieblingsmakre
	 */
	public function getLieblingsmakre() {
		return $this->lieblingsmakre;
	}

	/**
	 * Sets the lieblingsmakre
	 *
	 * @param \string $lieblingsmakre
	 * @return void
	 */
	public function setLieblingsmakre($lieblingsmakre) {
		$this->lieblingsmakre = $lieblingsmakre;
	}

	/**
	 * Returns the lieblingsspot
	 *
	 * @return \string $lieblingsspot
	 */
	public function getLieblingsspot() {
		return $this->lieblingsspot;
	}

	/**
	 * Sets the lieblingsspot
	 *
	 * @param \string $lieblingsspot
	 * @return void
	 */
	public function setLieblingsspot($lieblingsspot) {
		$this->lieblingsspot = $lieblingsspot;
	}

	/**
	 * Returns the hausspot
	 *
	 * @return \string $hausspot
	 */
	public function getHausspot() {
		return $this->hausspot;
	}

	/**
	 * Sets the hausspot
	 *
	 * @param \string $hausspot
	 * @return void
	 */
	public function setHausspot($hausspot) {
		$this->hausspot = $hausspot;
	}

	/**
	 * Returns the company
	 *
	 * @return \string $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * Sets the company
	 *
	 * @param \string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * Returns the lastcompany
	 *
	 * @return \string $lastcompany
	 */
	public function getLastcompany() {
		return $this->lastcompany;
	}

	/**
	 * Sets the lastcompany
	 *
	 * @param \string $lastcompany
	 * @return void
	 */
	public function setLastcompany($lastcompany) {
		$this->lastcompany = $lastcompany;
	}

	/**
	 * Returns the lieblinkskite
	 *
	 * @return \string $lieblinkskite
	 */
	public function getLieblinkskite() {
		return $this->lieblinkskite;
	}

	/**
	 * Sets the lieblinkskite
	 *
	 * @param \string $lieblinkskite
	 * @return void
	 */
	public function setLieblinkskite($lieblinkskite) {
		$this->lieblinkskite = $lieblinkskite;
	}

	/**
	 * Returns the geburtsdatum
	 *
	 * @return \string $geburtsdatum
	 */
	public function getGeburtsdatum() {
		return $this->geburtsdatum;
	}

	/**
	 * Sets the geburtsdatum
	 *
	 * @param \string $geburtsdatum
	 * @return void
	 */
	public function setGeburtsdatum($geburtsdatum) {
		$this->geburtsdatum = $geburtsdatum;
	}

	/**
	 * Returns the hauptbild
	 *
	 * @return \string $hauptbild
	 */
	public function getHauptbild() {
		return $this->hauptbild;
	}

	/**
	 * Sets the hauptbild
	 *
	 * @param \string $hauptbild
	 * @return void
	 */
	public function setHauptbild($hauptbild) {
		$this->hauptbild = $hauptbild;
	}

	/**
	 * Returns the newsletter
	 *
	 * @return boolean newsletter
	 */
	public function getNewsletter() {
		return $this->newsletter;
	}

	/**
	 * Sets the newsletter
	 *
	 * @param boolean $newsletter
	 * @return boolean newsletter
	 */
	public function setNewsletter($newsletter) {
		$this->newsletter = $newsletter;
	}

	/**
	 * Returns the schlafmoeglichkeit
	 *
	 * @return boolean schlafmoeglichkeit
	 */
	public function getSchlafmoeglichkeit() {
		return $this->schlafmoeglichkeit;
	}

	/**
	 * Sets the schlafmoeglichkeit
	 *
	 * @param boolean $schlafmoeglichkeit
	 * @return boolean schlafmoeglichkeit
	 */
	public function setSchlafmoeglichkeit($schlafmoeglichkeit) {
		$this->schlafmoeglichkeit = $schlafmoeglichkeit;
	}

	/**
	 * Returns the jobsearch
	 *
	 * @return boolean jobsearch
	 */
	public function getJobsearch() {
		return $this->jobsearch;
	}

	/**
	 * Sets the jobsearch
	 *
	 * @param boolean $jobsearch
	 * @return boolean jobsearch
	 */
	public function setJobsearch($jobsearch) {
		$this->jobsearch = $jobsearch;
	}

}
?>