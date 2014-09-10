<?php

namespace Alumbrados\TownyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * World
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Alumbrados\TownyBundle\Entity\ResidentRepository")
 */
class Resident
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
     * @ORM\Column(name="rank", type="string", length=255)
     */
    private $rank;
    
    /**
     * @ORM\OneToOne(targetEntity="Player", inversedBy="resident")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */     
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Town", inversedBy="residents")
     * @ORM\JoinColumn(name="town_id", referencedColumnName="id", unique=false)
     */     
    private $town;  
    
    /**
     * @ORM\OneToOne(targetEntity="Town", inversedBy="mayor")
     * @ORM\JoinColumn(name="town_id", referencedColumnName="id")
     */     
    private $mayor_of;    

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
     * Set rank
     *
     * @param string $rank
     * @return Resident
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set player
     *
     * @param \Alumbrados\TownyBundle\Entity\Player $player
     * @return Resident
     */
    public function setPlayer(\Alumbrados\TownyBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Alumbrados\TownyBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set town
     *
     * @param \Alumbrados\TownyBundle\Entity\Town $town
     * @return Resident
     */
    public function setTown(\Alumbrados\TownyBundle\Entity\Town $town = null)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return \Alumbrados\TownyBundle\Entity\Town 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set mayor_of
     *
     * @param \Alumbrados\TownyBundle\Entity\Town $mayorOf
     * @return Resident
     */
    public function setMayorOf(\Alumbrados\TownyBundle\Entity\Town $mayorOf = null)
    {
        $this->mayor_of = $mayorOf;

        return $this;
    }

    /**
     * Get mayor_of
     *
     * @return \Alumbrados\TownyBundle\Entity\Town 
     */
    public function getMayorOf()
    {
        return $this->mayor_of;
    }
}
