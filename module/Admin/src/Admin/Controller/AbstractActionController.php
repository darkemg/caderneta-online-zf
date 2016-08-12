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
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;

abstract class AbstractActionController extends ZendAbstractActionController
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
	 * Método construtor da classe.
	 * 
	 * @access public
	 * @param array $configuracao O array de configuração da aplicação.
	 * @param \Numenor\Html\ControleCss $controleCss Controlador de inclusão de arquivos CSS.
	 * @param \Numenor\Html\ControleJavascript $controleJsHead Controlador de inclusão de arquivos Javascript no
	 * cabeçalho do documento.
	 * @param \Numenor\Html\ControleJavascript $controleJsBody Controlador de inclusão de arquivos Javascript no final do
	 * corpo do documento.
	 */
	public function __construct(
		array $configuracao,
		ControleCss $controleCss,
		ControleJavascript $controleJsHead,
		ControleJavascript $controleJsBody
	) {
		$this->configuracao = $configuracao;
		$this->controleCss = $controleCss;
		$this->controleJsHead = $controleJsHead;
		$this->controleJsBody = $controleJsBody;
	}
	
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
}