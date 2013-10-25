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
 * Test case for class \kitecom\T3dKitecom\Domain\Model\Media.
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
class MediaTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \kitecom\T3dKitecom\Domain\Model\Media
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \kitecom\T3dKitecom\Domain\Model\Media();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getUseridReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setUseridForStringSetsUserid() { 
		$this->fixture->setUserid('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getUserid()
		);
	}
	
	/**
	 * @test
	 */
	public function getKatidReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setKatidForStringSetsKatid() { 
		$this->fixture->setKatid('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getKatid()
		);
	}
	
	/**
	 * @test
	 */
	public function getElidReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setElidForStringSetsElid() { 
		$this->fixture->setElid('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getElid()
		);
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
	
}
?>