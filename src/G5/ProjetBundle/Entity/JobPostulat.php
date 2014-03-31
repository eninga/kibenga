<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobPostulat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\JobPostulatRepository")
 */
class JobPostulat {

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
     * @ORM\ManyToOne(targetEntity="Jobs")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="lm", type="string", length=255)
     */
    private $lm;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilite", type="string", length=255)
     */
    private $disponibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recrute", type="boolean")
     */
    private $recrute;

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
     * Set cv
     *
     * @param string $cv
     * @return JobPostulat
     */
    public function setCv($cv) {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv() {
        return $this->cv;
    }

    /**
     * Set lm
     *
     * @param string $lm
     * @return JobPostulat
     */
    public function setLm($lm) {
        $this->lm = $lm;

        return $this;
    }

    /**
     * Get lm
     *
     * @return string 
     */
    public function getLm() {
        return $this->lm;
    }

    /**
     * Set disponibilite
     *
     * @param string $disponibilite
     * @return JobPostulat
     */
    public function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return string 
     */
    public function getDisponibilite() {
        return $this->disponibilite;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return JobPostulat
     */
    public function setTel($tel) {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel() {
        return $this->tel;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return JobPostulat
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
     * Set recrute
     *
     * @param boolean $recrute
     * @return JobPostulat
     */
    public function setRecrute($recrute) {
        $this->recrute = $recrute;

        return $this;
    }

    /**
     * Get recrute
     *
     * @return boolean 
     */
    public function getRecrute() {
        return $this->recrute;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return JobPostulat
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
     * Set auteur
     *
     * @param \Media\UserBundle\Entity\User $auteur
     * @return JobPostulat
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

    /**
     * Set job
     *
     * @param \G5\ProjetBundle\Entity\Jobs $job
     * @return JobPostulat
     */
    public function setJob(\G5\ProjetBundle\Entity\Jobs $job) {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \G5\ProjetBundle\Entity\Jobs 
     */
    public function getJob() {
        return $this->job;
    }

    public function __construct() {
        $this->createAt = new \Datetime;
        $this->isActive = 1;
        $this->recrute = 0;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return JobPostulat
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage() {
        return $this->message;
    }

    protected function getUploadDir() {
        return 'jobs/';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPathCv() {
        return null === $this->cv ? null : $this->getUploadDir() . '/' . $this->cv;
    }

    public function getAbsolutePathCv() {
        return null === $this->cv ? null : $this->getUploadRootDir() . $this->cv;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadCv() {
        if (null !== $this->cv) {
            // faites ce que vous voulez pour générer un nom unique
            $this->cv = sha1(uniqid(mt_rand(), true)) . '.' . $this->cv->guessExtension();
        }
    }

    public function uploadCv() {
        if (null === $this->cv) {
            return;
        }
        $nom = "cv_" . $this->auteur->getUsername() . "_" . $this->job->getId() . '_' . date("YmdHis") . '.' . $this->cv->guessExtension();
        $this->cv->move($this->getUploadRootDir(), $nom);

        $this->cv = $nom;
    }

//    protected function getUploadRootDirSmall() {
//        return __DIR__ . '/../../../../web/small_' . $this->getUploadDirSmall();
//    }

    public function getWebPathLm() {
        return null === $this->lm ? null : $this->getUploadDir() . '/' . $this->lm;
    }

//    public function getWebPathSmall() {
//        return null === $this->lm ? null : $this->getUploadDirSmall() . '/' . $this->lm;
//    }

    public function getAbsolutePathLm() {
        return null === $this->lm ? null : $this->getUploadRootDir() . $this->lm;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadLm() {
        if (null !== $this->lm) {
            // faites ce que vous voulez pour générer un nom unique
            $this->lm = sha1(uniqid(mt_rand(), true)) . '.' . $this->lm->guessExtension();
        }
    }

    public function uploadLm() {
        // la propriété « lm » peut être vide si le champ n'est pas requis
        if (null === $this->lm) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité
        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        $nom = "lm_" . $this->auteur->getUsername() . "_" . $this->job->getId() . '_' . date("YmdHis") . '.' . $this->lm->guessExtension();
        $this->lm->move($this->getUploadRootDir(), $nom);


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
        // définit la propriété « path 'ici lm toujours' » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->lm = $nom;
    }

}