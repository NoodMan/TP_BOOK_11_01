<?php

namespace App\Controllers;


use App\Entity\Admin;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Routes\Router;


class AdminController
{

    const NEEDLES = [ // pour le foreach de l'user )a mettre dans la class pour l'utiliser partout)
        "serviceID",
        "firstname",
        "lastname",
        "age",
        "mail",
        "level",

    ];

    public function show(string $id) //affichage article methode get
    {

        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Admin"));
        $oUser = $repository->find((int) $id);
        print($oUser->getFullName());
        //var_dump($oUser);
        //die();


        //$entityManager = EH::getRequireEntityManager();
        // $repository = new EntityRepository($entityManager, new ClassMetadata//("App\Entity\User"));
        // $aUser = $repository->findAll();

        // foreach ($aUser as $oUser){
        //     echo($oUser->getPersonal_data());

        // }

    }

    public function index()
    {
        echo "Viens on ce bats juste pour voir et comme sa je pourrais te voler ton plaid =')" . "<br />";
        echo "j'ai faimmmmmmmmmmm ";
    }


    public function test()
    {
        echo "Ceci est un test pour voir si cela fonctionne";
    }







    public function add() //ajout article methode post
    {
        //  if (!empty($_POST)) Me casse mon code peux etre enleve le !
        foreach (self::NEEDLES as $value) { // avant de faire le foreach crée une const NEEDLES
            if (!array_key_exists($value, $_POST)) //$_POST Un tableau associatif 
            {
                $_SESSION["error"] = "Il manque des champs à remplir";

                header("location: http://localhost:8888/src/vues/addAdmin.php");
                exit;
            }

            $_POST[$value] = htmlentities(strip_tags($_POST[$value])); //Convertit tous les caractères éligibles en entités HTML
        }



        $admin = new Admin((int) $_POST["serviceID"], $_POST["firstname"], $_POST["lastname"], (int) $_POST["age"], $_POST["mail"], (int) $_POST["level"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($admin);
        $entityManager->flush();


        header("location: http://localhost:8888/src/vues/addAdmin.php");
    }

    public function Modify(string $id)
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Admin"));

        $oAdmin = $repository->find((int) $id);

        if (!empty($_POST)) {
            foreach (self::NEEDLES as $value) {
                //var_dump($_POST);
                //die("toto");
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../vues/modifyAdmin.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if ($_POST[$value] === "") {
                    echo "Il manque des champs...";
                    include __DIR__ . "/../vues/modifyAdmin.php";
                    die();
                }
            }

            $admin->setServiceID((int)$_POST["serviceID"]);
            $admin->setFirstname($_POST["firstname"]);
            $admin->setLastname($_POST["lastname"]);
            $admin->setAge((int)$_POST["Age"]);
            $admin->setEmail($_POST["mail"]);
            $admin->setLevel((int)$_POST["level"]);

            $entityManager->persist($admin);
            $entityManager->flush();
        }

        include __DIR__ . "/../vues/modifyAdmin.php";
    }




    public function delete($id)
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Admin"));

        $admin = $repository->find($id);

        $entityManager->persist($admin);
        $entityManager->flush();
    }
}
