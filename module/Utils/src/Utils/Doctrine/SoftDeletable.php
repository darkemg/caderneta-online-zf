<?php
namespace Utils\Doctrine;
use Doctrine\ORM\Mapping as ORM;
trait SoftDeletable {
	
	/**
	 * Data de exclusão do registro do banco de dados.
	 *
	 * @access private
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $excluido;
	
	public function getExcluido() {
		return $this->excluido;
	}
	
	public function setExcluido(\DateTime $excluido = null) : self {
		$this->excluido = $excluido;
		return $this;
	} 
}