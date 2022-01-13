<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

 /** @ORM\Entity*/


final class Admin extends Member{

    /* @ORM\Column(type="integer")*/
    private int $level;

    public function __construct(int $serviceID, string $firstname, string $lastname, int $age, string $email, int $level){ 

        parent::__construct ($serviceID, $firstname, $lastname);
        
        $this->age = $age;
        $this->email = $email;
        $this->level = $level;
    }

    public function getLevel(): int{
        return $this->level;
    }

    public function setLevel(int $newLevel): self {
        return $this->level = $newLevel; 
        return $this;
    }

    public function getFullName(): string
    {
        return "";
    }
}

