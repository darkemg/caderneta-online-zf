<?php
namespace Utils\Doctrine;
use Doctrine\ORM\Mapping as ORM;
trait Id {
	
	/**
	 * Identificador do registro no banco de dados.
	 * 
	 * @access private
	 * @var int
	 * 
	 * @ORM\Id 
	 * @ORM\Column(type="integer", options={"unsigned": true}) 
	 * @ORM\GeneratedValue
	 */
	private $id;
	
	/**
	 * Método getter do identificador do registro no banco de dados.
	 *
	 * @access public
	 * @return int O identificador do registro no banco de dados.
	 */
	public function getId() : int {
		return $this->id;
	} 
}