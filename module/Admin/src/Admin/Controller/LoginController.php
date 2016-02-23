<?php
namespace Admin\Controller;
use Numenor\Html\Css;
use Numenor\Html\Javascript;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController {
	
	public function loginAction() {
		$this->inicializarControleCss();
		$this->inicializarControleJs();
		$this->controleJs
			->adicionarJs(new Javascript('js/caderneta-online.js'))
			->adicionarJs(new Javascript('js/admin/admin.js'));
		print_r($this->controleJs->gerarCodigoInclusao());
		
	}
	
	public function autenticarAction() {
		echo "does the login and redirects";
		die();
	}
}