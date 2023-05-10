<?php
namespace rocket\impl\monkey\ie;

use n2n\web\http\controller\ControllerAdapter;
use rocket\op\util\OpuCtrl;

class ImportController extends ControllerAdapter {
	private $opuCtrl;
	
	private function _init(OpuCtrl $opuCtrl) {
		$this->opuCtrl = $opuCtrl;
	}
	
	function index() {
		echo 'import';
	}
}