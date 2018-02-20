<?php
/**
 * Created by PhpStorm.
 * User: Skan
 * Date: 07/02/2018
 * Time: 21:20
 */

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();

    }
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Sasisir votre nom", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Le nom est très court",
     *     maxMessage="Le nom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Saisir votre prébom", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Le prénom est très court",
     *     maxMessage="Le prénom est trop long.",
     *     groups={"Registration", "Profile"},
     * )
     */
    protected $surname;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }


}