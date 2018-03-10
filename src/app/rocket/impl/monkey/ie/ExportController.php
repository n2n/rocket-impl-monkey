<?php
namespace rocket\impl\monkey\ie;

use n2n\web\http\controller\ControllerAdapter;
use rocket\ei\util\model\EiuCtrl;

class ExportController extends ControllerAdapter {
	private $eiuCtrl;
	
	private function _init(EiuCtrl $eiuCtrl) {
		$this->eiuCtrl = $eiuCtrl;
	}
	
	function index() {
		echo 'export';
	}
}