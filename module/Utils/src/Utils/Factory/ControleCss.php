<?php
namespace Utils\Factory;

use Numenor\Html;
use Zend\ServiceManager\ServiceLocatorInterface;

class ControleCss extends ControleAsset
{
	
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$arrayWrapper = $serviceLocator->get('ArrayWrapper');
		$stringWrapper = $serviceLocator->get('StringWrapper');
		$configuracao = $serviceLocator->get('Config');
		$conversorCaminho = $serviceLocator->get('ConversorCaminho');
		$request = $serviceLocator->get('Request');
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