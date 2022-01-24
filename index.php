<?php


require_once('vendor/autoload.php');
require_once('bootstrap.php');

use App\Entity\Article;
use App\Entity\Member;
use App\Entity\User;
use App\Entity\Admin;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Routes\Router;
use App\Controllers\BLogController;



//$user = new User(2, "Jean", "Toto", 33, "roiuhjezrtyht@gmail.com", 7); // //création nouvelle utilisateur
//$entityManager->persist($user);


//$book = new Article("Les Fables de la Fontaine", $user, "Bla Bla Bla"); // //création nouvelle article 
//$entityManager->persist($book);


//$admin = new Admin(9, "Paul", "Tim", 35, "lkpoiu@yahoo.fr", 56);
//$entityManager->persist($admin);


//$book1 = new Article("Je sais pas", $admin, "blablabla");
//$entityManager->persist($book1);
//var_dump($book1);
//$entityManager->flush();

//$entityManager = EH::getRequireEntityManager();
       // $repository = new EntityRepository($entityManager, new ClassMetadata//("App\Entity\User"));
       // $aUser = $repository->findAll();
        
       // foreach ($aUser as $oUser){
       //     echo($oUser->getPersonal_data());

       // }




//$ClassM = new ClassMetadata(("App\Entity\Admin"));
//$AdminRepository = new EntityRepository($entityManager, $ClassM);

//$aAdmin = $AdminRepository->findBy(["age" => 35]); // ex tableau cle => valeur (age)
//var_dump($aAdmin);


//$aUsers = $UserRepository->findAll();

//foreach ($aUsers as $oUser) {
   //echo $oUser;
  // $oUser->getEmail();
   //var_dump($oUser->getEmail());// pour verifier
   //echo $oUser->getEmail();

//}


//$arrays = ["bla", "bla", "bla",]; // crée un p**** de tableau 
//print_r($arrays);

//foreach ($arrays as $array) {
// echo $array;
//}




$router = new Router($_GET['url']);

$router->get("/", "App\Controllers\BLogController@test"); // pour avoir la racine du site
$router->get("/posts/:id", "App\Controllers\BLogController@show");// pour afficher id 
$router->get("/Admin/", "App\Controllers\BLogController@index"); //URL
$router->get("/Article/", "App\Controllers\BLogController@index");
$router->get("/Member/:id", "App\Controllers\UserController@show");
$router->get("/User/:id", "App\Controllers\UserController@show");

$router->post("/Admin/", "App\Controllers\BLogController@add"); //postman
$router->post("/Article/", "App\Controllers\BLogController@index");
$router->post("/Member/", "App\Controllers\BLogController@add");
$router->post("/User/:id", "App\Controllers\UserController@show");


$router->post("/User/", "App\Controllers\UserController@add"); //Ajout User
$router->get("/User/", "App\Controllers\UserController@add");


//$router->put("/Admin/", "App\Controllers\BLogController@modify"); //postman
//$router->put("/Article/:id", "App\Controllers\BLogController@show");
//$router->put("/Member/", "App\Controllers\BLogController@modify");

$router->get("/User/:id", "App\Controllers\UserController@modify"); // modifier User
$router->post("/User/:id", "App\Controllers\UserController@modify"); 

$router->delete("/Admin/", "App\Controllers\BLogController@delete"); //postman
$router->delete("/Article/:id", "App\Controllers\BLogController@delete");
$router->delete("/Member/", "App\Controllers\BLogController@delete");


$router->get("/User/:id", "App\Controllers\UserController@delete");
$router->delete("/User/:id", "App\Controllers\UserController@delete");//suppression

$router->run(); // pour verifier si les routes match
