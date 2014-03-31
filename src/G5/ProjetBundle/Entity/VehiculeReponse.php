<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculeReponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\VehiculeReponseRepository")
 */
class VehiculeReponse {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Vehicules")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $vehicule;

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
     * @return VehiculeReponse
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
     * @return VehiculeReponse
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
     * Set vehicule
     *
     * @param \G5\ProjetBundle\Entity\Vehicules $vehicule
     * @return VehiculeReponse
     */
    public function setVehicule(\G5\ProjetBundle\Entity\Vehicules $vehicule) {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return \G5\ProjetBundle\Entity\Vehicules 
     */
    public function getVehicule() {
        return $this->vehicule;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return VehiculeReponse
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

}