<?php
namespace Admin\Controller;
use MatthiasMullie\Minify\CSS as MinificadorCss;
use MatthiasMullie\Minify\JS as MinificadorJs;
use Numenor\Html\ControleCss;
use Numenor\Html\ControleJavascript;
use Numenor\Html\ConversorCaminho;
use Numenor\Php\ArrayWrapper;
use Numenor\Php\StringWrapper;
use Utils\Configuracao\ConfiguracaoInterface;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
abstract class AbstractActionController extends ZendAbstractActionController implements ConfiguracaoInterface {
	
	protected $configuracao;
	protected $controleCss;
	protected $controleJsHead;
	protected $controleJsBody;
	
	protected function getBaseUrl() {
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
	
	protected function inicializarControleCss() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorCss();
		$conversor = new ConversorCaminho();
		$this->controleCss = new ControleCss(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/css/admin/min/',
			$this->getBaseUrl() . '/css/admin/min/');
		$this->controleCss
			->setMinificadorCss($minificador)
			->setConversorCaminho($conversor)
			// Configura o comportamento padrão do controlador de CSS, de acordo com a configuração do ambiente
			->setComportamentoPadrao($this->configuracao['numenor']['html']['comportamento_padrao']);
	}
	
	protected function inicializarControleJs() {
		$arrayWrapper = new ArrayWrapper();
		$stringWrapper = new StringWrapper();
		$minificador = new MinificadorJs();
		// Define o controlador de inclusão de scripts do cabeçalho (dentro da tag <HEAD> do documento HTML)
		$this->controleJsHead = new ControleJavascript(
			$arrayWrapper,
			$stringWrapper,
			getcwd() . '/public/js/admin/min/',
			$this->getBaseUrl() . '/js/admin/min/');
		$this->controleJsHead
			->setMinificadorJs($minificador)
			// Configura o comportamento padrão do controlador de Javascript, de acordo com a configuração do ambiente
			->setComportamentoPadrao($this->configuracao['numenor']['html']['comportamento_padrao']);
		// Define o controlador de inclusão de scripts do corpo (incluídos no final da tag <BODY> do documento HTML).
		// Por simplicidade, apenas clona a instância definida para o cabeçalho, uma vez que as configurações são as
		// mesmas
		$this->controleJsBody = clone $this->controleJsHead;
	}
	
	public function setConfiguracao(array $configuracao) {
		$this->configuracao = $configuracao;
	}
}