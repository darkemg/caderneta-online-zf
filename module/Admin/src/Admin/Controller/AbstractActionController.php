<?php
/**
 * Controladora genérica abstrata para o módulo Admin.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin/Controller
 */
namespace Admin\Controller;

use Numenor\Html\ControleCss;
use Numenor\Html\ControleJavascript;
use Utils\Configuracao\ConfiguracaoInterface;
use Utils\Configuracao\ControleCssInterface;
use Utils\Configuracao\ControleJavascriptInterface;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;

abstract class AbstractActionController extends ZendAbstractActionController implements 
	ConfiguracaoInterface,
	ControleCssInterface,
	ControleJavascriptInterface
	
{
	
	/**
	 * Array de configuração do módulo.
	 * 
	 * @access protected
	 * @var array
	 */
	protected $configuracao;
	/**
	 * Controlador dos assets CSS utilizados nas ações da controladora.
	 * 
	 * @accesss protected
	 * @var \Numenor\Html\ControleCss
	 */
	protected $controleCss;
	/**
	 * Controlador dos assets Javascript incluídos no cabeçalho das ações da controladora.
	 *
	 * @accesss protected
	 * @var \Numenor\Html\ControleJavascript
	 */
	protected $controleJsHead;
	/**
	 * Controlador dos assets Javascript incluídos no final do corpo das ações da controladora.
	 *
	 * @accesss protected
	 * @var \Numenor\Html\ControleJavascript
	 */
	protected $controleJsBody;
	
	/**
	 * Retorna a URL base da requisição feita á controladora.
	 * 
	 * @access protected
	 * @return string
	 */
	protected function getBaseUrl() : string
	{
		$uri = $this->getRequest()->getUri();
		$scheme = $uri->getScheme();
		$host = $uri->getHost();
		$port = $uri->getPort();
		$baseUrl = sprintf('%s://%s', $scheme, $host);
		if (!empty($port)) {
			$baseUrl .= ':' . $port;
		}
		return $baseUrl;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function setConfiguracao(array $configuracao)
	{
		$this->configuracao = $configuracao;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function setControleCss(ControleCss $controleCss)
	{
		$this->controleCss = $controleCss;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function setControleJsHead(ControleJavascript $controleJsHead)
	{
		$this->controleJsHead = $controleJsHead;
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function setControleJsBody(ControleJavascript $controleJsBody)
	{
		$this->controleJsBody = $controleJsBody;
	}
}