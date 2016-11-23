<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="car")
*/
class Car{
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    
    /**
    * @ORM\Column(type="string", length=65)
    */
    private $marka;
    
    
    /**
    * @ORM\Column(type="string", length=65)
    */
    private $model;

    /**
    * @ORM\Column(type="string", length=65, unique=true)
    */
    private $nrRejestracyjny;
    
    /**
    * * @ORM\Column(type="integer")
    */
    private $rokProd;
    
    /**
    * * @ORM\Column(type="integer")
    */
    private $przebieg;
    
    /**
    * * @ORM\Column(type="text")
    */
    private $rodzSilnika;
    
    /**
    * * @ORM\Column(type="float")
    */
    private $pojSilnika;

    

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
     * Set marka
     *
     * @param string $marka
     * @return Car
     */
    public function setMarka($marka)
    {
        $this->marka = $marka;

        return $this;
    }

    /**
     * Get marka
     *
     * @return string 
     */
    public function getMarka()
    {
        return $this->marka;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set nrRejestracyjny
     *
     * @param string $nrRejestracyjny
     * @return Car
     */
    public function setNrRejestracyjny($nrRejestracyjny)
    {
        $this->nrRejestracyjny = $nrRejestracyjny;

        return $this;
    }

    /**
     * Get nrRejestracyjny
     *
     * @return string 
     */
    public function getNrRejestracyjny()
    {
        return $this->nrRejestracyjny;
    }

    /**
     * Set rokProd
     *
     * @param integer $rokProd
     * @return Car
     */
    public function setRokProd($rokProd)
    {
        $this->rokProd = $rokProd;

        return $this;
    }

    /**
     * Get rokProd
     *
     * @return integer 
     */
    public function getRokProd()
    {
        return $this->rokProd;
    }

    /**
     * Set przebieg
     *
     * @param integer $przebieg
     * @return Car
     */
    public function setPrzebieg($przebieg)
    {
        $this->przebieg = $przebieg;

        return $this;
    }

    /**
     * Get przebieg
     *
     * @return integer 
     */
    public function getPrzebieg()
    {
        return $this->przebieg;
    }

    /**
     * Set rodzSilnika
     *
     * @param string $rodzSilnika
     * @return Car
     */
    public function setRodzSilnika($rodzSilnika)
    {
        $this->rodzSilnika = $rodzSilnika;

        return $this;
    }

    /**
     * Get rodzSilnika
     *
     * @return string 
     */
    public function getRodzSilnika()
    {
        return $this->rodzSilnika;
    }

    /**
     * Set pojSilnika
     *
     * @param float $pojSilnika
     * @return Car
     */
    public function setPojSilnika($pojSilnika)
    {
        $this->pojSilnika = $pojSilnika;

        return $this;
    }

    /**
     * Get pojSilnika
     *
     * @return float 
     */
    public function getPojSilnika()
    {
        return $this->pojSilnika;
    }
}
