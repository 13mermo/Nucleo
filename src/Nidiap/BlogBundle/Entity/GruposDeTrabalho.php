<?php

namespace Nidiap\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GruposDeTrabalho
 *
 * @ORM\Table(name="grupos_de_trabalho")
 * @ORM\Entity(repositoryClass="Nidiap\BlogBundle\Repository\GruposDeTrabalhoRepository")
 */
class GruposDeTrabalho
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
     * @ORM\Column(type="text")
     */
    protected $descricao;

    /**
     * @ORM\OneToOne(targetEntity="Nidiap\BlogBundle\Entity\Imagem",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="imagem_id", referencedColumnName="id")
     */
    private $imagem;


    /**
     * Get id.
     *
     * @return int
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
     * @return GruposDeTrabalho
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return GruposDeTrabalho
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
