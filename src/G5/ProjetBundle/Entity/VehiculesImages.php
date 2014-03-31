<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculesImages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\VehiculesImagesRepository")
 */
class VehiculesImages {

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
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="text")
     */
    private $alt;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return VehiculesImages
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

    /**
     * Set alt
     *
     * @param string $alt
     * @return VehiculesImages
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
     * Set isActive
     *
     * @param integer $isActive
     * @return VehiculesImages
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return VehiculesImages
     */
    public function setCeateAt($createAt) {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCeateAt() {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return VehiculesImages
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
     * Set vehicule
     *
     * @param \G5\ProjetBundle\Entity\Vehicules $vehicule
     * @return VehiculesImages
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

    protected function getUploadDir() {
        return 'annonces/vehicules/';
    }

//    protected function getUploadDirSmall() {
//        return 'vehicules/;
//    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

//    protected function getUploadRootDirSmall() {
//        return __DIR__ . '/../../../../web/small_' . $this->getUploadDirSmall();
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
        $nom = $this->vehicule->getAuteur()->getUsername()."_".$this->vehicule->getId() . '_' . date("YmdHis") . '.' . $this->photo->guessExtension();
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
        $this->createAt = new \Datetime;
        $this->updateAt = new \Datetime;
        $this->isActive = 1;
    }


    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return VehiculesImages
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
}