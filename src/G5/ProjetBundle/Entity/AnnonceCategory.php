<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnnonceCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\AnnonceCategoryRepository")
 */
class AnnonceCategory {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Annonce", mappedBy="annonceCategory")
     */
    protected $annonces;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * Set nom
     *
     * @param string $nom
     * @return AnnonceCategory
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AnnonceCategory
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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return AnnonceCategory
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
     * @return AnnonceCategory
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
     * Add annonces
     *
     * @param \G5\ProjetBundle\Entity\Annonce $annonces
     * @return AnnonceCategory
     */
    public function addAnnonce(\G5\ProjetBundle\Entity\Annonce $annonces) {
        $this->annonces[] = $annonces;

        return $this;
    }

    /**
     * Remove annonces
     *
     * @param \G5\ProjetBundle\Entity\Annonce $annonces
     */
    public function removeAnnonce(\G5\ProjetBundle\Entity\Annonce $annonces) {
        $this->annonces->removeElement($annonces);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonces() {
        return $this->annonces;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->annonces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
    }

}