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
				
						//if ($this->getRow($tableName, $row) == false) {	 
							$sqlString = 'INSERT INTO ' . $tableName . ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ') '; //ON DUPLICATE KEY UPDATE

							$query = $this->createQuery();
							$query->getQuerySettings()->setReturnRawQueryResult(TRUE);							
							$query->statement($sqlString);							
							$data = $query->execute();
		
						//}
		
					}
					return true;
	}

	/**
	 * getRow Count
	 *
	 * @param $tableName
	 * @param $row
	 * @return
	 */
	public function getRow($tableName, $row) {
		
			$data='';
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
			    $kat=3;
				//likes
				$likes = $this->getUserInteractions($id,$kat,1,$user);
				$data[0]['likes'] = $likes;

				//Favorite
				$favorite = $this->getUserInteractions($id,$kat,2,$user);
				$data[0]['favorite'] = $favorite;	
		        break;
		    case 'school':
			    $kat=1;
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
			    $kat=1;
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
			    $kat=2;
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
		if ($user)
		$user = ' and userid='.$user;

		$tableName='tx_t3dkitecom_domain_model_userinteraction';
		$sqlString = 'SELECT count(uid), userid FROM '.$tableName.' WHERE elementid = '.$id.' and kategorieid='.$kat.' and interactionid = '.$interaction.$user;
		$query = $this->createQuery();
		$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
		$query->statement($sqlString);
		$data = $query->execute();	

		return $data[0]['count(uid)'];
	}

	/**
	 * getAllUser
	 *
	 * @param $id
	 * @param $kat
	 * @return
	 */
	public function getAllUser($id, $kat) {
		
		switch ($kat) {
		    case 'user':
			    $kat=3;
				//likes
				$likes = $this->getUserElement($id,$kat,1);
				$data[0]['likes'] = $likes;

				//Favorite
				$favorite = $this->getUserElement($id,$kat,2);
				$data[0]['favorite'] = $favorite;	
		        break;
		    case 'school':
			    $kat=1;

				//Student
				$student = $this->getUserElement($id,$kat,4);
				$data[0]['student'] = $student;
				
				//Favorite
				$favorite = $this->getUserElement($id,$kat,2);
				$data[0]['favorite'] = $favorite;					
				
				//Wasthere
				$wasthere = $this->getUserElement($id,$kat,3);
				$data[0]['wasthere'] = $wasthere;
	
		        break;
		    case 'schule':
			    $kat=1;

				//Student
				$student = $this->getUserElement($id,$kat,4);
				$data[0]['student'] = $student;
				
				//Favorite
				$favorite = $this->getUserElement($id,$kat,2);
				$data[0]['favorite'] = $favorite;					
				
				//Wasthere
				$wasthere = $this->getUserElement($id,$kat,3);
				$data[0]['wasthere'] = $wasthere;
	
		        break;		        
		    case 'spot':
			    $kat=2;
				//Wasthere
				$wasthere = $this->getUserElement($id,$kat,3);
				$data[0]['wasthere'] = $wasthere;

				//Local
				$local = $this->getUserElement($id,$kat,5);
				$data[0]['local'] = $local;									

				//Favorite
				$favorite = $this->getUserElement($id,$kat,2);
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
	 * getUserElement
	 *
	 * @param $id
	 * @param $view
	 * @param $interaction
	 * @param $user
	 * @return
	 */
	public function getUserElement($id, $kat, $interaction) {
		
				$tableName='tx_t3dkitecom_domain_model_userinteraction ui, fe_users fe';
				$sqlString = 'SELECT ui.userid, fe.username, fe.hauptbild FROM '.$tableName.' WHERE ui.elementid = '.$id.' and ui.kategorieid='.$kat.' and ui.interactionid = '.$interaction.$user.' and fe.uid = ui.userid';
				$query = $this->createQuery();
				$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
				$query->statement($sqlString);
				$data = $query->execute();

				return $data;
	}

	/**
	 * disqus
	 *
	 * @param  $userdetail
	 * @return
	 */
	public function disqus($userdetail) {
		define('DISQUS_SECRET_KEY', 'Ls9g2DCcMNfdgtUZ6fEa7MLyNJdOyne79TyzIW4EUrcAkD8Elk4CCf6yGlq38NYf');
		define('DISQUS_PUBLIC_KEY', 'CduDazJDXhAfeJ2cIADvFfRjo9JdavYo3IrvHvtpvVx84hbY4F0jBaQVyyGZilKC');

		$data = array(
		        "id" => $userdetail->getUid(),
		        "avatar" => 'http://www.kitecom.net/fileadmin/fileupload/server/php/'.$userdetail->getHauptbild(),
		        "username" => $userdetail->getUsername(),
		        "email" => $userdetail->getEmail()
		        
		    );

		function dsq_hmacsha1($data, $key) {
		    $blocksize=64;
		    $hashfunc='sha1';
		    if (strlen($key)>$blocksize)
		        $key=pack('H*', $hashfunc($key));
		    $key=str_pad($key,$blocksize,chr(0x00));
		    $ipad=str_repeat(chr(0x36),$blocksize);
		    $opad=str_repeat(chr(0x5c),$blocksize);
		    $hmac = pack(
		                'H*',$hashfunc(
		                    ($key^$opad).pack(
		                        'H*',$hashfunc(
		                            ($key^$ipad).$data
		                        )
		                    )
		                )
		            );
		    return bin2hex($hmac);
		}
		 
		$message = base64_encode(json_encode($data));
		$timestamp = time();
		$hmac = dsq_hmacsha1($message . ' ' . $timestamp, DISQUS_SECRET_KEY);	
		
		$disqus = array('message'=>$message,'timestamp'=>$timestamp,'hmac'=>$hmac);
		return $disqus;
	}

}
?>