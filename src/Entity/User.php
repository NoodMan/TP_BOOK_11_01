<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */


class User extends Member  
{

  /** @ORM\Column(type="integer") */
    private int $personal_data;

    public function __construct(int $s, string $f, string $l, int $a, string $m, int $personal_data, $password)
    {

        parent::__construct($s, $f, $l, $a, $m, $personal_data, $password);
        
        $this->personal_data = $personal_data;
    }
  
    public function getPersonal_data(): int
    {
        return $this->personal_data;
    }

    public function setPersonal_data(string $newPersonal_data): self{
        $this->personal_data = $newPersonal_data;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->firstname ." ". $this->lastname;
    }
}
