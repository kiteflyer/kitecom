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
class SearchRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * getMyResult
	 *
	 * @param $who
	 * @param $where
	 * @param $view
	 * @param $show
	 * @return
	 */
	public function getMyResult($who, $where, $view, $show) {
				$addWere='';						
				
				switch ($show) {
				    case 'user':
						$select = 'f.*';
						$table='fe_users f';
						
						if ($who)
						$addWere .=' and (f.first_name like "%'.$who.'%" or f.last_name like "%'.$who.'%" or f.name like "%'.$who.'%") ';		
						
						if ($where)
						$addWere .=' and f.address like "%'.$where.'%" ';		

						//Likes
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = f.uid and ui.interactionid=1 and ui.kategorieid = 1
						) AS "likes"';
						//Favorite
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = f.uid and ui.interactionid=2 and ui.kategorieid = 1
						) AS "favorite"';

						$addWere .=' and f.disable=0 ';
						
				        break;
				    case 'school':
				    	$select = 's.*';
						//$table='tx_t3dkitecom_domain_model_schule s, tx_t3dkitecom_domain_model_userinteraction ui';
						$table='tx_t3dkitecom_domain_model_schule s';
				
						//Likes
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=1 and ui.kategorieid = 1
						) AS "likes"';
						//Favorite
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=2 and ui.kategorieid = 1
						) AS "favorite"';
						//wasthere
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=3 and ui.kategorieid = 1
						) AS "wasthere"';						
						//Student
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=4 and ui.kategorieid = 1
						) AS "student"';						  

						if ($who)
						$addWere .=' and (s.name like "%'.$who.'%") ';		
						
						if ($where)
						$addWere .=' and (s.ort like "%'.$where.'%" or s.stadt like "%'.$where.'%" or s.land like "%'.$where.'%") ';	
						
						$addWere .= ' and (s.deleted=0 and s.hidden=0) ';					
				        break;
				    case 'spot':
						$select = 's.*';				    
						$table='tx_t3dkitecom_domain_model_spot s';
						
						//Likes
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=1 and ui.kategorieid = 2
						) AS "likes"';
						//Favorite
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=2 and ui.kategorieid = 2
						) AS "favorite"';
						//wasthere
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=3 and ui.kategorieid = 2
						) AS "wasthere"';						
						//Student
						$select.=',(SELECT  COUNT(*)
						                FROM    tx_t3dkitecom_domain_model_userinteraction  ui
						                WHERE   ui.elementid = s.uid and ui.interactionid=5 and ui.kategorieid = 2
						) AS "local"';						

						if ($who)
						$addWere .=' and (s.name like "%'.$who.'%")';		
						
						if ($where)
						$addWere .=' and (s.ort like "%'.$where.'%") ';												

						$addWere .= ' and (s.deleted=0 and s.hidden=0) ';					
						
				        break;
				    case 'house':
						$select = '*';				    
						$table='fe_users';
				        break;
				    case 'shop':
						$select = '*';				    
						$table='fe_users';
				        break;				        
				        				        
				}
				
				$addWere = substr($addWere, 4); 
				
				$query = $this->createQuery();
				$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
				$query->statement('SELECT '.$select.' from '.$table.' where '.$addWere);
				$data = $query->execute();
				//var_dump($data);

				return $data;
	}

	/**
	 * getMyDetail
	 *
	 * @param $id
	 * @param $view
	 * @return
	 */
	public function getMyDetail($id, $view) {
					if($view == 'school')
					$view = 'schule';
			
					$table='tx_t3dkitecom_domain_model_'.$view;
					$query = $this->createQuery();
					$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
					$query->statement('SELECT * from '.$table.' where uid = '.$id);
					$data = $query->execute();
					
					$images = $this->getImages($id,$view);
					$data[0]['images'] = $images;
					
					//likes
					$likes = $this->getUserInteractions($id,$view,1);
					$data[0]['likes'] = $likes;

					//Student
					$student = $this->getUserInteractions($id,$view,4);
					$data[0]['student'] = $student;
					
					//Favorite
					$favorite = $this->getUserInteractions($id,$view,2);
					$data[0]['favorite'] = $favorite;					
					
					//Wasthere
					$wasthere = $this->getUserInteractions($id,$view,3);
					$data[0]['wasthere'] = $wasthere;
					
					//Local
					$local = $this->getUserInteractions($id,$view,5);
					$data[0]['local'] = $local;										
					
					return $data[0];
	}

	/**
	 * getImages
	 *
	 * @param $id
	 * @param $view
	 * @return
	 */
	public function getImages($id, $view) {
			
					$table='tx_t3dkitecom_domain_model_media';
					$query = $this->createQuery();
					$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
					$query->statement('SELECT * from '.$table.' where katid = "'.ucfirst($view).'" and elid = '.$id);
					$data = $query->execute();
					return $data;
	}

	/**
	 * getUserInteractions
	 *
	 * @param $id
	 * @param $view
	 * @return
	 */
	public function getUserInteractions($id, $view, $interaction) {
		
							switch ($view) {
						    case 'user':
								$view=3;	
						        break;
						    case 'schule':
								$view=1;				
						        break;
						    case 'school':
								$view=1;				
						        break;						        
						    case 'spot':
								$view=2;
						        break;
						    case 'house':
								$view=4;
						        break;
						    case 'shop':
								$view=5;
						        break;				        
						        				        
						}
					
							$tableName='tx_t3dkitecom_domain_model_userinteraction';
							$sqlString = 'SELECT count(uid) FROM '.$tableName.' WHERE elementid = '.$id.' and kategorieid='.$view.' and interactionid = '.$interaction;
					
							$query = $this->createQuery();
							$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
							$query->statement($sqlString);
							$data = $query->execute();	
							return $data[0]['count(uid)'];
	}

}
?>