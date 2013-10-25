<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010-2011 punkt.de GmbH - Karlsruhe, Germany - http://www.punkt.de
 *  Authors: Daniel Lienert, Michael Knoll, Christoph Ehscheidt
 *  All rights reserved
 *
 *  For further information: http://extlist.punkt.de <extlist@punkt.de>
 *
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
 * Class implements adapter not store any session data when in cached mode and working with full URLS
 * 
 * @author Daniel Lienert 
 * @author Michael Knoll <knoll@punkt.de>
 * @package State
 * @subpackage Session\Storage
 */
class Tx_PtExtbase_State_Session_Storage_NullStorageAdapter implements Tx_PtExtbase_State_Session_Storage_AdapterInterface  {

	/**
	 * Factory method to get an instance of this class
	 *
	 * @return Tx_PtExtbase_State_Session_Storage_NullStorageAdapter
	 */
	public static function getInstance() {
		return new Tx_PtExtbase_State_Session_Storage_NullStorageAdapter();
	}
	
	
	
	/**
	 * Retrieve nothing
	 * 
	 * @param string $key
	 */
	public function read($key) {
		return array();
	}
	
	
	
	/**
	 * Do not save any data
	 * 
	 * @param string $key
	 * @param string $value
	 */
	public function store($key, $value) {
	}
	
	
	
	/**
	 * Do not delete any data
	 * 
	 * @param string $key
	 */
	public function delete($key) {
	}
	
}

?>