<?php
namespace Admin\Controller;
use Numenor\Html\Css;
use Numenor\Html\Javascript;
use Numenor\Html\JavascriptRemoto;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController {
	
	public function loginAction() {
		$this->inicializarControleCss();
		$this->inicializarControleJs();
		$this->controleJsBody
			->adicionarJs(new JavascriptRemoto('//code.jquery.com/jquery-2.2.1.min.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/caderneta-online.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/admin.js'))
			->adicionarJs(new Javascript(getcwd() . '/public/js/admin/login.js'));
		// $this->view->scriptBody = $this->controleJsBody->gerarCodigoInclusao();
		$view = new ViewModel();
		$view->jsBody = $this->controleJsBody->gerarCodigoInclusao();
		return $view;
	}
	
	public function autenticarAction() {
		echo "does the login and redirects";
		die();
	}
}