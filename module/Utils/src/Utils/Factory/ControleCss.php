<?php
namespace Utils\Factory;

use Numenor\Html;
use Zend\ServiceManager\ServiceLocatorInterface;

class ControleCss extends ControleAsset
{
	
	public function createService(ServiceLocatorInterface $serviceLocator) : Html\ControleCss
	{
		$parentLocator = $serviceLocator->getServiceLocator();
		$arrayWrapper = $parentLocator->get('ArrayWrapper');
		$stringWrapper = $parentLocator->get('StringWrapper');
		$configuracao = $parentLocator->get('Config');
		$conversorCaminho = $parentLocator->get('ConversorCaminho');
		$request = $parentLocator->get('Request');
		$controleCss = new Html\ControleCss(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/css/admin/min/',
			$this->getBaseUrl($request) . $configuracao['base_path']['suffix'] . '/css/admin/min/'
		);
		$controleCss->setConversorCaminho($conversorCaminho)
			->setComportamentoPadrao($configuracao['numenor']['html']['comportamento_padrao']);
		return $controleCss;
	}
}