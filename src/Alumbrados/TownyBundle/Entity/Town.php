<?php

namespace Alumbrados\TownyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * World
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Alumbrados\TownyBundle\Entity\TownRepository")
 */
class Town
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
     * @ORM\ManyToOne(targetEntity="World", inversedBy="towns")
     * @ORM\JoinColumn(name="world_id", referencedColumnName="id")
     */     
    private $world;
    
    /**
     * @ORM\OneToOne(targetEntity="Resident", inversedBy="mayor_of")
     * @ORM\JoinColumn(name="mayor_id", referencedColumnName="id", nullable=false)
     */     
    private $mayor;  
    
    /**
     * @ORM\OneToMany(targetEntity="Resident", mappedBy="town")   
     */
    private $residents;    


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
     * Set world
     *
     * @param \Alumbrados\TownyBundle\Entity\World $world
     * @return Town
     */
    public function setWorld(\Alumbrados\TownyBundle\Entity\World $world = null)
    {
        $this->world = $world;

        return $this;
    }

    /**
     * Get world
     *
     * @return \Alumbrados\TownyBundle\Entity\World 
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * Set mayor
     *
     * @param \Alumbrados\TownyBundle\Entity\Resident $mayor
     * @return Town
     */
    public function setMayor(\Alumbrados\TownyBundle\Entity\Resident $mayor = null)
    {
        $this->mayor = $mayor;

        return $this;
    }

    /**
     * Get mayor
     *
     * @return \Alumbrados\TownyBundle\Entity\Resident 
     */
    public function getMayor()
    {
        return $this->mayor;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->residents = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add residents
     *
     * @param \Alumbrados\TownyBundle\Entity\Resident $residents
     * @return Town
     */
    public function addResident(\Alumbrados\TownyBundle\Entity\Resident $residents)
    {
        $this->residents[] = $residents;

        return $this;
    }

    /**
     * Remove residents
     *
     * @param \Alumbrados\TownyBundle\Entity\Resident $residents
     */
    public function removeResident(\Alumbrados\TownyBundle\Entity\Resident $residents)
    {
        $this->residents->removeElement($residents);
    }

    /**
     * Get residents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResidents()
    {
        return $this->residents;
    }
}
