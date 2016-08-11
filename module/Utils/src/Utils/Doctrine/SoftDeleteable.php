<?php
/**
 * Trait para classes de entidade do Doctrine definindo que a mesma é SoftDeleteable (remoção lógica).
 *
 * Uma entidade SoftDeleteable pode ser marcada como Excluída através do campo excluido. Para todas as queries 
 * executadas que busquem listar registros da entidade, quasiquer registros marcados como Excluídos são ignorados como
 * se tivessem sido fisicamente removidos do banco de dados. Isto permite que seja possível recuperar registros
 * removidos indevidamente. 
 *
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Utils\Doctrine
 * @see \Gedmo\Mapping\Annotation\SoftDeleteable
 */
namespace Utils\Doctrine;

use Doctrine\ORM\Mapping as ORM;

trait SoftDeleteable
{
	
	/**
	 * Data de exclusão do registro do banco de dados.
	 *
	 * @access private
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $excluido;
	
	/**
	 * Método getter do status de remoção do registro.
	 * 
	 * Retorna a data de exclusão (caso o registro tenha sido excluído), ou NULL se o registro não foi excluído.
	 * 
	 * @access public
	 * @return \DateTime|null Status de remoção do registro.
	 */
	public function getExcluido()
	{
		return $this->excluido;
	}
	
	/**
	 * Método setter do status de exclusão do registro.
	 * 
	 * Se o registro está sendo excluído, informa a data de exclusão do mesmo; caso contrário, informa NULL.
	 * 
	 * @param \DateTime $excluido Data de exclusão do registro.
	 * @return \Admin\Entity Instância do próprio objeto para encadeamento.
	 */
	public function setExcluido(\DateTime $excluido = null) : self
	{
		$this->excluido = $excluido;
		return $this;
	} 
}