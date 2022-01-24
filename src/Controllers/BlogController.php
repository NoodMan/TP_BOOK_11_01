<?php

namespace App\Controllers;

use App\Entity\Article;
use App\Entity\Member;
use App\Entity\User;
use App\Entity\Admin;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Routes\Router;


class BLogController
{

    public function index()
    {
        echo "Viens on ce bats juste pour voir et comme sa je pourrais te voler ton plaid =')" . "<br />";
        echo "j'ai faimmmmmmmmmmm ";
    }

    public function show(int $id)
    {
        echo "Je suis le dieu N° " . $id;
    }

    public function test()
    {
        echo "Ceci est un test pour voir si cela fonctionne";
    }

    public function addn()
    {
        require_once('bootstrap.php');

        echo "test page pour ajouter des choses ";

        $ClassM = new ClassMetadata("App\Entity\User");
        var_dump($ClassM);
        $UserRepository = new EntityRepository($entityManager, $ClassM);
        var_dump($entityRepository->findAll());
        die();
        
    }

    public function modify()
    {
        echo "test pour voir si cela fonctionne";
    }

    public function delete()
    {
        echo "test page de suppression ";
    }
}
