<?php
namespace rocket\impl\monkey\ie;

use n2n\web\http\controller\Controller;
use rocket\impl\ei\component\command\IndependentEiCommandAdapter;
use rocket\ei\util\model\Eiu;

class ImportEiCommand extends IndependentEiCommandAdapter {
	
	/**
	 * {@inheritDoc}
	 * @see \rocket\ei\component\command\EiCommand::lookupController()
	 */
	public function lookupController(Eiu $eiu): Controller {
		return $eiu->lookup(ExportController::class);
	}

	
}