<?php
namespace Admin;
use Utils\Configuracao\ConfiguracaoInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
class Module implements AutoloaderProviderInterface, ConfigProviderInterface {
	
	public function getAutoloaderConfig() { }

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getControllerConfig() {
		return [
			'initializers' => [
				function ($instance, $serviceManager) {
					if ($instance instanceof ConfiguracaoInterface) {
						$locator = $serviceManager->getServiceLocator();
						$configuracao  = $locator->get('Config');
						$instance->setConfiguracao($configuracao);
					}
				}
			]
		];
	}
}