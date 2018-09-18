<?php
namespace rocket\impl\monkey\jqtagedit;

use n2n\web\dispatch\mag\Mag;
use rocket\ei\util\Eiu;
use n2n\impl\web\dispatch\mag\model\StringMag;
use n2n\web\dispatch\map\PropertyPath;
use n2n\web\dispatch\mag\UiOutfitter;
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\web\ui\UiComponent;
use rocket\impl\ei\component\prop\string\StringEiProp;

class TagsStringEiProp extends StringEiProp {
	public function createMag(Eiu $eiu): Mag {
		$mag = new TagsMag($this->getLabelLstr(), null, $this->isMandatory($eiu),
				$this->getMaxlength(), $this->isMultiline(),
				array('placeholder' => $this->getLabelLstr()->t($eiu->frame()->getN2nLocale())));
		
		$mag->setInputAttrs(array('placeholder' => $this->getLabelLstr()));
		$mag->setAttrs(['class' => 'rocket-impl-monkey-jqtagedit']);
		// 		$mag->setInputAttrs(['data-role' => 'tagsinput']);
		return $mag;
	}	
}

class TagsMag extends StringMag {
	
	public function createUiField(PropertyPath $propertyPath, HtmlView $view, UiOutfitter $uo): UiComponent {
		$view->getHtmlBuilder()->meta()->bodyEnd()->addJs('jqtagedit/jquery.tag-editor.min.js', 'rocket\impl\monkey');
		$view->getHtmlBuilder()->meta()->bodyEnd()->addJs('jqtagedit/jquery.caret.min.js', 'rocket\impl\monkey');
		$view->getHtmlBuilder()->meta()->bodyEnd()->addJs('jqtagedit/rocket-jqtagedit.js', 'rocket\impl\monkey');
		$view->getHtmlBuilder()->meta()->addCss('jqtagedit/jquery.tag-editor.css', null, 'rocket\impl\monkey');
		
		return parent::createUiField($propertyPath, $view, $uo);
	}
}