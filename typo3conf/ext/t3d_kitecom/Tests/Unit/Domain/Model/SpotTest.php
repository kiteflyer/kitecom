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
 * Test case for class \kitecom\T3dKitecom\Domain\Model\Spot.
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
class SpotTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \kitecom\T3dKitecom\Domain\Model\Spot
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \kitecom\T3dKitecom\Domain\Model\Spot();
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
	public function getAnfaengerReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setAnfaengerForOoleanSetsAnfaenger() { }
	
	/**
	 * @test
	 */
	public function getFortgeschritteneReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setFortgeschritteneForOoleanSetsFortgeschrittene() { }
	
	/**
	 * @test
	 */
	public function getProfisReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setProfisForOoleanSetsProfis() { }
	
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
	public function getFlachwasserReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setFlachwasserForOoleanSetsFlachwasser() { }
	
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
	public function getWellenReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setWellenForOoleanSetsWellen() { }
	
	/**
	 * @test
	 */
	public function getSchuleReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setSchuleForOoleanSetsSchule() { }
	
	/**
	 * @test
	 */
	public function getParkplatzReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setParkplatzForOoleanSetsParkplatz() { }
	
	/**
	 * @test
	 */
	public function getStartlandehilfeReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setStartlandehilfeForOoleanSetsStartlandehilfe() { }
	
	/**
	 * @test
	 */
	public function getGrossereinstiegReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setGrossereinstiegForOoleanSetsGrossereinstieg() { }
	
	/**
	 * @test
	 */
	public function getSandplatzReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setSandplatzForOoleanSetsSandplatz() { }
	
	/**
	 * @test
	 */
	public function getWcReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setWcForOoleanSetsWc() { }
	
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
	public function getRegelnReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setRegelnForStringSetsRegeln() { 
		$this->fixture->setRegeln('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getRegeln()
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
	
}
?>