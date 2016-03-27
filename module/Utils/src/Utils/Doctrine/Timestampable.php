<?php
namespace Utils\Doctrine;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
trait Timestampable {
	
	/** 
	 * @ORM\Column(type="datetime", name="data_criacao")
	 * @Gedmo\Timestampable(on="create") 
	 */
	private $dataCriacao;
	/**
	 * @ORM\Column(type="datetime", name="data_ultima_alteracao")
	 * @Gedmo\Timestampable(on="update")
	 */
	private $dataUltimaAlteracao;
	
	public function getDataCriacao() : \DateTime {
		return $this->dataCriacao;
	}
	
	public function getDataUltimaAlteracao() : \DateTime {
		return $this->dataUltimaAlteracao;
	}
}