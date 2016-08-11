<?php
namespace Admin\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
	
	public function indexAction() {
		// Verifica se o usuário está logado.
		$credenciais = new AuthenticationService();
		if ($credenciais->hasIdentity()) {
			// Se o usuário está logado:
		} else {
			// Se o usuário não está logado:
			// - redireciona o usuário para a página de login
			$this->redirect()
				->toRoute('admin/login');
		}
	}
}