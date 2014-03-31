<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Divers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\DiversRepository")
 */
class Divers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;
    
    /**
     * @ORM\OneToMany(targetEntity="DiversImages", mappedBy="divers")
     */
    protected $photos;
    
    /**
     * @ORM\OneToMany(targetEntity="DiversReponse", mappedBy="divers")
     */
    protected $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="text")
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Divers
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Divers
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Divers
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
     * Set prix
     *
     * @param float $prix
     * @return Divers
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Divers
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Divers
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Divers
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Divers
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    
        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Divers
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    
        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reponse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createAt = new \Datetime;
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
    }
    
    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return Divers
     */
    public function setAuteur(\Media\UserBundle\Entity\User $auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return \Media\UserBundle\Entity\User 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add photos
     *
     * @param \G5\ProjetBundle\Entity\DiversImages $photos
     * @return Divers
     */
    public function addPhoto(\G5\ProjetBundle\Entity\DiversImages $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \G5\ProjetBundle\Entity\DiversImages $photos
     */
    public function removePhoto(\G5\ProjetBundle\Entity\DiversImages $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add reponse
     *
     * @param \G5\ProjetBundle\Entity\DiversReponse $reponse
     * @return Divers
     */
    public function addReponse(\G5\ProjetBundle\Entity\DiversReponse $reponse)
    {
        $this->reponse[] = $reponse;
    
        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \G5\ProjetBundle\Entity\DiversReponse $reponse
     */
    public function removeReponse(\G5\ProjetBundle\Entity\DiversReponse $reponse)
    {
        $this->reponse->removeElement($reponse);
    }

    /**
     * Get reponse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponse()
    {
        return $this->reponse;
    }
}