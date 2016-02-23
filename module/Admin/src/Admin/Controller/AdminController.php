<?php
namespace Admin\Controller;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController {
	
	public function indexAction() {
		// Verifica se o usuário está logado.
		$credenciais = new AuthenticationService();
		if ($credenciais->hasIdentity()) {
			// Se o usuário está logado:
			// Instancia os controladores de assets (CSS e JS)
			$arrayWrapper = new ArrayWrapper();
			$stringWrapper = new StringWrapper();
			$controleCss = new ControleCss(
				$arrayWrapper, 
				$stringWrapper, 
				realpath('/public/css/admin/min'), 
				$this->getServiceLocator()
					->get('ViewHelperManager')
					->get('ServerUrl')
					->__invoke(''));
			$controleJs = new ControleJavascript(
				$arrayWrapper, 
				$stringWrapper, 
				realpath('/public/js/admin/min'), 
				$urlBase);
		} else {
			$this->redirect()
				->toRoute('admin/login');
		}
	}
}