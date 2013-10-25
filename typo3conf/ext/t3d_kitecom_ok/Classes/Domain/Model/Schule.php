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
class Schule extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * initializes this object
	 * 
	 * @param array $zeiten
	 * @param array $sprachen
	 */
	public function __construct(array $sprachen = array(), array $zeiten = array()) {
		$this->setSprachen($sprachen);
		$this->setZeiten($zeiten);
	}
	
	/**
	 * Name
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $name;
	

	/**
	 * Beschreibung
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $beschreibung;

	/**
	 * Ort
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $ort;

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
	 * Rettungsdiesnt
	 *
	 * @var boolean
	 */
	protected $rettungsdienst = FALSE;

	/**
	 * Strandhelfer
	 *
	 * @var boolean
	 */
	protected $strandhelfer = FALSE;

	/**
	 * Prokiter als Lehrer
	 *
	 * @var boolean
	 */
	protected $prokiter = FALSE;

	/**
	 * Kitesafari
	 *
	 * @var boolean
	 */
	protected $kitesafari = FALSE;

	/**
	 * Flachwasser
	 *
	 * @var boolean
	 */
	protected $flachwasser = FALSE;

	/**
	 * Fotoservice
	 *
	 * @var boolean
	 */
	protected $fotoservice = FALSE;

	/**
	 * Lagermöglichkeit
	 *
	 * @var boolean
	 */
	protected $lager = FALSE;

	/**
	 * Materialmiete
	 *
	 * @var boolean
	 */
	protected $materialmiete = FALSE;

	/**
	 * Stehrevier
	 *
	 * @var boolean
	 */
	protected $stehrevier = FALSE;

	/**
	 * Shop
	 *
	 * @var boolean
	 */
	protected $shop = FALSE;

	/**
	 * Schulungsmaterial
	 *
	 * @var \string
	 */
	protected $schulungsmaterial = FALSE;

	/**
	 * Verleihmaterial
	 *
	 * @var \string
	 */
	protected $verleihmaterial = FALSE;

	/**
	 * Bilder
	 *
	 * @var \string
	 */
	protected $media;

	/**
	 * Team
	 *
	 * @var \integer
	 */
	protected $team;

	/**
	 * Telefon
	 *
	 * @var \string
	 */
	protected $tel;

	/**
	 * E-Mail
	 *
	 * @var \string
	 */
	protected $email;

	/**
	 * Hauptmarke
	 *
	 * @var \string
	 */
	protected $hauptmarke;

	/**
	 * Hauptbild
	 *
	 * @var \string
	 */
	protected $hauptbild;

	/**
	 * Webcam (URL)
	 *
	 * @var \string
	 */
	protected $webcam;

	/**
	 * Stadt der Kiteschule
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $stadt;

	/**
	 * Land der Kiteschule
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $land;

	/**
	 * Website
	 *
	 * @var \string
	 */
	protected $url;

	/**
	 * Hier finden Sie uns:
	 *
	 * @var \string
	 */
	protected $adresse;

	/**
	 * Unere Unterrichtssprachen
	 *
	 * @dontvalidate	 
	 * @var string
	 */
	protected $sprachen;


	/**
	 * Offen an folgenden Monaten
	 *
	 * @dontvalidate	 	 
	 * @var string
	 */
	protected $zeiten;

	/**
	 * Returns the name
	 *
	 * @dontvalidate
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
	 * Returns the uid
	 *
	 * @dontvalidate
	 * @return \string $uid
	 */
	public function getUid() {
		return $this->uid;
	}

	/**
	 * Sets the uid
	 *
	 * @param \string $uid
	 * @return void
	 */
	public function setUid($uid) {
		$this->uid = $uid;
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
	 * Returns the strandhelfer
	 *
	 * @return boolean $strandhelfer
	 */
	public function getStrandhelfer() {
		return $this->strandhelfer;
	}

	/**
	 * Sets the strandhelfer
	 *
	 * @param boolean $strandhelfer
	 * @return void
	 */
	public function setStrandhelfer($strandhelfer) {
		$this->strandhelfer = $strandhelfer;
	}

	/**
	 * Returns the boolean state of strandhelfer
	 *
	 * @return boolean
	 */
	public function isStrandhelfer() {
		return $this->getStrandhelfer();
	}

	/**
	 * Returns the prokiter
	 *
	 * @return boolean $prokiter
	 */
	public function getProkiter() {
		return $this->prokiter;
	}

	/**
	 * Sets the prokiter
	 *
	 * @param boolean $prokiter
	 * @return void
	 */
	public function setProkiter($prokiter) {
		$this->prokiter = $prokiter;
	}

	/**
	 * Returns the boolean state of prokiter
	 *
	 * @return boolean
	 */
	public function isProkiter() {
		return $this->getProkiter();
	}

	/**
	 * Returns the kitesafari
	 *
	 * @return boolean $kitesafari
	 */
	public function getKitesafari() {
		return $this->kitesafari;
	}

	/**
	 * Sets the kitesafari
	 *
	 * @param boolean $kitesafari
	 * @return void
	 */
	public function setKitesafari($kitesafari) {
		$this->kitesafari = $kitesafari;
	}

	/**
	 * Returns the boolean state of kitesafari
	 *
	 * @return boolean
	 */
	public function isKitesafari() {
		return $this->getKitesafari();
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
	 * Returns the fotoservice
	 *
	 * @return boolean $fotoservice
	 */
	public function getFotoservice() {
		return $this->fotoservice;
	}

	/**
	 * Sets the fotoservice
	 *
	 * @param boolean $fotoservice
	 * @return void
	 */
	public function setFotoservice($fotoservice) {
		$this->fotoservice = $fotoservice;
	}

	/**
	 * Returns the boolean state of fotoservice
	 *
	 * @return boolean
	 */
	public function isFotoservice() {
		return $this->getFotoservice();
	}

	/**
	 * Returns the lager
	 *
	 * @return boolean $lager
	 */
	public function getLager() {
		return $this->lager;
	}

	/**
	 * Sets the lager
	 *
	 * @param boolean $lager
	 * @return void
	 */
	public function setLager($lager) {
		$this->lager = $lager;
	}

	/**
	 * Returns the boolean state of lager
	 *
	 * @return boolean
	 */
	public function isLager() {
		return $this->getLager();
	}

	/**
	 * Returns the materialmiete
	 *
	 * @return boolean $materialmiete
	 */
	public function getMaterialmiete() {
		return $this->materialmiete;
	}

	/**
	 * Sets the materialmiete
	 *
	 * @param boolean $materialmiete
	 * @return void
	 */
	public function setMaterialmiete($materialmiete) {
		$this->materialmiete = $materialmiete;
	}

	/**
	 * Returns the boolean state of materialmiete
	 *
	 * @return boolean
	 */
	public function isMaterialmiete() {
		return $this->getMaterialmiete();
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
	 * Returns the shop
	 *
	 * @return boolean $shop
	 */
	public function getShop() {
		return $this->shop;
	}

	/**
	 * Sets the shop
	 *
	 * @param boolean $shop
	 * @return void
	 */
	public function setShop($shop) {
		$this->shop = $shop;
	}

	/**
	 * Returns the boolean state of shop
	 *
	 * @return boolean
	 */
	public function isShop() {
		return $this->getShop();
	}

	/**
	 * Returns the schulungsmaterial
	 *
	 * @return \string $schulungsmaterial
	 */
	public function getSchulungsmaterial() {
		return $this->schulungsmaterial;
	}

	/**
	 * Sets the schulungsmaterial
	 *
	 * @param \string $schulungsmaterial
	 * @return void
	 */
	public function setSchulungsmaterial($schulungsmaterial) {
		$this->schulungsmaterial = $schulungsmaterial;
	}

	/**
	 * Returns the media
	 *
	 * @return \string $media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets the media
	 *
	 * @param \string $media
	 * @return void
	 */
	public function setMedia($media) {
		$this->media = $media;
	}

	/**
	 * Returns the team
	 *
	 * @return \integer $team
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * Sets the team
	 *
	 * @param \integer $team
	 * @return void
	 */
	public function setTeam($team) {
		$this->team = $team;
	}

	/**
	 * Returns the tel
	 *
	 * @return \string $tel
	 */
	public function getTel() {
		return $this->tel;
	}

	/**
	 * Sets the tel
	 *
	 * @param \string $tel
	 * @return void
	 */
	public function setTel($tel) {
		$this->tel = $tel;
	}

	/**
	 * Returns the email
	 *
	 * @return \string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param \string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
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
	 * Returns the verleihmaterial
	 *
	 * @return \string verleihmaterial
	 */
	public function getVerleihmaterial() {
		return $this->verleihmaterial;
	}

	/**
	 * Sets the verleihmaterial
	 *
	 * @param \string $verleihmaterial
	 * @return \string verleihmaterial
	 */
	public function setVerleihmaterial($verleihmaterial) {
		$this->verleihmaterial = $verleihmaterial;
	}

	/**
	 * Returns the webcam
	 *
	 * @return \string $webcam
	 */
	public function getWebcam() {
		return $this->webcam;
	}

	/**
	 * Sets the webcam
	 *
	 * @param \string $webcam
	 * @return void
	 */
	public function setWebcam($webcam) {
		$this->webcam = $webcam;
	}

	/**
	 * Returns the stadt
	 *
	 * @return \string stadt
	 */
	public function getStadt() {
		return $this->stadt;
	}

	/**
	 * Sets the stadt
	 *
	 * @param \string $stadt
	 * @return \string stadt
	 */
	public function setStadt($stadt) {
		$this->stadt = $stadt;
	}

	/**
	 * Returns the land
	 *
	 * @return \string land
	 */
	public function getLand() {
		return $this->land;
	}

	/**
	 * Sets the land
	 *
	 * @param \string $land
	 * @return \string land
	 */
	public function setLand($land) {
		$this->land = $land;
	}

	/**
	 * Returns the url
	 *
	 * @return \string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param \string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns the adresse
	 *
	 * @return \string $adresse
	 */
	public function getAdresse() {
		return $this->adresse;
	}

	/**
	 * Sets the adresse
	 *
	 * @param \string $adresse
	 * @return void
	 */
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}

	/**
	 * Returns the hauptmarke
	 *
	 * @return \string hauptmarke
	 */
	public function getHauptmarke() {
		return $this->hauptmarke;
	}

	/**
	 * Sets the hauptmarke
	 *
	 * @param \string $hauptmarke
	 * @return \string hauptmarke
	 */
	public function setHauptmarke($hauptmarke) {
		$this->hauptmarke = $hauptmarke;
	}

	/**
	 * Returns the sprachen
	 * 
	 *
	 * @return array $sprachen
	 */
	public function getSprachen() {
		return unserialize($this->sprachen);
	}

	/**
	 * Sets the sprachen
	 *
	 * @param array $sprachen
	 * @return void
	 */
	public function setSprachen($sprachen) {
		$this->sprachen = serialize($sprachen);
	}	
	
	
	/**
	 * Returns the zeiten
	 * 
	 * @return array $zeiten
	 */
	public function getZeiten() {
		return unserialize($this->zeiten);
	}

	/**
	 * Sets the zeiten
	 *
	 * @param array $zeiten
	 * @return void
	 */
	public function setZeiten($zeiten) {
		$this->zeiten = serialize($zeiten);
	}	

}
?>