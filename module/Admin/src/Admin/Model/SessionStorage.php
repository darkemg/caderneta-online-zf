<?php
/**
 * Modelo representando o armazenamento em banco de dados de uma sessão do admin, conforme as especificações da
 * classe \Zend\Session.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin/Model
 */
namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity 
 * @ORM\Table(
 * 		name="admin_session_storage",
 * 		indexes={
 * 			@ORM\Index(name="admin_session_storage_index1", columns={"modified"}),
 * 			@ORM\Index(name="admin_session_storage_index2", columns={"lifetime"})
 * 		}
 * )
 */
class SessionStorage 
{
	
	/**
	 * Identificador da Session (PHPSESSID).
	 * 
	 * @access private
	 * @var string
	 * 
	 * @ORM\Column(type="string", length=32)
	 * @ORM\Id
	 */
	private $id;
	
	/**
	 * Nome da sessão (Namespace)
	 * 
	 * @access private
	 * @var string
	 * 
	 * @ORM\Column(type="string", length=32)
	 * @ORM\Id 
	 */
	private $name;
	
	/** 
	 * @ORM\Column(type="integer", nullable=true, options={"unsigned": true}) 
	 */
	private $modified;
	
	/** 
	 * @ORM\Column(type="integer", nullable=true, options={"unsigned": true}) 
	 */
	private $lifetime;
	
	/** 
	 * @ORM\Column(type="text", nullable=true) 
	 */
	private $data;
	
	public function getId() : string
	{
		return $this->id;
	}
	
	public function setId(string $id) : self
	{
		$this->id = $id;
		return $this;
	}
	
	public function getName() : string
	{
		return $this->name;
	}
	
	public function setName(string $name) : self
	{
		$this->name = $name;
		return $this;
	}
	
	public function getModified()
	{
		return $this->modified;
	}
	
	public function setModified(int $modified = null) : self
	{
		$this->modified = $modified;
		return $this;
	}
	
	public function getLifetime()
	{
		return $this->lifetime;
	}
	
	public function setLifetime(int $lifetime = null) : self
	{
		$this->lifetime = $lifetime;
		return $this;
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function setData(string $data = null) : self
	{
		$this->data = $data;
		return $this;
	}
}