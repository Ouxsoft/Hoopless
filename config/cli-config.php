<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\DependencyFactory;

$entityManager = '';

require_once __DIR__ . '/../bootstrap.php';

//return ConsoleRunner::createHelperSet($entityManager);

$config = new PhpFile(__DIR__ . '/migrations.php');
// Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$conn = DriverManager::getConnection([
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'hoopless',
    'host' => 'mysql'
]);

return DependencyFactory::fromConnection($config, new ExistingConnection($conn));