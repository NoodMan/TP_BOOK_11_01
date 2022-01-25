<?php

namespace App\Controllers;


use App\Entity\Admin;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Routes\Router;


class AdminController
{

    const NEEDLES = [ // pour le foreach de l'user
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
        //  if (!empty($_POST)) Me casse mon code
        foreach (self::NEEDLES as $value) {
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "Il manque des champs à remplir";

                header("location: http://localhost:8888/src/vues/addAdmin.php");
                exit;
            }

            $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
        }



        $admin = new Admin((int) $_POST["serviceID"], $_POST["firstname"], $_POST["lastname"], (int) $_POST["age"], $_POST["mail"], (int) $_POST["level"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($admin);
        $entityManager->flush();


        header("location: http://localhost:8888/src/vues/addAdmin.php");
    }





    public function modify(string $id)

    {
        echo "test pour voir si cela fonctionne";

        $entityManager = EH::getRequireEntityManager();
        $Adminrepository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Admin"));

        $admin = $Adminrepository->find($id);

        if (!empty($_POST["firstname"])) {
            $firstname = strip_tags($_POST["firstname"]);
            if (trim($_POST["firstname"]) === "") {

                $error = "Le champ doit être remplie";
                echo $error;
                die();
            }

            $admin->setFirstname($firstname);

            $entityManager->persist($admin);
            $entityManager->flush();
        }


        include __DIR__ . "/../vues/modifyAdmin.php";
        exit;
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
