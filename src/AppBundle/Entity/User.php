<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="user")
*/
class User implements UserInterface, \Serializable
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    
    /**
    * @ORM\Column(type="string", length=65, unique=true)
    * @Assert\NotBlank()
    */
    private $login;
    
    /**
    * @ORM\Column(type="string", length=65, unique=true)
    * @Assert\Email(message = "Adres email nie jest poprawny", checkMX = true)
    */
    private $AdresEmail;
    
    /**
    * @ORM\Column(type="string", length=64)
    */
    private $haslo;
    
    /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    */
    private $imie;
    
    /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    */
    private $nazwisko;
    
    /**
    * @ORM\Column(type="string", length=11)
    * @Assert\NotBlank()
    * @Assert\Length(min=11, max=11)
    * @Assert\Regex("/[0-9]{11}/")
    */
    private $Pesel;
    
    /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    */
    private $ulica;
    
    /**
    * @ORM\Column(type="string", length=4)
    * @Assert\NotBlank()
    */
    private $nr_domu_nr_mieszkania;
    
    /**
    * @ORM\Column(type="string", length=6)
    * @Assert\NotBlank()
    * @Assert\Length(min=6, max=6)
    * @Assert\Regex("/[0-9]{2}-[0-9]{3}/")
    */
    private $kod_pocztowy;
    
    /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    */
    private $miasto;
    
    /**
    * @ORM\Column(type="string", length=65)
    * @Assert\NotBlank()
    */
    private $kraj;
    
    /**
    * @ORM\Column(type="string", length=9)
    * @Assert\Length(min=9, max=9)
    * @Assert\NotBlank()
    * @Assert\Regex("/[0-9]{9}/")
    */
    private $nr_telefonu;
    
    /**
    * @ORM\Column(name="is_active", type="boolean")
    */
    private $isActive;
    
    /**
    * @ORM\OneToMany(targetEntity="OrderCar", mappedBy="user")
    */
    private $orderUser;
    
    public function __construct()
    {
        $this->isActive=true;
        $this->orderUser=new ArrayCollection();
    
    }
    
    public function getUserName()
    {
        return $this->login;
    }
    
    public function getPassword()
    {
        return $this->haslo;
    }
    
    public function getSalt()
    {
        return null;
    }
    
    public function getRoles()
    {
        return array('ROLE_USER', 'ROLE_ADMIN');
    }
    
    public function eraseCredentials()
    {
        
    }    
    
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->AdresEmail,
            $this->haslo,
        ));
    }
    
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->AdresEmail,
            $this->haslo,
        )=unserialize($serialized);
    }
    
    /**
    * @Assert\NotBlank()
    * @Assert\Length(min=4, max=8)
    */
    private $plainPassword;

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
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
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set AdresEmail
     *
     * @param string $adresEmail
     * @return User
     */
    public function setAdresEmail($adresEmail)
    {
        $this->AdresEmail = $adresEmail;

        return $this;
    }

    /**
     * Get AdresEmail
     *
     * @return string 
     */
    public function getAdresEmail()
    {
        return $this->AdresEmail;
    }

    /**
     * Set haslo
     *
     * @param string $haslo
     * @return User
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * Get haslo
     *
     * @return string 
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set imie
     *
     * @param string $imie
     * @return User
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return User
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set Pesel
     *
     * @param string $pesel
     * @return User
     */
    public function setPesel($pesel)
    {
        $this->Pesel = $pesel;

        return $this;
    }

    /**
     * Get Pesel
     *
     * @return string 
     */
    public function getPesel()
    {
        return $this->Pesel;
    }

    /**
     * Set ulica
     *
     * @param string $ulica
     * @return User
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;

        return $this;
    }

    /**
     * Get ulica
     *
     * @return string 
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * Set nr_domu_nr_mieszkania
     *
     * @param string $nrDomuNrMieszkania
     * @return User
     */
    public function setNrDomuNrMieszkania($nrDomuNrMieszkania)
    {
        $this->nr_domu_nr_mieszkania = $nrDomuNrMieszkania;

        return $this;
    }

    /**
     * Get nr_domu_nr_mieszkania
     *
     * @return string 
     */
    public function getNrDomuNrMieszkania()
    {
        return $this->nr_domu_nr_mieszkania;
    }

    /**
     * Set kod_pocztowy
     *
     * @param string $kodPocztowy
     * @return User
     */
    public function setKodPocztowy($kodPocztowy)
    {
        $this->kod_pocztowy = $kodPocztowy;

        return $this;
    }

    /**
     * Get kod_pocztowy
     *
     * @return string 
     */
    public function getKodPocztowy()
    {
        return $this->kod_pocztowy;
    }

    /**
     * Set miasto
     *
     * @param string $miasto
     * @return User
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;

        return $this;
    }

    /**
     * Get miasto
     *
     * @return string 
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set kraj
     *
     * @param string $kraj
     * @return User
     */
    public function setKraj($kraj)
    {
        $this->kraj = $kraj;

        return $this;
    }

    /**
     * Get kraj
     *
     * @return string 
     */
    public function getKraj()
    {
        return $this->kraj;
    }

    /**
     * Set nr_telefonu
     *
     * @param string $nrTelefonu
     * @return User
     */
    public function setNrTelefonu($nrTelefonu)
    {
        $this->nr_telefonu = $nrTelefonu;

        return $this;
    }

    /**
     * Get nr_telefonu
     *
     * @return string 
     */
    public function getNrTelefonu()
    {
        return $this->nr_telefonu;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add orderUser
     *
     * @param \AppBundle\Entity\Order $orderUser
     * @return User
     */
    public function addOrderUser(\AppBundle\Entity\OrderCar $orderUser)
    {
        $this->orderUser[] = $orderUser;

        return $this;
    }

    /**
     * Remove orderUser
     *
     * @param \AppBundle\Entity\Order $orderUser
     */
    public function removeOrderUser(\AppBundle\Entity\OrderCar $orderUser)
    {
        $this->orderUser->removeElement($orderUser);
    }

    /**
     * Get orderUser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderUser()
    {
        return $this->orderUser;
    }
}
