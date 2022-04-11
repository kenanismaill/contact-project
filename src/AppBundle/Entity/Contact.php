<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="phone_number", type="string", length=255)
     */
    private $phoneNumber;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="zip", type="string", length=255)
     */
    private $zip;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="street_number", type="string", length=255)
     */
    private $streetNumber;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="birth_day", type="string", length=255)
     */
    private $birthDay;
    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Contact
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        
        return $this;
    }
    
    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return Contact
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        
        return $this;
    }
    
    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }
    
    /**
     * Set city
     *
     * @param string $city
     *
     * @return Contact
     */
    public function setCity($city)
    {
        $this->city = $city;
        
        return $this;
    }
    
    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set country
     *
     * @param string $country
     *
     * @return Contact
     */
    public function setCountry($country)
    {
        $this->country = $country;
        
        return $this;
    }
    
    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Set streetNumber
     *
     * @param string $streetNumber
     *
     * @return Contact
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
        
        return $this;
    }
    
    /**
     * Get streetNumber
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    
    /**
     * Set birthDay
     *
     * @param string $birthDay
     *
     * @return Contact
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
        
        return $this;
    }
    
    /**
     * Get birthDay
     *
     * @return string
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }
    
    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Contact
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        
        return $this;
    }
    
    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}

