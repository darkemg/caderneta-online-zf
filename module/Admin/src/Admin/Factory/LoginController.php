<?php
namespace Admin\Factory;

use Admin\Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginController implements FactoryInterface
{
	
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$entityManager = $serviceLocator->getServiceLocator()
			->get('Doctrine\ORM\EntityManager');
		$controller = new Controller\LoginController();
		return new Controller\LoginController();
	}
}