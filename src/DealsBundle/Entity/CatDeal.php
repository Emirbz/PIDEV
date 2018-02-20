<?php
/**
 * Created by PhpStorm.
 * User: Skan
 * Date: 18/02/2018
 * Time: 23:02
 */

namespace DealsBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CatDeal
 * @ORM\Table(name="catdeal")
 * @ORM\Entity()
 */
class CatDeal
{  /**
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
     * @ORM\Column(name="nom", type="string", length=255,unique=true)
     */
    private $nom;



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
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}