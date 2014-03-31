<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Immobilier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\ImmobilierRepository")
 */
class Immobilier {

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
     * @ORM\OneToMany(targetEntity="ImmobilierImages", mappedBy="immobilier")
     */
    protected $photos;
    
    /**
     * @ORM\OneToMany(targetEntity="ImmobilierReponse", mappedBy="immobilier")
     */
    protected $reponses;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var integer
     *
     * @ORM\Column(name="pieces", type="integer")
     */
    private $pieces;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
        /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact;

    /**
     * @var array
     *
     * @ORM\Column(name="category", type="array")
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;

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
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Immobilier
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Immobilier
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     * @return Immobilier
     */
    public function setSurface($surface) {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return integer 
     */
    public function getSurface() {
        return $this->surface;
    }

    /**
     * Set pieces
     *
     * @param integer $pieces
     * @return Immobilier
     */
    public function setPieces($pieces) {
        $this->pieces = $pieces;

        return $this;
    }

    /**
     * Get pieces
     *
     * @return integer 
     */
    public function getPieces() {
        return $this->pieces;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Immobilier
     */
    public function setLieu($lieu) {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu() {
        return $this->lieu;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Immobilier
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Immobilier
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set category
     *
     * @param array $category
     * @return Immobilier
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return array 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Immobilier
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Immobilier
     */
    public function setCreateAt($createAt) {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt() {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Immobilier
     */
    public function setUpdateAt($updateAt) {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt() {
        return $this->updateAt;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createAt = new \Datetime;
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
    }
    
    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return Immobilier
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
     * @param \G5\ProjetBundle\Entity\ImmobilierImages $photos
     * @return Immobilier
     */
    public function addPhoto(\G5\ProjetBundle\Entity\ImmobilierImages $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \G5\ProjetBundle\Entity\ImmobilierImages $photos
     */
    public function removePhoto(\G5\ProjetBundle\Entity\ImmobilierImages $photos)
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
     * Add reponses
     *
     * @param \G5\ProjetBundle\Entity\ImmobilierReponse $reponses
     * @return Immobilier
     */
    public function addReponse(\G5\ProjetBundle\Entity\ImmobilierReponse $reponses)
    {
        $this->reponses[] = $reponses;
    
        return $this;
    }

    /**
     * Remove reponses
     *
     * @param \G5\ProjetBundle\Entity\ImmobilierReponse $reponses
     */
    public function removeReponse(\G5\ProjetBundle\Entity\ImmobilierReponse $reponses)
    {
        $this->reponses->removeElement($reponses);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponses()
    {
        return $this->reponses;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Immobilier
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
}