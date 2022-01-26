<?php

namespace App\Entity;

use App\Interfaces\UserInter;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"Admin" = "Admin", "User" = "User"})
 *  @ORM\Table(name="Member",uniqueConstraints={@ORM\UniqueConstraint(columns= {"mail"})})
*/

class Member  {

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
    protected string $firstname; //p

    /** @ORM\Column(length=100) */
    protected string $lastname; //n

    /** @ORM\Column(type="smallint")*/
    private int $age; 

    /** @ORM\Column(length=150)*/
    private string $mail;

    /** @ORM\Column(length=255)*/
    private string $password;



    public function __construct (int $s, string $f, string $l, int $a, string $m, string $password, ){ 
        
        $this->serviceID = $s;
        $this->firstname = $f;
        $this->lastname = $l;
        $this->age = $a;
        $this->mail = $m;
        $this->password = password_hash($password, PASSWORD_DEFAULT); 
        
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
        return $this->mail;
    }

    public function getArticles(): array {
        return $this->articles;
    }
    public function getServiceID(): int {
        return $this->serviceID;
    }

    public function setServiceID(int $newServiceID): self {
        $this->serviceID = $newServiceID;
        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->firstname;
        // to show the id of the Category in the select
        // return $this->id;
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

    /**
     * Get the value of mail
     *
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @param string $mail
     *
     * @return self
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    

    /**
     * Get the value of password
     */ 
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password) : self
    {
        $this->password = $password;

        return $this;
    }
}

