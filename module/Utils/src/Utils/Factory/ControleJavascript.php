<?php
namespace Utils\Factory;

use Numenor\Html;
use Zend\ServiceManager\ServiceLocatorInterface;

class ControleJavascript extends ControleAsset
{
	
	public function createService(ServiceLocatorInterface $serviceLocator) : Html\ControleJavascript
	{
		$parentLocator = $serviceLocator->getServiceLocator();
		$arrayWrapper = $parentLocator->get('ArrayWrapper');
		$stringWrapper = $parentLocator->get('StringWrapper');
		$configuracao = $parentLocator->get('Config');
		$request = $parentLocator->get('Request');
		$controleJs = new Html\ControleJavascript(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/js/admin/min/',
			$this->getBaseUrl($request) . $configuracao['base_path']['suffix'] . '/js/admin/min/'
		);
		$controleJs->setComportamentoPadrao($configuracao['numenor']['html']['comportamento_padrao']);
		return $controleJs;
	}
}