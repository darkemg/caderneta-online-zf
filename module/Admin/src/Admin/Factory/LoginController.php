<?php
namespace Admin\Factory;

use Admin\Controller;
use Utils\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginController implements FactoryInterface
{
	
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$configuracao = new Factory\Configuracao();
		$controleCss = new Factory\ControleCss();
		$controleJs = new Factory\ControleJavascript();
		$doctrine = new Factory\Doctrine();
		$controller = new Controller\LoginController(
			$configuracao->createService($serviceLocator),
			$controleCss->createService($serviceLocator),
			$controleJs->createService($serviceLocator),
			$controleJs->createService($serviceLocator),
			$doctrine->createService($serviceLocator)
		);
		return $controller;
	}
}