<?php

namespace App\Entity;

use App\Interfaces\UserInter;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\@MappedSuperclass */

abstract class Member implements UserInter{

    // @ORM\Id avec la classe de typage Id; précise que la propriété $id sera une clé primaire
    // @ORM\GeneratedValue avec la classe de typage GeneratedValue; précise que la colonne id sera de type AUTO_INCREMENT
    // @ORM\Column(type="integer") avec la classe de typage Column;Précise que la propriété id sera une colonne dans table Library
    // et que la colonne sera de type entier


    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * */
    private int $id;

    /** @ORM\Column(type="integer")*/
    private int $serviceID;

    /** @ORM\Column(length=100) */
    private string $firstname; //p

    /** @ORM\Column(length=100) */
    private string $lastname; //n

    /** @ORM\Column(type="integer", length=3) */
    private int $age; 

    /** @ORM\Column(length=150) */
    private string $mail;


    public function __construct (int $s, string $f, string $l){ //void ne retourne rien
        $this->serviceID = $s;
        $this->firstname = $f;
        $this->lastname = $l;
        
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function setFirstname(string $newFirstname): self{ // pour cible methode static
        $this->firstname = $newFirstname;
        return $this;
    }
    public function getLastname(): string {
        return $this->lastname;
    }

    public function setLastname(string $newLastname): self{
        $this->lastname = $newLastname;
        return $this;
    }

    public function getAge(): int {
        return $this->age;
    }
    public function setAge(int $newAge): self{
        $this->age = $newAge;
        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getArticles(): array {
        return $this->articles;
    }
    public function getServiceID(): int {
        return $this->serviceID;
    }

    public function setService(int $newServiceID): self {
        $this->serviceID = $newServiceID;
        return $this;
    }


    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}

