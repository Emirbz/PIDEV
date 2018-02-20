<?php

namespace AmirBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Etablissement
 *
 * @ORM\Table(name="Etablissement")
 * @ORM\Entity(repositoryClass="AmirBundle\Repository\EtablissementRepository")
 * @Vich\Uploadable
 */
class Etablissement
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
     * @ORM\Column(name="address", type="string", length=255,nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255,nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255,nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255,nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255,nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255,nullable=true)
     */
    private $categorie;



    /**
     * @var string
     *
     * @ORM\Column(name="lundisamedio", type="string", length=255,nullable=true)
     */
    private $lundisamedio;

    /**
     * @var string
     *
     * @ORM\Column(name="lundisamedif", type="string", length=255,nullable=true)
     */
    private $lundisamedif;

    /**
     * @var string
     *
     * @ORM\Column(name="dimancheo", type="string", length=255,nullable=true)
     */
    private $dimancheo;

    /**
     * @var string
     *
     * @ORM\Column(name="dimanchef", type="string", length=255,nullable=true)
     */
    private $dimanchef;

    /**
     * @var bool
     *
     * @ORM\Column(name="parking", type="boolean",nullable=true)
     */
    private $parking;

    /**
     * @var bool
     *
     * @ORM\Column(name="cartecredit", type="boolean",nullable=true)
     */
    private $cartecredit;

    /**
     * @var bool
     *
     * @ORM\Column(name="chaiseroulante",  type="boolean",nullable=true)
     */
    private $chaiseroulante;

    /**
     * @var bool
     *
     * @ORM\Column(name="fumer", type="boolean",nullable=true)
     */
    private $fumer;

    /**
     * @var bool
     *
     * @ORM\Column(name="terasse",  type="boolean",nullable=true)
     */
    private $terasse;

    /**
     * @var bool
     *
     * @ORM\Column(name="wifi",  type="boolean",nullable=true)
     */
    private $wifi;

    /**
     * @var bool
     *
     * @ORM\Column(name="reservations",  type="boolean",nullable=true)
     */
    private $reservations;

    /**
     * @var integer
     *
     * @ORM\Column(name="etoile",  type="integer",nullable=true)
     */
    private $etoile;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrchambre",  type="integer",nullable=true)
     */
    private $nbrchambre;

    /**
     * @var string
     *
     * @ORM\Column(name="checkin", type="string",length=255,nullable=true)
     */
    private $checkin;

    /**
     * @var string
     *
     * @ORM\Column(name="checkout", type="string", length=255,nullable=true)
     */
    private $checkout;

    /**
     * @var bool
     *
     * @ORM\Column(name="lpd", type="boolean",nullable=true)
     */
    private $lpd;

    /**
     * @var bool
     *
     * @ORM\Column(name="dp",  type="boolean",nullable=true)
     */
    private $dp;

    /**
     * @var bool
     *
     * @ORM\Column(name="pc",  type="boolean",nullable=true)
     */
    private $pc;

    /**
     * @var bool
     *
     * @ORM\Column(name="allinclusive",  type="boolean",nullable=true)
     */
    private $allinclusive;

    /**
     * @var bool
     *
     * @ORM\Column(name="livraison",  type="boolean",nullable=true)
     */
    private $livraison;

    /**
     * @var bool
     *
     * @ORM\Column(name="climatisation",  type="boolean",nullable=true)
     */
    private $climatisation;

    /**
     * @var bool
     *
     * @ORM\Column(name="animaux",  type="boolean",nullable=true)
     */
    private $animaux;

    /**
     * @var bool
     *
     * @ORM\Column(name="alcool", type="boolean",nullable=true)
     */
    private $alcool;


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
     * @return Etablissement
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Etablissement
     */
    public function setaddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getaddress()
    {
        return $this->address;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Etablissement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Etablissement
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Etablissement
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Etablissement
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Etablissement
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Etablissement
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }



    /**
     * Set lundisamedio
     *
     * @param string $lundisamedio
     *
     * @return Etablissement
     */
    public function setLundisamedio($lundisamedio)
    {
        $this->lundisamedio = $lundisamedio;

        return $this;
    }



    /**
     * Get lundisamedio
     *
     * @return string
     */
    public function getLundisamedio()
    {
        return $this->lundisamedio;
    }

    /**
     * Set lundisamedif
     *
     * @param string $lundisamedif
     *
     * @return Etablissement
     */
    public function setLundisamedif($lundisamedif)
    {
        $this->lundisamedif = $lundisamedif;

        return $this;
    }

    /**
     * Get lundisamedif
     *
     * @return string
     */
    public function getLundisamedif()
    {
        return $this->lundisamedif;
    }

    /**
     * Set dimancheo
     *
     * @param string $dimancheo
     *
     * @return Etablissement
     */
    public function setDimancheo($dimancheo)
    {
        $this->dimancheo = $dimancheo;

        return $this;
    }

    /**
     * Get dimancheo
     *
     * @return string
     */
    public function getDimancheo()
    {
        return $this->dimancheo;
    }

    /**
     * Set dimanchef
     *
     * @param string $dimanchef
     *
     * @return Etablissement
     */
    public function setDimanchef($dimanchef)
    {
        $this->dimanchef = $dimanchef;

        return $this;
    }

    /**
     * Get dimanchef
     *
     * @return string
     */
    public function getDimanchef()
    {
        return $this->dimanchef;
    }

    /**
     * Set parking
     *
     * @param boolean $parking
     *
     * @return Etablissement
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return bool
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set cartecredit
     *
     * @param boolean $cartecredit
     *
     * @return Etablissement
     */
    public function setCartecredit($cartecredit)
    {
        $this->cartecredit = $cartecredit;

        return $this;
    }

    /**
     * Get cartecredit
     *
     * @return bool
     */
    public function getCartecredit()
    {
        return $this->cartecredit;
    }

    /**
     * Set chaiseroulante
     *
     * @param string $chaiseroulante
     *
     * @return Etablissement
     */
    public function setChaiseroulante($chaiseroulante)
    {
        $this->chaiseroulante = $chaiseroulante;

        return $this;
    }

    /**
     * Get chaiseroulante
     *
     * @return string
     */
    public function getChaiseroulante()
    {
        return $this->chaiseroulante;
    }

    /**
     * Set fumer
     *
     * @param boolean $fumer
     *
     * @return Etablissement
     */
    public function setFumer($fumer)
    {
        $this->fumer = $fumer;

        return $this;
    }

    /**
     * Get fumer
     *
     * @return bool
     */
    public function getFumer()
    {
        return $this->fumer;
    }

    /**
     * Set terasse
     *
     * @param string $terasse
     *
     * @return Etablissement
     */
    public function setTerasse($terasse)
    {
        $this->terasse = $terasse;

        return $this;
    }

    /**
     * Get terasse
     *
     * @return string
     */
    public function getTerasse()
    {
        return $this->terasse;
    }

    /**
     * Set wifi
     *
     * @param string $wifi
     *
     * @return Etablissement
     */
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * Get wifi
     *
     * @return string
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * Set reservations
     *
     * @param string $reservations
     *
     * @return Etablissement
     */
    public function setReservations($reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }

    /**
     * Get reservations
     *
     * @return string
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Set etoile
     *
     * @param string $etoile
     *
     * @return Etablissement
     */
    public function setEtoile($etoile)
    {
        $this->etoile = $etoile;

        return $this;
    }

    /**
     * Get etoile
     *
     * @return string
     */
    public function getEtoile()
    {
        return $this->etoile;
    }

    /**
     * Set nbrchambre
     *
     * @param string $nbrchambre
     *
     * @return Etablissement
     */
    public function setNbrchambre($nbrchambre)
    {
        $this->nbrchambre = $nbrchambre;

        return $this;
    }

    /**
     * Get nbrchambre
     *
     * @return string
     */
    public function getNbrchambre()
    {
        return $this->nbrchambre;
    }

    /**
     * Set checkin
     *
     * @param string $checkin
     *
     * @return Etablissement
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;

        return $this;
    }

    /**
     * Get checkin
     *
     * @return string
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * Set checkout
     *
     * @param string $checkout
     *
     * @return Etablissement
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;

        return $this;
    }

    /**
     * Get checkout
     *
     * @return string
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Set lpd
     *
     * @param string $lpd
     *
     * @return Etablissement
     */
    public function setLpd($lpd)
    {
        $this->lpd = $lpd;

        return $this;
    }

    /**
     * Get lpd
     *
     * @return string
     */
    public function getLpd()
    {
        return $this->lpd;
    }

    /**
     * Set dp
     *
     * @param string $dp
     *
     * @return Etablissement
     */
    public function setDp($dp)
    {
        $this->dp = $dp;

        return $this;
    }

    /**
     * Get dp
     *
     * @return string
     */
    public function getDp()
    {
        return $this->dp;
    }

    /**
     * Set pc
     *
     * @param string $pc
     *
     * @return Etablissement
     */
    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }

    /**
     * Get pc
     *
     * @return string
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set allinclusive
     *
     * @param string $allinclusive
     *
     * @return Etablissement
     */
    public function setAllinclusive($allinclusive)
    {
        $this->allinclusive = $allinclusive;

        return $this;
    }

    /**
     * Get allinclusive
     *
     * @return string
     */
    public function getAllinclusive()
    {
        return $this->allinclusive;
    }

    /**
     * Set livraison
     *
     * @param string $livraison
     *
     * @return Etablissement
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return string
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set climatisation
     *
     * @param string $climatisation
     *
     * @return Etablissement
     */
    public function setClimatisation($climatisation)
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    /**
     * Get climatisation
     *
     * @return string
     */
    public function getClimatisation()
    {
        return $this->climatisation;
    }

    /**
     * Set animaux
     *
     * @param string $animaux
     *
     * @return Etablissement
     */
    public function setAnimaux($animaux)
    {
        $this->animaux = $animaux;

        return $this;
    }

    /**
     * Get animaux
     *
     * @return string
     */
    public function getAnimaux()
    {
        return $this->animaux;
    }

    /**
     * Set alcool
     *
     * @param boolean $alcool
     *
     * @return Etablissement
     */
    public function setAlcool($alcool)
    {
        $this->alcool = $alcool;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrixmoy()
    {
        return $this->prixmoy;
    }

    /**
     * @param int $prixmoy
     */
    public function setPrixmoy($prixmoy)
    {
        $this->prixmoy = $prixmoy;
    }

    /**
     * Get alcool
     *
     * @return bool
     */
    public function getAlcool()
    {
        return $this->alcool;
    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="prixmoy", type="integer",nullable=true)
     */
    private $prixmoy;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="iduser",referencedColumnName="id")
     */
    private $iduser;

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
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $devis
     *
     * @return Devis
     */
    public function setDevisFile(File $devis = null)
    {
        $this->devisFile = $devis;



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
     * @return mixed
     */
    public function getSouscat()
    {
        return $this->souscat;
    }

    /**
     * @param mixed $souscat
     */
    public function setSouscat($souscat)
    {
        $this->souscat = $souscat;
    }

    /**
     * @return string|null
     */
    public function getDevisName()
    {
        return $this->devisName;
    }
    /**
     * @ORM\ManyToOne(targetEntity="SlimBundle\Entity\Sous_Categorie")
     * @ORM\JoinColumn(name="souscat",referencedColumnName="id")
     */
    private $souscat;

}

