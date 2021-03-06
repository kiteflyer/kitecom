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
 * Test case for class \kitecom\T3dKitecom\Domain\Model\User.
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
class UserTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \kitecom\T3dKitecom\Domain\Model\User
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \kitecom\T3dKitecom\Domain\Model\User();
	}

	public function tearDown() {
		unset($this->fixture);
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
	public function getSucheReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSucheForStringSetsSuche() { 
		$this->fixture->setSuche('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSuche()
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
	public function getNewsletterReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setNewsletterForOoleanSetsNewsletter() { }
	
	/**
	 * @test
	 */
	public function getSchlafmoeglichkeitReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setSchlafmoeglichkeitForOoleanSetsSchlafmoeglichkeit() { }
	
	/**
	 * @test
	 */
	public function getLieblingsmakreReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLieblingsmakreForStringSetsLieblingsmakre() { 
		$this->fixture->setLieblingsmakre('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLieblingsmakre()
		);
	}
	
	/**
	 * @test
	 */
	public function getLieblingsspotReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLieblingsspotForStringSetsLieblingsspot() { 
		$this->fixture->setLieblingsspot('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLieblingsspot()
		);
	}
	
	/**
	 * @test
	 */
	public function getHausspotReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHausspotForStringSetsHausspot() { 
		$this->fixture->setHausspot('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHausspot()
		);
	}
	
	/**
	 * @test
	 */
	public function getJobsearchReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setJobsearchForOoleanSetsJobsearch() { }
	
	/**
	 * @test
	 */
	public function getCompanyReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCompanyForStringSetsCompany() { 
		$this->fixture->setCompany('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCompany()
		);
	}
	
	/**
	 * @test
	 */
	public function getLastcompanyReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLastcompanyForStringSetsLastcompany() { 
		$this->fixture->setLastcompany('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLastcompany()
		);
	}
	
	/**
	 * @test
	 */
	public function getLieblinkskiteReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLieblinkskiteForStringSetsLieblinkskite() { 
		$this->fixture->setLieblinkskite('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLieblinkskite()
		);
	}
	
	/**
	 * @test
	 */
	public function getGeburtsdatumReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setGeburtsdatumForStringSetsGeburtsdatum() { 
		$this->fixture->setGeburtsdatum('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getGeburtsdatum()
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
	
}
?>