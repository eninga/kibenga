<?php

namespace Media\PhotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pictures
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\PhotoBundle\Entity\PicturesRepository")
 */
class Pictures {

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
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="Albums")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $album;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creatAt", type="datetime")
     */
    private $creatAt;

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
     * @return Pictures
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
     * Set alt
     *
     * @param string $alt
     * @return Pictures
     */
    public function setAlt($alt) {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt() {
        return $this->alt;
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
     * Set album
     *
     * @param string $album
     * @return Pictures
     */
    public function setAlbum($album) {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return string 
     */
    public function getAlbum() {
        return $this->album;
    }

    /**
     * Set creatAt
     *
     * @param \DateTime $creatAt
     * @return Pictures
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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Pictures
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
     * @return Pictures
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
     * Set photo
     *
     * @param string $photo
     * @return Annonces
     */
    public function setPhoto($photo) {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto() {
        return $this->photo;
    }

    protected function getUploadDir() {
        return 'albums/';
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
        return null === $this->photo ? null : $this->getUploadDir() . '/' . $this->photo;
    }

//    public function getWebPathSmall() {
//        return null === $this->photo ? null : $this->getUploadDirSmall() . '/' . $this->photo;
//    }

    public function getAbsolutePath() {
        return null === $this->photo ? null : $this->getUploadRootDir() . $this->photo;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->photo) {
            // faites ce que vous voulez pour générer un nom unique
            $this->photo = sha1(uniqid(mt_rand(), true)) . '.' . $this->photo->guessExtension();
        }
    }

    public function upload() {
        // la propriété « photo » peut être vide si le champ n'est pas requis
        if (null === $this->photo) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité
        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $nom = $this->auteur->getUsername() . $this->id . '_' . date("YmdHis") . '.' . $this->photo->guessExtension();
        $this->photo->move($this->getUploadRootDir(), $nom);


//        $name_small = $this->getUploadRootDirSmall() . '/' . $nom; //$name
//        $nom_origine = $this->getUploadRootDir() . '/' . $nom;
//        copy($nom_origine, $name_small);
//        $info = getimagesize($nom_origine);
//        if (!$info)
//            return false;
//        $srcjpg = @imagecreatefromjpeg($nom_origine);
//        $srcpng = @imagecreatefrompng($nom_origine);
//        $srcgif = @imagecreatefromgif($nom_origine);
//        if (!$srcgif && !$srcjpg && !$srcpng)
//            return false;
//        $tmp = @imagecreatetruecolor(70, 50);
//        if ($srcjpg) {
//            imagecopyresampled($tmp, $srcjpg, 0, 0, 0, 0, 70, 50, $info[0], $info[1]);
//            imagejpeg($tmp, $name_small, 200);
//            imagedestroy($srcjpg);
//            imagedestroy($tmp);
//        }
//        if ($srcgif) {
//            imagecopyresampled($tmp, $srcgif, 0, 0, 0, 0, 70, 50, $info[0], $info[1]);
//            imagegif($tmp, $name_small);
//            imagedestroy($srcgif);
//            imagedestroy($tmp);
//        }
//        if ($srcpng) {
//            imagecopyresampled($tmp, $srcpng, 0, 0, 0, 0, 70, 50, $info[0], $info[1]);
//            imagepng($tmp, $name_small);
//            imagedestroy($srcpng);
//            imagedestroy($tmp);
//        }
        // définit la propriété « path 'ici photo toujours' » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->photo = $nom;
    }

    public function __construct() {
        $this->creatAt = new \Datetime;
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
    }

    /**
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return Pictures
     */
    public function setAuteur($auteur) {
        $this->auteur = $auteur;

        return $this;
    }

}