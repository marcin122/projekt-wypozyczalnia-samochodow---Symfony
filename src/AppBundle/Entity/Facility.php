<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="facility")
*/
class Facility{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */   
    private $id;
    
    /**
    * @ORM\Column(type="string", length=80)
    */   
    private $name;
    
    /**
    * @ORM\Column(type="integer")
    */   
    private $price;
    
    /**
    * @ORM\OneToMany(targetEntity="OrderCar", mappedBy="facility", cascade={"persist"})
    */
    private $orderFacility;
    
    public function __construct(){
        $this->orderFacility=new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Facility
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
     * Set price
     *
     * @param integer $price
     * @return Facility
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add orderFacility
     *
     * @param \AppBundle\Entity\Order $orderFacility
     * @return Facility
     */
    public function addOrderFacility(\AppBundle\Entity\OrderCar $orderFacility)
    {
        $this->orderFacility[] = $orderFacility;

        return $this;
    }

    /**
     * Remove orderFacility
     *
     * @param \AppBundle\Entity\Order $orderFacility
     */
    public function removeOrderFacility(\AppBundle\Entity\OrderCar $orderFacility)
    {
        $this->orderFacility->removeElement($orderFacility);
    }

    /**
     * Get orderFacility
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderFacility()
    {
        return $this->orderFacility;
    }
}
