<?php

namespace App\Controllers;

session_start();

use App\Entity\User;
use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Routes\Router;


class UserController
{

    const NEEDLES = [ // pour le foreach de l'user
        "serviceId",
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
        //print($oUser->getFullName());
        //var_dump($oUser);
        //die();
 
       // $aCat = $repository->findAll(); // si celui ligne 33 print ne fonctionne pas
       // print $aCat; 

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
            if (!empty($_POST)){
               
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "Il manque des champs à remplir";

                header("location: http://localhost:8888/src/vues/addUser.php");
                exit;
            }

            $_POST[$value] = htmlentities(strip_tags($_POST[$value])); //Convertit tous les caractères éligibles en entités HTML
        }

        $user = new User((int) $_POST["serviceID"], $_POST["firstname"], $_POST["lastname"], (int) $_POST["age"], $_POST["mail"], (int) $_POST["personal_data"]);

        $entityManager = EH::getRequireEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();


        header("location: http://localhost:8888/src/vues/addUser.php");
    }


    public function Modify(string $id)
    {
        $entityManager = EH::getRequireEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));

        $user = $repository->find((int) $id);

        if (!empty($_POST)) {
            foreach (self::NEEDLES as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../vues/modifyUser.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value]))); // teste de deplacer ça!!

                if ($_POST[$value] === "") {
                    echo "Il manque des champs...";
                    include __DIR__ . "/../vues/modifyUser.php";
                    die();
                }
            }

            $user->setServiceID((int)$_POST["serviceId"]);
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setAge((int)$_POST["age"]);
            $user->setMail($_POST["mail"]);
            $user->setPersonal_data((int)$_POST["personal_data"]);

            $entityManager->persist($user);
            $entityManager->flush();

            echo "information(s) bien modifier";
        }

        include __DIR__ . "/../vues/modifyUser.php";
    }
}

// CODE QUI NE FONCTIONN PAS !!!

//    public function modify(string $id){
//
//        $entityManager = EH::getRequireEntityManager();
//        $Userrepository = new EntityRepository($entityManager, //new ClassMetadata("App\Entity\User"));
//        $user = $Userrepository->find($id);
//
//        if (!empty($_POST)) { // pour verifier si existe valeur //comme isset
//
//            foreach (self::NEEDLES as $value) {
//                if (!array_key_exists($value, $_POST)) {
//                    $_SESSION["error"] = "Il manque des champs à //remplir";
//                    exit;
//                }
//                $_POST[$value] = htmlentities(strip_tags($_POST//[$value]));
//            }
//
//            $user->setServiceID((int)$_POST["serviceID"]);
//            $user->setFirstname($_POST["firstname"]);
//            $user->setLastname($_POST["lastname"]);
//            $user->setAge((int)$_POST["Age"]);
//            $user->setEmail($_POST["mail"]);
//            $user->setPersonal_data((int)$_POST["personal_data"]);
//
//            $entityManager->persist($user);
//            $entityManager->flush();
//        }
//
   //     $userData = [$user];
   //     $_SESSION["userData"] = $userData;
//
   //     foreach (self::NEEDLES as $value) {
   //         $getteur = "get" . ucfirst($value); // pour mettre en //Maj 
   //         if ($value === "personal_data") {
   //             $getteur = "getPersonalData";
    //        }
//
    //    }
    //    $_SESSION["userData"] = $userData;
//
//
    //    header("location: http://localhost:8888/src/vues///modifyUser.php");
    //    exit;
    //}




//    public function delete($id)
//   {
//        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User"));

//        $user = $repository->find($id);

//       $entityManager->persist($user);
//       $entityManager->flush();
//  }
// }
