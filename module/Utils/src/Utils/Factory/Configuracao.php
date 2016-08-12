<?php
namespace Utils\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;

class Configuracao extends ControleAsset
{
	
	public function createService(ServiceLocatorInterface $serviceLocator) : array
	{
		$configuracao = $serviceLocator->getServiceLocator()
			->get('Config');
		return $configuracao;
	}
}