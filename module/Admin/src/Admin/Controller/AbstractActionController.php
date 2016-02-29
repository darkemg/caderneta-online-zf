<?php
namespace Admin\Controller;
use MatthiasMullie\Minify\CSS as MinificadorCss;
use MatthiasMullie\Minify\JS as MinificadorJs;
use Numenor\Html\ControleCss;
use Numenor\Html\ControleJavascript;
use Numenor\Php\ArrayWrapper;
use Numenor\Php\StringWrapper;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
abstract class AbstractActionController extends ZendAbstractActionController {
	
	protected $controleCss;
	protected $controleJsHead;
	protected $controleJsBody;
	
	protected function inicializarControleCss() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorCss();
		$this->controleCss = new ControleCss(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/css/admin/min/',
			$this->getServiceLocator()
				->get('ViewHelperManager')
				->get('ServerUrl')
				->__invoke('') . '/css/admin/min/');
		$this->controleCss
			->setMinificadorCss($minificador);
	}
	
	protected function inicializarControleJs() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorJs();
		$this->controleJsHead = new ControleJavascript(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/js/admin/min/',
			$this->getServiceLocator()
				->get('ViewHelperManager')
				->get('ServerUrl')
				->__invoke('') . '/js/admin/min/');
		$this->controleJsHead
			->setMinificadorJs($minificador);
		$this->controleJsBody = clone $this->controleJsHead;
	}
}