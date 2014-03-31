<?php

namespace G5\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobs
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="G5\ProjetBundle\Entity\JobsRepository")
 */
class Jobs {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="G5\ProjetBundle\Entity\JobCategory")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text")
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="text")
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="text")
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="contrat", type="string", length=255)
     */
    private $contrat;

    /**
     * @var string
     *
     * @ORM\Column(name="debut", type="string", length=255)
     */
    private $debut;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=255)
     */
    private $secteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="remuneration", type="string", length=255, nullable=true)
     */
    private $remuneration;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="text")
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="autres", type="text")
     */
    private $autres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;
    
    /**
     * @ORM\OneToMany(targetEntity="JobPostulat", mappedBy="job")
     */
    protected $postulats;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set category
     *
     * @param \G5\ProjetBundle\Entity\Category $category
     * @return Annonces
     */
    public function setCategory(\G5\ProjetBundle\Entity\JobCategory $category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \G5\ProjetBundle\Entity\JobCategory 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Jobs
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
     * Set titre
     *
     * @param string $titre
     * @return Jobs
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
     * Set presentation
     *
     * @param string $presentation
     * @return Jobs
     */
    public function setPresentation($presentation) {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation() {
        return $this->presentation;
    }

    /**
     * Set mission
     *
     * @param string $mission
     * @return Jobs
     */
    public function setMission($mission) {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return string 
     */
    public function getMission() {
        return $this->mission;
    }

    /**
     * Set profil
     *
     * @param string $profil
     * @return Jobs
     */
    public function setProfil($profil) {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil() {
        return $this->profil;
    }

    /**
     * Set contrat
     *
     * @param array $contrat
     * @return Jobs
     */
    public function setContrat($contrat) {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * Get contrat
     *
     * @return array 
     */
    public function getContrat() {
        return $this->contrat;
    }

    /**
     * Set debut
     *
     * @param string $debut
     * @return Jobs
     */
    public function setDebut($debut) {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return string 
     */
    public function getDebut() {
        return $this->debut;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Jobs
     */
    public function setRegion($region) {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion() {
        return $this->region;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Jobs
     */
    public function setPays($pays) {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays() {
        return $this->pays;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     * @return Jobs
     */
    public function setSecteur($secteur) {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string 
     */
    public function getSecteur() {
        return $this->secteur;
    }

    /**
     * Set remuneration
     *
     * @param string $remuneration
     * @return Jobs
     */
    public function setRemuneration($remuneration) {
        $this->remuneration = $remuneration;

        return $this;
    }

    /**
     * Get remuneration
     *
     * @return string 
     */
    public function getRemuneration() {
        return $this->remuneration;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Jobs
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Jobs
     */
    public function setContact($contact) {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set autres
     *
     * @param string $autres
     * @return Jobs
     */
    public function setAutres($autres) {
        $this->autres = $autres;

        return $this;
    }

    /**
     * Get autres
     *
     * @return string 
     */
    public function getAutres() {
        return $this->autres;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Annonces
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


    protected function getUploadDir() {
        return 'jobs/';
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
        $nom = $this->auteur->getUsername() . '_' . $nom = $this->vehiculeId . date("YmdHis") . '.' . $this->photo->guessExtension();
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


    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Jobs
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postulats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \Datetime;
        $this->expireAt = new \Datetime;
        $this->isActive = 1;
    }
    
    /**
     * Add postulats
     *
     * @param \G5\ProjetBundle\Entity\JobPostulat $postulats
     * @return Jobs
     */
    public function addPostulat(\G5\ProjetBundle\Entity\JobPostulat $postulats)
    {
        $this->postulats[] = $postulats;
    
        return $this;
    }

    /**
     * Remove postulats
     *
     * @param \G5\ProjetBundle\Entity\JobPostulat $postulats
     */
    public function removePostulat(\G5\ProjetBundle\Entity\JobPostulat $postulats)
    {
        $this->postulats->removeElement($postulats);
    }

    /**
     * Get postulats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostulats()
    {
        return $this->postulats;
    }
}