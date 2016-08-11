<?php
/**
 * Trait para classes de entidade do Doctrine definindo que a mesma é Ativável.
 * 
 * Uma entidade Ativável precisa guardar o status do registro (ativo ou inativo). Normalmente, este status é utilizado
 * para indicar se a entidade deve ser exibida ou bloquear o acesso à mesma; porém, como este status pode ser temporário,
 * ele pode ser revertido a qualquer momento.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Utils\Doctrine
 */
namespace Utils\Doctrine;

use Doctrine\ORM\Mapping as ORM;

trait Ativo
{
	
	/**
	 * Valor do status de ativo da entidade.
	 * 
	 * @access private
	 * @var boolean
	 * 
	 * @ORM\Column(type="boolean", options={"default":true}) 
	 */
	private $ativo;
	
	/**
	 * Método getter do status da entidade.
	 *
	 * @access public
	 * @return boolean O status da entidade.
	 */
	public function getAtivo() : bool
	{
		return $this->ativo;
	}
	
	/**
	 * Método setter do status da entidade.
	 *
	 * @access public
	 * @param string $nome O nome do usuário.
	 * @return \Admin\Entity Instância do próprio objeto para encadeamento.
	 */
	public function setAtivo(bool $ativo) : self
	{
		$this->ativo;
		return $this;
	}
}