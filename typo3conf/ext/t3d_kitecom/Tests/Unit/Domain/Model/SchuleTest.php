<?php

namespace kitecom\T3dKitecom\Tests;
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \kitecom\T3dKitecom\Domain\Model\Schule.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Kitecom
 *
 * @author Ramon <rm@t3-design.ch>
 */
class SchuleTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \kitecom\T3dKitecom\Domain\Model\Schule
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \kitecom\T3dKitecom\Domain\Model\Schule();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getBeschreibungReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBeschreibungForStringSetsBeschreibung() { 
		$this->fixture->setBeschreibung('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBeschreibung()
		);
	}
	
	/**
	 * @test
	 */
	public function getOrtReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOrtForStringSetsOrt() { 
		$this->fixture->setOrt('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOrt()
		);
	}
	
	/**
	 * @test
	 */
	public function getLatReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLatForStringSetsLat() { 
		$this->fixture->setLat('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLat()
		);
	}
	
	/**
	 * @test
	 */
	public function getLngReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLngForStringSetsLng() { 
		$this->fixture->setLng('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLng()
		);
	}
	
	/**
	 * @test
	 */
	public function getRettungsdienstReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setRettungsdienstForOoleanSetsRettungsdienst() { }
	
	/**
	 * @test
	 */
	public function getStrandhelferReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setStrandhelferForOoleanSetsStrandhelfer() { }
	
	/**
	 * @test
	 */
	public function getProkiterReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setProkiterForOoleanSetsProkiter() { }
	
	/**
	 * @test
	 */
	public function getKitesafariReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setKitesafariForOoleanSetsKitesafari() { }
	
	/**
	 * @test
	 */
	public function getFlachwasserReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setFlachwasserForOoleanSetsFlachwasser() { }
	
	/**
	 * @test
	 */
	public function getFotoserviceReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setFotoserviceForOoleanSetsFotoservice() { }
	
	/**
	 * @test
	 */
	public function getLagerReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setLagerForOoleanSetsLager() { }
	
	/**
	 * @test
	 */
	public function getMaterialmieteReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setMaterialmieteForOoleanSetsMaterialmiete() { }
	
	/**
	 * @test
	 */
	public function getStehrevierReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setStehrevierForOoleanSetsStehrevier() { }
	
	/**
	 * @test
	 */
	public function getShopReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setShopForOoleanSetsShop() { }
	
	/**
	 * @test
	 */
	public function getSchulungsmaterialReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSchulungsmaterialForStringSetsSchulungsmaterial() { 
		$this->fixture->setSchulungsmaterial('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSchulungsmaterial()
		);
	}
	
	/**
	 * @test
	 */
	public function getVerleihmaterialReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setVerleihmaterialForStringSetsVerleihmaterial() { 
		$this->fixture->setVerleihmaterial('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getVerleihmaterial()
		);
	}
	
	/**
	 * @test
	 */
	public function getMediaReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMediaForStringSetsMedia() { 
		$this->fixture->setMedia('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMedia()
		);
	}
	
	/**
	 * @test
	 */
	public function getTeamReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getTeam()
		);
	}

	/**
	 * @test
	 */
	public function setTeamForIntegerSetsTeam() { 
		$this->fixture->setTeam(12);

		$this->assertSame(
			12,
			$this->fixture->getTeam()
		);
	}
	
	/**
	 * @test
	 */
	public function getTelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTelForStringSetsTel() { 
		$this->fixture->setTel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTel()
		);
	}
	
	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() { 
		$this->fixture->setEmail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEmail()
		);
	}
	
	/**
	 * @test
	 */
	public function getHauptmarkeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHauptmarkeForStringSetsHauptmarke() { 
		$this->fixture->setHauptmarke('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHauptmarke()
		);
	}
	
	/**
	 * @test
	 */
	public function getHauptbildReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHauptbildForStringSetsHauptbild() { 
		$this->fixture->setHauptbild('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHauptbild()
		);
	}
	
	/**
	 * @test
	 */
	public function getWebcamReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setWebcamForStringSetsWebcam() { 
		$this->fixture->setWebcam('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getWebcam()
		);
	}
	
	/**
	 * @test
	 */
	public function getStadtReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setStadtForStringSetsStadt() { 
		$this->fixture->setStadt('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getStadt()
		);
	}
	
	/**
	 * @test
	 */
	public function getLandReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLandForStringSetsLand() { 
		$this->fixture->setLand('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLand()
		);
	}
	
	/**
	 * @test
	 */
	public function getUrlReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setUrlForStringSetsUrl() { 
		$this->fixture->setUrl('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getUrl()
		);
	}
	
	/**
	 * @test
	 */
	public function getAdresseReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAdresseForStringSetsAdresse() { 
		$this->fixture->setAdresse('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAdresse()
		);
	}
	
	/**
	 * @test
	 */
	public function getCrfeuserReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getCrfeuser()
		);
	}

	/**
	 * @test
	 */
	public function setCrfeuserForIntegerSetsCrfeuser() { 
		$this->fixture->setCrfeuser(12);

		$this->assertSame(
			12,
			$this->fixture->getCrfeuser()
		);
	}
	
	/**
	 * @test
	 */
	public function getZeitenReturnsInitialValueForZeiten() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getZeiten()
		);
	}

	/**
	 * @test
	 */
	public function setZeitenForObjectStorageContainingZeitenSetsZeiten() { 
		$zeiten = new \kitecom\T3dKitecom\Domain\Model\Zeiten();
		$objectStorageHoldingExactlyOneZeiten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneZeiten->attach($zeiten);
		$this->fixture->setZeiten($objectStorageHoldingExactlyOneZeiten);

		$this->assertSame(
			$objectStorageHoldingExactlyOneZeiten,
			$this->fixture->getZeiten()
		);
	}
	
	/**
	 * @test
	 */
	public function addZeitenToObjectStorageHoldingZeiten() {
		$zeiten = new \kitecom\T3dKitecom\Domain\Model\Zeiten();
		$objectStorageHoldingExactlyOneZeiten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneZeiten->attach($zeiten);
		$this->fixture->addZeiten($zeiten);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneZeiten,
			$this->fixture->getZeiten()
		);
	}

	/**
	 * @test
	 */
	public function removeZeitenFromObjectStorageHoldingZeiten() {
		$zeiten = new \kitecom\T3dKitecom\Domain\Model\Zeiten();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($zeiten);
		$localObjectStorage->detach($zeiten);
		$this->fixture->addZeiten($zeiten);
		$this->fixture->removeZeiten($zeiten);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getZeiten()
		);
	}
	
	/**
	 * @test
	 */
	public function getSprachenReturnsInitialValueForSprachen() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getSprachen()
		);
	}

	/**
	 * @test
	 */
	public function setSprachenForObjectStorageContainingSprachenSetsSprachen() { 
		$sprachen = new \kitecom\T3dKitecom\Domain\Model\Sprachen();
		$objectStorageHoldingExactlyOneSprachen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneSprachen->attach($sprachen);
		$this->fixture->setSprachen($objectStorageHoldingExactlyOneSprachen);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSprachen,
			$this->fixture->getSprachen()
		);
	}
	
	/**
	 * @test
	 */
	public function addSprachenToObjectStorageHoldingSprachen() {
		$sprachen = new \kitecom\T3dKitecom\Domain\Model\Sprachen();
		$objectStorageHoldingExactlyOneSprachen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneSprachen->attach($sprachen);
		$this->fixture->addSprachen($sprachen);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSprachen,
			$this->fixture->getSprachen()
		);
	}

	/**
	 * @test
	 */
	public function removeSprachenFromObjectStorageHoldingSprachen() {
		$sprachen = new \kitecom\T3dKitecom\Domain\Model\Sprachen();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($sprachen);
		$localObjectStorage->detach($sprachen);
		$this->fixture->addSprachen($sprachen);
		$this->fixture->removeSprachen($sprachen);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getSprachen()
		);
	}
	
}
?>