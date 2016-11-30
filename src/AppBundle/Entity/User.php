<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
    
    public function __construct()
    {
        $this->isActive=true;
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
     * Set userName
     *
     * @param string $userName
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setImie($firstName)
    {
        $this->imie = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setNazwisko($lastName)
    {
        $this->nazwisko = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
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
     * @param integer $nrTelefonu
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
     * @return integer 
     */
    public function getNrTelefonu()
    {
        return $this->nr_telefonu;
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
}
