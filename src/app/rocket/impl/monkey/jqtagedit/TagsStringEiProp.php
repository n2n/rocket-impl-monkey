<?php
namespace rocket\impl\monkey\jqtagedit;

use rocket\ei\util\Eiu;
use n2n\impl\web\dispatch\mag\model\StringMag;
use n2n\web\dispatch\map\PropertyPath;
use n2n\web\dispatch\mag\UiOutfitter;
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\web\ui\UiComponent;
use rocket\impl\ei\component\prop\string\StringEiProp;
use rocket\si\content\SiField;

class TagsStringEiProp extends StringEiProp {
	public function createInSiField(Eiu $eiu): SiField {
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
		$view->getHtmlBuilder()->meta()->addCss('css/tag.css', null, 'rocket');
		
		return parent::createUiField($propertyPath, $view, $uo);
	}
}