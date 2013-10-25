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
class Spot extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Name
	 *
	 * @validate NotEmpty
	 * @var \string
	 */
	protected $name;

	/**
	 * Ort
	 *
	 * @var \string
	 * @validate NotEmpty
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
	 * Anfänger
	 *
	 * @var boolean
	 */
	protected $anfaenger = FALSE;

	/**
	 * Fortgesschrittene
	 *
	 * @var boolean
	 */
	protected $fortgeschrittene = FALSE;

	/**
	 * Profis
	 *
	 * @var boolean
	 */
	protected $profis = FALSE;

	/**
	 * Hauptbild
	 *
	 * @var \string
	 */
	protected $hauptbild;

	/**
	 * Flachwasser
	 *
	 * @var boolean
	 */
	protected $flachwasser = FALSE;

	/**
	 * Rettungsdienst
	 *
	 * @var boolean
	 */
	protected $rettungsdienst = FALSE;

	/**
	 * Wellen
	 *
	 * @var boolean
	 */
	protected $wellen = FALSE;

	/**
	 * Schule
	 *
	 * @var boolean
	 */
	protected $schule = FALSE;

	/**
	 * Parkplatz
	 *
	 * @var boolean
	 */
	protected $parkplatz = FALSE;

	/**
	 * Start / Landehilfe
	 *
	 * @var boolean
	 */
	protected $startlandehilfe = FALSE;

	/**
	 * Grosser Einstieg
	 *
	 * @var boolean
	 */
	protected $grossereinstieg = FALSE;

	/**
	 * Sandplatz
	 *
	 * @var boolean
	 */
	protected $sandplatz = FALSE;

	/**
	 * WC
	 *
	 * @var boolean
	 */
	protected $wc = FALSE;

	/**
	 * Stehrevier
	 *
	 * @var boolean
	 */
	protected $stehrevier = FALSE;

	/**
	 * Stehrevier
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $beschreibung;

	/**
	 * Regeln
	 *
	 * @var \string
	 */
	protected $regeln;

	/**
	 * Längengrad
	 *
	 * @var \string
	 */
	protected $lat;

	/**
	 * Breitengrad
	 *
	 * @var \string
	 */
	protected $lng;

	/**
	 * Webcam (URL)
	 *
	 * @var \string
	 */
	protected $webcam;

	/**
	 * Create from USERID
	 *
	 * @var \integer
	 */
	protected $crfeuser;

	/**
	 * Sets the crfeuser
	 *
	 * @param $crfeuser
	 * @return
	 */
	public function setCrfeuser($crfeuser) {
		$this->crfeuser = $crfeuser;
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
	 * Returns the anfaenger
	 *
	 * @return boolean $anfaenger
	 */
	public function getAnfaenger() {
		return $this->anfaenger;
	}

	/**
	 * Sets the anfaenger
	 *
	 * @param boolean $anfaenger
	 * @return void
	 */
	public function setAnfaenger($anfaenger) {
		$this->anfaenger = $anfaenger;
	}

	/**
	 * Returns the boolean state of anfaenger
	 *
	 * @return boolean
	 */
	public function isAnfaenger() {
		return $this->getAnfaenger();
	}

	/**
	 * Returns the fortgeschrittene
	 *
	 * @return boolean $fortgeschrittene
	 */
	public function getFortgeschrittene() {
		return $this->fortgeschrittene;
	}

	/**
	 * Sets the fortgeschrittene
	 *
	 * @param boolean $fortgeschrittene
	 * @return void
	 */
	public function setFortgeschrittene($fortgeschrittene) {
		$this->fortgeschrittene = $fortgeschrittene;
	}

	/**
	 * Returns the boolean state of fortgeschrittene
	 *
	 * @return boolean
	 */
	public function isFortgeschrittene() {
		return $this->getFortgeschrittene();
	}

	/**
	 * Returns the profis
	 *
	 * @return boolean $profis
	 */
	public function getProfis() {
		return $this->profis;
	}

	/**
	 * Sets the profis
	 *
	 * @param boolean $profis
	 * @return void
	 */
	public function setProfis($profis) {
		$this->profis = $profis;
	}

	/**
	 * Returns the boolean state of profis
	 *
	 * @return boolean
	 */
	public function isProfis() {
		return $this->getProfis();
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
	 * Returns the flachwasser
	 *
	 * @return boolean $flachwasser
	 */
	public function getFlachwasser() {
		return $this->flachwasser;
	}

	/**
	 * Sets the flachwasser
	 *
	 * @param boolean $flachwasser
	 * @return void
	 */
	public function setFlachwasser($flachwasser) {
		$this->flachwasser = $flachwasser;
	}

	/**
	 * Returns the boolean state of flachwasser
	 *
	 * @return boolean
	 */
	public function isFlachwasser() {
		return $this->getFlachwasser();
	}

	/**
	 * Returns the rettungsdienst
	 *
	 * @return boolean $rettungsdienst
	 */
	public function getRettungsdienst() {
		return $this->rettungsdienst;
	}

	/**
	 * Sets the rettungsdienst
	 *
	 * @param boolean $rettungsdienst
	 * @return void
	 */
	public function setRettungsdienst($rettungsdienst) {
		$this->rettungsdienst = $rettungsdienst;
	}

	/**
	 * Returns the boolean state of rettungsdienst
	 *
	 * @return boolean
	 */
	public function isRettungsdienst() {
		return $this->getRettungsdienst();
	}

	/**
	 * Returns the wellen
	 *
	 * @return boolean $wellen
	 */
	public function getWellen() {
		return $this->wellen;
	}

	/**
	 * Sets the wellen
	 *
	 * @param boolean $wellen
	 * @return void
	 */
	public function setWellen($wellen) {
		$this->wellen = $wellen;
	}

	/**
	 * Returns the boolean state of wellen
	 *
	 * @return boolean
	 */
	public function isWellen() {
		return $this->getWellen();
	}

	/**
	 * Returns the schule
	 *
	 * @return boolean $schule
	 */
	public function getSchule() {
		return $this->schule;
	}

	/**
	 * Sets the schule
	 *
	 * @param boolean $schule
	 * @return void
	 */
	public function setSchule($schule) {
		$this->schule = $schule;
	}

	/**
	 * Returns the boolean state of schule
	 *
	 * @return boolean
	 */
	public function isSchule() {
		return $this->getSchule();
	}

	/**
	 * Returns the parkplatz
	 *
	 * @return boolean $parkplatz
	 */
	public function getParkplatz() {
		return $this->parkplatz;
	}

	/**
	 * Sets the parkplatz
	 *
	 * @param boolean $parkplatz
	 * @return void
	 */
	public function setParkplatz($parkplatz) {
		$this->parkplatz = $parkplatz;
	}

	/**
	 * Returns the boolean state of parkplatz
	 *
	 * @return boolean
	 */
	public function isParkplatz() {
		return $this->getParkplatz();
	}

	/**
	 * Returns the startlandehilfe
	 *
	 * @return boolean $startlandehilfe
	 */
	public function getStartlandehilfe() {
		return $this->startlandehilfe;
	}

	/**
	 * Sets the startlandehilfe
	 *
	 * @param boolean $startlandehilfe
	 * @return void
	 */
	public function setStartlandehilfe($startlandehilfe) {
		$this->startlandehilfe = $startlandehilfe;
	}

	/**
	 * Returns the boolean state of startlandehilfe
	 *
	 * @return boolean
	 */
	public function isStartlandehilfe() {
		return $this->getStartlandehilfe();
	}

	/**
	 * Returns the grossereinstieg
	 *
	 * @return boolean $grossereinstieg
	 */
	public function getGrossereinstieg() {
		return $this->grossereinstieg;
	}

	/**
	 * Sets the grossereinstieg
	 *
	 * @param boolean $grossereinstieg
	 * @return void
	 */
	public function setGrossereinstieg($grossereinstieg) {
		$this->grossereinstieg = $grossereinstieg;
	}

	/**
	 * Returns the boolean state of grossereinstieg
	 *
	 * @return boolean
	 */
	public function isGrossereinstieg() {
		return $this->getGrossereinstieg();
	}

	/**
	 * Returns the sandplatz
	 *
	 * @return boolean $sandplatz
	 */
	public function getSandplatz() {
		return $this->sandplatz;
	}

	/**
	 * Sets the sandplatz
	 *
	 * @param boolean $sandplatz
	 * @return void
	 */
	public function setSandplatz($sandplatz) {
		$this->sandplatz = $sandplatz;
	}

	/**
	 * Returns the boolean state of sandplatz
	 *
	 * @return boolean
	 */
	public function isSandplatz() {
		return $this->getSandplatz();
	}

	/**
	 * Returns the wc
	 *
	 * @return boolean $wc
	 */
	public function getWc() {
		return $this->wc;
	}

	/**
	 * Sets the wc
	 *
	 * @param boolean $wc
	 * @return void
	 */
	public function setWc($wc) {
		$this->wc = $wc;
	}

	/**
	 * Returns the boolean state of wc
	 *
	 * @return boolean
	 */
	public function isWc() {
		return $this->getWc();
	}

	/**
	 * Returns the stehrevier
	 *
	 * @return boolean $stehrevier
	 */
	public function getStehrevier() {
		return $this->stehrevier;
	}

	/**
	 * Sets the stehrevier
	 *
	 * @param boolean $stehrevier
	 * @return void
	 */
	public function setStehrevier($stehrevier) {
		$this->stehrevier = $stehrevier;
	}

	/**
	 * Returns the boolean state of stehrevier
	 *
	 * @return boolean
	 */
	public function isStehrevier() {
		return $this->getStehrevier();
	}

	/**
	 * Returns the beschreibung
	 *
	 * @return \string $beschreibung
	 */
	public function getBeschreibung() {
		return $this->beschreibung;
	}

	/**
	 * Sets the beschreibung
	 *
	 * @param \string $beschreibung
	 * @return void
	 */
	public function setBeschreibung($beschreibung) {
		$this->beschreibung = $beschreibung;
	}

	/**
	 * Returns the regeln
	 *
	 * @return \string $regeln
	 */
	public function getRegeln() {
		return $this->regeln;
	}

	/**
	 * Sets the regeln
	 *
	 * @param \string $regeln
	 * @return void
	 */
	public function setRegeln($regeln) {
		$this->regeln = $regeln;
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
	 * Returns the webcam
	 *
	 * @return \string webcam
	 */
	public function getWebcam() {
		return $this->webcam;
	}

	/**
	 * Sets the webcam
	 *
	 * @param \string $webcam
	 * @return \string webcam
	 */
	public function setWebcam($webcam) {
		$this->webcam = $webcam;
	}

	/**
	 * Returns the crfeuser
	 *
	 * @return \integer $crfeuser
	 */
	public function getCrfeuser() {
		return $this->crfeuser;
	}

}
?>