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
class UserInteractionRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * addRow
	 *
	 * @param $tableName
	 * @param $row
	 * @param $isRelation
	 * @return
	 */
	public function addremoveRow($tableName, array $row, $isRelation = false) {
		
					switch ($row['kategorieid']) {
					    case 'user':
							$row['kategorieid']=3;	
					        break;
					    case 'schule':
							$row['kategorieid']=1;				
					        break;
					    case 'school':
							$row['kategorieid']=1;				
					        break;			        
					    case 'spot':
							$row['kategorieid']=2;
					        break;
					    case 'house':
							$row['kategorieid']=4;
					        break;
					    case 'shop':
							$row['kategorieid']=5;
					        break;				        
					        				        
					}
		
					//Remove row for user if already exist
					if ($row['state']==0) {
					$sqlString = 'DELETE FROM '.$tableName.' where userid='.$row['userid'].' and  elementid = '.$row['elementid'].' and kategorieid = '.$row['kategorieid'].' and interactionid = '.$row['interactionid'].' ';
		
						$query = $this->createQuery();
						$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
						$query->statement($sqlString);
						$data = $query->execute();
						
						return;
					}else{
						
						//Insert new row for user			
						$fields = array();
						$values = array();
				
						foreach ($row as $columnName => $value) {
							if ($columnName != 'state') {
								$fields[] = $columnName;
								$values[] = $value;
							}
						}
				
						if ($this->getRow($tableName, $row) == false) {	 
							$sqlString = 'INSERT INTO ' . $tableName . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
		
							$query = $this->createQuery();
							$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
							$query->statement($sqlString);
							$query->execute();
						}
		
						print $sqlString;
						return;
						
					}
	}

	/**
	 * addRow
	 *
	 * @param $tableName
	 * @param $row
	 * @return
	 */
	public function getRow($tableName, $row) {
		
			$sqlString = 'SELECT count(uid) FROM '.$tableName.' WHERE elementid = '.$row['elementid'].' and kategorieid = '.$row['kategorieid'].' and userid = '.$row['userid'].' and interactionid = '.$row['interactionid'];
	
			$query = $this->createQuery();
			$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
			$query->statement($sqlString);
			$data = $query->execute();
			if ($data[0]['count(uid)'] > 0)
			return true;
			else
			return false;
	}

	/**
	 * getAllByElement
	 *
	 * @param $id
	 * @param $kat
	 * @return
	 */
	public function getAllByElement($id, $kat, $user) {
		
		switch ($kat) {
		    case 'user':
				//likes
				$likes = $this->getUserInteractions($id,$kat,1,$user);
				$data[0]['likes'] = $likes;

				//Favorite
				$favorite = $this->getUserInteractions($id,$kat,2,$user);
				$data[0]['favorite'] = $favorite;	
		        break;
		    case 'school':
				//likes
				$likes = $this->getUserInteractions($id,$kat,1,$user);
				$data[0]['likes'] = $likes;

				//Student
				$student = $this->getUserInteractions($id,$kat,4,$user);
				$data[0]['student'] = $student;
				
				//Favorite
				$favorite = $this->getUserInteractions($id,$kat,2,$user);
				$data[0]['favorite'] = $favorite;					
				
				//Wasthere
				$wasthere = $this->getUserInteractions($id,$kat,3,$user);
				$data[0]['wasthere'] = $wasthere;
	
		        break;
		    case 'schule':
				//likes
				$likes = $this->getUserInteractions($id,$kat,1,$user);
				$data[0]['likes'] = $likes;

				//Student
				$student = $this->getUserInteractions($id,$kat,4,$user);
				$data[0]['student'] = $student;
				
				//Favorite
				$favorite = $this->getUserInteractions($id,$kat,2,$user);
				$data[0]['favorite'] = $favorite;					
				
				//Wasthere
				$wasthere = $this->getUserInteractions($id,$kat,3,$user);
				$data[0]['wasthere'] = $wasthere;
	
		        break;		        
		    case 'spot':
				//likes
				$likes = $this->getUserInteractions($id,$kat,1,$user);
				$data[0]['likes'] = $likes;

				//Wasthere
				$wasthere = $this->getUserInteractions($id,$kat,3,$user);
				$data[0]['wasthere'] = $wasthere;

				//Local
				$local = $this->getUserInteractions($id,$kat,5,$user);
				$data[0]['local'] = $local;									

				//Favorite
				$favorite = $this->getUserInteractions($id,$kat,2,$user);
				$data[0]['favorite'] = $favorite;					

		        break;
		    case 'house':
				$kat=4;
		        break;
		    case 'shop':
				$kat=5;
		        break;				        
		}
		
		return $data[0];
	}

	/**
	 * getUserInteractions
	 *
	 * @param $id
	 * @param $view
	 * @param $interaction
	 * @param $user
	 * @return
	 */
	public function getUserInteractions($id, $kat, $interaction, $user) {
		
		switch ($kat) {
		    case 'user':
				$kat=3;	
		        break;
		    case 'school':
				$kat=1;				
		        break;
		    case 'schule':
				$kat=1;				
		        break;	        
		    case 'spot':
				$kat=2;
		        break;
		    case 'house':
				$kat=4;
		        break;
		    case 'shop':
				$kat=5;
		        break;				        
	        				        
		}
		if ($user)
		$user = ' and userid='.$user;

		$tableName='tx_t3dkitecom_domain_model_userinteraction';
		$sqlString = 'SELECT count(uid) FROM '.$tableName.' WHERE elementid = '.$id.' and kategorieid='.$kat.' and interactionid = '.$interaction.$user;

		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement($sqlString);
		$data = $query->execute();	
		return $data[0]['count(uid)'];
	}

}
?>