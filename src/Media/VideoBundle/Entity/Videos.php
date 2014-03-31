<?php

namespace Media\VideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\VideoBundle\Entity\VideosRepository")
 */
class Videos
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255)
     */
    private $video;

   /**
     * @ORM\ManyToOne(targetEntity="AlbumVideo")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $album;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer")
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creatAt", type="datetime")
     */
    private $creatAt;


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
     * @return Videos
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
     * Set video
     *
     * @param string $video
     * @return Videos
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set album
     *
     * @param string $album
     * @return Videos
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return string 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Videos
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return Videos
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set creatAt
     *
     * @param \DateTime $creatAt
     * @return Videos
     */
    public function setCreatAt($creatAt)
    {
        $this->creatAt = $creatAt;
    
        return $this;
    }

    /**
     * Get creatAt
     *
     * @return \DateTime 
     */
    public function getCreatAt()
    {
        return $this->creatAt;
    }
     public function __construct() {
        $this->creatAt = new \Datetime;
        $this->active = 1;
    }
    
    protected function getUploadDir() {
        return 'albumVideos/';
    }

//    protected function getUploadDirSmall() {
//        return 'albums/small_'.$this->album->getName();
//    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

//    protected function getUploadRootDirSmall() {
//        return __DIR__ . '/../../../../web/' . $this->getUploadDirSmall();
//    }

    public function getWebPath() {
        return null === $this->video ? null : $this->getUploadDir() . '/' . $this->video;
    }

//    public function getWebPathSmall() {
//        return null === $this->photo ? null : $this->getUploadDirSmall() . '/' . $this->photo;
//    }

    public function getAbsolutePath() {
        return null === $this->video ? null : $this->getUploadRootDir() . $this->video;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->video) {
            // faites ce que vous voulez pour générer un nom unique
            $this->video = sha1(uniqid(mt_rand(), true)) . '.' . $this->video->guessExtension();
        }
    }

    public function upload() {
        // la propriété « photo » peut être vide si le champ n'est pas requis
        if (null === $this->video) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité
        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $nom = $this->auteur->getUsername(). $this->id . '_' . date("YmdHis") . '.' . $this->video->guessExtension();
        $this->video->move($this->getUploadRootDir(), $nom);
        $this->video = $nom;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Videos
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
}