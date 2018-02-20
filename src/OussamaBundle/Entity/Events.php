<?php

namespace OussamaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Events
 *
 * @ORM\Table(name="events")
 * @ORM\Entity()
 *  @Vich\Uploadable
 */
class Events
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="type", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="type", type="string", length=255)
     */
    private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="dateEvenement", type="date", length=255)
     */
    private $dateEvenement;


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
     * Set name
     *
     * @param string $name
     *
     * @return events
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }




    public function setdateEvenement($dateEvenement)
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getdateEvenement()
    {
        return $this->dateEvenement;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        $this->description = $Description;
    }
    /**
     * @Vich\UploadableField(mapping="devis", fileNameProperty="devisName")
     *
     * @var File
     */
    private $devisFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $devisName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $devis
     *
     * @return Devis
     */
    public function setDevisFile(File $devis = null)
    {
        $this->devisFile = $devis;

        if ($devis)
            $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    /**
     * @return File|null
     */
    public function getDevisFile()
    {
        return $this->devisFile;
    }

    /**
     * @param string $devisName
     *
     * @return Devis
     */
    public function setDevisName($devisName)
    {
        $this->devisName = $devisName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDevisName()
    {
        return $this->devisName;
    }



}
