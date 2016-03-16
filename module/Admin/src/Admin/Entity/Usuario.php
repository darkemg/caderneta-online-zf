<?php
/**
 * Modelo representando um usuário do aplicativo Admin.
 * 
 * @author Darke M. Goulart <darkemg@users.noreply.github.com>
 * @package Admin/Entity
 */
namespace Admin\Entity;
/** @Entity @Table(name="admin_usuario") */
class Usuario {
	
	/**
	 * Identificador do registro no banco de dados.
	 * 
	 * @access private
	 * @var int
	 */
	/** @Id @Column(type="integer") @GeneratedValue */
	private $id;
	
	/**
	 * Nome do usuário.
	 * 
	 * @access private
	 * @var string
	 */
	/** @Column(type="string") **/
	private $nome;
	
	/**
	 * Apelido (ou nome de exibição) do usuário.
	 * 
	 * Se não estiver definida, esta propriedade é representada pelo nome do usuário.
	 * 
	 * @access private
	 * @var string
	 */
	/** @Column(type="string", nullable="true") **/
	private $apelido;
	/** @Column(type="string") **/
	private $username;
	/** @Column(type="string") **/
	private $senha;
	/** @Column(type="datetime", name="data_nascimento", nullable="true") **/
	private $dataNascimento;
	/** @Column(type="datetime", name="data_criacao") **/
	private $dataCriacao;
	/** @Column(type="datetime", name="data_ultimo_login", nullable="true") **/
	private $dataUltimoLogin;
	/** @Column(type="datetime", name="data_expira_senha", nullable="true) **/
	private $dataExpiraSenha;
	/** @Column(type="boolean") **/
	private $ativo;
	
	/**
	 * Método getter do identificador do registro no banco de dados.
	 * 
	 * @access public
	 * @return int O identificador do registro no banco de dados.
	 */
	public function getId() : int {
		return $this->id;
	}
	
	public function getNome() : string {
		return $this->nome;
	}
	
	public function setNome(string $nome) : self {
		$this->nome = $nome;
		return $this;
	}
	
	public function getApelido() : string {
		return $this->apelido;
	}
	
	public function setApelido(string $apelido) : self {
		$this->apelido = $apelido;
		return $this;
	}
	
	public function getUsername() : string {
		return $this->username;
	}
	
	public function setUsername(string $username) : self {
		$this->username = $username;
		return $this;
	}
	
	public function getSenha() : string {
		return $this->senha;
	}
	
	public function setSenha(string $senha) : self {
		$this->senha = $senha;
		return $this;
	}
	
	public function getDataNascimento() : \DateTime {
		return $this->dataNascimento;
	}
	
	public function setDataNascimento(\DateTime $dataNascimento) : self {
		$this->dataNascimento = $dataNascimento;
		return $this;
	}
	
	public function getDataCriacao() : \DateTime {
		return $this->dataCriacao;
	}
	
	public function getDataUltimoLogin() : \DateTime {
		return $this->dataUltimoLogin;
	}
	
	public function getDataExpiraSenha() : \DateTime {
		return $this->dataExpiraSenha;
	}
	
	public function setDataExpiraSenha(\DateTime $dataExpiraSenha) : self {
		$this->dataExpiraSenha = $dataExpiraSenha;
		return $this;
	}
	
	public function getAtivo() : bool {
		return $this->ativo;
	}
	
	public function setAtivo(bool $ativo) : self {
		$this->ativo;
		return $this;
	}
	
	public static function login($nomeUsuario, $senha) {
		$query = $em->createQuery("SELECT u FROM Admin\Model\Usuario WHERE username = ?1 AND excluido = 0");
		$query->setParameter(1, $nomeUsuario);
		$usuario = $query->getResult();
	}
}