<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager; // coeur de l'application

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true; // mode dev et non production
$proxyDir = __DIR__."/src/Proxies";
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'user'     => '106139_nood',
    'password' => 'hottak-ceXgoq-qopse6',
    'dbname'   => 'pawolanmwen_nood',
    'host'     => 'mysql-pawolanmwen.alwaysdata.net',
    
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);