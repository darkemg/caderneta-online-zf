<?php
/**
 * Classe de entidade representando um usuário do aplicativo Admin.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin/Entity
 */
namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Utils\Doctrine\Ativo;
use Utils\Doctrine\Id;
use Utils\Doctrine\SoftDeleteable;
use Utils\Doctrine\Timestampable;

/** 
 * @ORM\Entity 
 * @ORM\Table(
 * 		name="admin_usuario",
 * 		indexes={
 * 			@ORM\Index(name="admin_usuario_index1", columns={"username", "senha", "excluido"}),
 * 			@ORM\Index(name="admin_usuario_index2", columns={"excluido"})
 * 		}
 * )
 * @Gedmo\SoftDeleteable(fieldName="excluido", timeAware=false)
 */
class Usuario
{
	
	use Id;
	use Timestampable;
	use Ativo;
	use SoftDeleteable;
	
	/**
	 * Nome do usuário.
	 * 
	 * @access private
	 * @var string
	 * 
	 * @ORM\Column(type="string")
	 */
	private $nome;
	
	/**
	 * Apelido (ou nome de exibição) do usuário.
	 * 
	 * Se não estiver definida, esta propriedade é representada pelo nome do usuário.
	 * 
	 * @access private
	 * @var string
	 * 
	 * @ORM\Column(type="string", nullable=true) 
	 */
	private $apelido;
	
	/** 
	 * @ORM\Column(type="string") 
	 */
	private $username;
	
	/** 
	 * @ORM\Column(type="string") 
	 */
	private $senha;
	
	/** 
	 * @ORM\Column(type="datetime", name="data_nascimento", nullable=true) 
	 */
	private $dataNascimento;
	
	/** 
	 * @ORM\Column(type="datetime", name="data_ultimo_login", nullable=true) 
	 */
	private $dataUltimoLogin;
	
	/** 
	 * @ORM\Column(type="datetime", name="data_expira_senha", nullable=true) 
	 */
	private $dataExpiraSenha;
	
	/**
	 * Método getter do nome do usuário.
	 *
	 * @access public
	 * @return string O nome do usuário.
	 */
	public function getNome() : string 
	{
		return $this->nome;
	}
	
	/**
	 * Método setter do nome do usuário.
	 * 
	 * @access public
	 * @param string $nome O nome do usuário.
	 * @return \Admin\Entity Instância do próprio objeto para encadeamento.
	 */
	public function setNome(string $nome) : self 
	{
		$this->nome = $nome;
		return $this;
	}
	
	/**
	 * Método getter do apelido (ou nome de exibição) do usuário.
	 *
	 * @access public
	 * @return string O apelido (nome de exibição) do usuário.
	 */
	public function getApelido() : string 
	{
		return $this->apelido;
	}
	
	/**
	 * Método setter do apelido (ou nome de exibição) do usuário.
	 *
	 * @access public
	 * @param string O apelido (nome de exibição) do usuário.
	 * @return \Admin\Entity Instância do próprio objeto para encadeamento.
	 */
	public function setApelido(string $apelido) : self 
	{
		$this->apelido = $apelido;
		return $this;
	}
	
	/**
	 * Método getter do username do usuário.
	 *
	 * @access public
	 * @return string O username do usuário.
	 */
	public function getUsername() : string 
	{
		return $this->username;
	}
	
	/**
	 * Método setter do username do usuário.
	 *
	 * @access public
	 * @param string O username do usuário.
	 * @return \Admin\Entity Instância do próprio objeto para encadeamento.
	 */
	public function setUsername(string $username) : self 
	{
		$this->username = $username;
		return $this;
	}
	
	/**
	 * Método getter da senha do usuário.
	 * 
	 * @access public
	 * @return string A senha do usuário.
	 */
	public function getSenha() : string 
	{
		return $this->senha;
	}
	
	public function setSenha(string $senha) : self 
	{
		$this->senha = $senha;
		return $this;
	}
	
	public function getDataNascimento() : \DateTime 
	{
		return $this->dataNascimento;
	}
	
	public function setDataNascimento(\DateTime $dataNascimento = null) : self 
	{
		$this->dataNascimento = $dataNascimento;
		return $this;
	}
	
	public function getDataUltimoLogin() 
	{
		return $this->dataUltimoLogin;
	}
	
	public function getDataExpiraSenha() 
	{
		return $this->dataExpiraSenha;
	}
	
	public function setDataExpiraSenha(\DateTime $dataExpiraSenha = null) : self 
	{
		$this->dataExpiraSenha = $dataExpiraSenha;
		return $this;
	}
	
	public static function login($nomeUsuario, $senha) 
	{
		$query = $em->createQuery("SELECT u FROM Admin\Entity\Usuario WHERE username = ?1 AND excluido = 0");
		$query->setParameter(1, $nomeUsuario);
		$usuario = $query->getResult();
	}
}