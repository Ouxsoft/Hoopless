<?php
/*
use Doctrine\ORM\Tools\Console\ConsoleRunner;

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\DependencyFactory;

$entityManager = '';

require_once __DIR__ . '/../bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);


$conn = DriverManager::getConnection();

return DependencyFactory::fromConnection($config, new ExistingConnection($conn));
*/

require 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;

$config = new PhpFile(__DIR__ . '/migrations.php');

$paths = [__DIR__ . '/../src/Entity'];
$isDevMode = true;

$ORMconfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,null, null, false);
$entityManager = EntityManager::create([
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'hoopless',
    'host' => 'mysql'
], $ORMconfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));



