<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity\ */


final class User extends Member  
{

    /** @ORM\Column(type="integer")*/
    private bool $personal_data;

    public function __construct(int $serviceID, string $firstname, string $lastname, int $age, string $email, bool $personal_data)
    {

        parent::__construct($serviceID, $firstname, $lastname);
        $this->age = $age;
        $this->email = $email;
        $this->personal_data = $personal_data;
    }

    public function getPersonal_data(): bool
    {
        return $this->personal_data;
    }

    public function getFullName(): string
    {
        return $this->fullname;
    }
}
