<?php

namespace Media\VideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlbumVideo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\VideoBundle\Entity\AlbumVideoRepository")
 */
class AlbumVideo {

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
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creatAt", type="datetime")
     */
    private $creatAt;

    /**
     * @ORM\OneToMany(targetEntity="Videos", mappedBy="album")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $videos;

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
     * @return AlbumVideo
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
     * Set auteur
     *
     * @param string $auteur
     * @return AlbumVideo
     */
    public function setAuteur($auteur) {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur() {
        return $this->auteur;
    }

    /**
     * Set creatAt
     *
     * @param \DateTime $creatAt
     * @return AlbumVideo
     */
    public function setCreatAt($creatAt) {
        $this->creatAt = $creatAt;

        return $this;
    }

    /**
     * Get creatAt
     *
     * @return \DateTime 
     */
    public function getCreatAt() {
        return $this->creatAt;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creatAt = new \Datetime;
    }

    /**
     * Add videos
     *
     * @param \Media\VideoBundle\Entity\Videos $videos
     * @return AlbumVideo
     */
    public function addVideo(\Media\VideoBundle\Entity\Videos $videos) {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \Media\VideoBundle\Entity\Videos $videos
     */
    public function removeVideo(\Media\VideoBundle\Entity\Videos $videos) {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos() {
        return $this->videos;
    }

}