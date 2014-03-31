<?php

namespace Media\PhotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlbumViewers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\PhotoBundle\Entity\AlbumViewersRepository")
 */
class AlbumViewers
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
     * @ORM\ManyToOne(targetEntity="Media\PhotoBundle\Entity\Albums")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $album;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $user;
    
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
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set album
     *
     * @param string $album
     * @return AlbumViewers
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \Media\PhotoBundle\Entity\Albums 
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return AlbumViewers
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Media\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
     public function __construct() {
        $this->isActive = 0;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return AlbumViewers
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
}