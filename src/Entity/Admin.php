<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

 /** @ORM\Entity */


class Admin extends Member{

    /* @ORM\Column(type="integer")*/
    
    private int $level;

    public function __construct(int $serviceID, string $firstname, string $lastname, int $age, string $mail, int $level, string $password){ 

        parent::__construct ($serviceID, $firstname, $lastname, $age, $mail, $password);
        
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

