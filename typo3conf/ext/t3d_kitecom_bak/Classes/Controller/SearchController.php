<?php
namespace kitecom\T3dKitecom\Controller;

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
class SearchController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * searchRepository
	 *
	 * @var \kitecom\T3dKitecom\Domain\Repository\SearchRepository
	 * @inject
	 */
	protected $searchRepository;

	/**
	 * action search
	 *
	 * @return void
	 */
	public function searchAction() {
		
		//first step
		/*
		$this->view->setTemplatePathAndFilename(
		'typo3conf/ext/' .
		$this->request->getControllerExtensionKey() .
		'/Resources/Private/Templates/Search/List.html'
		);
		$this->view->assign();
		*/
	}

	/**
	 * action spsearch
	 *
	 * @return void
	 */
	public function spsearchAction() {

	}

	/**
	 * ajaxAction
	 *
	 * @return
	 */
	public function ajaxAction() {
		$json = array(
		'jQuery',
		'ExtJS',
		'Prototype',
		'MooTools'
		);
		 
		return json_encode($json);
	}

	/**
	 * action list
	 *
	 * @dontvalidate
	 * @return void
	 */
	public function listAction() {
		
				$searchresult['who'] = $_REQUEST['who'];
				$searchresult['where'] = $_REQUEST['where'];		
				$searchresult['show'] = $_REQUEST['show'];		
				$this->view->assign('searchresult', $searchresult);
	}

	/**
	 * action getdata
	 *
	 * @dontvalidate 
	 * @return void
	 */
	public function getdataAction() {
		
				$who = $_REQUEST['who'];
				$where = $_REQUEST['where'];		
				$view = $_REQUEST['view'];		
				$show = $_REQUEST['show'];				
				
				if ($view == 'images')
				$template = 'BilderView';
				
				if ($view == 'map')
				$template = 'MapView';
				
				if ($view == 'list')
				$template = 'ListView';

				$searchresult = $this->searchRepository->getMyResult($who,$where,$view,$show);
				//var_dump($searchresult);

				//return json_encode($searchresult); 
				
				//var_dump($searchresult);
				$this->view->setTemplatePathAndFilename(
					'typo3conf/ext/' .
					$this->request->getControllerExtensionKey() .
					'/Resources/Private/Templates/Search/'.$template.'.html'
				);
				$this->view->assign('searchresult_'.$show, $searchresult);
	}

	/**
	 * action headerdata
	 *
	 * @return void
	 */
	public function headerdataAction() {

	}

	/**
	 * action leftdata
	 *
	 * @return void
	 */
	public function leftdataAction() {

	}

	//\kitecom\T3dKitecom\Domain\Model\Search
	
	/**
	 * action show
	 *
	 * @param mixed $searchID
	 * @return void
	 * @dontvalidate $searchID
	 * @dontverifyrequesthash 
	 */
	public function showAction() {
						$id = $_REQUEST['searchID'];		
						$show = $_REQUEST['show'];
						if ($show = 'school')
						$show = 'schule';
												
						if($id && $show) {
							$detail = $this->searchRepository->getMyDetail($id,$show);	
							$this->view->setTemplatePathAndFilename('typo3conf/ext/'.$this->request->getControllerExtensionKey().'/Resources/Private/Templates/'.ucfirst($show).'/Show.html');
						}
						$this->view->assign($show, $detail);
	}

	/**
	 * action preview
	 *
	 * @dontverifyrequesthash 
	 * @return void
	 */
	public function previewAction() {
						$id = $_REQUEST['searchID'];		
						$show = $_REQUEST['show'];
						if ($show == 'school')
						$show = 'schule';
		
						//$showRepository = $this->objectManager->get('kitecom\T3dKitecom\Controller\Repository\SpotRepository');
						$preview = $this->searchRepository->getMyDetail($id,$show);

						$this->view->setTemplatePathAndFilename('typo3conf/ext/'.$this->request->getControllerExtensionKey().'/Resources/Private/Templates/'.ucfirst($show).'/Preview.html');
						$this->view->assign('result', $preview);
		
						//$this->view->assign('search', $search);
	}

}
?>