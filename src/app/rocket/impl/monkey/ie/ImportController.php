<?php
namespace rocket\impl\monkey\ie;

use n2n\web\http\controller\ControllerAdapter;
use rocket\spec\ei\manage\util\model\EiuCtrl;

class ImportController extends ControllerAdapter {
	private $eiuCtrl;
	
	private function _init(EiuCtrl $eiuCtrl) {
		$this->eiuCtrl = $eiuCtrl;
	}
	
	function index() {
		echo 'import';
	}
}