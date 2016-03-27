<?php
/**
 * Trait para classes de entidade do Doctrine definindo que a mesma possui uma coluna identificadora, um valor único
 * gerado automaticamente pelo banco (normalmente, através de uma sequência ou campo auto-increment, de acordo com
 * o SGBD).
 *
 * Embora este campo não tenha utilidade na representação lógica de uma entidade, o campo é utilizado para quaisquer
 * operações efetuadas no banco de dados.
 *
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Utils\Doctrine
 */
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