<?php
/**
 * Created by PhpStorm.
 * User: Slim sl
 * Date: 20/02/2018
 * Time: 03:36
 */

namespace SlimBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity()
 */
class Favoris
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
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="id_Categorie",referencedColumnName="id")
     */
    private $id_categorie;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @return mixed
     */

}