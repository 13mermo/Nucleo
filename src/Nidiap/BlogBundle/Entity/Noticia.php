<?php
/**
 * Created by PhpStorm.
 * User: Wesley
 * Date: 27/05/2019
 * Time: 07:27
 */
namespace Nidiap\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="noticia")
 */
class Noticia {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $autor;

    /**
     * @ORM\Column(type="text")
     */
    protected $descricao;

    /**
     * @ORM\OneToOne(targetEntity="Nidiap\BlogBundle\Entity\Imagem", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="imagem_id", referencedColumnName="id")
     */
    private $imagem;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Noticia
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set autor
     *
     * @param string $autor
     *
     * @return Noticia
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Noticia
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }


    public function getImagem():? Imagem
    {
        return $this->imagem;
    }


    public function setImagem($imagem): void
    {
        $this->imagem = $imagem;

    }


}
