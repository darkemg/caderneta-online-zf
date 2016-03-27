Traits para Doctrine Annotations
================================
Estendendo o modelo introduzido no pacote `Gedmo\DoctrineExtensions` 
(<https://github.com/Atlantic18/DoctrineExtensions>), os traits definidos no pacote `Utils\Doctrine` configuram 
automaticamente as anotações para o DoctrineORM definindo modelos de campo compartilhados por entidades que implementam
certos comportamentos específicos.

Nomenclatura
------------
Os traits com nome em **inglês** (por exemplo, `SoftDeletable`) representam comportamentos definidos no pacote
`Gedmo\DoctrineExtensions` e que foram estendidos de forma a definir nomes de campo e/ou tipos de data
compatíveis com a nomenclatura de banco de dados desejada.

Os traits com nome em **português** (por exemplo, `Ativo`) representam comportamentos novos implementados de acordo
com as necessidades do projeto.

Uso
---
Os traits definem automaticamente os campos, anotações e métodos de acesso para as propriedades requeridas pelo
comportamento que definem. Basta incluí-los normalmente ao definir uma classe de entidade do Doctrine:

    namespace Aplicacao\Entity
    use Doctrine\ORM\Mapping as ORM;
    use Gedmo\Mapping\Annotation as Gedmo;
    use Utils\Doctrine\Id;       // Implementa o campo de chave primária auto-incremento
    use Utils\Doctrine\Ativo;    // Implementa o campo Ativo
    use Utils\Doctrine\SoftDeleteable; // Implementa a extensão do comportamento SoftDeleteable 
    
    /**
     * A anotação do DoctrineORM abaixo define que a tabela implementa o comportamento de
     * SoftDeletable do pacote Gedmo\DoctrineExtensions
     *  
     * @ORM\Entity 
     * @ORM\Table(
     *      name="entidade"
     *      indexes={
     *          @ORM\Index(name="entidade_index1", columns={"excluido"})
     *      }
     * )
     * @Gedmo\SoftDeleteable(fieldName="excluido", timeAware=false)
     */
    class Entidade {
    
        // Automaticamente inclui os campos id (PK), ativo e excluido
        use Id, Ativo, SoftDeletable
        
        /**
         * Campos específicos da entidade
         * 
         * @access private
         * @var string
         * 
         * @ORM\Column(type="string")
         */
        private $campo;
        
        ...
    }

Lembre-se de que a instrução `use ...` deve listar os traits na ordem em que as respectivas colunas devem ser
incluídas no banco de dados. O trait `Id`, por envolver uma coluna com a anotação de `@GeneratedValue`, é sempre
definido como a primeira coluna da tabela correspondente à entidade.       