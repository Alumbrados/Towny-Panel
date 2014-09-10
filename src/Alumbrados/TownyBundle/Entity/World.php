<?php

namespace Alumbrados\TownyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * World
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Alumbrados\TownyBundle\Entity\WorldRepository")
 */
class World
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
     * @ORM\OneToMany(targetEntity="Town", mappedBy="world")   
     */
    private $towns;


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
     * Constructor
     */
    public function __construct()
    {
        $this->towns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add towns
     *
     * @param \Alumbrados\TownyBundle\Entity\Town $towns
     * @return World
     */
    public function addTown(\Alumbrados\TownyBundle\Entity\Town $towns)
    {
        $this->towns[] = $towns;

        return $this;
    }

    /**
     * Remove towns
     *
     * @param \Alumbrados\TownyBundle\Entity\Town $towns
     */
    public function removeTown(\Alumbrados\TownyBundle\Entity\Town $towns)
    {
        $this->towns->removeElement($towns);
    }

    /**
     * Get towns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTowns()
    {
        return $this->towns;
    }
}
