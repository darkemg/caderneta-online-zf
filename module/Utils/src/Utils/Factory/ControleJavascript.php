<?php
namespace Utils\Factory;

use Numenor\Html;
use Zend\ServiceManager\ServiceLocatorInterface;

class ControleJavascript extends ControleAsset
{
	
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$arrayWrapper = $serviceLocator->get('ArrayWrapper');
		$stringWrapper = $serviceLocator->get('StringWrapper');
		$configuracao = $serviceLocator->get('Config');
		$request = $serviceLocator->get('Request');
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