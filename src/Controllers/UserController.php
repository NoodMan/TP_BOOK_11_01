<?php

namespace App\Controllers;
session_start();

use App\Entity\User;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class UserController
{

    const NEEDLES = [ // pour le foreach de l'user
        "serviceID",
        "firstname",
        "lastname",
        "age",
        "mail",
        "personal_data",

    ];

    public function show(string $id) //affichage article methode get
    {

        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));
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
        
        foreach (self::NEEDLES as $value) {
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "Il manque des champs à remplir";
                
                header("location: http://localhost:8888/src/vues/addUser.php");
                exit;
            }

            $_POST[$value] = htmlentities(strip_tags( $_POST[$value]));
        }



        $user = new User((int) $_POST["serviceID"], $_POST["firstname"], $_POST["lastname"], (int) $_POST["age"], $_POST["mail"], (int) $_POST["personal_data"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();


        header("location: http://localhost:8888/src/vues/addUser.php");
        
    }





   public function modify(string $id)
    
    {
        echo "test pour voir si cela fonctionne";

            $entityManager = EH::getRequireEntityManager();
            $Userrepository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));

            $user = $Userrepository->find($id);

        
        if (!empty($_POST)){
            
            foreach (self::NEEDLES as $value){
                if (!array_key_exists($value,$_POST)){
                    $_SESSION["error"] = "Il manque des champs à remplir";

                    $_POST[$value] = htmlentities(strip_tags( $_POST[$value]));

                    $user->setServiceID((int)$_POST["serviceID"]);
                    $user->setFirstname($_POST["firstname"]);
                    $user->setLastname($_POST["lastname"]);
                    $user->setAge((int)$_POST["Age"]);
                    $user->setEmail($_POST["mail"]);
                    $user->setPersonal_data((int)$_POST["personal_data"]);
                  
                


                if($value=== "personal_data"){
                   $getteur = "getPersonalData";
               }
            }
               $userData[$value] = $user->$getteur();
                
                $userData["id"] = $user->getId();
                $_SESSION["userData"] = $userData;
                
                header("location: http://localhost:8888/src/vues/modifyUser.php");
                exit;
                
           }
        }   
    }


    public function delete($id)
{
            $entityManager = EH::getRequireEntityManager();
            $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));

            $user = $repository->find($id);
            
            $entityManager->persist($user);
            $entityManager->flush();
        }

    }


   