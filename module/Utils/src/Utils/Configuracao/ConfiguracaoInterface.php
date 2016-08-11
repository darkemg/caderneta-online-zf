<?php
namespace Utils\Configuracao;

interface ConfiguracaoInterface
{
	
	/**
	 * Método setter para o serviço do array de configuração da aplicação.
	 *
	 * @access public
	 * @param array $config O array de configuração da aplicação
	 */
	public function setConfiguracao(array $config);
}