<?php

namespace Nidiap\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Projetos
 *
 * @ORM\Table(name="projetos")
 * @ORM\Entity(repositoryClass="Nidiap\BlogBundle\Repository\ProjetosRepository")
 */
class Projetos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\OneToOne(targetEntity="Nidiap\BlogBundle\Entity\Arquivo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="arquivo_id", referencedColumnName="id")
     */
    private $arquivo;

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
     * @return Projetos
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
     * @return Projetos
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
     * @return Projetos
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


    public function getArquivo():? Arquivo
    {
        return $this->arquivo;
    }



    public function setArquivo($arquivo): void
    {
        $this->arquivo = $arquivo;
    }

}
