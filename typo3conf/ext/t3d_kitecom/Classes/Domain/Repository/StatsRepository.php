<?php
namespace kitecom\T3dKitecom\Domain\Repository;

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
class StatsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * count
	 *
	 * @param $id
	 * @param $view
	 * @return
	 */
	public function count($db) {
					$query = $this->createQuery();
					$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
					$query->statement('SELECT count(uid) as count from '.$db.' where deleted=0 and hidden=0');
					$data = $query->execute();
					return $data[0];
	}

	/**
	 * countUser
	 *
	 * @param $id
	 * @param $view
	 * @return
	 */
	public function countUser($db) {
					$query = $this->createQuery();
					$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
					$query->statement('SELECT count(uid) as count from '.$db.' where disable=0 and deleted=0 and usergroup > 1');
					$all = $query->execute();
					
					$query->statement('SELECT count(uid) as count from '.$db.' where disable=0 and deleted=0 and usergroup = 3');
					$kiter = $query->execute();
					
					$query->statement('SELECT count(uid) as count from '.$db.' where disable=0 and deleted=0 and usergroup = 4');
					$lehrer = $query->execute();					

					$query->statement('SELECT count(uid) as count from '.$db.' where disable=0 and deleted=0 and usergroup = 5');
					$pro = $query->execute();										
					
					$all['kiter']=$kiter[0];
					$all['lehrer']=$lehrer[0];
					$all['pro']=$pro[0];					
					return $all;
	}

}
?>