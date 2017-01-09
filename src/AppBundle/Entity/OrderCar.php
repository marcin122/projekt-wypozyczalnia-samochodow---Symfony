<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="orderCar")
*/
class OrderCar{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
    * @ORM\ManyToOne(targetEntity="Car", inversedBy="orderCar")
    * @ORM\JoinColumn(name="carId", referencedColumnName="id")
    */
    private $car;
    
    /**
    * @ORM\ManyToOne(targetEntity="Facility", inversedBy="orderFacility")
    * @ORM\JoinColumn(name="facilityId", referencedColumnName="id")
    */
    private $facility;
    
    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="orderUser")
    * @ORM\JoinColumn(name="userId", referencedColumnName="id")
    */
    private $user;
    
    public function __toString()
    {
        return (string)$this->id;
    }

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
     * Set car
     *
     * @param \AppBundle\Entity\Car $car
     * @return Order
     */
    public function setCar(\AppBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \AppBundle\Entity\Car 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set facility
     *
     * @param \AppBundle\Entity\Facility $facility
     * @return Order
     */
    public function setFacility(\AppBundle\Entity\Facility $facility = null)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * Get facility
     *
     * @return \AppBundle\Entity\Facility 
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Order
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
