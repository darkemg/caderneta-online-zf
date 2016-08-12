<?php
/**
 * Controladora das requisições relacionadas ao login no módulo Admin.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin/Controller
 */
namespace Admin\Controller;

use Doctrine\ORM\EntityManagerInterface as DoctrineEntityManagerInterface;
use Numenor\Html\ControleCss;
use Numenor\Html\ControleJavascript;
use Numenor\Html\Css;
use Numenor\Html\CssRemoto;
use Numenor\Html\Javascript;
use Zend\Http\Response;
use Zend\Json\Json;
use Zend\View\Model\ViewModel;
use Zend\View\Model\ModelInterface;

class LoginController extends AbstractActionController
{
	/**
	 * Gerenciador de entidades de banco de dados do Doctrine.
	 * 
	 * @access private
	 * @var \Docrtine\ORM\EntityManagerInterface
	 */
	private $entityManager;
	
	/**
	 * {@inheritDoc}
	 * @param DoctrineEntityManagerInterface $entityManager Gerenciador de entidades de banco de dados.
	 */
	public function __construct(
		array $configuracao,
		ControleCss $controleCss,
		ControleJavascript $controleJsHead,
		ControleJavascript $controleJsBody,
		DoctrineEntityManagerInterface $entityManager
	) {
		parent::__construct($configuracao, $controleCss, $controleJsHead, $controleJsBody);
		$this->entityManager = $entityManager;
	}
	
	/**
	 * Captura a ação de exibir a tela de login.
	 * 
	 * @access public
	 * @return \Zend\View\Model\ViewModel O objeto de visualização da requisição (página HTML).
	 */
	public function loginAction() : ViewModel
	{
		$this->controleCss
			->adicionarCss(new CssRemoto('//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'))
			->adicionarCss(new CssRemoto('//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext'))
			->adicionarCss(new Css(getcwd() . '/public/skins/janux/css/bootstrap.min.css'))
			->adicionarCss(new Css(getcwd() . '/public/skins/janux/css/bootstrap-responsive.min.css'))
			->adicionarCss(new Css(getcwd() . '/public/skins/janux/css/style.css'))
			->adicionarCss(new Css(getcwd() . '/public/skins/janux/css/style-responsive.css'))
			->adicionarCss(new Css(getcwd() . '/public/css/admin/login.css', true, false));
		$this->controleJsBody
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery-1.9.1.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery-migrate-1.0.0.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery-ui-1.10.0.custom.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.ui.touch-punch.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/vendor/jquery.validate.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/vendor/additional-methods.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/vendor/jquery-validate-localization/messages_pt_BR.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/modernizr.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/bootstrap.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.cookie.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/fullcalendar.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.dataTables.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/excanvas.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.flot.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.flot.pie.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.flot.stack.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.flot.resize.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.chosen.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.uniform.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.cleditor.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.noty.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.elfinder.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.raty.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.iphone.toggle.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.uploadify-3.1.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.gritter.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.imagesloaded.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.masonry.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.knob.modified.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/jquery.sparkline.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/counter.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/retina.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/skins/janux/js/custom.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/caderneta-online.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/admin.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/login.js'));
		$view = new ViewModel();
		$view->css = $this->controleCss->gerarCodigoInclusao();
		$view->jsBody = $this->controleJsBody->gerarCodigoInclusao();
		$view->controleCss = $this->controleCss;
		return $view;
	}
	
	/**
	 * Captura a ação de autenticação de um usuário.
	 * 
	 * @access public
	 * @return \Zend\View\Model\ModelInterface O objeto de visualização da requisição (arquivo JSON).
	 */
	public function autenticarAction() : ModelInterface
	{
		// Configura a ViewModel para retornar um JSON para esta ação
		$acceptCriteria = [
			'Zend\View\Model\JsonModel' => [
				'application/json'
			]
		];
		$viewModel = $this->acceptableViewModelSelector($acceptCriteria);
		// Captura os dados enviados na requisição
		$request = $this->getRequest();
		if ($request->isPost()) {
			try {
				$this
					->getResponse()
					->setStatusCode(Response::STATUS_CODE_200);
				$retorno = [
					'successo' => true,
					'resposta' => [
						'titulo' => '',
						'mensagem' => '',
						'dados' => []
					]
				];
			} catch (\Throwable $e) {
				$codigoExcecao = (int) $e->getCode();
				if ($codigoExcecao < Response::STATUS_CODE_300 || $codigoExcecao > Response::STATUS_CODE_511) {
					$codigoExcecao = Response::STATUS_CODE_500;
				}
				$this
					->getResponse()
					->setStatusCode($codigoExcecao);
				$retorno = [
					'successo' => false,
					'resposta' => [
						'titulo' => '',
						'mensagem' => '',
						'dados' => []
					]
				];
			}
		} else {
			$retorno = [];
		}
		Json::$useBuiltinEncoderDecoder = true;
		return $viewModel->setVariables($retorno);
	}
	
	/**
	 * Captura a ação de solicitação de recuperação de senha de um usuário.
	 *
	 * @access public
	 * @return \Zend\View\Model\ModelInterface O objeto de visualização da requisição (arquivo JSON).
	 */
	public function solicitarSenhaAction() : ModelInterface
	{
		$retorno = [];
		// Configura a ViewModel para retornar um JSON para esta ação
		$acceptCriteria = [
			'Zend\View\Model\JsonModel' => [
				'application/json'
			]
		];
		$viewModel = $this->acceptableViewModelSelector($acceptCriteria);
		Json::$useBuiltinEncoderDecoder = true;
		return $viewModel->setVariables($retorno);
	}
}