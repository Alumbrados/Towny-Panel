<?php

namespace Alumbrados\TownyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Alumbrados\TownyBundle\Entity\PlayerRepository")
 */
class Player
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
     * @ORM\Column(name="name", type="string", length=32)
     */
    private $name;
    

    /**
     * @var string
     *
     * @ORM\Column(name="uuid", type="string", length=255)
     */
    private $uuid;
    
    /**
     * @ORM\OneToOne(targetEntity="Resident", inversedBy="player")
     * @ORM\JoinColumn(name="resident_id", referencedColumnName="id")
     */     
    private $resident;       

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
     * Set name
     *
     * @param string $name
     * @return World
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     * @return Player
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set resident
     *
     * @param \Alumbrados\TownyBundle\Entity\Resident $resident
     * @return Player
     */
    public function setResident(\Alumbrados\TownyBundle\Entity\Resident $resident = null)
    {
        $this->resident = $resident;

        return $this;
    }

    /**
     * Get resident
     *
     * @return \Alumbrados\TownyBundle\Entity\Resident 
     */
    public function getResident()
    {
        return $this->resident;
    }
}
