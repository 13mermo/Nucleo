<?php

namespace Nidiap\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinhasDePesquisa
 *
 * @ORM\Table(name="linhas_de_pesquisa")
 * @ORM\Entity(repositoryClass="Nidiap\BlogBundle\Repository\LinhasDePesquisaRepository")
 */
class LinhasDePesquisa
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
     * @return LinhasDePesquisa
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
     * @return LinhasDePesquisa
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


}
