<?php
/**
 * Configurador do módulo Admin, responsável por injetar as dependências nas controladoras do módulo.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin
 */
namespace Admin;

use Utils\Configuracao\ConfiguracaoInterface;
use Utils\Configuracao\ControleCssInterface;
use Utils\Configuracao\ControleJavascriptInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Utils\Factory\ControleJavascript;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
	
	/**
	 * Retorna um array de configuração passado para a classe \Zend\Loader\AutoloaderFactory.
	 * 
	 * @access public
	 * @return array O array de configuração do autoload.
	 */
	public function getAutoloaderConfig() : array
	{ 
		return [];
	}

	/**
	 * Retorna o array de configuração do módulo, que será mesclado com o array de configuração da aplicação.
	 * 
	 * @access public
	 * @return array O array de configuração do módulo.
	 */
	public function getConfig() : array
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	/**
	 * Retorna o array de configuração específico das controladoras, contendo os callbacks responsáveis pela injeção de
	 * dependências.
	 * 
	 * @access public
	 * @return array Lista de configurações das controladoras.
	 */
	public function getControllerConfig() : array
	{
		return [
			'initializers' => [
				function ($instance, $serviceManager) {
					// injeta o array de configuração da aplicação
					if ($instance instanceof ConfiguracaoInterface) {
						$locator = $serviceManager->getServiceLocator();
						$configuracao  = $locator->get('Config');
						$instance->setConfiguracao($configuracao);
					}
					if ($instance instanceof ControleCssInterface) {
						$locator = $serviceManager->getServiceLocator();
						$controleCss = $locator->get('Numenor\Html\ControleCss');
						$instance->setControleCss($controleCss);
					}
					if ($instance instanceof ControleJavascriptInterface) {
						$locator = $serviceManager->getServiceLocator();
						$controleJavascript = $locator->get('Numenor\Html\ControleJavascript');
						$instance->setControleJsHead(clone $controleJavascript);
						$instance->setControleJsBody(clone $controleJavascript);
					}
				}
			]
		];
	}
}