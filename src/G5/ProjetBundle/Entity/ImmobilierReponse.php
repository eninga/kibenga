<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImmobilierReponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\ImmobilierReponseRepository")
 */
class ImmobilierReponse
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
     * @ORM\ManyToOne(targetEntity="Immobilier")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $immobilier;
    
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     * @return ImmobilierReponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    
        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return ImmobilierReponse
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
     * Set immobilier
     *
     * @param \G5\ProjetBundle\Entity\Immobilier $immobilier
     * @return ImmobilierReponse
     */
    public function setImmobilier(\G5\ProjetBundle\Entity\Immobilier $immobilier)
    {
        $this->immobilier = $immobilier;
    
        return $this;
    }

    /**
     * Get immobilier
     *
     * @return \G5\ProjetBundle\Entity\Immobilier 
     */
    public function getImmobilier()
    {
        return $this->immobilier;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return ImmobilierReponse
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
     public function __construct() {
        $this->createAt = new \Datetime;
    }
}