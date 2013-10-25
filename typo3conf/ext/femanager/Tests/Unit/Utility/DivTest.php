<?php

namespace In2\Femanager\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Alex Kellner <alexander.kellner@in2code.de>, in2code
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
 * Test case for class \In2\Femanager\Domain\Validator\GeneralValidator.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage femanager
 *
 * @author Alex Kellner <alexander.kellner@in2code.de>
 */
class DivTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @var
	 */
	protected $fixture;

	/**
	 * Make object available
	 */
	public function setUp() {
		$this->fixture = new \In2\Femanager\Utility\Div();
	}

	/**
	 * Remove object
	 */
	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * Dataprovider for checkExtension()
	 *
	 * @return array
	 */
	public function checkExtensionReturnBoolDataProvider() {
		return array(
			// #0
			array(
				'theImage_dot.com',
				FALSE,
			),

			// #1
			array(
				'theImage_dot.com.jpg',
				TRUE,
			),

			// #2
			array(
				'test.ImagetheImage_dot.com.JPEG',
				TRUE,
			),

			// #3
			array(
				'test.png',
				TRUE,
			),

			// #4
			array(
				'SoNenntEinRedakteurEineDätaei.PNG',
				TRUE,
			),
		);
	}

	/**
	 * Test for checkExtension()
	 *
	 * @dataProvider checkExtensionReturnBoolDataProvider
	 * @test
	 */
	public function checkExtensionReturnBool($givenValue, $expectedResult) {
		$result = \In2\Femanager\Utility\Div::checkExtension($givenValue);
		$this->assertEquals($result, $expectedResult);
	}

	/**
	 * Dataprovider for isMd5()
	 *
	 * @return array
	 */
	public function isMd5ReturnBoolDataProvider() {
		return array(
			// #0
			array(
				md5('aeiou'),
				TRUE,
			),

			// #1
			array(
				'409898rphfsdfapasdfu898weqr',
				FALSE,
			),

			// #2
			array(
				1238097720989832023900,
				FALSE,
			),
		);
	}

	/**
	 * Test for isMd5()
	 *
	 * @dataProvider isMd5ReturnBoolDataProvider
	 * @test
	 */
	public function isMd5ReturnBool($givenValue, $expectedResult) {
		$result = \In2\Femanager\Utility\Div::isMd5($givenValue);
		$this->assertEquals($result, $expectedResult);
	}

	/**
	 * Dataprovider for getValuesInBrackets()
	 *
	 * @return array
	 */
	public function getValuesInBracketsReturnsStringDataProvider() {
		return array(
			// #0
			array(
				'lala(1,2,3,5)test',
				'1,2,3,5',
			),

			// #1
			array(
				'(1,2,3,5)',
				'1,2,3,5',
			),

			// #2
			array(
				'min(10)',
				'10',
			),
		);
	}

	/**
	 * Test for getValuesInBrackets()
	 *
	 * @dataProvider getValuesInBracketsReturnsStringDataProvider
	 * @test
	 */
	public function getValuesInBracketsReturnsString($start, $expectedResult) {
		$result = \In2\Femanager\Utility\Div::getValuesInBrackets($start);
		$this->assertEquals($result, $expectedResult);
	}

	/**
	 * Dataprovider for getValuesBeforeBrackets()
	 *
	 * @return array
	 */
	public function getValuesBeforeBracketsDataProvider() {
		return array(
			// #0
			array(
				'lala(1,2,3,5)test',
				'lala',
			),

			// #1
			array(
				'.()',
				'.',
			),

			// #2
			array(
				'min(10)',
				'min',
			),
		);
	}

	/**
	 * Test for getValuesBeforeBrackets()
	 *
	 * @dataProvider getValuesBeforeBracketsDataProvider
	 * @test
	 */
	public function getValuesBeforeBracketsReturnsString($start, $expectedResult) {
		$result = \In2\Femanager\Utility\Div::getValuesBeforeBrackets($start);
		$this->assertEquals($result, $expectedResult);
	}

}