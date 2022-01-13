<?php

 namespace App\Interfaces;

use App\Entity\User;

interface UserInter {
    public function getFullName(): string;
}