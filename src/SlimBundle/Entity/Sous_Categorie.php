<?php

namespace SlimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sous_Categorie
 *
 * @ORM\Table(name="sous__categorie")
 * @ORM\Entity()
 */
class Sous_Categorie
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="SlimBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="idcategorie",referencedColumnName="id")
     */
    private $idCategorie;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Sous_Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set idCategorie
     *
     * @param integer $idCategorie
     *
     * @return Sous_Categorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return int
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }
}

