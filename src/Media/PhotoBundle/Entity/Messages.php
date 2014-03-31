<?php

namespace Media\PhotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Media\PhotoBundle\Entity\MessagesRepository")
 */
class Messages {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="lu", type="integer")
     */
    private $read;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="text")
     */
    private $objet;
    /**
     * @var string
     *
     * @ORM\Column(name="messages", type="text")
     */
    private $messages;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity="Media\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $destinataire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sent", type="datetime")
     */
    private $dateSent;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set messages
     *
     * @param string $messages
     * @return Messages
     */
    public function setMessages($messages) {
        $this->messages = $messages;

        return $this;
    }

    /**
     * Get messages
     *
     * @return string 
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Messages
     */
    public function setSource($source) {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource() {
        return $this->source;
    }

    /**
     * Set destinataire
     *
     * @param string $destinataire
     * @return Messages
     */
    public function setDestinataire($destinataire) {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return string
     */
    public function getDestinataire() {
        return $this->destinataire;
    }

    /**
     * Set dateSent
     *
     * @param \DateTime $dateSent
     * @return Messages
     */
    public function setDateSent($dateSent) {
        $this->dateSent = $dateSent;

        return $this;
    }

    /**
     * Get dateSent
     *
     * @return \DateTime 
     */
    public function getDateSent() {
        return $this->dateSent;
    }

    public function __construct() {
        $this->dateSent = new \Datetime;
        $this->read = 0;
    }


    /**
     * Set read
     *
     * @param integer $read
     * @return Messages
     */
    public function setRead($read)
    {
        $this->read = $read;
    
        return $this;
    }

    /**
     * Get read
     *
     * @return integer 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set objet
     *
     * @param string $objet
     * @return Messages
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    
        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }
}