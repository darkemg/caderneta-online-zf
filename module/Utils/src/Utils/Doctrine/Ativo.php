<?php
namespace Utils\Doctrine;
use Doctrine\ORM\Mapping as ORM;
trait Ativo {
	
	/** 
	 * @ORM\Column(type="boolean", options={"default":true}) 
	 */
	private $ativo;
	
	public function getAtivo() : bool {
		return $this->ativo;
	}
	
	public function setAtivo(bool $ativo) : self {
		$this->ativo;
		return $this;
	}
}