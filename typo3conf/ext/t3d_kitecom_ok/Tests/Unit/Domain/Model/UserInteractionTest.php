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
 * Test case for class \kitecom\T3dKitecom\Domain\Model\UserInteraction.
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
class UserInteractionTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \kitecom\T3dKitecom\Domain\Model\UserInteraction
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \kitecom\T3dKitecom\Domain\Model\UserInteraction();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getUseridReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getUserid()
		);
	}

	/**
	 * @test
	 */
	public function setUseridForIntegerSetsUserid() { 
		$this->fixture->setUserid(12);

		$this->assertSame(
			12,
			$this->fixture->getUserid()
		);
	}
	
	/**
	 * @test
	 */
	public function getElementidReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getElementid()
		);
	}

	/**
	 * @test
	 */
	public function setElementidForIntegerSetsElementid() { 
		$this->fixture->setElementid(12);

		$this->assertSame(
			12,
			$this->fixture->getElementid()
		);
	}
	
	/**
	 * @test
	 */
	public function getKategorieidReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getKategorieid()
		);
	}

	/**
	 * @test
	 */
	public function setKategorieidForIntegerSetsKategorieid() { 
		$this->fixture->setKategorieid(12);

		$this->assertSame(
			12,
			$this->fixture->getKategorieid()
		);
	}
	
	/**
	 * @test
	 */
	public function getInteractionidReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getInteractionid()
		);
	}

	/**
	 * @test
	 */
	public function setInteractionidForIntegerSetsInteractionid() { 
		$this->fixture->setInteractionid(12);

		$this->assertSame(
			12,
			$this->fixture->getInteractionid()
		);
	}
	
}
?>