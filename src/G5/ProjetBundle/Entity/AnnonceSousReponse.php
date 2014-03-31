<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnnonceSousReponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\AnnonceSousReponseRepository")
 */
class AnnonceSousReponse {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AnnonceReponse")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $annonceReponse;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="text")
     */
    private $reponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     * @return AnnonceSousReponse
     */
    public function setReponse($reponse) {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse() {
        return $this->reponse;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AnnonceSousReponse
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
     * Set annonceReponse
     *
     * @param \G5\ProjetBundle\Entity\AnnonceReponse $annonceReponse
     * @return AnnonceSousReponse
     */
    public function setAnnonceReponse(\G5\ProjetBundle\Entity\AnnonceReponse $annonceReponse) {
        $this->annonceReponse = $annonceReponse;

        return $this;
    }

    /**
     * Get annonceReponse
     *
     * @return \G5\ProjetBundle\Entity\AnnonceReponse 
     */
    public function getAnnonceReponse() {
        return $this->annonceReponse;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return AnnonceSousReponse
     */
    public function setAuteur(\Media\UserBundle\Entity\User $auteur) {
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

    public function __construct() {
        $this->createdAt = new \Datetime;
    }

}