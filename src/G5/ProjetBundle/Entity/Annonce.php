<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\AnnonceRepository")
 */
class Annonce {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="closed", type="integer")
     */
    private $closed;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="AnnonceCategory")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $annonceCategory;

    /**
     * @ORM\OneToMany(targetEntity="AnnonceImages", mappedBy="annonce")
     */
    protected $photos;

    /**
     * @ORM\OneToMany(targetEntity="AnnonceReponse", mappedBy="annonce")
     */
    protected $reponses;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @var integer
     *
     * @ORM\Column(name="surface", type="integer", nullable=true)
     */
    private $surface;

    /**
     * @var integer
     *
     * @ORM\Column(name="pieces", type="integer", nullable=true)
     */
    private $pieces;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="energie", type="string", length=255, nullable=true)
     */
    private $energie;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=255, nullable=true)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="km", type="string", length=255, nullable=true)
     */
    private $km;

    /**
     * @var string
     *
     * @ORM\Column(name="places", type="string", length=255, nullable=true)
     */
    private $places;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="text")
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptions", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;

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
     * @return Vehicules
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
     * Set type
     *
     * @param string $type
     * @return Vehicules
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
     * Set marque
     *
     * @param string $marque
     * @return Vehicules
     */
    public function setMarque($marque) {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string 
     */
    public function getMarque() {
        return $this->marque;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Vehicules
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Vehicules
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set energie
     *
     * @param string $energie
     * @return Vehicules
     */
    public function setEnergie($energie) {
        $this->energie = $energie;

        return $this;
    }

    /**
     * Get energie
     *
     * @return string 
     */
    public function getEnergie() {
        return $this->energie;
    }

    /**
     * Set annee
     *
     * @param string $annee
     * @return Vehicules
     */
    public function setAnnee($annee) {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string 
     */
    public function getAnnee() {
        return $this->annee;
    }

    /**
     * Set km
     *
     * @param string $km
     * @return Vehicules
     */
    public function setKm($km) {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return string 
     */
    public function getKm() {
        return $this->km;
    }

    /**
     * Set places
     *
     * @param string $places
     * @return Vehicules
     */
    public function setPlaces($places) {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return string 
     */
    public function getPlaces() {
        return $this->places;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Vehicules
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
     * Set contact
     *
     * @param string $contact
     * @return Vehicules
     */
    public function setContact($contact) {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Vehicules
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Annonces
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return Vehicules
     */
    public function setAuteur($auteur) {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \Media\UserBundle\Entity\User 
     */
    public function getAuteur() {
        return $this->auteur;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Vehicules
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
     * Set isActive
     *
     * @param integer $isActive
     * @return Vehicules
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
     * Add photos
     *
     * @param \G5\ProjetBundle\Entity\VehiculesImages $photos
     * @return Vehicules
     */
    public function addPhoto(\G5\ProjetBundle\Entity\VehiculesImages $photos) {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \G5\ProjetBundle\Entity\VehiculesImages $photos
     */
    public function removePhoto(\G5\ProjetBundle\Entity\VehiculesImages $photos) {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos() {
        return $this->photos;
    }

    /**
     * Constructor
     */

    /**
     * Add reponses
     *
     * @param \G5\ProjetBundle\Entity\VehiculeReponse $reponses
     * @return Vehicules
     */
    public function addReponse(\G5\ProjetBundle\Entity\VehiculeReponse $reponses) {
        $this->reponses[] = $reponses;

        return $this;
    }

    /**
     * Remove reponses
     *
     * @param \G5\ProjetBundle\Entity\VehiculeReponse $reponses
     */
    public function removeReponse(\G5\ProjetBundle\Entity\VehiculeReponse $reponses) {
        $this->reponses->removeElement($reponses);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponses() {
        return $this->reponses;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \Datetime;
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
        $this->closed = 0;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Vehicules
     */
    public function setCategory($category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set closed
     *
     * @param integer $closed
     * @return Annonce
     */
    public function setClosed($closed) {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return integer 
     */
    public function getClosed() {
        return $this->closed;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     * @return Annonce
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
     * @return Annonce
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
     * Set annonceCategory
     *
     * @param \G5\ProjetBundle\Entity\AnnonceCategory $annonceCategory
     * @return Annonce
     */
    public function setAnnonceCategory(\G5\ProjetBundle\Entity\AnnonceCategory $annonceCategory) {
        $this->annonceCategory = $annonceCategory;

        return $this;
    }

    /**
     * Get annonceCategory
     *
     * @return \G5\ProjetBundle\Entity\AnnonceCategory 
     */
    public function getAnnonceCategory() {
        return $this->annonceCategory;
    }

}