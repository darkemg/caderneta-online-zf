<?php
/**
 * Trait para classes de entidade do Doctrine definindo que a mesma mantém informações relativas a datas de criação e
 * modificação (Timestampable).
 *
 * Uma entidade Timestampable registra essas informações temporais para que seja possível identificar em que momento
 * o registro foi criado e alterado pela última vez.
 *
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Utils\Doctrine
 * @see \Gedmo\Mapping\Annotation\SoftDeleteable
 */
namespace Utils\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait Timestampable
{
	
	/** 
	 * Data de criação do registro no banco de dados.
	 * 
	 * @access private
	 * @var \DateTime
	 * 
	 * @ORM\Column(type="datetime", name="data_criacao")
	 * @Gedmo\Timestampable(on="create") 
	 */
	private $dataCriacao;
	/**
	 * Data da última alteração efetuada no registro.
	 * 
	 * @access private
	 * @var \DateTime
	 * 
	 * @ORM\Column(type="datetime", name="data_ultima_alteracao")
	 * @Gedmo\Timestampable(on="update")
	 */
	private $dataUltimaAlteracao;
	
	/**
	 * Método getter da data de criação do registro no banco de dados.
	 * 
	 * @access public
	 * @return \DateTime Data de criação do registro.
	 */
	public function getDataCriacao() : \DateTime
	{
		return $this->dataCriacao;
	}
	
	/**
	 * Método getter da data da última alteração do registro.
	 *
	 * @access public
	 * @return \DateTime Data da última alteração do registro.
	 */
	public function getDataUltimaAlteracao() : \DateTime
	{
		return $this->dataUltimaAlteracao;
	}
}