<?php

namespace Nidiap\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servicos
 *
 * @ORM\Table(name="servicos")
 * @ORM\Entity(repositoryClass="Nidiap\BlogBundle\Repository\ServicosRepository")
 */
class Servicos
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
    private $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @ORM\OneToOne(targetEntity="Nidiap\BlogBundle\Entity\Imagem", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="imagem_id", referencedColumnName="id")
     */
    private $imagem;

     /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get titulo
     * @return string
     */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao(){
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

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Servicos
     */
    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    /**
    * Set descricao
    * 
    * @param string $descricao
    *
    * @return Servicos
    */
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
}