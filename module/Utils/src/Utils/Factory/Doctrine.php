<?php
namespace Utils\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;

class Doctrine extends ControleAsset
{

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$entityManager = $serviceLocator->getServiceLocator()
			->get('Doctrine\ORM\EntityManager');
		return $entityManager;
	}
}