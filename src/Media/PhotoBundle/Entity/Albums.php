<?php

namespace Media\PhotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albums
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\PhotoBundle\Entity\AlbumsRepository")
 */
class Albums {

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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     * @return Albums
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @ORM\OneToMany(targetEntity="Pictures", mappedBy="album")
     */
    protected $photos;

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Albums
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
     * Add photos
     *
     * @param \Media\PhotoBundle\Entity\Pictures $photos
     * @return Albums
     */
    public function addPhoto(\Media\PhotoBundle\Entity\Pictures $photos) {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Media\PhotoBundle\Entity\Pictures $photos
     */
    public function removePhoto(\Media\PhotoBundle\Entity\Pictures $photos) {
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
    public function __construct() {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \Datetime;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return Albums
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

}