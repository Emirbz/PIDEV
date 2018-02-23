<?php

namespace AmirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity(repositoryClass="AmirBundle\Repository\ReviewRepository")
 */
class Review
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
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=255)
     */
    private $service;
    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=255)
     */
    private $qualite;

    /**
     * @var integern
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id",onDelete="CASCADE")
     * @ORM\Column(name="iduser", type="integer")
     */
    private $iduser;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AmirBundle\Entity\Etablissement")
     * @ORM\JoinColumn(name="ietab",referencedColumnName="id",onDelete="CASCADE")
     * @ORM\Column(name="idetab", type="integer")
     */
    private $idetab;


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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Review
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set service
     *
     * @param string $service
     *
     * @return Review
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }
    /**
     * Set service
     *
     * @param string $qualite
     *
     * @return Review
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualite
     *
     * @return string
     */
    public function getQualite()
    {
        return $this->qualite;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Review
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idetab
     *
     * @param integer $idetab
     *
     * @return Review
     */
    public function setIdetab($idetab)
    {
        $this->idetab = $idetab;

        return $this;
    }

    /**
     * Get idetab
     *
     * @return int
     */
    public function getIdetab()
    {
        return $this->idetab;
    }
}

