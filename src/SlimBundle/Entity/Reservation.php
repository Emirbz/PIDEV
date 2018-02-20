<?php

namespace SlimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity()
 */
class Reservation
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
     * @var int
     *
     * @ORM\Column(name="id_etablissement", type="integer")
     */
    private $idEtablissement;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_evenement", type="integer")
     */
    private $idEvenement;

    /**
     *
     * @ORM\Column(name="aunomde", type="string")
     */
    private $aunomde;



    /**
     *
     * @ORM\Column(name="nombre", type="integer")
     */
    private $nombre;

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
     * Set idEtablissement
     *
     * @param integer $idEtablissement
     *
     * @return Reservation
     */
    public function setIdEtablissement($idEtablissement)
    {
        $this->idEtablissement = $idEtablissement;

        return $this;
    }

    /**
     * Get idEtablissement
     *
     * @return int
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Reservation
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idEvenement
     *
     * @param integer $idEvenement
     *
     * @return Reservation
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    /**
     * Get idEvenement
     *
     * @return int
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * @return mixed
     */
    public function getAunomde()
    {
        return $this->aunomde;
    }

    /**
     * @param mixed $aunomde
     */
    public function setAunomde($aunomde)
    {
        $this->aunomde = $aunomde;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

