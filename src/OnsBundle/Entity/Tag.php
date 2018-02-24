<?php

namespace OnsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="OnsBundle\Repository\TagRepository")
 */
class Tag
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Tag
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @ORM\ManyToMany(targetEntity="OnsBundle\Entity\Article", cascade={"persist"})
     * @ORM\JoinColumn(name="idArticle",referencedColumnName="id", onDelete="CASCADE", nullable=true)
     *
     */
    private $idArticles;

    /**
     * @return mixed
     */
    public function getIdArticles()
    {
        return $this->idArticles;
    }

    /**
     * @param mixed $idArticles
     */
    public function setIdArticles($idArticles)
    {
        $this->idArticles = $idArticles;
    }
    
}


