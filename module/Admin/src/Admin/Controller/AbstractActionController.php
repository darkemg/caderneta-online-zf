<?php
namespace Admin\Controller;
use MatthiasMullie\Minify\CSS as MinificadorCss;
use MatthiasMullie\Minify\JS as MinificadorJs;
use Numenor\Html\ControleCss;
use Numenor\Html\ControleJavascript;
use Numenor\Html\ConversorCaminho;
use Numenor\Php\ArrayWrapper;
use Numenor\Php\StringWrapper;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
abstract class AbstractActionController extends ZendAbstractActionController {
	
	protected $controleCss;
	protected $controleJsHead;
	protected $controleJsBody;
	
	protected function getBaseUrl() {
		$uri = $this->getRequest()->getUri();
		$scheme = $uri->getScheme();
		$host = $uri->getHost();
		$port = $uri->getPort();
		$baseUrl = sprintf('%s://%s', $scheme, $host);
		if (!empty($port)) {
			$baseUrl .= ':' . $port;
		}
		return $baseUrl;
	}
	
	protected function inicializarControleCss() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorCss();
		$conversor = new ConversorCaminho();
		$this->controleCss = new ControleCss(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/css/admin/min/',
			$this->getBaseUrl() . '/css/admin/min/');
		$this->controleCss
			->setMinificadorCss($minificador)
			->setConversorCaminho($conversor);
	}
	
	protected function inicializarControleJs() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorJs();
		$this->controleJsHead = new ControleJavascript(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/js/admin/min/',
			$this->getBaseUrl() . '/js/admin/min/');
		$this->controleJsHead
			->setMinificadorJs($minificador);
		$this->controleJsBody = clone $this->controleJsHead;
	}
}