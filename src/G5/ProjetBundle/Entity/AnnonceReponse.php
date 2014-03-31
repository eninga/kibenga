<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of AnnonceReponses
 *
 * @author eningabiye
 */

/**
 * AnnonceReponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\AnnonceReponseRepository")
 */
class AnnonceReponse {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $annonce;

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
     * @ORM\OneToMany(targetEntity="AnnonceSousReponse", mappedBy="annonceReponse")
     */
    protected $sousReponses;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

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
     * @return AnnonceReponse
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return AnnonceReponse
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
     * Set annonce
     *
     * @param \G5\ProjetBundle\Entity\Annonce $annonce
     * @return AnnonceReponse
     */
    public function setAnnonce(\G5\ProjetBundle\Entity\Annonce $annonce) {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \G5\ProjetBundle\Entity\Annonce 
     */
    public function getAnnonce() {
        return $this->annonce;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return AnnonceReponse
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
        $this->createAt = new \Datetime;
    }


    /**
     * Add sousReponses
     *
     * @param \G5\ProjetBundle\Entity\AnnonceSousReponse $sousReponses
     * @return AnnonceReponse
     */
    public function addSousReponse(\G5\ProjetBundle\Entity\AnnonceSousReponse $sousReponses)
    {
        $this->sousReponses[] = $sousReponses;
    
        return $this;
    }

    /**
     * Remove sousReponses
     *
     * @param \G5\ProjetBundle\Entity\AnnonceSousReponse $sousReponses
     */
    public function removeSousReponse(\G5\ProjetBundle\Entity\AnnonceSousReponse $sousReponses)
    {
        $this->sousReponses->removeElement($sousReponses);
    }

    /**
     * Get sousReponses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSousReponses()
    {
        return $this->sousReponses;
    }
}